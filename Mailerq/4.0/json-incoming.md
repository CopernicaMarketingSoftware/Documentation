# JSON for incoming messages

When an email is received by MailerQ, the mail is turned into a JSON
object and published to the inbox queue. This happens to messages that
are received on the SMTP port, but also to messages that come in via
the spool directory or that were injected via the command line interface.

The JSON messages that are published by MailerQ follow exactly the 
[JSON specification for outgoing messages](json-messages). It is therefore
possible to let MailerQ publish these incoming messages directly to
the outbox queue to deliver them to the final recipient.

![MailerQ shared inbox outbox queue](../Images/mailerq-shared-inbox-outbox-queue.png)
 
MailerQ also adds some extra properties to the JSON of incoming messages
that are not needed for the delivery of the email, but that are useful
in case you write scripts or programs that process incoming messages.
The following properties can be found on incoming messages:

<table>
    <tr>
        <td>hostname</td>
        <td>server name that received the message</td>
    </tr>
    <tr>
        <td>received</td>
        <td>time when the mail was received</td>
    </tr>
    <tr>
        <td>message-id</td>
        <td>unique message id generated for the mail (only used when received via smtp)</td>
    </tr>
    <tr>
        <td>connection</td>
        <td>connection info (only used when received via smtp)</td>
    </tr>
    <tr>
        <td>spool</td>
        <td>spool info (only used when received from spool dir)</td>
    </tr>
    <tr>
        <td>cli</td>
        <td>command info (only used when received from cli)</td>
    </tr>
    <tr>
        <td>checks</td>
        <td>array with the results of the SPF, DKIM and DMARC checks</td>
    </tr>
</table>

The above properties are never used by MailerQ when the email is sent, 
but they can be useful to recognize incoming messages.


## Message ID, hostname and timestamp

When a connection comes in over an SMTP connection, MailerQ reports a
unique internal identifier to the sender that can be used to track the
email.

````
250-Ok, your message has been queued using the following identifiers:
250 gdsfu232 for info@example.com
````

Every recipient gets a unique identifier. This unique identifier is stored
in the "message-id" property.

````
{
    "message-id": "gdsfu232",
    "received": "2016-03-22 17:23:12",
    "hostname": "sender1.mailerq.com",
    "envelope": "whatever@example.com",
    "recipient": "info@example.com",
    "mime": "..."
}
````

The "received" property holds the time when the email was received, while 
"hostname" holds the name of the server that received the message. These two
properties are included for all injection mechanisms: SMTP, CLI, and spool.


## TCP connection data

If the mail came in via an SMTP connection, the generated JSON object
holds properties about the TCP connection.

````
{
    "message-id": "gdsfu232",
    "received": "2016-03-22 17:23:12",
    "hostname": "sender1.mailerq.com",
    "envelope": "whatever@example.com",
    "recipient": "info@example.com",
    "mime": "...",
    "connection": {
        "local-ip": "1.2.3.4",
        "local-port": 25,
        "remote-ip": "5.6.7.8",
        "remote-port": 25324,
        "secure": true,
        "user": "mailerq"
    }
}
````

If MailerQ runs behind a HAProxy server, the connection data is extracted
from the PROXY header that is sent by the HAProxy server. 

If the TCP connection is secure and some sort of SMTP authentication mechanism
was used, the "user" property holds the username of the user who submitted
the message.

## Spool directory data

For mails injected to the spool dir, the JSON holds properties that
identify the file from which the message was loaded.

````
{
    "received": "2016-03-22 17:23:12",
    "hostname": "sender1.mailerq.com",
    "envelope": "whatever@example.com",
    "recipient": "info@example.com",
    "mime": "...",
    "spool": {
        "directory": "/path/to/directory",
        "file": "filename.mime",
        "user": "owner",
        "size": 23299
    }
}
````

The properties speak for themselves: the spool directory path, name, owner
and size of the injected file.

## Command line interface

Message injected via MailerQ as command line utility hold information
about the started program:

````
{
    "received": "2016-03-22 17:23:12",
    "hostname": "sender1.mailerq.com",
    "envelope": "whatever@example.com",
    "recipient": "info@example.com",
    "mime": "...",
    "cli": {
        "command": "/usr/bin/mailerq",
        "arguments": [ "--extract-recipients", "--ignore-dot" ],
        "user": "john",
    }
}
````

## Check results

If you enable checks for incoming messages, MailerQ runs SPF, DKIM and
DMARC checks on each incoming message. The result of these checks are
added to the JSON.

````
{
    "message-id": "gdsfu232",
    "received": "2016-03-22 17:23:12",
    "hostname": "sender1.mailerq.com",
    "envelope": "whatever@example.com",
    "recipient": "info@example.com",
    "mime": "...",
    "connection": {
        "local-ip": "1.2.3.4",
        "local-port": 25,
        "remote-ip": "5.6.7.8",
        "remote-port": 25324,
        "secure": true,
        "user": "mailerq"
    },
    "checks": [ {
        "spf": "pass",
        "smtp.mailfrom": "whatever@example.com"
    }, {
        "dkim": "pass",
        "domain": "example.com",
        "selector": "dkim",
        "header.i": "fsjfksjfslkdf",
        "header.b", "sodfidjsfdsjfsfjs"
    }, {
        "dmarc": "pass",
        "header.from": "whatever@example.com"
    } ]
}
````

The properties for each test depend on the type of test, and hold the
input parameters that were used to execute the test.
