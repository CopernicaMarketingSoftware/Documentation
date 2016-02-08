# How to send email using MailerQ?

Sending email using MailerQ is easy. The main target is to inject emails into 
MailerQ, and there are four ways to accomplish this. You can:
*   drop files into MailerQ's spool directory; 
*   use MailerQ as a Command Line utility to read messages from standard input;
*   send files to the built-in MailerQ SMTP server;
*   send JSON-encoded email directly to RabbitMQ.

After sending the email, MailerQ publishes a JSON-encoded copy to the 
[result queue](result-queue "MailerQ result queue"), and,
depending on whether the delivery was successful, into the success or failure 
queue. Here your own application or script can pick them up for further processing. 

## MailerQ spool directory

MailerQ is capable of continuously watching a specified directory -- a spool 
directory -- for new files. If the `spool-directory` variable is empty or does 
not point to a valid directory, no spooling is used.

When a new file is placed in spool directory, it is interpreted as MIME and 
processed by MailerQ. The mail recipients will be taken from 
the MIME headers `To`, `Cc`, and `Bcc`; the envelope will either be taken from the
`x-mq-envelope` header, or if not specified, from the `From` header.

Files in this spool directory are by default processed immediately. If the user
wants some time to preprocess this file, for instance to make additional changes,
one can specify a delay in the `spool-delay` property.

It is possible to automatically remove files that have been processed, but files 
without a valid recipient will always be left alone. If you want to remove these
files, set the `spool-remove` option to a nonempty value, like `1`.

Subdirectories of the spool directory are not watched. When MailerQ is started 
with a valid spool directory, all files present in this directory at runtime are 
processed after the specified delay.

In summary, the configuration options related to spooling are:

```
spool-directory:        <directory>
spool-delay:            <seconds>
spool-remove:           <0 or 1>
```

### Message format

Messages that are found inside the spool directory should be in MIME format. The 
headers should be seperated from the message data by a newline, and lines should 
end with either `\n` or `\r\n`.

````
From: sender@example.com
To: recipient@example.com
Subject: Example message
x-mq-maxdelivertime: 2016-29-01 00:00:00

Example email data.
````

## Command Line utility

The MailerQ program can be started in two different modes: as a daemon process 
that runs all the time and sends out the messages, or as a command line 
utility that reads a message from standard input and publishes it to the inbox 
queue. As a command line utility, MailerQ does not attempt to send out the mail 
- it only puts the message in the RabbitMQ message queue. You need a seperate 
running MailerQ daemon process that takes care of the delivery.

![MailerQ mime output](copernica-docs:Mailerq/Images/mailerq-mime-output-stdout.png)

When you normally start up MailerQ, it operates as a daemon process. To start 
it as a command line utility for reading a message from standard input, you need 
to pass extra arguments to the program; either the email addresses of the recipients, 
or the option `--extract-recipients` to tell MailerQ that it should read in a 
mime message from standard input and filter out the destination addresses from it.

````
$ mailerq recipient1@example.com recipient2@example.com

````

````
$ mailerq --extract-recipients

````

The message read in by MailerQ is converted into a JSON encoded email message 
and published to the inbox queue. Another MailerQ daemon process can then pick 
it up from there and take care of the delivery.

### End of message

MailerQ reads in all data from standard input until it encounters a line with a 
single dot on it (this is to be compatible with `sendmail`). It treats this line 
as the end-of-message marker and will publish all data up to this dot (but not 
including the dot) to the inbox message queue.

This could become problematic if your email also contains lines that start with 
a dot. Such lines should of course not be treated as end-of-message markers. There 
are two ways to prevent this; you can either stuff those lines with an extra dot 
in front. MailerQ will automatically recognize this and remove the extra dot, or 
you can add the command line option `--ignore-dot` to instruct MailerQ that dots 
do not have a special meaning, and that the message is ended with end-of-file instead.

````
$ mailerq --ignore-dot recipient1@example.com recipient2@example.com
````

````
$ mailerq --ignore-dot --extract-recipients
````

### Envelope address

The envelope address that MailerQ uses for sending out an email is automatically 
filtered from the message MIME (it can be set in the custom `x-mq-envelope` header, 
or in the `return-path` header). However, you can also set the envelope address 
manually with the `--envelope` command line option.

````
$ mailerq --envelope myaddress@mydomain.com --extract-recipients

