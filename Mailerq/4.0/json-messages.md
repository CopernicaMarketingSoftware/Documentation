# JSON specification

All messages that are published to RabbitMQ are JSON encoded. This means
that if you want to inject email directly into RabbitMQ, you also have 
to use JSON. In the JSON you should set the envelope ("MAIL FROM") address
and the recipient ("RCPT TO") of your message, as well as the full mime data 
to be sent. 

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "..."
}
````

To make reading a little easier, we've removed the mime data from the 
above example, and replaced it with "...". Besides the three properties 
mentioned above, you can add all other kind of other properties to the JSON 
object to  control the delivery of the mail, see the following table for 
an overview.

<table>
    <tr>
        <td>envelope</td>
        <td>envelope ("MAIL FROM") address</td>
    </tr>
    <tr>
        <td>recipient</td>
        <td>recipient ("RCPT TO") address</td>
    </tr>
    <tr>
        <td>mime</td>
        <td>full mime data to be sent</td>
    </tr>
    <tr>
        <td>key</td>
        <td>key to the mime data in external storage</td>
    </tr>
    <tr>
        <td>data</td>
        <td>personalization data</td>
    </tr>
    <tr>
        <td>ips</td>
        <td>ip addresses to send the message from</td>
    </tr>
    <tr>
        <td>force</td>
        <td>force delivery, even when errors occur or conversion is impossible</td>
    </tr>
    <tr>
        <td>delayed</td>
        <td>time to send the mail</td>
    </tr>
    <tr>
        <td>maxdelivertime</td>
        <td>time until which a delivery should be retried</td>
    </tr>
    <tr>
        <td>maxattempts</td>
        <td>max number of delivery attempts</td>
    </tr>
    <tr>
        <td>inlinecss</td>
        <td>turn style blocks in html mails into inline style attributes</td>
    </tr>
    <tr>
        <td>dkim</td>
        <td>private keys to sign the mail</td>
    </tr>
    <tr>
        <td>dsn</td>
        <td>settings for delivery status notifications</td>
    </tr>
    <tr>
        <td>queues</td>
        <td>alternative rabbitmq queues for results</td>
    </tr>
    <tr>
        <td>keepmime</td>
        <td>do not remove mime data after delivery</td>
    </tr>
    <tr>
        <td>smarthost</td>
        <td>smarthost settings</td>
    </tr>
</table>


## The basics

The most simple JSON to send to RabbitMQ contains just an "envelope", 
"recipient" and "mime" property as we demonstrated above. The "mime"
property should be a string value, holding a valid MIME object. This 
mime object holds the entire email, including all the headers and possible
text and html versions, attachments, and so on:

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "From: my-sender-address@my-domain.com\r\nTo: info@example.org\r\nSubject: ..."
}
````

However, the "mime" property can also be a nested JSON object, holding
all individual properties of the mime, which will then be turned into a
valid mime string by MailerQ:

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": {
        "from": "my-sender-address@my-domain.com",
        "to": "info@example.org",
        "subject": "This is the subject line",
        "text": "text version of the mail"
    }
}
````

The number of properties that are supported inside the nested "mime" property
is pretty huge. It uses the very same algorithm as the [responsiveemail.com](https://www.responsiveemail.com) web
service to convert JSON objects into valid MIME data. For more information 
about the supported properties, check the [responsive email documentation](https://www.responsiveemail.com/support/json/introduction).


## Storing messages in a message store

MIME bodies can become large, especially if your emails contain attachments 
or embedded content. To prevent that such big messages have to be processed by 
RabbitMQ, MailerQ can be configured to use an external message store (for example:
MongoDB). You can then publish much smaller JSON objects 
to RabbitMQ, and keep the full MIME messages in the external message store.

MailerQ waits with loading the message from message store until the SMTP connection 
has been set up, so no time and resources are wasted on fetching information 
that is not needed. The mime data is only loaded when it is really needed.

With an external message store, you can use the "key" property instead of the "mime"
property. This property holds the key under which the mime data is stored in your 
external storage system.

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "key": "message-store-key-where-data-can-be-found"
}
````

Even when you have a message store you can of course still use the "mime" 
property and store the full mime in the JSON. This is often even the 
recommended way of doing things, because most mails get delivered at the very 
first attempt, and storing-and-fetching the mail to and from external storage
is then only a waste of time and resources. The message store is in such a setup only
used for messages that were delayed and that are published back to RabbitMQ. MailerQ
takes care of removing the mime from the JSON, and stores it in the message
store when delayed messages are published back to RabbitMQ.


## Keep messages after delivery

When a message has been completely processed - either because it was successfully 
delivered, or the delivery failed - MailerQ publishes the delivery result to 
the results queue, where you can pick it up for further processing.

By default, MailerQ throws away the mime data to make room in the JSON object and 
in the message store. The result queues only hold the meta data for each
sent message, but not the full mime data. If you do not want the message data 
to be removed, you can tell so by adding the "keepmime" option:

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "...",
    "keepmime": true
}
````


