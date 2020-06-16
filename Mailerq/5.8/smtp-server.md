# The built-in SMTP server

MailerQ can open one or more SMTP ports on which it accepts incoming mail.
All these incoming messages are published to RabbitMQ. The incoming 
messages are published to the inbox queue, as set with the "rabbitmq-inbox"
setting in the config file. 

Remember that MailerQ sends out message from the _outbox_ queue - which is
a different queue than the inbox queue to which incoming messages are published. 
By default, incoming message are therefore not immediately sent out again. To
overcome this, most MailerQ users give the "rabbitmq-inbox" setting the same 
value as the "rabbitmq-outbox" setting. All incoming emails are then automatically 
published to the outbox queue, from which they are then immediately picked up again 
and scheduled for immediate forwarding.

![MailerQ shared inbox outbox queue](../Images/mailerq-shared-inbox-outbox-queue.png)

However, you can also configure MailerQ to use different inbox and outbox queues.
MailerQ then stores all incoming messages in the inbox queue first. You can add 
your own scripts that process these messages and forwards them to 
the outbox queue. Would you like to add a script that does additional processing 
or filtering before an incoming message is forwarded? Configure MailerQ to publish received 
messages in an inbox queue and let your scripts read these messages from this 
inbox queue. After processing, post the message to the outbox 
queue where MailerQ picks them up to deliver them.

![MailerQ separate inbox outbox queues](../Images/mailerq-seperate-inbox-outbox-queues.png)

If you use MailerQ to handle incoming email, you can also use scripts that pick
up messages from the inbox queue, and store them in mailboxes or maildirs.


## Config file settings

In the config file there are a number of variables that you can use
to set the ports on which MailerQ should listen, and from which IPs MailerQ should
accept incoming SMTP connections:

````
smtp-ip:            1.2.3.4
smtp-port:          25,2525,1024-1026
smtp-secure-port:   2526
````

The "smtp-port" variable holds the port or ports that MailerQ opens and
on which incoming connections are accepted. You can assign a single port,
but comma-separated values and port-ranges are also accepted. The
default SMTP port is 25, which is the one that you probably want to use.

Normally, MailerQ opens this port on all IP address that are available on
the server. This means that if a server has multiple IP addresses, it does
not matter to which of its IP addresses you connect: MailerQ listens on
all of them. If you want to limit this, you can assign an explicit IP
address using the "smtp-ip" variable. If you set this, MailerQ only accepts 
incoming connections to that specific IP.

The "smtp-port" setting contains the port number for the normal SMTP
protocol. The SMTP protocol starts as a non-secure connection. The client 
and server can start a STARTTLS handshake to secure the connection.
Besides normal SMTP connections, it is also possible to open an already secured 
SMTP socket. Use the "smtp-secure-port" setting for this. A secure port uses TLS right from 
the start, and no STARTTLS handshake is necessary. This is slightly faster 
(the initial handshake can be skipped) and is also more secure (the initial 
EHLO message can not be intercepted). However, such encrypted connections are 
not part of the SMTP standard, and regular SMTP clients do not expect this. 
However, if you write your own SMTP handshake code, it sometimes is simpler 
and faster to have access to a connection that is already encrypted without 
using "STARTTLS".

The IP address to which you send a message to MailerQ, is normally the same as 
the address *from* which the mail is going to be forwarded. Thus, if you 
send an email to MailerQ listening on IP address 5.6.6.5, the message will 
also be sent out from this IP. If you want to send out the message from a
different IP instead, you should either add a special MIME header to your
mail ("x-mq-ip"), or you can use the following config file variables:

````
smtp-default-ips:       1.2.3.4;4.5.6.7
smtp-unmappable-ips:    1.2.3.28/32;1.2.3.5/32
smtp-mappable-ips:      1.2.3.0/24;4.5.6.0/24
````

The above config file settings tell MailerQ that the default outgoing IP addresses
are 1.2.3.4 and 4.5.6.7. All messages that have not an explicit IP address from
which they should be sent, will be sent from one of these two IP addresses.

