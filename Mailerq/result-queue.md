# Result message queues

MailerQ Mail Transfer Agent picks up messages from the outbox queue, tries to send them out (sometimes multiple attempts are necessary) and then publishes the results back to result queues. Other programs or scripts can read out these result queues and further process the failures and succesful deliveries.

The messages on the result queues are all JSON encoded.

![MailerQ JSON results](/Resources/Images/mailerq-json-results.jpg)

## Different result queues

In the MailerQ configuration file you can set four different result queues:

*   The results queue
*   The success queue
*   The failures queue
*   The retry queue

The results queue is used by MailerQ to publish all the results, both the successful deliveries and the failures. The success and failures queues are used only for the successes and failures, and receive a subset of the messages published to the results queue. The retry queue stores transient results, for all deliveries that have not yet failed or succeeded, and that are going to be retried. Depending on your needs you can enable or disable these different queues (for example, if the only thing you're interested in are the failures, you do not configure the results, success and retry queues, and only set the failures queue).

MailerQ can publish emails to multiple result queues. If you have enabled both the results queue and the failures queue, each failure will be published to both queues. The same goes for the results queue and the success queue; if they are both enabled, all successful deliveries will be published to both of them too.

A typical delivery scenario is this: you first publish your message to the outbox queue. MailerQ picks up the message and tries to send it. If this send attempt fails because the receiving server rejected it with a soft error, the MTA will publish the message to the outbox queue because the delivery will be retried later, and to the retry queue to notify external programs that the message will be retried.

After a while, MailerQ picks up the message from the outbox queue for a second attempt. This time the delivery succeeds and the message is published to both the success queue and the generic results queue.

It is important to realize that MailerQ only consumes messages from the outbox queue. All other queues are only used to publish messages to, and will never be read or emptied by MailerQ. If you do use one or more result queues, you should write your own scripts that process the messages in it.

## Custom result queues

As we explained above, the queues that are used to publish the results to are configured in the global configuration file. However, if you want to use different queues for specific emails, you can do so by [setting a property "queues"](copernica-docs:Mailerq/send-email#custom-queues "Curstom queues") in the JSON object.

If the JSON object loaded from the outbox queue holds this "queues" property, MailerQ ignores the queues set in the configuration file, and uses those custom result queues instead.

## Understanding the results

The messages that MailerQ publishes to the results queues are JSON encoded, and hold almost exactly the same properties as the original message that was read from the outbox queue, including properties that were not recognized or used by MailerQ. This makes it possible for (your) scripts and programs to recognize the messages in the results queue. If you for example set the property "MY-ID" on a message that you publish on the outbox queue, you will find the same property back once you consume the results from one of the result queues.

Your original JSON encoded message (the message you published to the outbox queue) is thus almost identical to the message that you read back from the result queue. However, MailerQ does of course make some changes to it. For a start, it will remove the full message MIME from it to make the JSON message much smaller, and (which is important) it adds a property "results" that holds an array of all the send attempts that were taken to deliver the mail.

A result message will thus look something like this:

```json
{
    "domain": "example.org",
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "results": [
        {
            "attempt": 1,
            "type": "error",
            "time": "2013-02-04 13:45:15",
            "from": "1.2.3.4",
            "to": "10.11.12.13",
            "code": 451,
            "description": "Please come back later",
            "state": "rcpt to"
        },
        { 
            "attempt": 2,
            "type": "success",
            "time": "2013-02-04 14:01:25",
            "from": "1.2.3.4",
            "to": "10.11.12.13",
            "code": 250,
            "status": "2.5.0",
            "description": "Requested mail action okay, completed",
            "state": "accept"
        }
    ]
}

```

## The original message

The default behavior of MailerQ is to remove the mime property from the JSON object before it is published back to result queues. Message bodies can be huge, and most scripts that process the results do not need them anyway. To save processing time, data traffic and storage needs, MailerQ removes those message bodies.

If you like to keep the message bodies in the JSON objects that are published back to the result queues, you can include the property "keepmime" in the original JSON message. If you set this property to 1 or to true, MailerQ will not throw away the message data.

## The original message and message store

As we mentioned above, the message bodies are removed from the JSON object unless you set the "keepmime" property in the original JSON object.

However, if you have enabled the message store, MailerQ will still remove the mime from the JSON object, even if you had included the "keepmime" property. Instead, a "key" property is added to the JSON object that can be used to retrieve the mime from the message store.

To summarize, if you use MailerQ with a message store and you set the "keepmime" property, the message body will be stored in the message store, and the JSON object in the result queues gets an extra "key" property that holds the key by which the mime can be retrieved from the message store. If you do not set the "keepmime" property, the message will be thrown away (also from the message store) and no "key" property is added.

```json
{
    "domain": "example.org",
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "keepmime": 1,
    "key": "message-store-key-where-data-can-be-found",
    "results": [
        { 
            "attempt": 1,
            "type": "success",
            "time": "2013-02-04 14:01:25",
            "from": "1.2.3.4",
            "to": "10.11.12.13",
            "code": 250,
            "status": "2.5.0",
            "description": "Requested mail action okay, completed",
            "state": "accept"
        }, 
        { ... },
        ... 
    ]
}

```

## Understanding the results

MailerQ adds a "results" property to the JSON object. This property holds an array with records that describe the send attempts. Most deliveries only have a single attempt, but sometimes it takes more attempts to deliver an email.

Each attempt has a number of properties:

*   **attempts** - the attempt number
*   **type** - the type of result (see below)
*   **time** - the UTC time of the attempt
*   **from** - the optional local IP address from which the connction was made or attempted
*   **to** - the optional remote IP address to which the connction was made or attempted
*   **code** - optional SMTP code received from the remote SMTP server
*   **status** - optional email status code received from remote SMTP server
*   **description** - human readable text received from SMTP server
*   **state** - state in the SMTP protocol in which the answer was received

The "attempt", "type" and "time" properties are included for every send attempt, the other properties are optional and depend on the type of result.

Although the "from" and "to" properties are optional, they are included in almost all result objects. These IP address properties are only left out for results of types like "bind" and "nohosts", because in those situations MailerQ does not even attempt to make a connection.

## When are results added?

There is an important difference between the time when results are appended to the results array, and the time when the JSON message is published back to the result queues.

When MailerQ reads a message from the outbox queue and tries to send it, the send attempt can have three possible endings:

*   The message was delivered
*   The message could not be delivered with a fatal error
*   The message could not be delivered, and is rescheduled

In all the situations above, the JSON object is modified and a result object is added to the array of results. However, only in the first and second cases the message is published to the result queues where you can pick it up and process it. In the final case, the message is rescheduled and published back to the outbox queue, where it will later be picked up by MailerQ for a subsequent delivery attempt.

Every time that a message is published back to the outbox queue, the array with results grows one item. When the message is finally published to the result queues, it can thus potentially have a long list of results, for which only the last item will be meaningful. All earlier entries in the array are just informational, and can be used if you want to understand exactly what happened to the email.

Most of the times, the final result in the array is of type "success", "error" or "expired": the email was either delivered succesfully, an error was encountered, or MailerQ gave up because too many attempts were made and/or the max delivery time was reached. Intermediate results that trigger a reschedule do normally not end up at the end of the results array, because they are rescheduled. There is however an exception to this rule.

If MailerQ needs to reschedule a mail, but already knows that rescheduling would be in vain because the mail will expire before the planned reschedule time is reached, it will publish the mail to the result queues right away. In such cases you will find a final result at the end of the results array that would normally trigger a reschedule (for example, a result of type "error" with a 4** error code).

## Result types

Each result has a certain type. The following types are supported:

*   **success** - successful delivery
*   **nohosts** - DNS failure, domain does not exist, or does not have IP addresses
*   **bind** - failed to bind local IP address
*   **refused** - failed to connect to peer / connection refused
*   **connect** - failed to connect to peer / connection timeout
*   **noaccess** - SMTP server rejected access, our EHLO/HELO was not accepted
*   **error** - SMTP server rejected the message with a normal SMTP error message
*   **lost** - SMTP connection unexpectedly lost
*   **timeout** - SMTP server did not send a reply in time
*   **nodata** - Failed to load data from the message store
*   **expired** - Failed to deliver the message on time
*   **idle** - Remote peer closed the connection because MailerQ was idle for too long
*   **overflow** - The remote peer sent an answer that was (way) too long for the SMTP protocol
*   **tls** - Failed to setup a secure socket connection
*   **responsive** - Failed to generate a responsive email

Each different result type will be discussed below.

## Result type "success"

When a message was delivered, it will show up as a "success" result type. The "code", "status" and "description" fields are also set and contain the last answer received from the SMTP server.

## Result type "nohosts"

When the domain name could not be resolved to an IP address, the result type "nohosts" is used. This result is used when the domain name is invalid (because it is too long, contains invalid characters or for some other reason), when the domain does not exist or when the domain name has not been configured correctly.

In normal operations, you will most likely run into this error for wrongly entered email addresses (example,org instead of example.org).

Because this situation could be caused by temporary downtime of a DNS server, MailerQ automatically reschedules the mail for later delivery.

## Result type "bind"

When MailerQ connects to a remote mail server, it initiates the connection from one of the IP addresses that are configured on the server that MailerQ runs on. You can either include this local IP address in the JSON object, or let MailerQ pick it.

When the IP address to send out the mail is not configured on the local server, MailerQ can not send out the mail, and will report the result type "bind". This is a fatal result, the email is not rescheduled.

## Result type "refused"

This result type is used when MailerQ was unable to connect to the remote server because the remote server refused the connection. This oftean means that the remote server is down. When MailerQ runs into this error, it will report the remote server as being offline, and will stop further attempts to send mails to this IP for a few minutes.

Because this situation could be caused by a temporary hickup of the remote server, MailerQ will automatically reschedule the mail for later delivery.

## Result type "connect"

This result type is used when MailerQ was unable to connect to the remote server within a reasonable amount of time. This happens for example when the firewall of the remote server does not forward traffic from your network to the destination network.

This type of error is handled in the same manner as the "refused" error.

## Result type "noaccess"

When MailerQ makes a connection to a remote server, the server normally sends a welcome message back and starts the SMTP communication. If this welcome message is not received, or when the welcome message was invalid, the result type "noaccess" is published.

This situation occurs when the remote server is not speaking the SMTP protocol (which is unlikely) or when your originating IP address is blocked from the remote server. It is wise to regulary inspect the logfiles and the management console to see if your IP addresses are blocked by certain servers, and adjust the delivery rate limits or take other measurements when this happens.

MailerQ treats this kind of error identical to a connect failure, and will mark the server as being offline, and stops to deliver emails to it for a few minutes. The mail that cause the error will be rescheduled.

## Result type "error"

Not every email can be delivered. Email addresses may not exist, users can be over their disk quota and other situations occur why an email is not accepted. If the communication with the remote server proceeds according plan, but the remote server simply reports that the mail can not be delivered, MailerQ will report an error result type.

This does not have to be a fatal error. For 4** error codes, the mail is rescheduled, and a new attempt will be made later.

## Result type "lost"

The result type "lost" is used when during the SMTP commuinication the connection to the remote server is suddenly lost. This can happen when someone suddenly unplugs a network cable, a server crashes or an internet connection breaks down (all very unlikely).

MailerQ treats this as a temporary error and will publish back the email to the outbox queue to deliver it later.

When MailerQ detects a number of lost connections to the same server within a short time, it will mark the server as being offline, and stops all email attempts to this server for a couple of minutes.

## Result type "timeout"

The "timeout" result type resembles very much the "lost" result type. This result is used when the remote SMTP server does not reply within a reasonable amount of time (usually within a minute). Normal servers respond within a fraction of a second, so the one minute limit is usually sufficient to conclude that something strange is going on.

MailerQ treats this result the same as results of type "lost". The mail is published back to the outbox queue and a new attempt will be started a little later. If multiple timeouts are detected for the same server, MailerQ marks the server as being offline and stops sending out mails to it during a few minutes.

## Result type "nodata"

MailerQ can be configured to use a message store for storing message bodies. The JSON encoded messages in the outbox queue then hold a "key" property that refers to the data stored in the message store. When the SMTP connection is set up, and it is time to send out the message, MailerQ uses the key and loads the message from the message store.

In the extremely unlikely situation that the mime can not be found in message store, MailerQ is not able to complete the delivery and will reports this as a "nodata" result.

This is a fatal result. MailerQ puts the mail in the result queues.

## Result type "expired"

All emails published to the outbox queue have a max number of attempts and an expiry date - either because those properties were set in the JSON object, or because the defaults from the config file are used.

When a message is read from the queue and it is immediately expired, it will hold this result type.

## Result type "idle"

MailerQ throttles deliveries based on the capacity settings you enter in the management console. You can for example configure that MailerQ delivers no more than 30 messages per minute to a certain domain. If you do this, it effectively means that MailerQ waits 2 seconds after each message until it sends out the next one. On top of that, you can specify how long MailerQ can keep connection open while they are idle. You can set this to - for example - 5 seconds. The consequence is that MailerQ waits 2 seconds before sending the next message, and because this delay (2 seconds) is less than the max allowed idle time (5 seconds), the connection is kept open during this time.

After the 2 seconds have elapsed, MailerQ will send the next message. However, if the receiving server unexpectedly starts sending messages to MailerQ over the idle connection during those 2 idle seconds, or when the receiving server closes the idle connection during this time, MailerQ internally reschedules the waiting messages with an "idle" status, so that they are going to be sent over a different connection.

## Result type "overflow"

The SMTP protocol only allows string length up to 1000 characters. If a line much longer than this is received from a mail server (which should not happen), MailerQ can not process the line, and will report an overflow error. This is a non-fatal error, MailerQ will start a new attempt to deliver the mail.

## Result type "tls"

To send connections over a secure connection, MailerQ and the receiving server have to perform a handshake operation. If something goes wrong during this handshake, the "tls" error type is reported. This is a non-fatal error.

## Result type "responsive"

MailerQ failed to generate a responsive email. This could be caused by images inside the responsive email json that failed to download, personalization errors. The reasons it failed to generated will be placed inside a array called "reasons".

## SMTP states explained

The "state" property of the result object holds the state of the SMTP protocol during which the answer was received. With this property you can find out during what phase of the SMTP protocol the delivery failed.

Some background information: during an SMTP delivery the client application (MailerQ) and the remote SMTP server send messages to each other to exchange the address of the sender, the address of the receiver and the actual email message. With every new piece of information that is sent from the client to the server, the SMTP connection moves into a new state. If the delivery fails, the result JSON object holds the name of the state during which the error occured.

With this state information, you can get more information about the reason why the delivery failed. The delivery could for example fail right after the connection was established, and thus even before even the email addresses of the sender and receiver were exchanged. This probably means that your entire IP address is blocked by the receiving server. But if the error is reported after after the email address of the receiver was sent, it probably means that you're trying to send a message to a wrong address.

The following states are used by MailerQ:

*   **connect:** The TCP connection is being set up
*   **init:** The TCP connection has been established, an introduction message from the remote server is expected
*   **ehlo:** MailerQ has sent an EHLO message, an answer with server capabilities is expected
*   **helo:** MailerQ has sent an HELO message, an answer with server capabilities is expected
*   **starttls:** The STARTTLS message was just sent to create a secured connection
*   **mail from:** MailerQ has sent the MAIL FROM message with the address of the sender
*   **rcpt to** MailerQ has sent the RCPT TO message with the address of the receiver
*   **data:** The DATA message was sent, MailerQ now expects an answer that the remote server is ready to receive the full message
*   **received:** The full email message has just been sent
*   **reset:** A RSET message has been sent to prepare the connection for a next message
*   **close:** MailerQ has sent a QUIT message and closed the TCP connection, no more data is expected
*   **idle:** The connection is idle, and MailerQ does not expect any incoming messages
