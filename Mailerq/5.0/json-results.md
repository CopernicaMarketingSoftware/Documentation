# Result message queues

MailerQ picks up messages from the outbox queue, tries to send them out 
and then publishes the results back to result queues. Other programs or 
scripts can read out these result queues and further process the failures 
and succesful deliveries. The messages on the result queues are all JSON 
encoded.

![MailerQ JSON results](../Images/mailerq-json-results.png)

## Different result queues

MailerQ uses four different queues to which results are published. Based
on the type of result (success, failure or retry) a message is published
to one or more of these queues:

- The results queue
- The success queue
- The failures queue
- The retry queue

The "results" queue is used by MailerQ to publish all the results: both the 
successful results as well as the failures. The "success" and "failures" queues 
are used for just the successes and just the failures. These queues
receive a subset of the messages published to the "results" queue. The "retry" 
queue is used for transient results for deliveries that have not yet failed 
or succeeded, and that are going to be retried. 

Depending on your needs, you can enable or disable these different queues (for 
example, if the only thing you're interested in are the failures, you do not 
configure the results, success and retry queues, and only set the failures queue).
The result queues can be configured in the [RabbitmQ section in the config file](rabbitmq-config).

## Example scenario

A typical delivery scenario is this: you first publish your JSON message to the 
outbox queue. MailerQ picks up this message and tries to send it. If this send 
attempt fails (because the receiving server rejected it with a soft error), 
MailerQ modifies the initial JSON to include info about this first soft error, and publishes
it back to the outbox queue to retry the delivery later. The message is also
sent to the retry queue to notify external programs that the message will be retried.

After a while, MailerQ picks up the message from the outbox queue again for a second 
attempt. This time the delivery succeeds and the message is modified once more
to also contain info about this correct delivery, and the message is published to 
both the success queue and the generic results queue.


## Understanding the results

