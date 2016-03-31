# Mail Transfer Agent Management Console

MailerQ comes equipped with a full MTA management console. The management
console allows you to monitor the performance of your email delivery in 
real-time. If necessary, the management console can be used to change 
settings to maximize deliverability on the fly. If you have multiple 
instances of MailerQ running in a cluster, you can easily switch between 
them.


## View the Management Console demo

If you want to see the MailerQ management console in action without 
setting up a MailerQ environment, you can take a look at our 
[Management Console Demo](http://demo.mailerq.com "MailerQ Demo environment").
The data in this environment is fictional, but all settings are real. 
Feel free to play around with the settings and explore the options available.


## Activate the management console

The management console can be enabled in MailerQ's configuration file.
The following variables should be used:

````
www-port:           8485 (default: 8485)
www-ip:             1.2.3.4 (default: 0.0.0.0)
www-password:       admin (empty by default)
www-dir:            /usr/share/mailerq/www (default: /usr/share/mailerq/www)
````

The `www-port` variable holds the port number for the management console;
8485 is the default. If you use port 80, you do
not have to include the port number in the URL and you can access the
management console with using a browser via address `http://hostname.of.your.server`. 
If you assign a different port number (like 8080), you have to include
the port number in the URL: `http://hostname.of.your.server:8080`.

In its default setting of `0.0.0.0`, the management console is accessible via 
all IP addresses that are assigned to the server on which MailerQ runs. If you 
only want to make it accessible via one specific IP, you can set the `www-ip` 
variable. Of course, the IP address that you assign must be bound to the server.

The management console is protected with a password to prevent anyone from
accessing it. This password can be set with the `www-password`
variable. Besides setting a password, we also recommend to put the
management console behind a firewall so that you will not have to worry
about people breaking into it.

All HTML, CSS and Javascripts that are necessary for the management 
console are automatically installed into the `/usr/share/mailerq/www`
directory. If you want to run the console from out of a different
location, you can change this directory with the `www-dir` variable.


## Setting up a secure management console

If is a good idea to secure your management console, as it will also
used to manage private DKIM keys; by definition, these should not be transferered
over interceptable non-secure HTTP connections.

The following configuration file variables are relevant for enabling 
HTTPS support:

````
www-port:                   0
www-secure-port:            443 (empty by default)
www-certificate:            /path/to/certificate.crt (empty by default)
www-privatekey:             /path/to/privatekey.key (empty by default)
www-ciphers:                !aNULL:!eNULL:!LOW:!SSLv2:!EXPORT:!EXPORT56:FIPS:MEDIUM:HIGH:@STRENGTH (empty by default)
````

If you enable HTTPS, switch off the regular HTTP
interface by setting the `www-port` to zero. This prevents that users
will connect to the old unsecure interface by accident. The `www-secure-port`
holds the port number for the HTTPS connections (443 is the default for 
this, so that you won't have to include the port number in URLS). The
certifate and key files, and the supported ciphers can be set using
the `www-certificate`, `www-privatekey` and `www-ciphers` variables.

Once enabled, the encrypted management console can be accessed using
the address `https://hostname.of.your.server` if you use default port 443,
or `https://hostname.of.your.server:port` for any other port.


## Status overview

Once you open the management console, you first get access to the Status
Overview interface. This shows a summary of the email messages passing through
MailerQ. Here you can see how many messages have been processed, delivered,
retried, failed and more, either for one specific MTA or for all combined.
It also shows the number of SMTP connections that are currently active and how 
many are being attempted.

Selecting a single MTA through the dropdown menu also allows you to rename an 
MTA.  Note that renaming will not affect the MTA hostname; this MTA name is only 
used within MailerQ.

The green "Running" button allows you to pause certain MTAs, which will then
show up in the [Paused Deliveries](management-console#pause-deliveries) view.
Do note however that pausing will quickly fill up the RabbitMQ queues.

### AMQP monitor

The Overview interface also shows a summary of the messages going through 
your RabbitMQ queues. It shows exactly how many messages RabbitMQ has 
received, the number of rescheduled messages, the messages in memory and 
the results (success, failure, retries). It also shows the number of 
active temporary queues. <!-- TODO: is this still there?? -->


## MTA IPs

This view lists all IP addresses and their hostnames.  Clicking on a hostname
takes you to a graph of its real-time statistics, and allows you to rename it. See
[the Overview page](management-console#status-overview) for more information.


## Domains

The Domains view shows you live message statistics on a per-domain basis. 
Clicking on a domain takes you to a domain-specific graph on 
[the Overview page](management-console#status-overview).

Not every domain lines to receive email at high rates.  To throttle the number of
emails sent to a specific domain, refer to the 
[Email throttling](management-console#email-throttling) view.


## Email throttling

Setting up email throttling can be done in the MailerQ Management Console. 
All throttling settings can be adjusted in real-time, making it easy to 
improve your email delivery when needed. You can choose to set up 
throttling settings for a single domain for all IP addresses or for all 
IP addresses.

Read more about setting up domain specific limits and other delivery settings in 
our [delivery throttling documentation](delivery-limits#domain-specific-limits).
<!-- TODO: put this information here, and split delivery-limits into config and 
MGMT parts. -->


## Flood patterns

Flood patterns are rules that override the default throttling settings 
of MailerQ when the Mail Transfer Agent receives a specific error from a
receiving mail server.

Read more about setting up flood patterns and other delivery settings in our
[delivery throttling documentation](delivery-limits#flood-patterns).


## DKIM keys

MailerQ supports DKIM (Domain Key Identified Mail), a method for email 
authentication. Adding DKIM keys can be easily done in the management 
console.

[Read more about signing email with DKIM](dkim "MailerQ DKIM documentation")


## Paused deliveries

The Paused deliveries view shows you exactly what email deliveries are currently 
paused. It shows which MTA is paused to which remote IP/domain and until 
when the delivery is paused, and allows you to resume them. You can also 
manually pause email deliveries if necessary.  Manually paused MTAs are shown 
here as well.


## Redirected deliveries

Email delivery can also be redirected from one IP to another IP. As an 
example: when one of your IPs is greylisted by a receiving domain, this view 
allows you to temporarily redirect from the greylisted IP address to a new one. 
The redirected delivery shows all redirecting rules and which delivery is 
currently being redirected. You can also manually set up redirections.


## Log files

Every delivery attempt is registered by MailerQ, and is saved in the MailerQ
log files.  These files can be viewed in the MailerQ management console.  Viewing
a log file allows you to filter certain deliveries.


## Live SMTP monitor using web sockets

One of MailerQ's cool features (if we may say so) is the live SMTP 
monitor.  By starting up the monitor in the management console, your 
browser opens a [HTML 5 websocket](http://www.websocket.org) to the core
MailerQ process. All SMTP traffic received and sent out by MailerQ is 
also sent to this websocket, so you can exactly keep an eye on what is 
happening to your mailings.

![MailerQ SMTP monitor with websockets](copernica-docs:Mailerq/Images/mailerq-websocket.png)


## Local email addresses

MailerQ features an SMTP server; [read more about injecting via SMTP here](smtp-server).
By default, all emails received by a MailerQ instance need to be authenticated,
and without authentication, these emails are immediately rejected.  You might
however want to allow emails to certain _local_ email addresses: `info@yourdomain.com`
is a prime example of this.  The Local email addresses view allows you to manage
these.