## Personalization data

It is possible to include personalization data in the JSON. If you do this,
MailerQ will treat the subject, html and text version of your email as
templates, and replace variables in it with the values loaded from the JSON.

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "From: ...\r\nTo: ...\r\nSubject: Message from {$firstname}\r\n...",
    "data": {
        "firstname": "Emiel",
        "lastname": "Bruijntjes",
        "email": "emiel.bruijntjes@copernica.com"
    }
}
````

Personalization variables can currently only be used for the subject and
the text and HTML versions of the mail. However, if you assign a nested object 
to the "mime" property using the 
[responsive email specification](https://www.responsiveemail.com/support/json/introduction), 
you can use personalization data in almost all fields.

For more information about using personalization, check our 
[personalization documentation](personalization).


## Max delivery time and max attempts

When a message cannot be delivered immediately because of unresponsive receivers, 
greylisting or throttling, MailerQ publishes back the email to the outbox queue 
for later delivery. This can result in emails that are sent much later than the 
time that you first added them to the message queue.

If you do not want an email to be delivered after a certain time, all you need 
to do is add the "maxdelivertime" property. MailerQ will give up on delivering
the mail after this time, and send a failure to the results queue.

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "...",
    "maxdelivertime": "2016-02-10 00:00:00",
    "maxattempts": 3
}
````

The "maxattempts" is an alternative way to control after how many attempts
MailerQ should give up trying. The "maxattempts" setting limits the number of 
attempts MailerQ makes before it gives up.

Timestamps in MailerQ are always in UTC. MailerQ is not very tolerant in 
parsing timestamps, so make sure that you use the right formatting 
(YYYY-MM-DD HH:MM:SS).

If you do not specify an explicit max delivery time or max attempts, MailerQ 
will attempt to deliver the mail within 24 hours (default) after the mail 
was first picked up from the outbox. The max attempts setting has no 
default limit: the mail is just retried for 24 hours no matter how many
attempts that takes.


## Local IP addresses

If your MailerQ server has multiple IPs, MailerQ can send out mail from all 
these IP addresses. This can be useful to increase the delivery rate, 
because receivers often restrict deliveries per IP address.

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


## Inlinize CSS

When you send out HTML emails, you face the problem that not all email clients 
support stylesheets that are set in the header. Some email clients (especially 
web based clients) strip out the CSS code from the HTML header. This often messes 
up the layout and look of your messages. To overcome this, it is better not to set 
CSS settings in the header in the first place, but use `style="..."` attributes 
in the HTML code.

MailerQ can do this automatically. If you set "inlinecss" propety to true, 
MailerQ parses the HTML email, and converts the CSS code from the HTML header 
into inline `style="..."` attributes in the HTML body.

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "...",
    "inlinecss": true
}           
````

## Custom result queues

After MailerQ has processed an email, it publishes the mail to one or more result 
queues. The default queues to use for this are configured in the global 
configuration file, but you can set other queue names to tell 
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

All properties of the "queues" object are optional. If you leave an option out, 
MailerQ will not use that queue. Thus, if you for example want to process only 
the errors for a certain e-mail, you can only set the "failure" queue. When the 
delivery succeeds, MailerQ will silently discard the mail, without adding it to 
any result queue.

When the "queues" property is set in the JSON, the queues mentioned in 
the global configuration file are completely ignored. This is even so if you 
have not even specified all possible queues in the JSON property.


## Setting custom message properties

To have better control over your message queue, you can add additional 
properties in the JSON. These properties are ignored by MailerQ, but they
will end up in the result queue, and allows you to link result data
with the original mail.

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "custom-property-name": "debug data",
    "mime": "..."
}
````

