# Logging

All abnormal events, downloads and deliveries are logged by MailerQ in different log files. 

## Error Logs

All abnormal events are logged to the error logfile. This includes failures like databases that are suddenly offline, or RabbitMQ connections that are lost. The name and error of the error log file can be set with the error-log setting.

```txt
error-log:      /var/log/mailerq/errors.log
```

The file must of course be writable for MailerQ.


## Send logs

MailerQ creates logfiles for all delivery attempts. The directory in
which these log files are stored can be set here, as well as the
name of the logfile. Normally, MailerQ appends a number after each
logfile, for example "attempts.log.12". MailerQ moves on to the next
logfile when the max size or max age of a file is reached. The history
option holds the max number of old files to keep on disk before files
are removed.

The configuration file holds the following options:

```txt
send-log-directory:         /var/log/mailerq
send-log-prefix:            send-attempts
send-log-maxsize:           100MB
send-log-maxage:            3600
send-log-compression:       gzip
send-log-history:           100
```

The "send-log-directory" is the directory where logfiles with send attempts 
are stored. The directory must be writable for MailerQ. The "send-log-prefix" 
is the prefix for the send log. The default is "attempts.log". 

The "send-log-maxsize", "send-log-maxage" and "send-log-history" control 
log file rotation. When the current log file reaches its max age or its 
max size, MailerQ rotates the logfiles and continues writing to a fresh 
and new log file. The maxsize setting is required (default is 100MB), the 
maxage setting is optional. If you leave it out, MailerQ will only rotate 
the files when the current file reaches it max size. When logfiles are 
rotated, MailerQ only keeps the "send-log-history" latest log files on 
disk. All older files are removed.

To reduce disk utilization, you can turn on log file compression with
the "send-log-compression" setting. Only gzip compression is supported.


## Received messages

Incoming messages - messages sent to the SMTP port of MailerQ - are logged
to the received log file. These settings work exactly like the send log
settings:

```txt
received-log-directory:     /var/log/mailerq
received-log-prefix:        received-messages
received-log-maxsize:       100MB
received-log-maxage:        3600
received-log-compression:   gzip
received-log-history:       100
```

The log file only holds messages that are received over the SMTP port.
Messages dropped in the spool directory or that are injected using the
command line interface are not logged.


## Download logs 

MailerQ can create MIME message itself. To do this, MailerQ sometimes
has to download resources from the internet (like images that should
be embedded, or attachments that should be included in the mail). All
these download operations are written to the download log.

The settings for the download log are essentially the same as the settings 
for the send-log:

```txt
download-log-directory:     /var/log/mailerq
download-log-prefix:        downloads
download-log-maxsize:       100MB 
download-log-maxage:        3600
download-log-compression:   gzip
download-log-history:       100
```


## A word about logging

MailerQ writes all events to RabbitMQ message queues. The recommended
way of handling events is therefore to write scripts or applications that process 
the data from these message queues. This is much more powerful than periodically 
processing log files:

- the message queues receive more events than the log files
- the per-event data published to message queues can be much richer than the log file data
- consuming from messages queues allows real time event handling 
- handling data from message queues is more scalable (by adding consumers)
- no blocking and slow disk operations are necessary

For all of the above reasons, the first MailerQ versions did not even have
logging capabilites. We did not want to slow down our high performance MTA
by having it write data to disk - it was up to other scripts and applications to 
read the results from the message queues, react to them and write data to
appropriate log files. With this architecture, hiccups in disk IO could not slow
down email deliveries.

However, although this worked (and works!) perfectly for us, we found out 
that many users still want to have log files to monitor what is going
on. So we've added the logging feature, and we use threads to prevent that
IO hiccups can be a problem. But keep in mind that once you find yourself
writing cron jobs to process log files, you would probably be better of 
writing a script that processes data from the message queues.

