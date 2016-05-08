# Sending and receiving bounces with MailerQ

Some mail servers initially seem to accept a message, but send back
a bounce email later on in which they inform you that the mail could not
be delivered after all. Such asynchronous bounces are sent back to the 
envelope address of the initial message. There is sadly often no way 
to find out whether a server is going to send back notifications, and 
what these messages are going to look like. 

However, there is a formal standard for these bounce messages: the 
Delivery Status Notification (DSN) format. And there is an extension 
to the SMTP protocol that allows mail servers to exchange 
with each other whether they respect this standardized format, if
the original sender would like to receive such bounce messages, and 
what kind of information he or she wants to receive. This standard
make it much easier to link incoming bounces to the original sent email.

MailerQ supports this standard and SMTP extension: when communicating 
with a receiving server, MailerQ can passes DSN parameters to tell the 
receiver what kind of bounces you like to receive, and if MailerQ is 
configured to receive mail on a SMTP port, it understands these kind of 
parameters too. MailerQ can also be configured to send out, receive and 
recognize DSN messages.


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
on failure, on success and/or on a delayed delivery.

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

The above JSON sets "youraddress@yourdomain.com" to be the envelope address.
If something goes wrong, the notification will be sent to this address. 
If the receiving mail server also supports the DSN SMTP extension, MailerQ 
uses the "dsn" property in the input JSON to pass additional
DSN parameters to the receiver. You can use the following four DSN settings:

<table>
    <tr>
        <td>notify</td>
        <td>comma separated events that trigger a notification (FAILURE, DELAY, SUCCESS, NEVER)</td>
    </tr>
    <tr>
        <td>ret</td>
        <td>should the notification hold the full original mail or just the headers (FULL, HDRS)</td>
    </tr>
    <tr>
        <td>orcpt</td>
        <td>the address to be included in the notification as "original-recipient"</td>
    </tr>
    <tr>
        <td>envid</td>
        <td>unique identifier to be included in the notification as "original-envelope-id"</td>
    </tr>
</table>

The "notify" variable specifies what sort of events trigger the Delivery
Status Notification. Possible values are "NEVER", "SUCCESS", "FAILURE" and
"DELAY". If you set it to "FAILURE", you will only receive bounces on
failure. It is also allowed to set this to a comma seperated list of
values. If you set the "notify" property to "SUCCESS,FAILURE", a bounce message
will be sent on successful delivery as well as on failure.

The bounce message holds a full delivery report, as well as the full original
message. If you want to save a lot of network bandwidth, you can set the "ret" 
property to the value "HDRS". By doing so, you instruct MTA's not to include 
the full MIME message in the status notification, but only the original MIME headers.

The property "orcpt" is an optional property and holds the original
recipient address. This original recipient address is included in the delivery 
report. This property is optional; if you leave it out the actual recipient will 
be used. This property is only useful if you want the DSN to contain a 
different "original-recipient" value than the actual recipient.

The last property that you can include in the "dsn" object, is "envid".
This is a message specific message identifier, and you can set it to
whatever you like. It will be included in the bounce message as 
"original-envelope-id", and you can use it to match the bounces with 
a sent message.

Keep in mind that not every mail server supports the DSN extension, and that
even if they do support it, they may not always respect your parameters. 
There is no guarantee that you receive the DSN that you wanted. For
example, if you specify that you want to receive the full original mail
in the bounce (you set "ret" to "FULL"), it still is possible that you do
not receive a bounce at all, or a bounce with just the headers. 


## Mime headers and config file settings

In the above example, we've demonstrated the JSON properties for passing DSN
parameters. If you inject mails using a non-json format (via SMTP, the spool
directory or via MailerQ's command line interface), you can use MIME headers 
instead. The following MIME headers are recognized, and do the same thing as 
the JSON settings:

````text
x-mq-dsn-notify: FAILURE
x-mq-dsn-ret: HDRS
x-mq-dsn-envid: your_unique_identifier
x-mq-dsn-orcpt: email@example.com
````

If one or more of the DSN settings are missing, the default values from the
global config file are used. These defaults can be set with the following 
config file variables:

````text
dsn-notify: FAILURE
dsn-ret: HDRS
````

You can only set defaults for the "notify" and "ret"
settings, because the "envid" and "orcpt" are normally only used on a 
per-message setting and it is not meaningful to have default values
that apply to all emails.


## Sending DSN messages

MailerQ has its own ways to report the results: it publishes 
[JSON result objects](json-results) to the result queues, and it writes
results to [log files](logging). These reporting methods are powerful,
and easy to integrate. Most of the MailerQ users therefore do no let 
MailerQ send out its own DSN messages back to the envelope address. The 
only DSN messages that are normally sent back to your envelope address 
are notifications from MTA's that initially accepted the mail.

However, MailerQ can be configured to send out DSN messages too. If you set
up a RabbitMQ DSN queue (using the "rabbitmq-dsn" config file property),
MailerQ starts sending out DSN messages. Every time that a message cannot
be delivered, an outgoing bounce mail is constructed and published to this
DSN queue. If you assign the outbox to this "rabbitmq-dsn" setting,
the bounces are even automatically picked up and delivered.

We wrote that a bounce is sent on every failed delivery. This is
technically not completely correct. To be precise, a bounce is created 
everytime that the message specific "dsn.notify" setting matches. Thus,
if "notify" is set to "SUCCESS", MailerQ sends out a bounce message on
successful delivery, and when it is set to "FAILURE", bounces are sent
on failure. The "notify" setting is normally set to "FAILURE" so 
in normal circumstances bounces are sent on failure.

If you set the "rabbitmq-dsn" setting to an empty string (which is the
default), no Delivery Status Notifications are sent by MailerQ. But MailerQ 
does forward the DSN settings to the receiving MTA, so you could still 
receive DSN's from MTA's further up the chain.



## Receiving DSN settings

If you inject mail into MailerQ using SMTP, you can pass DSN parameters
with the "MAIL FROM" and "RCPT TO" commands.

````smtp
MAIL FROM:<envelope@example.com> RET=HDRS ENVID=unique_identifier
RCPT TO:<info@example.com> NOTIFY=FAILURE ORCPT=rfc822;info@example.com
````

These parameters are directly copied to the "dsn" property in the JSON
that is published to the inbox queue. To enable or disable this feature,
use the "dsn-advertise" setting in the config file.

````
dsn-advertise: 1
````

If you set dsn-advertise to 1, MailerQ announces in its SMTP connection handshake
that it supports the DSN extension, and converts the DSN parameters that are 
passed to the "MAIL FROM" and "RCPT TO" commands to JSON properties. If you 
set it to 0, no DSN parameters can be passed to "MAIL FROM" and "RCPT TO".


## Receiving DSN messages

MailerQ can also be used to recognize incoming DSN messages. If you submit
a DSN message to the SMTP port of MailerQ, and MailerQ detects that both the 
recipient address is on the list of local email addresses **and** that the message
holds a report message, it publishes this report to the queue for incoming
reports. The name for this queue can be set in the config file with the 
"rabbitmq-reports" variable.

This means that you can not only use MailerQ to send out mass mailings, but
that you can also run a MailerQ instance to process the delivery reports that
come back. If you use "reports@yourdomain.com" as envelope address, you 
can run a MailerQ instance to process all mails for the yourdomain.com
domain. Via the management console you add the "reports@yourdomain.com" local 
email address, so that all these incoming messages are accepted and sent to
either the "local" message queue for normal email messages, and the "reports"
message queue for emails that were recognized as reports.

MailerQ does not only recognize DSN messages, but also other types of reports
like DMARC reports and disposition notifications.

