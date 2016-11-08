# Special MIME headers

If you inject mails in SMTP format into MailerQ, you can add special 
headers to your message that are read and recognized by MailerQ, and
that control the delivery of your message. Headers that start with
"x-mq-*" are automatically recognized by MailerQ, stripped from the
email message and converted into JSON properties before the message
is sent to one of the message queues.

Almost all "x-mq-*" properties are converted into JSON properties, even
custom properties that do not have a special meaning (like "x-mq-meaningless").
However, the following properties have a special meaning and have influence
on the handling of your message.

<table>
    <tr>
        <td>x-mq-envelope</td>
        <td>explicit envelope address</td>
    </tr>
    <tr>
        <td>x-mq-ip</td>
        <td>IP address to send mail from</td>
    </tr>
    <tr>
        <td>x-mq-tag</td>
        <td>adds a tag to the message</td>
    </tr>
    <tr>
        <td>x-mq-delayed</td>
        <td>time when message should be sent</td>
    </tr>
    <tr>
        <td>x-mq-maxdelivertime</td>
        <td>max time for delivery</td>
    </tr>
    <tr>
        <td>x-mq-maxattempts</td>
        <td>max number of delivery attempts</td>
    </tr>
    <tr>
        <td>x-mq-inlinecss</td>
        <td>instruct MailerQ to inlinize the CSS code</td>
    </tr>
    <tr>
        <td>x-mq-results-queue</td>
        <td>alternative queue for the results</td>
    </tr>
    <tr>
        <td>x-mq-failure-queue</td>
        <td>alternative queue for the failures</td>
    </tr>
    <tr>
        <td>x-mq-success-queue</td>
        <td>alternative queue for the failures</td>
    </tr>
    <tr>
        <td>x-mq-retry-queue</td>
        <td>alternative queue for the retries</td>
    </tr>
    <tr>
        <td>x-mq-smarthost-name</td>
        <td>hostname of smarthost to send email to</td>
    </tr>
    <tr>
        <td>x-mq-smarthost-port</td>
        <td>portnumber of the smarthost</td>
    </tr>
    <tr>
        <td>x-mq-smarthost-username</td>
        <td>login for the smarthost</td>
    </tr>
    <tr>
        <td>x-mq-smarthost-password</td>
        <td>password to access the smarthost</td>
    </tr>
    <tr>
        <td>x-mq-dsn-notify</td>
        <td>to be documented</td>
    </tr>
    <tr>
        <td>x-mq-dsn-orcpt</td>
        <td>to be documented</td>
    </tr>
    <tr>
        <td>x-mq-dsn-ret</td>
        <td>to be documented</td>
    </tr>
    <tr>
        <td>x-mq-dsn-envid</td>
        <td>to be documented</td>
    </tr>
    <tr>
        <td>x-mq-keepmime</td>
        <td>do not remove the full mime object after delivery</td>
    </tr>
</table>


## Example message

The following message would be an example MIME message that holds
some extra meta properties:

````
from: info@example.com
to: peter@smtpeter.com
subject: example message
x-mq-ip: 10.11.12.13
x-mq-maxdelivertime: 2016-10-23 23:00:00
x-mq-inlinecss: 1
x-mq-custom-identifier: my-id

this is the body of the mail
````

When the message above is injected into MailerQ, it will be transformed
into a JSON object that is sent to the inbox queue. The JSON object will
have the following properties:

````
{
    "envelope": "info@example.com",
    "recipient": "peter@smtpeter.com",
    "mime": "....",
    "ips": [ "10.11.12.13" ],
    "maxdelivertime": "2016-10-23 23:00:00",
    "inlinecss": true,
    "custom-identifier": "my-id"
}
````

To ease readability, we have left out the mime data. The mime data would
be identical to the injected mime, _without_ all the x-mq-* headers.


## Envelope address

The envelope address from an injected mail is extracted from the MIME
message. MailerQ checks (in this order) the following properties to extract 
the envelope address: "x-mq-envelope", "return-path", "from" and "sender". 
The first valid email address to be found in one of these headers will
be used as envelope address.

The envelope address is the address that is used in the "MAIL FROM"
communication.


## Local IP addresses

If your server has multiple IPs to send out mail from, you can use all
of them to send out mail from. To control the IP address that is going to
be used, you can use the "x-mq-ip" property.