Messages that are submitted over SMTP, are sent out from the same IP address
as to which they were submitted *if the IP address is mappable*. Thus, if you 
send a message to 1.2.3.100, it will also be sent out from IP addresses 1.2.3.100.
An IP address is considered to be mappable if it matches with the IP ranges
inside the *smtp-mappable-ips* variable **and** does not match the ranges in the
*smtp-unmappable-ips* variable. Thus, messages submitted to 1.2.3.100 are also
sent out from 1.2.3.100 because that IP is mappable, while messages to 1.2.3.28
get sent out from the default IP's, because this IP address is not mappable.


### Secure connections

To secure your SMTP traffic, you can assign a private key and certificate. You 
can use a self-signed certificate, but it is much better to use a private key and
a certificate from a certificate authority. However, using a self-signed key is 
still better than using no key at all, as most SMTP clients will still accept 
the self-signed key.

```
smtp-certificate:   /etc/mailerq/your.domain.com.crt
smtp-key:           /etc/mailerq/your.domain.com.key
smtp-ciphers:       !aNULL:!eNULL:!LOW:!SSLv2:!EXPORT:!EXPORT56:FIPS:MEDIUM:HIGH:@STRENGTH
```

The paths to the certificate and private keys for your domain should be added
to the config file, with the list of ciphers that you'd like to support.


### Controlling access

By default, the whole universe can connect to the inbound SMTP server. You may
want to restrict this. If you set a username and password in the config file,
all inbound connections must first authenticate before they can inject emails.
With the "smtp-range" setting you can also restrict the IP addresses from which
you want to allow incoming email.

```
smtp-range:         192.168.0.0/16
smtp-username:      my_user_name
smtp-password:      secret_password
```

You can assign a semicolon separated list of IP ranges to the "smtp-range"
variable.

Keep in mind that if you set a username and password, the SMTP handshake becomes 
a little slower (incoming connections first have to authenticate before a message 
can be delivered). If you do not have to, it is therefore ofter faster to set up 
a firewall or an IP range to restrict access, than to require authentication.


### Local Email Addresses

If you have a username and password installed, messages from unauthenticated 
connections are normally rejected. However, if an incoming message is sent to 
an address that is marked as a local address, the message is accepted anyway.
MailerQ checks each incoming message and compares the email address with 
the addresses listed on the "local address list". This list can be managed
from the [management console](management-console).

In the config file you can also assign a special message queue for such
local email messages. Every time a message is accepted that is meant for
a local address, it will be published to the queue that is assigned to the
"rabbitmq-local" config file variable.

If you have also set a "rabbitmq-reports" variable in the config file, MailerQ 
parses all incoming local messages, and if it detects that it holds a report
message (for example a Delivery Status Notification or a DMARC report), it will
post the message to this reports queue.


### Testing incoming messages

MailerQ can run SPF, DKIM, DMARC and spam checks on incoming messages. 
The results of these checks are added to the JSON that is published to the 
inbox queue. You can also instruct MailerQ to modify the incoming messages 
and add an extra "authentication-results" header to the mail.

```
smtp-check:         spf,dkim,dmarc,spam
smtp-auth-results:  local,nonlocal
```

The "smtp-check" variable in the config file can be set to a comma separated
list of checks that have to be performed on incoming messages. Supported
values are "spf", "dkim", "dmarc" and "spam". The results of the checks are 
added to the JSON.

If you also want to add the check results to the "authentication-results"
field in the MIME header, you can use the "smtp-auth-results" config
file variable. This variable can be set to a comma separated list holding 
the possible values "local" and "nonlocal". If you set it to "local", the 
authentication-results header will only be added to incoming emails that were 
sent to a Local Email Address. The "nonlocal" value does exactly the opposite.

The DKIM, DMARC and SPF checks are all performed by MailerQ ifself. MailerQ has 
its own embedded algorithms to test whether incoming messages are valid. In 
practice, it comes down to extracting information from the e-mail, and doing a 
couple of DNS lookups to check whether the information in the mail matches the
settings published in DNS.

Besides comparing mails with settings in DNS, MailerQ can also run a spam-check
on incoming messages. For this, MailerQ uses the open source "SpamAssassin" 
application. Each incoming message is sent to SpamAssassin to test whether
it is spam or ham. If you add the "spam" option to the "smtp-check" config 
file variable, you therefore also need a running SpamAssassin daemon (which
is normally called "spamd"). The address where this daemon can be reached must
be set in the config file.

