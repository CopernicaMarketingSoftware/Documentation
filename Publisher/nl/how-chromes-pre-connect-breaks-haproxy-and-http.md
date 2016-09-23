How an otherwise pretty nifty feature in Google's Chrome browser causes
many users to experience random 408 errors.

Somewhere last week, reports of users encountering HTTP 408 errors
served by our HaProxy based loadbalancers started trickling in. These
errors tend to occur sometimes when a loadbalancer cannot forward a
request to any of the backend servers. The most common cause is if
something really nasty happens like Apache encountering a segfault. In
this case HaProxy has already established a connection to a backend
server, but that connection is abrubtly lost, at wich point, of course,
HaProxy can do little else than inform the user of failure and close the
connection.

These errors are generally easy enough to debug: logs will quickly
reveal the server that's in trouble and we can disable it, fix it and
put it back into action. This time around, it proved much more
difficult. The number of reports of these errors steadily increased, but
the errors never correlated to issues on the backend servers.

Digging deeper into the issue, we discovered the inexplicable errors
were only occurring in Google Chrome and its open source brother
Chromium. What puzzled us most, was that an error that is essentialy a
time out error occurred instantly, click a link and bam, there it was.
Eventually, with much debugging and logging, we discovered that certain
behaviour in Chrome could fairly consistently trigger the error. Most of
time, hovering a bit before clicking a link would trigger it.

As it turns out, it's Google pre-connect feature that was causing the
error. We're not completely clear on the exact changes to Chrome that
cause it (this feature has been in Chrome for about three years), but
the basic cause is that Chrome opens a TCP connection to the webserver
and leaves it open without sending a request. The idea being that if you
predict click behaviour, you can do all the TCP stuff first and get the
data instantly when the user requests it, offering a faster browsing
experience. This means that Chrome will open a TCP connection when a
user hovers a link (among other things, it appears things like browsing
history are also factored into the equation) and send the GET request
for that link once the link is actually clicked. While it's abusing
HTTP, it will usually be OK, but not in the case of HaProxy which has to
be careful with its resources as it's handling traffic for many (tens,
possibly hundreds) of web servers.

HaProxy will only wait for so long after a TCP connection was etablished
before issuing a timeout, typically 2 seconds. This means that the TCP
connection opened by Chrome to speed up your browsing, may already have
received a timeout before the actual link is even clicked. Once the user
finally does click the link, HaProxy already has its 408 message ready
to go and smacks it into the user's face instantly. This is because
HaProxy does exactly what the HTTP protocol expects it to do: report the
error and close the connection. Because Chrome at this point thinks it
has already received data for the requested page, it serves this data -
which contains no more than the 408 error - directly to the user.

The solution to this problem is as easy as it is problematic: having
HaProxy serve /dev/null on a 408. This is problematic because it breaks
HTTP: an error should be reported, but we don't, just to allow Chrome's
weird behaviour. Sending /dev/null as the error means that HaProxy
closes the connection, but sends no data, so Chrome has no alternative
than to reconnect en re-request the page. Problem solved, but not as
neatly as you would want.

The feature has been in Chrome for years, but has only now become a
problem, we've filed it as a bug and hopefully the issue wil be resolved
soon. Meanwhile, if you're using Chrome, it's definitely adviseable to
disable this feature for now
(see [http://www.technize.net/chrome-extra-bandwidth/](http://www.technize.net/chrome-extra-bandwidth/)).
We can now work around the problem on our end, but there are many
reports of other loadbalanced websites experiencing the exact same
issue. Since writing this article, a blog post on the issue has also
surfaced on the official HaProxy
blog: [http://blog.haproxy.com/2014/05/26/haproxy-and-http-errors-408-in-chrome/](http://blog.haproxy.com/2014/05/26/haproxy-and-http-errors-408-in-chrome/)
