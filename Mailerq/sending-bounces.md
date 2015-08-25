# Sending bounces with MailerQ

Besides the delivery of regular email messages, MailerQ can also send out 
bounce message, or, to be more precise: send Delivery Status Notifications (DSN).

A Delivery Status Notification is an email message that contains meta
information about the delivery of an email. Mail servers send such DSN
messages to each other when the delivery of an email is delayed, or when the 
delivery completely failed. You can even instruct MailerQ to send DSN messages 
on successful delivery, although in practice success-notifications are seldomly 
used.


## Enable DSN messages

In its default configuration, MailerQ does not send DSN messages. Normally, 
results are published in JSON format to the appropriate result queues, where you
can pick them up and process them. Most users find it more convenient to collect
results in JSON format from a message queue than setting up a special incoming 
mail servers to receive and parse incoming delivery status notifications.

However, if you do want to receive bounces and notifications by mail, 
you can configure MailerQ to send out delivery status notifications. This can 
either be configured in the configuration file, so that DSN messages are sent 
for every failed delivery, or on a per-message basis.


## Configuration file options

There are several DSN options that can be set in the MailerQ configuration file. 
Note that all these settings are optional and can be left blank. Leaving them blank 
does mean MailerQ does not send Delivery Status Notifications. 

```
dsn-notify          <NEVER, FAILURE, DELAY or SUCCESS>
```
The `dsn-notify` setting, determines under which circumstances MailerQ has to send 
a DSN. It can contain the following values: NEVER, SUCCESS, FAILURE and DELAY. When 
dsn-notify is set to "NEVER" (default), MailerQ will never send notifications, if 
it is set to "FAILURE" it only sends notifications when messages fail. "SUCCESS" means 
a DSN is sent at every successful delivery (not recommended!) and "DELAY"  will give 
notifications when a delivery is temporarily delayed. This can be a commaseparated list 
(e.g. FAILURE, DELAY).

```
dsn-envelope
```
The `dsn-envelope` address is the envelope address from which all delivery status 
notifications are sent. The default is `mailer-daemon@localhost`, you **must** change 
this to your own address!

```
dns-ret             <FULL or HDRS>
```

The `dns-ret` setting determines whether the delivery status notification holds the 
complete email message (this can create very large bounce messages!) or just the 
message headers from the original email (which is recommended). Possible values are 
FULL (full original email message) and HDRS (just the headers).

The standard value of `dns-notify` is NEVER, which means that MailerQ does not send 
bounce messages by default. You have to change the configuration to make it work. 
However, when the feature is disabled in the config file, it is still possible to 
set DNS settings on a per message level. This can be done by adding dsn properties 
to the JSON or in the MIME headers. 

Settings set in the message JSON or MIME headers override the settings in your config 
file. Meaning that if in your config file the `dns-notify` is set to "NEVER" and in 
the message to "FAILURE", a notification will be sent when MailerQ fails to deliver 
the message. 


## Configure DSN for individual messages

You can specify for each individual message whether and when MailerQ should
send a delivery status notification. You can do this by adding extra properties
to the JSON (if you inject mails by publishing them to a RabbitMQ message queue 
directly), by using the DSN extension of the ESMTP protocol, by adding meta
headers to the MIME message body, or by using command line options if you
inject mails through the CLI interface.


### Enable notifications through JSON

If you want to receive a bounce message when the delivery fails, you can achieve
this by adding a `dsn` property to the input JSON:

```json
{
    "envelope":     "example@domain.com",
    "recipient":    "friend@example.com",
    "mime":         "MIME-Version: 1.0\r\n....",
    "dsn":          {
        "notify":       "FAILURE",
        "envelope":     "mailer-daemon@example.com",
        "orcpt":        "example@example.com"
        "ret":          "FULL",
        "envid":        "your-specific-identifier"
    }
}
```

The above message contains a simple straightforward email message that
is sent from envelope address example@domain.com to recipient address
friend@example.com, with the full message content being stored in the "mime"
property. Nothing special to see here.

The extra "dsn" property instructs MailerQ (and subsequent mail servers that
will process the mail as well) to send back a DSN message to the envelope 
address when the mail could not be delivered. The "dsn" object can have the 
following five sub properties:

* notify
* envelope
* orcpt
* ret
* envid

The `notify` variable specifies what sort of events should trigger the delivery
status notification. Possible values are "NEVER", "SUCCESS", "FAILURE" and 
"DELAY". If you set it to "FAILURE", MailerQ will only send a bounce back on
failure. It is also allowed to set this to a comma seperated list of 
values. If you set the `notify` property to "SUCCESS,FAILURE", a bounce message
will be sent on successful delivery as well as on failure.

Currently, MailerQ only sends notifications for failures and successful 
deliveries, and not yet for delayed deliveries. However, if you do set the 
`notify` property to "DELAY" and the message does get forwarded to a different
server, this other server may still send delay notifications. In other words: 
even although MailerQ does not yet send delay notifications, that does not mean
that you will never receive such notifications.

