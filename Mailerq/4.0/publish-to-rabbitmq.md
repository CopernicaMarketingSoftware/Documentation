# Pushing emails directly to RabbitMQ

MailerQ fetches all messages from the RabbitMQ outbox queue. The fastest
and most efficient way to inject emails is therefore to bypass SMTP,
and publish the messages directly to RabbitMQ. If you do this, you have
to use JSON encoded messages.

If you want to publish messages directly to RabbitMQ, you need a client 
library to communicate with RabbitMQ. On the RabbitMQ website you can
find [many plugins and libraries](http://www.rabbitmq.com/devtools.html) 
for this.  To help you out, we have [created a few examples](mailerq-examples "MailerQ examples") 
for commonly used languages.

![MailerQ put it in RabbitMQ](Mailerq/Images/mailerq-put-it-in-rabbitmq.png)

Besides being faster, publishing messages directly into the outbox queue also 
makes it possible to use special features, and to add special properties
in the JSON objects that control the delivery.

### Sending messages

As we mentioned above, to send out emails with the MailerQ MTA, you can simply 
add a message to the outbox message queue. This JSON encoded message should 
contain a minimum of three fields that hold the envelope email address, 
recipient's email address and full MIME message.

**Minimal requirements for a JSON encoded email**

*   The envelope email address from which the message is sent;
*   The destination address;
*   The full message MIME.

As an example, the corresponding JSON object could look as such:

````
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "From: my-sender-address@my-domain.com\r\n
             To: info@example.org\r\n
             Subject:Example subject\r\n\r\n
             This is the example message text"
}

````

Note that for ease of reading we added some spaces to the message mime in the 
above example. The above example is a minimal configuration, check the
[JSON message specification](json-messages) for a full list of all
supported properties.