The messages that MailerQ publishes to the results queues are JSON encoded, and 
hold the same properties as the original message that was read from the outbox queue, 
including all the custom properties that you added (thus: if you added some custom
identifier to the initial JSON object, it will also be present in the JSON object
that ends up in the result queue.

The "mime" property is often stripped from the initial JSON before it is published
to a result queue, so that these queues do not take up too much space from RabbitMQ. 
However, if you want to keep the mime data in the JSON, you can add a "keepmime" 
property. For more info about the supported properties, check 
[the JSON specification for outgoing messages](json-messages).

Besides stripping the MIME data, MailerQ also adds a "results" property to
the JSON. This "results" property holds an array with information about
each delivery attempt that was taken. A result message will thus look something 
like this:

```json
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "results": [
        {
            "state": "intro",
            "result": "error",
            "time": "2016-02-04 13:45:15",
            "mta": "mta1.example.com",
            "from": "1.2.3.4",
            "to": "10.11.12.13",
            "messages": 1,
            "code": 451,
            "status": "5.0.0",
            "description": "Please come back later",
        },
        { 
            "state": "message",
            "result": "accepted",
            "time": "2016-02-04 14:01:25",
            "mta": "mta2.example.com",
            "from": "1.2.3.4",
            "to": "10.11.12.14",
            "messages": 4,
            "code": 250,
            "status": "2.0.0",
            "dsn": true,
            "description": "Requested mail action okay, completed",
        }
    ]
}
```

The "results" property holds an array of JSON objects. Each object contains the 
result of one delivery attempt. Every result object can have the following properties:

<table>
    <tr>
        <td>state</td>
        <td>state in the delivery where the error occured</td>
    </tr>
    <tr>
        <td>result</td>
        <td>type or result (accepted,timeout,lost,error,invalid)</td>
    </tr>
    <tr>
        <td>time</td>
        <td>time of the result</td>
    </tr>
    <tr>
        <td>mta</td>
        <td>name of the receiving mta (reported when the connection was set up)</td>
    </tr>
    <tr>
        <td>from</td>
        <td>ip <i>from</i> which the mail was sent</td>
    </tr>
    <tr>
        <td>to</td>
        <td>ip <i>to</i> which the mail was sent</td>
    </tr>
    <tr>
        <td>authentication</td>
        <td>if authentication/login was necessary for access, the authentication protocol used</td>
    </tr>
    <tr>
        <td>cipher</td>
        <td>the encryption protocol used (if the message was sent over a secure connection)</td>
    </tr>
    <tr>
        <td>certificate</td>
        <td>information about the ssl certificate that was issued by the receiving server</td>
    </tr>
    <tr>
        <td>messages</td>
        <td>number of messages sent over the same connection</td>
    </tr>
    <tr>
        <td>code</td>
        <td>SMTP result code</td>
    </tr>
    <tr>
        <td>status</td>
        <td>extended SMTP status code</td>
    </tr>
    <tr>
        <td>description</td>
        <td>answer received from receiving server</td>
    </tr>
    <tr>
        <td>dsn</td>
        <td>did the remote server implement the dsn protocol?<?td>
    </tr>
</table>

Note that some properties are optional. For example, the properties "to", 
"from", "mta" and "messages" are only used if an actual TCP connection was 
set up and are not present if the mail failed because of a DNS
lookup failure. The "code", "status" and "description" properties are only
used when the remote server returned an error code and/or human readable
description to explain why the message was or was not accepted. 

The "mta" property holds the name of the MTA that accepted the message.
To get this mta name, MailerQ reads the answer from the initial welcome
message that the receiving server sent right after the connection was 
set up.

The "dsn" property is only used for succesful deliveries and tells you whether
the incoming server supports the DSN extension. If this is set to true,
and you had also included a DSN setting in your input JSON to request a
success notification, you can expect a notification from the server that
accepted the message.


## Delivery states

MailerQ logs the state in which the error occurs (this is the "state" property),
and the type of result in that state. An email that is processed by MailerQ
goes through the following states:

<table>
    <tr>
        <td>process</td>
        <td>the input is checked and assigned to the from and to ip address between which it will be sent</td>
    </tr>
    <tr>
        <td>storage</td>
        <td>the mime data is loaded from external nosql storage</td>
    </tr>
    <tr>
        <td>responsive</td>
        <td>the json message is converted into a responsive email</td>
    </tr>
    <tr>
        <td>personalize</td>
        <td>the message is personalized if personalization data is available</td>
    </tr>
    <tr>
        <td>dns</td>
        <td>the hostname to which the mail should be sent is looked up in DNS</td>
    </tr>
    <tr>
        <td>bind</td>
        <td>a local IP address is chosen from which the mail is going to be sent</td>
    </tr>
    <tr>
        <td>connect</td>
        <td>a tcp connection is set up</td>
    </tr>
    <tr>
        <td>intro</td>
        <td>the TCP connection has been set up, waiting for initial welcome message from server</td>
    </tr>
    <tr>
        <td>ehlo</td>
        <td>the "EHLO" message has been sent</td>
    </tr>
    <tr>
        <td>helo</td>
        <td>the "HELO" message has been sent</td>
    </tr>
    <tr>
        <td>starttls</td>
        <td>the "STARTTLS" message has been sent</td>
    </tr>
    <tr>
        <td>authplain</td>
        <td>the "AUTH PLAIN" message has been sent</td>
    </tr>
    <tr>
        <td>authlogin</td>
        <td>the "AUTH LOGIN" message has been sent</td>
    </tr>
    <tr>
        <td>authusername</td>
        <td>the username for authentication has been sent</td>
    </tr>
    <tr>
        <td>authpassword</td>
        <td>the password for authentication has been sent</td>
    </tr>
    <tr>
        <td>authcram</td>
        <td>the "AUTH CRAM-MD5" message has been sent</td>
    </tr>
    <tr>
        <td>authresponse</td>
        <td>the response to the cram-md5 challenge has been sent</td>
    </tr>
    <tr>
        <td>mailfrom</td>
        <td>the "MAIL FROM" message has been sent</td>
    </tr>
    <tr>
        <td>rcptto</td>
        <td>the "RCPT TO" message has been sent</td>
    </tr>
    <tr>
        <td>data</td>
        <td>the "DATA" message has been sent</td>
    </tr>
    <tr>
        <td>message</td>
        <td>the full mime data followed by a dot has been sent</td>
    </tr>
</table>

During all of the above states errors might occur. If this happens, the state
of the delivery and the type of error is set added to the result JSON. A 
successful delivery has gone through all the states, and is published 
to the result queue with the property "state" set to "message" and "result" 
set to "accepted".

## Result types

During all the above states errors can occur. The type of error is logged
in the "result" property. It always has one of the following values:

<table>
    <tr>
        <td>accepted</td>
        <td>message was accepted (only reported in combination with state "message")</td>
    </tr>
    <tr>
        <td>timeout</td>
        <td>no answer was received in time</td>
    </tr>
    <tr>
        <td>lost</td>
        <td>connection was lost while waiting for an answer</td>
    </tr>
    <tr>
        <td>invalid</td>
        <td>an answer was received, but it could not be recognized as valid answer</td>
    </tr>
    <tr>
        <td>error</td>
        <td>an answer was received, but the answer contained a fatal error message</td>
    </tr>
</table>

The SMTP protocol requires communication between two mail servers: a sending server
and a receiving server. MailerQ is the sending server, and sends instructions to
the receiving server (like "MAIL FROM", "RCPT TO", et cetera). After each of these
instructions it waits for an answer from the remote server.

If the answer is not received in time, the "timeout" result is used. It is also
possible that the receiver *did* sent back an answer, but that the answer could not
be recognized as a valid SMTP response message. In such a case we use the "invalid" 
result type. When the TCP connection was lost while waiting for an answer the "lost" 
type is result, and the "error" type is used in case the receiver server sent
back a valid SMTP answer, but the answer was that the message was rejected.

If MailerQ's instruction was accepted, the delivery moves to the next state, and 
no result is logged in the JSON object.


## Special combinations

Not every result state is linked to a state in the SMTP protocol. The following 
combinations can also occur, and should be interpreted in a special way:

<table>
    <tr>
        <td><strong>state</strong></td>
        <td><strong>result</strong></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>process</td>
        <td>timeout</td>
        <td>incoming message was expired (maxdelivertime or maxattempts exceeded)</td>
    </tr>
    <tr>
        <td>process</td>
        <td>error</td>
        <td>the input json contains a mail that could not be assigned to an ip address (for example because no sufficient secure ip exists)</td>
    </tr>
    <tr>
        <td>process</td>
        <td>invalid</td>
        <td>the input json contains a mail that could not be sent (for example due to license constraints, or because the recipient is missing or not parsable)</td>
    </tr>
    <tr>
        <td>storage</td>
        <td>lost</td>
        <td>smtp connection was lost while loading data</td>
    </tr>
    <tr>
        <td>storage</td>
        <td>invalid</td>
        <td>smtp response was received while loading data</td>
    </tr>
    <tr>
        <td>storage</td>
        <td>error</td>
        <td>no data was found</td>
    </tr>
    <tr>
        <td>responsive</td>
        <td>error</td>
        <td>responsiveemail.com algorithm could not turn json into mime</td>
    </tr>
    <tr>
        <td>dns</td>
        <td>error</td>
        <td>dns lookup failure (domain does not exist / no ip addresses available for accepting mail)</td>
    </tr>
    <tr>
        <td>bind</td>
        <td>error</td>
        <td>no local ip addresses available for sending mail</td>
    </tr>
</table>

MailerQ does its best to fill in an appropriate error code in the result
object too. Be aware that the error code and status code sometimes
come from the remote server and is blindly copied by MailerQ to the result
JSON, while in other situations it is generated by MailerQ.


## Secure connections

If the receiving server supported STARTTL, and MailerQ managed to secure 
the connection, the result object also holds an "cipher" and "certificate"
key. The "cipher" holds the settings of the encryption algorithm that
was used, while the "certificate" holds the settings of the SSL certificate
that was issued by the receiving server. Both the "cipher" as the
"certificate" are stored as JSON objects, holding all sorts of sub values.

```json
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "john.doe@gmail.com",
    "results": [
        { 
            "state": "message",
            "result": "accepted",
            "time": "2016-07-20 14:01:25",
            "mta": "mx.gmail.com",
            "from": "1.2.3.4",
            "to": "10.11.12.14",
            "messages": 1,
            "code": 250,
            "status": "2.0.0",
            "dsn": false,
            "description": "Requested mail action okay, completed",
            "cipher": {  
                "name": "ECDHE-RSA-AES128-GCM-SHA256",
                "bits": 128,
                "algbits": 128,
                "version": "TLSv1\/SSLv3",
                "id": 49199
            },
            "certificate": {  
                "notbefore": "2016-07-13 14:40:53",
                "notafter": "2016-10-05 14:17:00",
                "version": 3,
                "verified": true,
                "result": "ok",
                "keyusage": 1,
                "self-signed": false,
                "subject": {  
                    "common": "mx.google.com",
                    "country": "US",
                    "locality": "Mountain View",
                    "state": "California",
                    "organization": "Google Inc"
                },
                "issuer": {  
                    "common": "Google Internet Authority G2",
                    "country": "US",
                    "organization": "Google Inc"
                },
                "altnames": [  
                    "gmr-smtp-in.l.google.com",
                    "gmr-mx.google.com",
                    "gmail-smtp-in.l.google.com",
                    "aspmx5.googlemail.com",
                    "aspmx4.googlemail.com",
                    "aspmx3.googlemail.com",
                    "aspmx2.googlemail.com",
                    "aspmx.l.google.com",
                    "alt4.gmr-smtp-in.l.google.com",
                    "alt4.gmail-smtp-in.l.google.com",
                    "alt4.aspmx.l.google.com",
                    "alt3.gmr-smtp-in.l.google.com",
                    "alt3.gmail-smtp-in.l.google.com",
                    "alt3.aspmx.l.google.com",
                    "alt2.gmr-smtp-in.l.google.com",
                    "alt2.gmail-smtp-in.l.google.com",
                    "alt2.aspmx.l.google.com",
                    "alt1.gmr-smtp-in.l.google.com",
                    "alt1.gmail-smtp-in.l.google.com",
                    "alt1.aspmx.l.google.com",
                    "mx.google.com"
                ]
            },
        }
    ]
}
```