The `envelope` property is an optional property that sets the envelope
address to be used for the bounce. You normally set this to an address like 
"mailer-daemon@yourdomain.com". If you do not include this property, the default
value from the configuration file is used.

The property `orcpt` is also an optional property and holds the original 
recipient address. Inside the bounce message generated by MailerQ, this original
recipient address is included in the delivery report. This property is optional;
if you leave it out the actual `recipient` property will be used.

The bounce message that is sent back by MailerQ holds a full delivery
report, as well as the full original message. If you want to save a lot
of network bandwidth, you can set the `ret` property to the value `HDRS`.
By doing so, you instruct MailerQ not to include the full MIME message
in the status notification, but only the original MIME headers.

The last property that you can include in the "dsn" object, is `envid`.
This is a application specific environment ID, and you can set it to
whatever you like. It will be included in the bounce message, so
that you can match the bounces with the sent messages.



## Enable DSN via SMTP

If you inject your mails into MailerQ via SMTP, instead of publishing 
JSON formatted message to the RabbitMQ outbox queue, you can also 
instruct MailerQ to send bounces.

MailerQ supports the DSN extension for the SMTP protocol, and you can
also supply the "notify", "orcpt", "ret" and "envid" variables via
the SMTP protocol: 

RFC: https://tools.ietf.org/html/rfc3461

At the "MAIL FROM" part of the SMTP protocol you can add the RET and ENVID parameters, 
at the "RCPT TO" part you can add the NOTIFY and ORCPT parameters. All these parameters 
are optional and do no thave to be added. 

See the example below from the RFC:

```smtp
<<< 220 Example.ORGMTP server here
>>> EHLO Example.ORG
<<< 250-Example.ORG
<<< 250 DSN
>>> MAIL FROM:<Alice@Example.ORG> RET=HDRS ENVID=QQ314159
<<< 250 <Alice@Example.ORG> sender ok
>>> RCPT TO:<Bob@Example.COM> NOTIFY=SUCCESS \
    ORCPT=rfc822;Bob@Example.COM
<<< 250 <Bob@Example.COM> recipient ok
>>> RCPT TO:<Carol@Ivory.EDU> NOTIFY=FAILURE \
    ORCPT=rfc822;Carol@Ivory.EDU
<<< 250 <Carol@Ivory.EDU> recipient ok
>>> RCPT TO:<Dana@Ivory.EDU> NOTIFY=SUCCESS,FAILURE \
    ORCPT=rfc822;Dana@Ivory.EDU
<<< 250 <Dana@Ivory.EDU> recipient ok
>>> DATA
<<< 354 okay, send message
>>> (message goes here)
>>> .
<<< 250 message accepted
>>> QUIT <<< 221 goodbye

```

When MailerQ receives a message through the SMTP port, MailerQ will automatically 
transform the received message into JSON and adds it to the "inbox" queue. The 
RET, ENVID, NOTIFY and ORCPT parameters will be converted to a JSON "dsn" property 
as described above. 

The above communication will be converted into:

```json
{
    "envelope": "alice@example.org",
    "recipient": "bob@example.com",
    "mime": "(message goes here)",
    "dsn": {
        "ret": "hdrs",
        "envid": "QQ314159",
        "notify": "SUCCESS",
        "orcpt": "rfc822;Bob@Example.COM",
    }
}

{
    "envelope": "alice@example.org",
    "recipient": "carol@ivory.edu",
    "mime": "(message goes here)",
    "dsn": {
        "ret": "hdrs",
        "envid": "QQ314159",
        "notify": "FAILURE",
        "orcpt": "rfc822;Carol@Ivory.EDU",
    }

}

{
    "envelope": "alice@example.org",
    "recipient": "Dana@Ivory.EDU",
    "mime": "(message goes here)",
    "dsn": {
        "ret": "hdrs",
        "envid": "QQ314159",
        "notify": "SUCCESS,FAILURE ",
        "orcpt": "rfc822;Dana@Ivory.EDU",
    }

}
```


## Enable DSN via message headers


The third possiblity to add or adjust DNS settings to a message is by adding 
special MIME headers. The following MIME headers are available to adjust the 
DSN settings:

```mime
x-mq-dsn-notify:        FAILURE, SUCCESS, DELAY, NEVER
x-mq-dsn-envid:         the envelope id
x-mq-dsn-ret:           FULL or HDRS
x-mq-dsn-orcpt:         email@example.com
```

Just like all other x-mq-* headers, these will be stripped out of the message by 
MailerQ and converted to JSON properties. 


## The special DSN queue

For MailerQ sending a DSN message is basically the same as sending a normal email 
message. MailerQ can place the message in its own outbox to make sure it gets delivered. 

However, it is still possible to set a separate queue where DSN message are published to 
in the config file. By default this queue is the same queue as the outbox queue. However, 
if you want your DSN message to be sent by a separate MailerQ instance, or if you want 
to process and filter the messages yourself (before sending them), you can adjust the queue 
in the config file and let MailerQ publish the dsn messages to a separate queue. 

However, this means it is up to you to make sure these messages are sent and/or 
consumed (e.g. run a separate instance of MailerQ and publish to its outbox)