```
spamassassin-host:  localhost
spamassassin-port:  783
```

The above config file settings tells MailerQ that the the SpamAssassin daemon
is running on the same machine as MailerQ, and that it can be reached on port
783 (which is SpamAssassin's default port).


### Running behind HAProxy

It is possible to run MailerQ behind a HAProxy server.
If you do this, external clients do not directly connect to MailerQ, but to 
the proxy server instead. This proxy server then forwards the incoming traffic 
to one of the MailerQ backend servers.

All incoming traffic is thus first passed through the proxy server. From
the perspective of MailerQ, the remote IP address of each incoming TCP connection 
is the IP address of the proxy, and not the (much more interesting) client address. 
To allow MailerQ to see the client IP address too, the PROXY protocol can 
be enabled on the HAProxy server. By enabling this protocol, the proxy server adds
a small header in front of all forwarded TCP connections, with some meta 
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

### Validating email addresses

For the JSON, email address validation can be [loosened](other-configuration#validate-email-addresses),
so that attempts will be made despite an email address not being fully RFC compliant. To allow
injection of such messages, the `smtp-validate-address` option should be set. This option is for the
email supplied at the `MAIL FROM` and `RCPT TO` stage. Valid values are `strict` and `loose`.


By enabling injection for invalid emails, yet requiring RFC compliant emails during the sending phase,
the mails can be initially accepted and processed by the rest of the infrastructure via RabbitMQ, instead
of having to acount for the possibility that the injection goes wrong.

```txt
smtp-validate-address:  strict
```


### Connections

To prevent that MailerQ exhausts the max number of open TCP connections
that is allowed by the OS, you can set a "smtp-connections" setting. There will
never be more than this number of total _incoming_ and _outgoing_ connections.

```
smtp-connections:       100
smtp-connections-in:    50
smtp-connections-out:   75
```

To prevent an excessive amount of either outgoing or incoming connections to block their
counterparts from creating connections, the limits can also be adjusted separately. In the example
above, the maximum amount of incoming connections are set to 50, but the maximum amount of outgoing
connections are 75. When MailerQ is mostly sending, that means that MailerQ only allows 75 outgoing
connections at the same time, which means that there are 25 connections reserved for the incoming
connections. This guarantees that always at least 25 clients can be connected at the same time. If
sending slows down, this number can grow up to 50, at which point it hits the incoming connection 
limit, preventing it from taking up the connection space for outgoing connections.

If only the global limit would be set in the example above, if MailerQ is connected to 100 endpoints,
incoming connections would be queued until the connection limit dropped again. If there are already 100
incoming connections, MailerQ would be unable to send any email, because the global connection
limit is already exhausted. 

Usually, you want all three values to be set, to guarantee that ever side has a reserved space
for the amount of connections that they can make.


### Other settings

The following variables may also be useful when you set up an SMTP server:

```
smtp-maxsize:           100MB
smtp-threads:           1
```

In the initial SMTP handshake the client advertises its capabilities 
(like the max message size to accept). The config file setting "smtp-maxsize" 
contains the maximum allowed input size for message.

All SMTP traffic is handled by separate threads. The number of threads that 
are started for SMTP traffic can be set with the "smtp-threads" setting. 
Increasing this value can give a real boost to MailerQ's performance and
we recommend to set it close to the number of CPU's that you have in your
machine. 

**Important!** The "smtp-threads" variable is meaningful for _outgoing_ connections as well!


## Multiple IP addresses

If you have not used the "smtp-ip" setting and you run MailerQ on a server 
with multiple IP addresses, the SMTP server is available on all the server's 
IP addresses. A client can therefore choose to which IP address 
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

This feature to automatically extract meta data from the MIME header
can be disabled in the config file. If you use MailerQ as an internet 
facing receiver, you probably do not want to allow users to control the 
deliverability by adding "x-mq-*" these headers, so in that case you can 
better disable this feature in the config file:

```
smtp-extract:       true    (default: true)
```

