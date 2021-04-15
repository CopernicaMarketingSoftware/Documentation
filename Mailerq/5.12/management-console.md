# Mail Transfer Agent Management Console

MailerQ comes equipped with a full MTA management console. The management
console allows you to monitor the performance of your email delivery in 
real-time. If necessary, the management console can be used to change 
settings to maximize deliverability on the fly. If you have multiple 
instances of MailerQ running in a cluster, you can easily switch between 
them.

![MailerQ Mail Transfer Agent Management Console](../Images/managment-console-full.jpg)

## Setting up the Management Console

The management console can be enabled in MailerQ's configuration file.
The following variables should be used:

````
www-port:               8485 (default: 8485)
www-ip:                 1.2.3.4 (default: 0.0.0.0, meaning all available IP's)
www-dir:                /usr/share/mailerq/www (default: /usr/share/mailerq/current/www)
www-connections:        10
````

The `www-port` variable holds the port number for the management console;
8485 is the default. If you use port 80 (which is the default port for HTTP
traffic) you can access the management console with using a browser via 
address `http://hostname.of.your.server`. If you assign a different port number 
(like 8485), you must include the port number in the URL: `http://hostname.of.your.server:8080`.

In its default setting of `0.0.0.0`, the management console is accessible via 
all IP addresses that are assigned to the server on which MailerQ runs. If you 
only want to make it accessible via one specific IP, you can set the `www-ip` 
variable. Of course, the IP address that you assign must be bound to the server.

## Authentication

The management console is protected with a username and password to prevent anyone from accessing it.
Besides setting a password, we also recommend to put the management console behind a firewall 
so that you will not have to worry about people breaking into it.

Since MailerQ 5.12, there are many possible ways to let users authenticate to the management console.
LDAP, RADIUS, linux users, HTTP endpoints, username/password files and lastly custom scripts.

```
www-auth:          hardcoded://username:password,username2,password2
www-auth:          ldap://example.com:389/base_dn
www-auth:          radius://identifier:secret@example.com:1812
www-auth:          users://user1,mailerq,user2,client*
www-auth:          http://example.com:80/some_endpoint
www-auth:          file:///users.txt
www-auth:          exec:///path/to/file
```

The first `hardcoded` is simply a comma separated list of username:password pairs, separated
by the ':' character. Note that this is the least safe, since the passwords will be plainly 
readable in the config file, in unhashed form.
The `ldap` specifier will connect to the LDAP server and try to bind to DN=`uid=username,base_dn`.
If this succeeds, the user is authenticated, if this fails, the user is rejected.
The `radius` specified will simply request access to the radius server, with the shared secret `secret` and the identifier `identifier`. Make sure that the 
client is set up correctly, or the server will reject the packets and MailerQ
logins will fail.
The `http` will perform HTTP BASIC authentication to the endpoint, and will therefore send along the 
`Authorization: Basic ...` header. Any 2xx code is treated as a success, while any other code is 
treated as a failure and a rejection.
The `file` specifier will load a simple text file that contains the usernames and passwords separated 
by the `:` character, but with the passwords in hashed form (similar to `/etc/passwd`). These passwords 
can be generated using `mkpasswd -m sha-512` or `openssl passwd -6`, for example. 

Lastly, the `exec` specifier will run the `/path/to/file` in a subprocess, and will check the return
code. This way, you can easily implement any authentication you require in a script! For example, you
can check a username and password combination in an SQL database, or you can ues the linux PAM modules, 
or you can make very custom requests. This allows you to tie the management console authentication 
directly into your existing user management infrastructure.

All HTML, CSS and Javascripts that are necessary for the management 
console are automatically installed into the `/usr/share/mailerq/current/www`
directory. If you want to run the console from out of a different
location, you can change this directory with the `www-dir` variable.

To limit the number of resources that can be used by the built-in HTTP
server, you can use the "www-connections" variable to limit the number
of simultaneous HTTP connections that can be handled. This number
includes active web sockets.


## Setting up a secure management console

If is a good idea to secure your management console, as it will also be
used to manage private DKIM Keys; by definition, these should be kept private 
and thus not transferered over interceptable non-secure HTTP connections.

The following configuration file variables are relevant for enabling 
HTTPS support:

````
www-secure-port:        443 (empty by default)
www-certificate:        /path/to/certificate.crt (empty by default)
www-privatekey:         /path/to/privatekey.key (empty by default)
www-ciphers:            !aNULL:!eNULL:!LOW:!SSLv2:!EXPORT:!EXPORT56:FIPS:MEDIUM:HIGH:@STRENGTH (empty by default)
````

If you enable both HTTP and HTTPS, users who access the non-secure interface
will automatically be forwarded to the secure interface. The `www-secure-port`
holds the port number for the HTTPS connections (443 is the default for 
this, so that you won't have to include the port number in URLS). The
certifate and key files, and the supported ciphers can be set using
the `www-certificate`, `www-privatekey` and `www-ciphers` variables.

Once enabled, the encrypted management console can be accessed using
the address `https://hostname.of.your.server` if you use default port 443,
or `https://hostname.of.your.server:port` for any other port.


## Announcing the interface on the cluster

If you have [a cluster with multiple MailerQ instances](cluster),
the web interface of these interfaces contains links to the other instances. 
MailerQ does its best to find out the URL for each of the other interfaces (by 
combining the host names and port numbers), but you can use the following
optional config file variables to help a hand:

````
www-host:               your.hostname (default: auto-detected)
www-url:                https://your.hostname:port (default: auto-detected)
````

## Rendering emails

The management console allows administrators to monitor live SMTP traffic.
All incoming or outgoing connections can be intercepted, and the entire SMTP
handshake (EHLO, MAIL FROM, RCPT TO, DATA) is real time visible via the management
console. You can thus see he raw MIME message data that is being sent or
received.

In fact, the management console even has an option to not only display the raw
MIME data, but to extract the HTML source code too, and render this in your browser. 
With this tool you can exactly see what type of messages your users are sending, 
and you can take action if you see messages that look like spam, phishing or 
other types of abuse. 

However, if you use the console to look at rendered emails, your browser automatically 
downloads images and other resources from the mail as well. This could trigger actions 
(like statistics updates) on the servers where these files are hosted. If you
do not want this and you have control over these servers, you can take precautionary
measures, for example by ignoring downloads that come from your IP address, or 
by ignoring downloads from clients with a specific user agent setting.

At Copernica we use this approach. Our devops have browsers with a special
user agent setting (with Firefox you can change this using the "about:config" url),
so that clicks and opens from us do not pollute mailing stats. In MailerQ's config 
file we have set the "render-useragent" value too, so that MailerQ refuses to 
share emails with browsers with a different user agent setting.

````
render-useragent:       Copernica DevOps
````

The "render-useragent" setting ensures that only browsers with the specified user
agent can render emails. If you have also updated your tracking servers to ignore
clicks and opens from browsers with this user agent setting, you can make sure
that you can safely look at rendered emails on the management console, without
triggering any actions on your tracking servers.


## Advanced caching options

The resources for the web interface (like the html, css, and javascript files)
are sometimes cached by your browser. This is normally ok (because you probably
do not update the files anyway), but if you plan to install a new MailerQ 
release once every while, you can set the cache-control header in the config
file:

````
www-cache-control:      must-revalidate
````

This config file option was mainly added to MailerQ to help the MailerQ
web developers: they make changes to the interface all the time, and they 
wanted to prevent that the testers were reviewing an outdated interface. But
in production environments, this setting might be useful too.

Check out [the documentation on mozilla.org](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Cache-Control)
for a list of supported options for this header.

