# Sending and receiving bounces with MailerQ

Some mail servers initially seem to accept a message, but send back
a bounce email later. Such bounces are sometimes called asynchronous
bounces and they are sent to the envelope address of the initially 
accepted message. The format for these bounce messages has been 
standardized: the Delivery Status Notification (DSN) format. There is 
also an extension to the SMTP protocol that allows mail servers to exchange 
with each other whether they like to receive such bounce messages, and 
what kind of information they want to receive back.

MailerQ supports all these things: when communicating with a receiving
server, MailerQ passes DSN parameters to tell the receiver what kind
of bounces you like to receive, and if MailerQ is used to receive mail
it understands these kind of parameters too. MailerQ can also be configured to
send out, receive and recognize DSN messages.


## Passing DSN settings

Delivery Status Notifications are sent back to the envelope address of
your messages. This is the address that is used in the "MAIL FROM" command
of the SMTP handshake, and that is stored in the "envelope" property
of the [input JSON](json-messages). If you want to receive DSN messages, 
you therefore first have to make sure that your envelope address is valid,
and that it indeed points back to your server.

Besides the envelope address that is used to send back DSN messages, some 
mail servers (but not all!) have implemented the SMTP DSN extension, and 
allow extra parameters to be passed to instruct them what kind of DSN messages 
you would like to receive back. You can for example specify that you want
to see the full original mail message in the notification, or just the 
headers. You can also specify whether you want to receive notifications
on failure, or also when a message was delayed or successfully delivered.

````json
{
    "envelope": "youraddress@yourdomain.com",
    "recipient": "info@example.com",
    "mime": "....",
    "dsn": {
        "notify": "FAILURE",
        "ret": "HDRS",
        "envid": "unique-identifier",
        "orcpt": "info@example.com"
    }
}
````

The above JSON sets "youraddress@yourdomain.com" to be the envelope address,
and if DSN messages are going to be sent, they will be sent to this address.
*If* the receiving mail server supports the DSN SMTP extension, and
allows extra parameters to be passed to specify what type of DSN messages
you like to receive back, MailerQ uses the "dsn" property to pass such
parameters to the receiver. Inside the "dsn" property you can specify
four things:

<table>
    <tr>
        <td>notify</td>
        <td>comma separated events that should trigger a notification (FAILURE, DELAY, SUCCESS, NEVER)</td>
    </tr>
    <tr>
        <td>ret</td>
        <td>should the notification hold the full original mail or just the headers (FULL, HDRS)</td>
    </tr>
    <tr>
        <td>envid</td>
        <td>unique identifier to be included in the notification as "original-envelope-id"</td>
    </tr>
    <tr>
        <td>orcpt</td>
        <td>the address to be included in the notification as "original-recipient"</td>
    </tr>
</table>

Keep in mind that not every server supports the DSN extension, and that
even if they do support it, they may not always respect your parameters. For
example, if you specified that you wanted to have the full original mail
in the bounce (you set "ret" to "FULL"), you may not receive a bounce at
all, or a bounce with just the headers. 


## Mime headers and config file settings








## Enable DSN messages

If you want to receive delivery status notifications, you can enable
this in the JSON input of each message. Besides the envelope and the
recipient, you can add an extra option with the DSN settings.

````json
{
    "envelope": "youraddress@yourdomain.com",
    "recipient": "info@example.com",
    "mime": "....",
    "dsn": {
        "notify": "FAILURE",
        "ret": "HDRS",
        "generate": true
    }
}
````

To receive DSN messages, you _must_ include a valid envelope address,
because this is the address to which these DSN messages are going to
be delivered. The nested "dsn" properties can be used to further configure
the bounce.

The "notify" setting specifies whether you want to receive a DSN in case
of a failure, a successful delivery or when a delivery gets delayed.


Normally, results are published in JSON format to the appropriate result queues
where you can pick them up and process them. Most users find it more convenient if
to collect results in JSON format from a message queue than setting up a special
incoming mail servers to receive and parse incoming delivery status notifications.

However, if you want to receive bounces and notifications by mail, you can 
configure MailerQ to send out delivery status notifications. This can
either be configured in the configuration file, so that DSN messages are sent
for every failed delivery, or on a per-message basis.


## Configuration file options

There are several DSN options that can be set in the MailerQ configuration
file. These settings control whether MailerQ should send DSN messages or 
not, and under which circumstances.

```
dsn-generate:       <1 or 0> (default: 1)
dsn-advertise:      <1 or 0> (default: 1)
dsn-notify:         <NEVER|FAILURE|DELAY|SUCCESS> (default: NEVER)
dsn-ret:            <FULL|HDRS> (default: HDRS)
dsn-from:           <email address> (default: mailerq@yourhostname)
```

The email protocol 


This setting controls whether MailerQ should generate DSN messages or not. If it 
is set to 0 (the default), no notifications are sent by MailerQ. 

This does not mean that
this setting will completely stop incoming DSN.

It is possible that a remote server does not manage to deliver a message
even after it has accepted it from us. In this case, the remote server could -
if requested - send out a DSN of its own to acknowledge the failure. In this scenario,
MailerQ does not know any better than that the message was successfully delivered -
and in fact, it will end up in the success queue.

```
dsn-notify:         <NEVER, FAILURE, DELAY or SUCCESS> (default: NEVER)
```

The `dsn-notify` setting, determines under which circumstances a DSN is generated.
It can contain the following values: NEVER, SUCCESS, FAILURE and DELAY. When
dsn-notify is set to "NEVER" (the default), no notifications are generated, if
it is set to "FAILURE" a notification is only generated when message delivery fails.
"SUCCESS" means a DSN is sent at every successful delivery (not recommended!) and "DELAY"
will give notifications when a delivery is temporarily delayed. This can be a comma
separated list (e.g. FAILURE,DELAY).

