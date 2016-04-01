# Command Line utility

The MailerQ program can be started in two different modes: as a daemon process 
that runs all the time and that sends out the messages, or as a command line 
utility that reads a message from standard input and publishes it to the inbox 
queue. As a command line utility, MailerQ does not attempt to send out the mail, 
it just puts the message in the RabbitMQ message queue. You need a seperate 
running MailerQ daemon process that takes care of the delivery.

![MailerQ mime output](Mailerq/Images/mailerq-mime-output-stdout.png)

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

## End of message

MailerQ reads in all data from standard input until it encounters a line with a 
single dot on it. It treats this line as the end-of-message marker and publishes 
all data up to this dot (but not including the dot) to the inbox message queue.
This is the same behavior as "sendmail" and allows you to use MailerQ as drop-in
replacement for sendmail.

This behavior could however be problematic if your email contains lines that start with 
a dot. Such lines should of course not be treated as end-of-message markers. There 
are two ways to prevent this; you can either stuff those lines with an extra dot 
in front. MailerQ will automatically recognize this and removes the extra dot, or 
you can add the command line option "--ignore-dot" to instruct MailerQ that dots 
do not have a special meaning, and that the message is ended with end-of-file instead.

````
$ mailerq --ignore-dot recipient1@example.com recipient2@example.com
````

````
$ mailerq --ignore-dot --extract-recipients
````

## Envelope address

The envelope address that MailerQ uses for sending out an email is automatically 
extracted from the message MIME. It can be set in the custom "x-mq-envelope" header, 
or in the "return-path", "sender" or "from" header (in that specific order). However, 
you can also set the envelope address manually with the "--envelope" command line option:

````
$ mailerq --envelope myaddress@mydomain.com --extract-recipients

````

## Sending emails from file

You can use regular unix shell pipes and I/O redirection operators to
get the contents from a file into MailerQ.

````
$ cat email.txt | mailerq --extract-recipients --ignore-dot
````

````
$ mailerq --extract-recipients --ignore-dot < email.txt 
````
