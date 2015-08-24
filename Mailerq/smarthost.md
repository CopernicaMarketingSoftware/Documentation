# Smarthost configuration

You can instruct MailerQ to use a "smart host". When you enable this feature,
MailerQ does not send the messages directly to the final recipient, but
to an alternative mailserver instead - the so-called smarthost.

This feature could for example be useful if you use MailerQ for sending
mails from your own server to the internet, but you want to use an external
service (like smtpeter.com) to track the clicks and opens for your mailings.
Other use cases for smarthosts are when you want to create a chain of
MailerQ instances, and have the mails from one instance be forwarded to
the next instance.

(plaatje?)


## How to configure the smarthost feature

By default, the smarthost feature is disabled. If you want to enable it,
you either need to explicitly configure it in the configuration file,
or you can use a command-line switch when you start MailerQ. The following
variables can be used for it:

```
smarthost:          <hostname>
smarthost-port:     <port>
smarthost-username: <username>
smarthost-password: <password>
```

The `smarthost` has to be set to enable the smarthost feature, and should
contain the hostname of the server that you want to redirect the email to.
The other `smarthost-*` options are optional, and may be used if you the
target smarthost uses a different port than the default one (default is 25),
and if the smarthost requires authentication.


## Using smarthost for debugging

If you use the 'smarthost' option, mails are not delivered to the actual 
recipient but to the smarthost server instead. As a consequence, MailerQ 
only manages a single mail queue if the smarthost feature is activated: 
the queue of messages to the smarthost. MailerQ will not maintain 
seperate queues for mails per domain.

If you are debugging, you probably want to run MailerQ in (almost) 
the same configuration as you normally would, with many queues for the domains to which
messages are being delivered. The only difference is that you do not
want to actually deliver the mails, but send them to a dummy destination:
a sink. This is where the smtp-sink options comes in.

````
smtp-sink-ip:           <ip address>
smtp-sink-port:         <port>
smtp-sink-username:     <username>
smtp-sink-password:     <password>
````

If you include the `smtp-sink-ip` and `smtp-sink-port` options in the config
file, MailerQ runs normally, and all mails are routed through different
internal queues with their own send capacities. However, when a TCP 
connection is created, the connection will be set up to the sink instead
of to the actual recipient mail server.

The `smtp-sink-username` and `smtp-sink-password` options can be used
if your sink requires authentication.

If you are looking for a SMTP server that simply accepts and discards
incoming messages, you can use [Postfix' smtp-sink](http://www.postfix.org/smtp-sink.1.html).


## What happens if you configure both the smarthost and the smtp-sink?

It is very well possible to configure both the smtp-sink option and
the smarthost at the very same time. If you do this, MailerQ will keep
a single queue of messages to the smarthost (and thus not seperate queues
for hotmail, gmail, yahoo, et cetera) - but when the TCP connection is
set up, it does not connect to this smarthost, but to the sink address
instead.

