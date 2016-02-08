# Delivery Throttling

Sending large volumes of email messages can be tricky: receiving domains often set 
limits on the number of messages or connections they accept. In order to adjust your 
email delivery to these restrictions, MailerQ allows you to throttle delivery by setting
the maximum number of simultaneous connections, maximum number of messages per minute and 
maximum number of new connections per minute. 

You can set these limits globally in the configuration file and on a per domain basis 
in the management console or by directly adding them to the database. 

We will start with the global/default limits and will get into the domain specific settings 
later in this article. 

## Global delivery limits

Global settings are the default settings MailerQ falls back on when there are no 
domain specific limits set. These limits can be set in the MailerQ configuration file 
(`/etc/mailerq/config.txt`). Please note that changing the configuration file requires a 
MailerQ restart. 

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
[management console](management-console) or by adding them 
directly into the [database](database-access). This makes it 
possible to have different limits for mails sent to, for example gmail.com and hotmail.com. 

To add them using the management console, all you have to do is go the the 'Email throttling' 
tab of the web-interface and press the 'add domain' button. Entering a domain name (e.g. hotmail.com) 
and pressing the 'add domain' button again, will take you to a form where you can add 
limits for the domain. You can always remove or change throttling settings by clicking 
on the domain in the Email Throttling list. 

The Email Throttling form has the following options:

### Limits for the entire domain

* **Attempts per minute:** maximum number of messages sent to the domain per 
minute;
* **New connctions per minute:** maximum number of newly created connections to 
the domain per minute;
* **Simultaneous SMTP connections:** maximum number of simultaneous SMTP 
connections to the domain.

### Limits per IP address
**Note:** these limits are per IP address on the RECEIVING domain. ISPs often have 
multiple IP addresses on which they receive email messages. These also have 
limits on the number of messages and connections they accept. 

* **Attempts per minute:** maximum number of message sent to an IP linked to 
the receiving domain per minute;
* **New connections per minute:** maximum number of new connections to an IP
linked to the receiving domain per minute;
* **Simultaneous SMTP connections:** maximum number of simultaneous connections 
to an IP linked to the receiving domain.


### Limits per active SMTP connection

* **Messages over a single connection:** maximum number of messages MailerQ 
will send over a connection before it is closed;
* **Seconds a connection may be idle:** maximum time a connection is kept 
idle. MailerQ can keep connections open whilst it is throttling deliveries. 
However, a connection is never kept open for a longer period than the set limit. 

### Memory limits

* **Maximum size of in-memory queue:** before MailerQ attempts to deliver an 
email they are loaded into MailerQ's memory; this setting ensures this queue 
doesn't grow indefinitely.

You can also insert these limits per domain and ip directly into your database. Our database 
access documentation shows exactly which tables and which fields and field types MailerQ creates.  
[Read more about database access](database-access).


## Flood patterns

Whilst email throttling can make sure you do not go over the limits set by receiving 
parties most of the time, they will not stop mail servers from greylisting you all of 
the time. However, when you do go over the limits, the receiving mail server often gives 
a specific response, such as "too many connections from your ip". MailerQ allows you to 
set Flood Patterns that activate when you get a specific response so you can temporarily 
pause or slow down your email delivery.

### Creating flood patterns

To set up a flood pattern you can either insert them directly into the [database](database-access) 
or add them using the management console. The database access documentation shows you 
all you need to know about which tables are available, to add them using the management 
console you have to go to the Flood Patterns tab and press 'create new pattern'. This will 
take you to a form. 

### Flood pattern creation form

The creation form has several fields you can set: 

#### Name  

Here you can name your flood pattern. We recommend using a descriptive name to make 
it easy to recognize the pattern, for example: Limit the number of messages per connection. 

#### Pattern

Here you can add a pattern for MailerQ to check. If this pattern matches the answer 
that is received from a mail server, e.g. "Too many connections to this host". 
You can use three types of pattern matching methods:

* **Regular expression**: the input is treated as a [Perl-style regular expression](http://perldoc.perl.org/perlre.html); 
* **Wildcard:** In the pattern wildcards can be used similar to the ones used for file matching in the shell: 
For example:
    - Asterisk (`*`) matches everything: `*@mailerq.com` will match `foo@mailerq.com`, `bar@mailerq.com`, etc.;
    - Question mark (`?`) matches a single character: `mailerq.??` will match `mailerq.nl` and `mailerq.de` but not `mailerq.com`;
    - Brackets (`[]`) matches any character within the brackets: `[abc]` will match `a`, `b`, or `c` and `[!abc]` will match anything that isn't.
* **Substring:** The pattern must be a substring of the answer from the server: `'bar'` will match `'foobar'`.<!-- TODO does this require quotes? -->

#### Pause Current sending 

The duration you want to pause the delivery to the domain. If you leave this blank or 
set it to 0, delivery will not be paused. 

#### Reduced capacity duration

The duration of the reduced delivery. If this is set to 0 or left blank, it will not 
send with reduced capacity. You can set the reduced capacity in the reduced delivery 
capacity form. 

#### Reduced delivery capacity

After matching a response and if you have set up reduced capacity, the delivery to the domain 
will be slowed for the duration as set in the duration and capacity settings. The reduced 
delivery capacity form is the same as the email throttling form we showed earlier. 