To allow multiple IP address for sending out the mail, you can add a list of 
available IP addresses:

````
x-mq-ip: 231.34.13.156
x-mq-ip: 231.34.13.158

````

MailerQ will pick one of the IPs to send out the mail. Be aware that you 
can of course only use addresses that are actually bound to the host that MailerQ 
runs on. Other IP addresses will result in failed deliveries.

## Tags

You may be injecting different types of messages into MailerQ, for example messages belonging to
your various customers or campaigns. To help you get a better overview, MailerQ allows you to tag 
your messages with one or more labels of your choosing. These tags will show up in the management 
console, allowing you to monitor and control all deliveries belonging to a tag. 
To add a tag in a MIME email you can add one or more "x-mq-tag" properties to the header:

````
x-mq-tag: Customer Name
x-mq-tag: Example Campaign
````

MailerQ will track messages belonging to a tag and allow you to monitor them in the 
management console. See the [tags page](mgmt-tags) for more information.

## Delivery time

When a message cannot be delivered immediately because of unresponsive receivers, 
greylisting or throttling, MailerQ publishes back the email to the outbox queue 
for later delivery. This can result in emails that are sent much later than the 
time that you first added them to the message queue.

If you do not want an email to be delivered after a certain time, all you need 
to do is add the "x-mq-maxdelivertime" header to the message. The "x-mq-delayed"
property does exactly the opposite: it delays the email so that it is not
delivered _before_ a specific time.

````
x-mq-delayed: 2016-02-10 12:00:00
x-mq-maxdelivertime: 2016-03-10 00:00:00
````

Timestamps in MailerQ are always in UTC. MailerQ is not very tolerant in parsing 
timestamps, so better make sure that you use the right 
formatting (YYYY-MM-DD HH:MM:SS).

If you do not specify an explicit max delivery time, MailerQ will attempt to 
deliver the mail within 24 hours (default) after the mail was first picked up 
from the outbox. You can change the default in the configuration file.  


## Maximum number of attempts

Just like a maximum delivery time, you can control the maximum number of attempts
MailerQ should make sending an email. If a first attempt fails because a remote 
server is unreachable or does not immediately accept the message, MailerQ will 
make a new attempt a little later.

By default, MailerQ tries to send out the mail six times. You can change the 
defaults in the [Configuration file](configuration). 

````
x-mq-maxattempts: 3

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
x-mq-inlinecss: 1

````

## Custom result queues

After MailerQ has processed an email, it publishes the result of the delivery to 
one or more result queues. The default queues to use for this are configured in 
the global configuration file, but you can set other queue names in properties to 
tell MailerQ to use other result queues.

````
x-mq-results-queue: name-of-results-queue
x-mq-failure-queue: name-of-failure-queue
x-mq-success-queue: name-of-success-queue
x-mq-retry-queue: name-of-retry-queue

````

Note that when only one if these "x-mq-*-queue" properties is used, _all_ the queues
mentioned in the global configuration file are ignored. This is even so if you 
have not even specified all possible queues in the MIME header.


## Smarthost settings

Instead of having MailerQ sending messages directly to the final recipient, it can be sent to an alternative mailserver instead: the smarthost.
The default credentials can be set in the config file, or they can be provided the following properties:

````
x-mq-smarthost-name
x-mq-smarthost-port
x-mq-smarthost-username
x-mq-smarthost-password
````

[Read more about using a smarthost](smarthost "Smarthost & debugging")


## DSN settings

Some mail servers initially seem to accept a message, but send back a bounce email later.
Delivery Status Notification (DSN) messages help you keep track of what happened to your mails. 
The following options specify which Delivery Status Notifications you want to receive:

````
x-mq-dsn-notify
x-mq-dsn-orcpt
x-mq-dsn-ret
x-mq-dsn-envid
````

[Read more about Delivery Status Notifications](sending-bounces "Delivery Status Notifications")


## Keep messages after delivery

When a message is completely processed - either because it was successfully 
delivered, or the delivery failed - MailerQ publishes it to the results queue, 
where you can pick it up for further processing.

By default, MailerQ throws away the mime data to make room in the JSON object and 
in the message store. If you do not want the message data to be removed, you can 
tell so by adding the `keepmime` option:

````
x-mq-keepmime: 1

````


