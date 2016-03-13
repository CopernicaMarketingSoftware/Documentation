# Smarthost configuration

You can instruct MailerQ to use a "smart host". When you enable this feature,
MailerQ does not send the messages directly to the final recipient, but
to an alternative mailserver instead - the so-called smarthost.

This feature could for example be useful if you use MailerQ for sending
mails from your own server to the internet, but you want to use an external
service (like [smtpeter.com](www.smtpeter.com)) to track the clicks and opens for your mailings.
Other use cases for smarthosts are when you want to create a chain of
MailerQ instances, and have the mails from one instance be forwarded to
the next instance.


## How to configure the smarthost feature

By default, the smarthost feature is disabled. If you want to enable it,
you either need to explicitly configure it in the configuration file.
The following variables can be used for it:

```
smarthost:          <hostname>  (empty by default)
smarthost-port:     <port>      (default: 25)
smarthost-username: <username>  (empty by default)
smarthost-password: <password>  (empty by default)
```

The "smarthost" has to be set to enable the smarthost feature, and should
contain the hostname of the server that you want to redirect the email to.
The other "smarthost-*" options are optional, and can be used if you the
target smarthost uses a different port than the default one (default is 25),
and if the smarthost requires authentication.


## Setting the smarthost on a per-message level

If you do not want to send all messages using a smarthost, but only specific 
messages or send specific messages to specific smarthosts, you can do so by adding 
the smarthost variables to the JSON or MIME-header of a specific message. If global 
smarthost settings are set, these settings will override the settings set in your 
configuration file. 

```
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "...",
    "smarthost": {
        "name": "hostname-smarthost",
        "port": "25",
        "username": "example-user",
        "password": "example-password"
    }
}
```

#### MIME header

```
x-mq-smarthost-name:    <hostname-smarthost>
x-mq-smarthost-port:    <25>
x-mq-smarthost-username: <example-user>
x-mq-smarthost-password: <example-password>
```

Only the "name" property is mandatory. The port defaults to 25, and not setting 
the username or password means MailerQ will not try to authenticate to the smarthost. 

## Using smarthost for debugging

If you use the "smarthost" option, mails are not delivered to the actual 
recipient but to the smarthost server instead. As a consequence, MailerQ 
internally queues all mails as if they were sent to the smarthost domain. If 
you open the management console, the list of active domains will be one 
item long: the smarthost domain.

If you are debugging, you probably want to run MailerQ in (almost) 
the same configuration as you normally would, with queues for all the domains 
to which messages are being delivered. The only difference is that you do not
want to actually deliver the mails, but send them to a dummy destination:
the "smarthost". This is where the smtp-sink options comes in.

````
smtp-sink-ip:           <ip address>    (default: 0.0.0.0)
smtp-sink-port:         <port>          (default: 25)
smtp-sink-username:     <username>      (empty by default)
smtp-sink-password:     <password>      (empty by default)
````

If you include the "smtp-sink-ip" and "smtp-sink-port" options in the config
file, MailerQ runs normally, and all mails are routed through different
internal queues with their own send capacities. However, when a TCP 
connection is created, the connection will be set up to the sink instead
of to the actual recipient mail server.

The "smtp-sink-username" and "smtp-sink-password" options can be used
if your sink requires authentication.

If you are looking for an SMTP server that simply accepts and discards
incoming messages, you can use [Postfix' smtp-sink](http://www.postfix.org/smtp-sink.1.html).


## What happens if you configure both the smarthost and the smtp-sink?

It is very well possible to configure both the smtp-sink option and
the smarthost at the very same time. If you do this, MailerQ will keep
a single queue of messages to the smarthost (and thus not seperate queues
for hotmail, gmail, yahoo, et cetera) - but when the TCP connection is
set up, it does not connect to this smarthost, but to the sink address
instead.

