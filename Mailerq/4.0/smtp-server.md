# The built-in SMTP server

MailerQ can open one or more SMTP ports on which it accepts incoming mail.
All these incoming messages are published to RabbitMQ. The incoming 
messages are published the the inbox queue, set with the "rabbitmq-inbox"
setting in the config file. 

Most users give the "rabbitmq-inbox" setting the same value as the "rabbitmq-outbox" 
setting, so that all incoming emails are automatically published to the outbox 
queue, from which they are then directly picked up again and scheduled for 
immediate forwarding.

![MailerQ shared inbox outbox queue](copernica-docs:Mailerq/Images/mailerq-shared-inbox-outbox-queue.png)

However, you can also configure MailerQ to use different inbox and outbox queues.
MailerQ will then store all incoming messages in the inbox queue first. You can add 
your own scripts that process these messages and forwards them to 
the outbox queue. Would you like to add a script that does additional processing 
or filtering before an incoming message is forwarded? Configure MailerQ to publish received 
messages in an inbox queue and let your scripts read these messages from this 
inbox queue. After processing, post the message to the outbox 
queue where MailerQ picks them up to deliver them.

![MailerQ seperate inbox outbox queues](copernica-docs:Mailerq/Images/mailerq-seperate-inbox-outbox-queues.png)

## Config file settings

To open the a SMTP port, you need to add a couple of settings to the config file:

```
smtp-ip:            1.2.3.4
smtp-port:          25
smtp-secure-port:   465
```

The "smtp-ip" and "smtp-port" variables contain the IP address and port
number to listen to. If you want MailerQ to listen to all IP addresses
available on the server, you can leave the "smtp-ip" setting empty. Only 
if you want to listen to one specific IP address, you should configure this
in the config file (this IP address must of course be available on the server).

The "smtp-port" setting contains the port number for the normal SMTP
protocol. The normal SMTP protocol starts as a non-secure connection, but
the client and server can start a STARTTLS handshake to secure the connection.

Besides normal SMTP connections, you can also open already secured SMTP 
connections. A secure connection uses TLS right from the start, and no
STARTTLS handshake is necessary. This is slightly faster (the initial handshake
can be skipped) and is also more secure (the initial EHLO message can not
be intercepted).


### Secure connections

MailerQ supports TLS on incoming connections. If you have a SSL certificate
for your domain, you can use it for the SMTP connections as well. The following
config file options can be used:

```
smtp-certificate:   /etc/mailerq/your.domain.com.crt
smtp-key:           /etc/mailerq/your.domain.com.key
smtp-ciphers:       !aNULL:!eNULL:!LOW:!SSLv2:!EXPORT:!EXPORT56:FIPS:MEDIUM:HIGH:@STRENGTH
```

The paths to the certificate and private keys for your domain should be added
to the config file, as well as the list of ciphers that you'd like to support.


### Controlling access

By default, the whole world can connect to the inbound SMTP server. You may
want to restrict this. If you set a username and password in the config file,
all inbound connections must first authenticate before they can inject emails.
With the "smtp-range" setting you can also limit the IP addresses from which
you want to accept incoming email.

```
smtp-range:         192.168.0.0/16
smtp-username:      my_user_name
smtp-password:      secret_password
```

You can assign a semicolon separated list of IP ranges to the "smtp-range"
variable.


### Running behind HAProxy

It is possible to run MailerQ behind a HAProxy server.
If you do this, external clients do not directly connect to MailerQ, but to 
the proxy server instead. This proxy server then forwards the incoming traffic 
to one of the MailerQ backend servers.

All incoming traffic is thus first passed through the proxy server. From
the perspective of MailerQ, the remote IP address of each incoming TCP connection 
is the IP address of the proxy, and not the (much more interesting) client address. 
To allow MailerQ to see the client IP address too, the PROXY protocol can 
be enabled on the HAProxy server. By enabling this protocol, a small header 
is added in front of all forwarded TCP connections, with some meta 
information of the connection (most importantly, the client IP address).

With the "smtp-proxy" setting you tell MailerQ that when a connection
comes in from a specific IP address, it should be treated as a connection
from a proxy server, and the first bytes that are received should not be
treated as the SMTP protocol, but as the initial PROXY header:

```
smtp-proxy:     192.168.0.0/16
```

The "smtp-proxy" settings accepts a list of semicolon separated IP ranges.
All incoming connections that match one of these ranges will be treated
as proxied connections, and the first bytes will be treated as PROXY header,
and not as SMTP traffic.


### Other settings

In the initial SMTP handshake the client advertises its hostname and its
capabilities (like the max message size to accept). The following config 
file settings can be used to override the defaults:

```
smtp-maxsize:       100MB
smtp-hostname:      a.specific.hostname.com
```

## Multiple IP addresses

If you have not used the "smtp-ip" setting and you run MailerQ on a server 
with multiple IP addresses, the SMTP server is available on all these addresses 
too. A client connection can therefore choose to which IP address 
to send your mail. MailerQ recognizes the IP address to which the mail was 
originally submitted, stores that information in the JSON message, and when 
the mail is finally forwarded to the internet, it will be sent out from _exactly 
the same_ IP address. You should be aware that this can cause problems if you 
deliver your email to an IP address from which no external connections can be 
made (like [127.0.0.1](http://en.wikipedia.org/wiki/Localhost)).

If you want MailerQ to send out the mail from a different IP address than that 
you originally sent it to, you can include [an extra MIME header field](mime-message-properties#local-ip-addresses) 
that instructs MailerQ to use a different IP instead.


## MIME headers

All incoming messages are converted into JSON messages and published to
RabbitMQ. The minimal JSON message contains the envelope address, the recipient
and the mime data, which is all extracted from the SMTP protocol.

If you want to add more settings to the JSON, you can do so with special 
headers in the MIME message. Every header that starts with "x-mq-" is
treated as a special MailerQ header, and will be turned into a JSON
property that controls how the mail is going to be handled.

