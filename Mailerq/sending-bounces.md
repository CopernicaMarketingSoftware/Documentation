# Sending bounces with MailerQ

MailerQ can also be used for sending bounces - or, to be more precise:
to send Delivery Status Notifications (DSN).

A Delivery Status Notification is an email message that contains meta
information about the delivery of an email. Mail servers send such DSN
messages to each other when the delivery of an email is delayed, or
when the delivery has completely failed. It is even possible to send
DNS messages on successful delivery, although in practice only
failure and delay notifications are sent.


## Enable DSN messages

Normally, MailerQ does not send DSN messages. All results are published
in JSON format to the appropriate result queues, where you can pick them
up and process them. Most users find it more convenient to collect
results in JSON format from a message queue than setting up a special 
incoming mail server to receive and parse incoming bounces.

However, if you do want to receive bounces by mail, you simply have to
add an extra property to the JSON input that instructs MailerQ that it
should send back a bounce message when something goes wrong:

```json
{
    "envelope":     "mailer-daemon@example.com",
    "recipient":    "example@example.com",
    "mime":         "Content-Type: multipart/report\r\n....",
    "dsn":          {
        "envelope":     "mailer-daemon@example.com",
        "notify":       "FAILURE",
        "orcpt":        "example@example.com"
        "ret":          "FULL",
        "envid":        "your-specific-identifier"
    }
}
```

The extra "dsn" property in the input JSON that instructs MailerQ to send
has the following sub-properties:

envelope:       The envelope address that MailerQ should use when
                a bounce is sent.

notify:         When should MailerQ send a DSN? Possible values are "NEVER",
                "SUCCESS", "FAILURE" and "DELAY". It is also allowed to
                set this to a comma seperated list of values. Currently,
                MailerQ only supports the "FAILURE" and "SUCCESS" setting, 
                and does not send a notifications when a message is delayed.
                However, if the message is forwarded to a server, that other
                server could send delay notifications.

orcpt:          The "original recipient" address that will be set in the
                notification. If you do not include this property in the
                JSON, the normal recipient address will be used.

ret:            The type of content that should be included in the 
                notification mail. This can be set to "FULL" to enforce
                that the entire original mail is included, or "HDRS"
                if the DSN message should only contain the headers of
                the original mail.

envid:          This is an application specific envelope identifier. You
                can set it to whatever you want, and it will be set in
                the bounce message that is returned.


## Enable DSN via SMTP

If you inject your mails via SMTP, instead of directly publishing them
in JSON format to the RabbitMQ outbox queue, you can also instruct 
MailerQ to send bounces.

MailerQ supports the DSN extension for the SMTP protocol, and you can
also supply the "notify", "orcpt", "ret" and "envid" variables via
the SMTP protocol:

```smtp

@todo show SMTP communication

```

## Enable DSN via message headers

Using 




## Default settings in the config file




## The special bounce queue

When 





                
                
                
                 and not on
                delay or on failure. However, if you do include this
                option, and the mail is forwarded to a different MTA,
                the other MTA might honor the notify setting




envelope:       mailer-daemon@smtpeter.com
ret:            full
notify:         failure









## Sending a Delivery Status Notification by hand

We start with a lame example. In the end, a delivery status notification
is nothing more than a regular MIME formatted email message,  with a 
different content-type. Because you can use MailerQ to send all sorts of
MIME messages, you can also use it for sending DSN messages. You just 
have to pass in an alternative MIME message:

```json
{
    "envelope":     "mailer-daemon@example.com",
    "recipient":    "example@example.com",
    "mime":         "Content-Type: multipart/report\r\n...."
}
```

Above you see the JSON for sending a DSN message. This is not much
different than sending a regular email, with HTML and/or text content.
The notification will be sent from envelope address 
"mailer-daemon@example.com" and to recipient "example@example.com".


## Tell MailerQ to construct DSN messages

You can also instruct MailerQ to create the DSN messages given a regular
email. You can add one extra property to the input JSON, and MailerQ
will send a completely different type of e-mail. Consider the following
input JSON:

```json
{
    "envelope":     "sender@yourdomain.com",
    "recipient":    "receiver@example.com",
    "mime":         "..."
}
```

The above JSON contains the input for sending a regular email to
"receiver@example.com". Imagine however, that you want to send a 
notification back to the original envelope, containing a report about
exactly this original e-mail. You can achieve this by simply adding a 
"report" property to this JSON object. MailerQ will then convert the
mime data into a DSN that is going to be sent back to the 

```json
{
    "envelope":     "sender@yourdomain.com",
    "recipient":    "receiver@example.com",
    "mime":         "....",
    "dsn": {
        "envelope":     "mailer-daemon@example.com",
        "notify":       "FAILURE,DELAY",                /* supported FAILURE, DELAY, SUCCESS and NEVER */
        "orcpt":        "example@example.com",
        "ret":          "FULL",                         /* HDRS of FULL */
        "envid":        "skldfjslfkjsdlk"
    },
    "report":   {
        "original-envelope-id": "....",     envid uit DSN JSON
        "reporting-mta":        "....",     MailerQ (niet configurabel)
        "received-from-mta":    "....",     niet gezet door MailerQ
        "arrival-date":         "....",     niet gezet door MailerQ
        "human-readable":       "....",     niet gezet door MailerQ
        "full":                 boolean,    True als ret=FULL in input JSON
        "recipients": [ {
            "original":             "....",     orcpt in input JSON
            "final":                "....",     gezet op de recipient
            "action":               "....",     "relayed" of "failed" ("delayed" is nog niet geimplementeerd)
            "status":               "....",     "5.2.1" (code geretourneerd door ontvanger)
            "remote-mta":           "....",     niet gezet door MailerQ
            "diagnostic-code":      "....",     de SMTP code
            "last-attempt-date":    "....",     de tijd waarop de laatste poging voor het bericht was ingeroosterd
            "final-log-id":         "....",     niet gebruikt door MailerQ
            "will-retry-until":     "...."      niet gebruikt door MailerQ
        } ]
    }
}
```

When MailerQ detects that the "report" propery was added to the JSON
input, it suddenly








It is
therefore very easy to send DSN messages with MailerQ: just insert the

