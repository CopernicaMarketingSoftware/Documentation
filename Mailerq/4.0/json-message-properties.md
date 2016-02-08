# Message properties when using JSON to inject emails

In the examples given in the [Send email documentation](send-email), we 
demonstrated the necessary components of an email in the JSON format. MailerQ
however allows you to fine-tune the message delivery by setting additional
properties. These properties can be set in the MIME object, [as discussed here](mime-message-properties); we will look at the JSON encoded message instead.

## Envelope address

The envelope address is the address that is used in the `MAIL FROM` 
communication.  It is a required property in the JSON object. You can set it 
using the `envelope` property:

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "..."
}

````

## Maximum delivery time

When a message cannot be delivered immediately because of unresponsive receivers, 
greylisting or throttling, MailerQ publishes back the email to the outbox queue 
for later delivery. This can result in emails that are sent much later than the 
time that you first added them to the message queue.

If you do not want an email to be delivered after a certain time, all you need 
to do is add the `maxdelivertime` property:

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "...",
    "maxdelivertime": "2016-02-10 00:00:00"
}

````

Timestamps in MailerQ are always in UTC. Please note that MailerQ is not very 
tolerant in parsing timestamps, so better make sure that you use the right 
formatting (YYYY-MM-DD HH:MM:SS).

If you do not specify an explicit max delivery time, MailerQ will attempt to 
deliver the mail within 24 hours (default) after the mail was first picked up from the outbox. You can change the defaults in the configuration file.  
[Read more about delivery limits](delivery-limits#maximum-delivery-time)

## Maximum number of attempts

Just like a maximum delivery time, you can control the maximum number of attempts
MailerQ should make sending an email. If a first attempt fails because a remote 
server is unreachable or does not immediately accept the message, MailerQ will 
make a new attempt a little later.

By default, MailerQ tries to send out the mail six times. You can change the 
default in the [Configuration file](delivery-limits#maximum-delivery-attempts). 

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "...",
    "maxattempts": 3
}

````

## Inlinize CSS

When you send out HTML emails, you face the problem that not all email clients 
support stylesheets that are set in the header. Some email clients (especially 
web based clients) strip out the CSS code from the HTML header. This often messes 
up the layout and look of your messages. To overcome this, it is better not to set 
CSS settings in the header in the first place, but use `style="..."` attributes 
in the HTML code instead.

MailerQ can do this automatically. If you set the `x-mq-inlinecss` header to true, 
MailerQ parses the HTML email, and converts the CSS code from the HTML header 
into inline `style="..."` attributes in the HTML body.

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "...",
    "inlinecss": 1
}           

````

## Local IP addresses

Some mail servers keep track of the number of parallel connections that are made 
to it, and put limits on the number of connections or deliveries. If your server 
has multiple IPs, MailerQ can send out mail from all those IP addresses at the 
same time so that the receiver does not notice that the connections all come from 
the same source. This can be useful to increase the delivery rate for sending out 
mail.

By default, MailerQ makes all connections to remote mail servers from the default 
(first) available IP of the host server. If your server has multiple IPs assigned 
to it, you can instruct MailerQ to use a different local IP for sending out the 
mail.

To try a different IP address for sending out the mail, you can add a list of 
available IP addresses:

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "...",
    "ips": ["231.34.13.156", "231.34.13.158"]
}

````

MailerQ will pick one of the IPs to send out the mail. Be aware that you 
can of course only use addresses that are actually bound to the host that MailerQ 
runs on. Other IP addresses will result in failed deliveries.

## Storing messages in message store

MIME bodies can become very large, especially if your emails contain attachments 
or embedded content. To prevent that such big messages have to be processed by 
RabbitMQ, MailerQ can be configured to use MongoDB, MySQL, PostgreSQL or SQLite 
for the message bodies instead. You can then publish a much smaller JSON message 
to RabbitMQ, and keep the full MIME messages in an external message store.

MailerQ waits with loading the message from message store until the SMTP connection 
has been set up, so that no time and resources are wasted on fetching information 
that is not needed.

In all the given examples we have included the full message data in the JSON object. 
This is probably the best thing to do, as most messages are delivered right away, 
and there would be more overhead in storing messages in an external message store. 
However, if an email has to be rescheduled, and is going to be stored in RabbitMQ 
for a longer period of time, it is better to store the MIME message in an external 
message store. In the JSON message you will not need a `mime` property, but a 
`key` property instead. This `key` property refers to the key where the message 
can be found.


````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "key": "message-store-key-where-data-can-be-found"
}

````

## Keep messages after delivery

When a message is completely processed - either because it was successfully 
delivered, or the delivery failed - MailerQ publishes it to the results queue, 
where you can pick it up for further processing.

By default, MailerQ throws away the mime data to make room in the JSON object and 
in the message store. If you do not want the message data to be removed, you can 
tell so by adding the `keepmime` option:

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "keepmime": 1
}

````

## Custom result queues

After MailerQ has processed an email, it publishes the mail to one or more result 
queues. The default queues to use for this are configured in the global 
configuration file, but you can set other queue names in properties to tell 
MailerQ to use other result queues.

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "...",
    "queues": {
        "results": "name-of-results-queue",
        "failure": "name-of-failure-queue",
        "success": "name-of-success-queue",
        "retry": "name-of-retry-queue"
    }
}

````

All properties of the `queues` object are optional. If you leave an option out, 
MailerQ will not use that queue. Thus, if you for example want to process only 
the errors for a certain e-mail, you can only set the `failure` queue. When the 
delivery succeeds, MailerQ will silently discard the mail, without adding it to 
any result queue.

When the one if these `x-mq-*-queue` properties is used, the queues mentioned in 
the global configuration file are completely ignored. This is even so if you 
have not even specified all possible queues in the JSON property.

## Setting custom message properties

To have better control over your message queue, you can set additional properties 
that are included into RabbitMQ message, but will not be sent to recipient.

Those properties don't affect sent email at all, they are just for monitoring 
and debugging purposes.

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "custom-property-name": "some debug data that will be visible only in RabbitMQ message",
    "mime": "..."
}

````

### Reserved property names

There are some properties that are reserved for internal use and should not be 
used as custom headers. Complete list is below:

* `recipient`
* `domain`
* `forcedip`
* `delayed`
* `seen`
* `ips`
* `key`
* `mime`
* `results`
* `queues`