````

### Sending emails from file

Besides using a spool directory as discussed above, you can also send mail from
file using the command line. Because MailerQ reads in messages from standard 
input, you can use regular unix shell pipes and I/O redirection operators for 
sending mail.

````
$ cat email.txt | mailerq --extract-recipients --ignore-dot

````

````
$ mailerq --extract-recipients --ignore-dot < email.txt 

````

### Using MailerQ in PHP mail() function

The PHP mail() function internally uses a command line utility (for example: "sendmail") 
to send out the mail. By modifying the configuration of PHP you can change this into 
"mailerq", so that all mails sent from PHP are automatically delivered by MailerQ.

To use MailerQ for sending emails in PHP using mail() function, set property 
"sendmail_path" in php.ini to:

````
sendmail_path = mailerq --envelope my-sender-address@my-domain.com --extract-recipients --ignore-dot

````

## Using the SMTP server

You can also send emails to the SMTP port that is opened by MailerQ. All messages 
sent to this port are received by MailerQ and are automatically published to the 
inbox queue as set in your [config file](configuration "MailerQ configuration"). 
Most users set this to the same value as the outbox queue, so that all received 
emails are automatically published to the outbox queue, from which they are then 
directly picked up again and scheduled for immediate forwarding.

![MailerQ shared inbox outbox queue](copernica-docs:Mailerq/Images/mailerq-shared-inbox-outbox-queue.png)

MailerQ stores all incoming messages in the inbox queue first. You can add 
intermediate scripts that process these messages before they are forwarded to 
the outbox queue. Would you like to add a script that does additional processing 
or filtering before a message is forwarded? Configure MailerQ to publish received 
messages in an inbox queue and let your scripts read these messages from this 
inbox queue, to process or filter them. After that, post the message to the outbox 
queue where MailerQ picks them up to deliver them. You might be interested in 
[AMQPipe](https://www.amqpipe.com "AMQPipe"), a high performance application that 
reads messages as fast as it can from a RabbitMQ message queue, runs your scripts 
to process these messages, and publishes the results back to RabbitMQ.

![MailerQ seperate inbox outbox queues](copernica-docs:Mailerq/Images/mailerq-seperate-inbox-outbox-queues.png)

### SMTP and multiple IP addresses

If you run MailerQ on a server with multiple IP addresses, the SMTP server is 
available on all those addresses too. You can thus choose to which IP address 
to send your mail. MailerQ recognizes the IP address to which the mail was 
originally submitted, stores that information in the JSON message, and when 
the mail is finally forwarded to the internet, it will be sent out from _exactly 
the same_ IP address. You should be aware that this can cause problems if you 
deliver your email to an IP address from which no external connections can be 
made (like [127.0.0.1](http://en.wikipedia.org/wiki/Localhost)).

If you want MailerQ to send out the mail from a different IP address than that 
you originally sent it to, you can include [an extra MIME header field](mime-message-properties#local-ip-addresses) 
that instructs MailerQ to use a different IP instead.

## Pushing directly to RabbitMQ

MailerQ fetches all messages from the [RabbitMQ outbox queue](rabbitmq-config "RabbitmQ configuration"). 
This makes using an application or script to directly publish messages to the 
outbox queue the fastest way to inject your emails into MailerQ. These messages 
should be JSON encoded, which makes it very easy because it is a 
[widely known data format](http://www.json.org) that can be easily created and 
processed by almost every program language out there. 

The message queues can be easily accessed (add messages, remove messages) using 
the AMQP protocol, for which [many plugins and libraries](http://www.rabbitmq.com/devtools.html) 
are available.  To help you out, we have 
[created a few examples](mailerq-examples "MailerQ examples") 
for commonly used languages.

![MailerQ put it in RabbitMQ](copernica-docs:Mailerq/Images/mailerq-put-it-in-rabbitmq.png)

Besides being faster, publishing messages directly into the outbox queue also 
makes it possible to use special features that are not natively available when 
you use SMTP. When using SMTP you can add most of these features by adding 
[special `x-mq-*` headers](mime-message-properties).

This means that when you cannot easily change or add e-mail headers, publishing 
messages directly into the outbox queue is nessecary when you want to make use 
of these features. 

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
above example.

If you have a MailerQ license that includes the responsive email feature, you have 
several other options. You can read about them in the [responsive email documentation](responsive-email).



