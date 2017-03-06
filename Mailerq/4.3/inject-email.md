# How to inject email into MailerQ?

Once you have a running MailerQ instance, you want to use it to send
out mailings. But how do you get your mails into MailerQ? There are
many ways to do this:

* [drop files into MailerQ's spool directory](spool-directory)
* [use MailerQ as a Command Line utility to read messages from standard input](command-line-utility)
* [send files to the built-in MailerQ SMTP server](smtp-server)
* [send JSON-encoded email directly to RabbitMQ](publish-to-rabbitmq)

After sending the email, MailerQ publishes a JSON-encoded copy to the 
result queue, and, depending on whether the delivery was successful, into 
the success or failure  queues. Your own application or script can read 
these results up for further processing. 
