# Message specifications

MailerQ relies on external RabbitMQ message queues for all its message
queueing. All incoming and outgoing emails are read from and published to 
these queues, and all results are published to such queues as well.

The messages in these queues are JSON formatted. This means that if you 
develop scripts or programs that inject emails directly into a message 
queue, your messages must be JSON encoded as well, and must use 
properties that are understood by MailerQ. Scripts or programs that 
process results from the result queues, should be able to read in and
understand the JSON formatted result objects.

If you inject mails in MIME format (for example via the SMTP interface,
the spool folder or the command line interface) you can of course not
make use of the JSON properties to control the delivery. The properties 
that you would otherwise set in the JSON can then be set using special 
MIME headers that can be added to the email message.

* [JSON specification for outgoing messages](json-messages)
* [JSON specification for results](json-results)
* [MIME header specification](mime-headers)

