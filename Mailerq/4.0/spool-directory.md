# Spool directory

MailerQ can monitor a directory on the file system for new
files. This directory is called the spool directory and can be configured
in the config file. When MailerQ has been configured to use such a spool
directory, you can simply inject email into MailerQ by copy'ing files to
this directory.

The files that you drop in the spool directory must be correctly formatted MIME 
messages. Invalid files will not be picked up. MailerQ opens the file, 
and filters out all the recipients from the "to", "cc" and "bcc" header fields.
For each recipient a JSON formatted message is copied to the queue that
is configured to be the "inbox" queue (this is the queue that has been 
assigned to the "rabbitmq-inbox" setting in the config file).

The envelope address is also extracted from the message: the "x-mq-envelope"
header is preferred. If this header is missing, the "return-path", "from" and
"sender" headers are checked; the first valid email address that is recognized
in these headers will be used as the envelope address.

The mail is copied to the "rabbitmq-inbox" queue. If the "rabbitmq-inbox" 
and "rabbitmq-outbox" settings both refer to the same queue, the email is
immediately delivered to the recipient(s).


## Config file options

In the config file there are three options relevant for the spool directory:

```
spool-directory:        /path/to/directory
spool-delay:            0
spool-remove:           1
```

The "spool-directory" is the most important one. It contains the path to the
directory that should be monitored. All files that you copy to this directory
are immediately picked up, processed and removed. This happens in a blink of
an eye. If you need a small delay before messages are picked up, you
can use the "spool-delay" variable. Set this to a numeric value holding
the number of seconds to wait before files are picked up.

After publishing the message to the inbox queue, MailerQ removes the input file. 
If you do not want this, you can set "spool-remove" to 0. However, it is not 
recommended to disable removing files, because emails might get redelivered 
if MailerQ is restarted and starts scanning the spool directory again.