This controls in which cases the remote server may generate a DSN, and - if the
`dsn-generate` setting is set to 1, in which case MailerQ itself may send one.


```
dsn-envelope:       mailer-daemon@mailerq.com (default: mailer@localhost)
dsn-mta:            MailerQ (default: MailerQ)
```

The `dsn-envelope` address is the envelope address from which all delivery status
notifications are sent. The default is `mailer-daemon@localhost`, you should change
this to your own address. The variable `dsn-mta` holds the name of the reporting MTA
that is also included in the bounce emails.

These settings are only relevant if `dsn-generate` is set to 1. Otherwise, no DSN is
generated by MailerQ and the setting is never used.


```
dsn-ret:            <FULL or HDRS> (default: HDRS)
```

The `dsn-ret` setting determines whether a Delivery Status Notification holds the
complete original email message (this can create very large bounces) or only the
headers from the original email, and not the original content (which is recommended).
Possible values are FULL (full original email message) and HDRS (just the headers).

The standard value of `dsn-notify` is NEVER, which means that MailerQ does not send
bounce messages by default. However, even when the DSN feature is disabled in the config
file, it is still possible to set DSN settings on a per message level. This can be done
by adding DSN properties to the JSON or in the MIME headers.

Settings in the message JSON or MIME headers override the settings in the config
file. This means that if in your config file the `dsn-notify` is set to "NEVER" and in
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
        "mta":          "MailerQ",
        "orcpt":        "example@example.com",
        "ret":          "FULL",
        "generate":     true,
        "envid":        "your-specific-identifier"
    }
}
```

The above message contains a simple straightforward email message that
is sent from envelope address example@domain.com to recipient address
friend@example.com, with the full message content being stored in the "mime"
property.

The extra "dsn" property instructs MailerQ (and subsequent mail servers that
will process the mail as well) to send back a DSN message to the envelope
address when the mail could not be delivered. The "dsn" object can have the
following five sub properties:

* notify
* envelope
* mta
* orcpt
* ret
* envid
* generate

The `notify` variable specifies what sort of events should trigger the delivery
status notification. Possible values are "NEVER", "SUCCESS", "FAILURE" and
"DELAY". If you set it to "FAILURE", MailerQ will only send a bounce back on
failure. It is also allowed to set this to a comma seperated list of
values. If you set the `notify` property to "SUCCESS,FAILURE", a bounce message
will be sent on successful delivery as well as on failure.

The `envelope` and `mta` properties are optional property that set the envelope
address to be used for the bounce, and the name of the reporting MTA, that is also
included in the bounce email message. You normally set this to an address like
"mailer-daemon@yourdomain.com", and to the name of the MTA. If you do not include
these properties, the defaults from the configuration file are used.

The property `orcpt` is also an optional property and holds the original
recipient address. Inside the bounce message generated by MailerQ, this original
recipient address is included in the delivery report. This property is optional;
if you leave it out the actual `recipient` property will be used. This property
is only useful if you want the DSN to contain a different "original recipient"
address than the actual recipient.

The bounce message that is sent back by MailerQ holds a full delivery
report, as well as the full original message. If you want to save a lot
of network bandwidth, you can set the `ret` property to the value `HDRS`.
By doing so, you instruct MailerQ not to include the full MIME message
in the status notification, but only the original MIME headers.

The `generate` property controls whether a DSN message may be generated
by MailerQ itself. If set to false, MailerQ itself will never generate a
DSN, but - depending on the notify property - it may still be generated
by the remote server.

The last property that you can include in the "dsn" object, is `envid`.
This is an application specific message identifier, and you can set it to
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

The above communication will be converted into the following JSON messages
that are published to the inbox:

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


The third possiblity to add or adjust DSN settings to a message is by adding
special MIME headers. The following MIME headers are available to adjust the
DSN settings:

```mime
x-mq-dsn-notify:        FAILURE, SUCCESS, DELAY, NEVER
x-mq-dsn-envid:         the envelope id
x-mq-dsn-ret:           FULL or HDRS
x-mq-dsn-orcpt:         email@example.com
x-mq-dsn-envelope:      mailer-daemon@localhost
x-mq-dsn-mta:           name or reporting MTA
x-mq-dsn-generate:      whether MailerQ is allowed to generate a DSN
```

Just like all other x-mq-* headers, these will be stripped out of the message by
MailerQ and converted to JSON properties. An example MIME message could look
like this:

```mime
MIME-Version: 1.0
From: <info@example.com>
To: <somebody@domain.com>
Subject: This is the mail subject
X-MQ-DSN-Notify: FAILURE
X-MQ-DSN-Ret: FULL

This is the mail body
```

## The special DSN queue

Sending a DSN message is for MailerQ the same as sending a normal email message.
When MailerQ has to send out a bounce, it simply adds this bounce message
to the outbox queue so that it will be picked up and delivered.

However, if you want your DSN message to be sent by a separate MailerQ instance, or
if you want to process and filter the messages yourself (before sending them), you can
assign a different queue to be used for DSN messages. MailerQ will then not publish
the DSN's to the normal outbox queue, but to this alternative queue instead. The
config file variable `rabbitmq-dsn` can be used for this:

````
rabbitmq-dsn:           special_dsn_queue (empty by default)
````

If you assign a special DSN queue, it is up to you to make sure these messages are sent
and/or consumed (e.g. run a separate instance of MailerQ that uses this queue as outbox,
or write script that consumes the messages).

