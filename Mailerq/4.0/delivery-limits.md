# Delivery Throttling

Sending large volumes of email messages can be tricky: receiving domains often set 
limits on the number of messages or connections they accept. In order to adjust your 
email delivery to these restrictions, MailerQ allows you to throttle delivery by setting
the maximum number of simultaneous connections, maximum number of messages per minute and 
maximum number of new connections per minute. 

You can set these limits globally in the configuration file and on a per domain basis 
[in the management console](mgmt-throttling) or by [directly adding them to the database](database-access#reading-and-writing-to-the-database-directly). 


## Global delivery limits

Global settings are the default settings MailerQ falls back on when there are no 
domain specific limits set. These limits can be set in the MailerQ configuration file 
(`/etc/mailerq/config.txt`). Please note that changing the configuration file 
requires a MailerQ restart. 

### Domain limits

The domain limits are limits on the maximum number of messages per minute, 
maximum number of connection attempts, maximum simultaneous connections and the 
maximum number of messages in the message queue to a receiving domain. 

The following options are available in your config file. These settings are only 
used for domains that have no specific limits set:

```
domain-maxmessages:     <messages>
domain-maxconnects:     <connection attempts>
domain-maxconnections:  <connections>
domain-maxqueue:        <queue length> (default: -1)
```

The `domain-maxmessages` setting sets a limit to the number of messages to be sent 
to a single domain every minute. The `domain-maxconnects` option sets the maximum number
of connection attempts per minute to a single domain and the `domain-maxconnections` option 
sets the maximum number of simultaneous connections to a single domain. 

We recommend setting a limit (e.g. 500) for the `domain-maxqueue` setting. If you 
do not set a limit, your message memory might fill up with messages to a single domain 
when the domain only accepts messages at a slow rate. 

### IP address limits

The IP address limits are limits on the maximum number of messages per minute, 
maximum number of connection attempts and maximum simultaneous connections to a 
single IP address on a receiving domain. 

The following options are available in your config file. These settings are only used 
for domains that have no specific limits set:

```
ip-maxmessages:     <messages>
ip-maxconnects:     <connection attempts>
ip-maxconnections:  <connections>
```

The `ip-maxmessages` setting sets a limit to the amount of messages to be sent 
to a single receiving IP every minute. The `ip-maxconnects` option sets the 
maximum number of connection attempts per minute to a single receiving IP and 
the `ip-maxconnections` option sets the maximum amount of simultaneous 
connections to a single receiving IP. 

### Connection limits

Each connection to a remote server can also have limits configured in the 
configuration file. Just like the IP and domain limits, the settings in the 
configuration file are the default settings MailerQ falls back to when there are 
no domain specific settings.

The following options are available in your config file. These settings are only used 
for domains that have no specific limits set:

```
connection-maxmessages:     <messages> (default: -1)
connection-maxidle:         <miliseconds> (default: 1)
connection-secure:          <0 or 1> (default: 1)
```

The `connection-maxmessages` states the maximum number of messages per minute 
over a single connection. The `connection-maxidle` option sets the maximum time 
in milliseconds a connection may be idle before it is closed.

By setting `connection-secure` to 1, MailerQ will always use a secure connection 
if available. If no secure connection is available MailerQ will make a regular 
connection. 

### Maximum delivery time

When a message cannot be delivered immediately because of unresponsive 
receivers, greylisting or throttling, MailerQ publishes back the email to the 
outbox queue for later delivery. This can result in emails that are sent much 
later than the time that you first added them to the message queue. 


```
max-delivertime:         <seconds> (default: 86400)
```

This setting is time in seconds from first delivery attempt and is a default 
setting that is set in the configuration file. It is also possible to set a maximum 
delivery time on a per email level. [Read more about setting per message maximum delivery time](mime-message-properties).

### Maximum delivery attempts

Just like a max delivery time, you can also control the max number of attempts 
that MailerQ uses to send out an email. If a first attempt fails because a 
remote server is unreachable or does not immediately accept the message, MailerQ 
will make a new attempt a later.

```
max-attempts:            <number of attempts> (default: 10)
```

This setting is a default setting that is set in the configuration file.  It is 
also possible to set the maximum delivery attempts on a per email. [Read more about setting per message maximum delivery attempts](mime-message-properties).

### Total number of connections

To prevent the server from running out of file descriptors, it only opens a certain 
number of connections at the same time. Make sure that this variable does not exceed 
the limit for the number of open files! To let everthing work smoothly, leave at least 
100 file descriptors to the application that can be used for communication with databases, 
logfiles, message queues and DNS servers.

```
max-connections:    <connections>
```

This is a limit set for a single instance of MailerQ and can not be set per domain. 


## Domain specific limits
MailerQ allows you to set specific limits for each domain by settings these in the 
[management console](mgmt-throttling) or by adding them 
directly into the [database](database-access#reading-and-writing-to-the-database-directly). 
This makes it possible to have different limits for mails sent to, for example 
`gmail.com` and `hotmail.com`.


## Flood patterns

Flood patterns are rules that override the default throttling settings 
of MailerQ when the Mail Transfer Agent receives a specific error from a
receiving mail server. These can be set using the 
[management console](mgmt-throttling#flood-patterns-view) or by directly adding
them to the [database](database-access).
