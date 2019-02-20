# Logging

All delivery attempts like received emails, downloads and errors can be logged by MailerQ in different log files. The log file settings can be specified in the "/etc/mailerq/config.txt" config file.

## Application Log
Information about MailerQ is logged to the application log. This includes failures like databases that are suddenly offline or RabbitMQ connections that are lost. Currently the log levels Info, Warning and Critical are supported. The error log has been deprecated in favor of the application log. The application log can be set using the option application-log, and supports logging to stdout, stderr, syslog and files. If this setting is kept empty no logs are stored.

```txt
application-log:      syslog,/var/log/mailerq/mailerq.log
```

Files must, of course, be writable for MailerQ.

## Flexible log format

You can use the [Smart-TPL templating language](https://github.com/CopernicaMarketingSoftware/SMART-TPL) to define your own log lines. With this template language, you can use some simple logic to log specific errors. You can specify this in the configuration file.

Example configuration:
```
send-log-format: [{$date}] {$result.state}:{$result.result} {$attempt} <{$email.envelope}> <{$email.recipient}> [{$result.from}] [{$result.to}] {$email.tags} {$result.code} {$result.status} {$result.description}
```

Example output:
```
[2018-08-29 07:20:16] message:accepted 1 <info@company.com> <info@outlook.com> [100.20.20.20] [100.30.30.30] [ "a", "b" ] 250 2.0.0 Ok (edited)
```

You can only use the Smart-TPL templating language for the send-log-format, received-log-format, download-log-format and the www-log-format settings.

### Using the Smart-TPL templating language

You can only create your own log lines with the available variables and properties. Access to variables and properties is available via this syntax:

Access to variable `variable` = `{$variable}`
Access to property `variable.property` = `{$variable.property}`

With the help of logical constructors, you can log specific errors.

```
{if $variable}Print:{$variable} {else}show something else{/if}
```

For more information about this templating language, you can read the [Smart-TPL documentation](https://github.com/CopernicaMarketingSoftware/SMART-TPL).


## Send logs

MailerQ creates log files for all delivery attempts. The directory in
which these log files are stored can be set here, as well as the
name of the log file. Normally, MailerQ appends a number after each log file, for example: "attempts.log.12". MailerQ moves on to the next
log file when the max size or max age of a file is reached. The history
option holds the max number of old files to keep on disk before files
are removed.

The [management console web interface](management-console) uses binary log files to display real-time information of all delivery attempts.

The configuration file holds the following options:

```txt
# Log of send attempts
send-bin-log-directory:     /var/log/mailerq/
send-bin-log-prefix:        send.bin
send-bin-log-maxsize:       100MB
send-bin-log-maxage:        3600
send-bin-log-history:       20
send-log-directory:         /var/log/mailerq/
send-log-prefix:            send.log
send-log-maxsize:           100MB
send-log-maxage:            3600
send-log-history:           20
send-log-compression:       gzip
send-log-format:       [{$date}] {$result.state}:{$result.result} {$attempt} <{if $email.envelope}{$email.envelope}{/if}> <{$email.recipient}> [{$result.from}] [{$result.to}] {$email.tags} {$result.code} {$result.status} {$result.description}
```

You can specify your own log lines via the `send-log-format` setting. These are the available variables.

```
$email		Email JSON object, as placed in queue.
$result		Last result object, of this connection
$attempt	int, attempt number of this mail
$date		formatted DateTime (e.g. 01-01-1970 11:53)
```

The available properties are [specified in the JSON for outgoing messages](json-messages).

The "send-log-directory" is the directory where log files with send attempts
are stored. The directory must be writable for MailerQ. The "send-log-prefix"
is the prefix for the send log. The default is "attempts.log".

The "send-log-maxsize", "send-log-maxage" and "send-log-history" control
log file rotation. When the current log file reaches its max age or its
max size, MailerQ rotates the log files and continues writing to a fresh
and new log file. The maxsize setting is required (default is 100MB), the
maxage setting is optional. If you leave it out, MailerQ will only rotate
the files when the current file reaches its max size. When log files are
rotated, MailerQ only keeps the "send-log-history" latest log files on
disk. All older files are removed.

To reduce disk utilization, you can turn on log file compression with
the "send-log-compression" setting. Only gzip compression is supported.


## Received messages

Incoming messages - messages sent to the SMTP port of MailerQ - are logged
to the received log file. These settings work exactly like the send log
settings:

```txt
# Log of incoming messages
received-log-directory:      /var/log/mailerq/
received-log-prefix:         received.log
received-log-history:        20
received-log-maxsize:        100MB
received-log-maxage:         3600
received-log-compression:    gzip
received-log-format:         [{$date}]{if $json.message_id} {$json.message_id} {/if}<{$json.envelope}> <{$json.recipient}> [{$json.connection.remote_ip}] [{$json.connection.local_ip}]
```

You can specify your own log lines via the `received-log-format` setting. These are the available variables.

```
$json 		The received / constructed JSON
$report		(boolean) whether or not this is a delivery report
$date		The datetime
$time		unix timestamp
```

The available properties are [specified in the JSON for incoming messages](json-incoming)

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
# Log of downloads
download-log-directory:     /var/log/mailerq/
download-log-prefix:        download.log
download-log-history:       20
download-log-maxsize:       100MB
download-log-maxage:        3600
download-log-compression:   gzip
download-log-format:        {$date}, {$time}, {$url}
```

You can specify your own log lines via the `download-log-format` setting. These are the available variables.

```
$url		The url
$time		The unix timestamp
$date		The formatted DateTime (e.g. 01-01-1970 11:53 oid)
```

## Management console logs

You can monitor who accessed the management console. The settings for the management console log are essentially the same as the settings for the send-log:

```txt
# Log of management console
www-log-directory:              /var/log/mailerq/
www-log-prefix:                 www.log
www-log-history:                10
www-log-maxsize:                100MB
www-log-maxage:                 3600
www-log-compression:            gzip
www-log-format:                 {$date}, {$ip}, {$request}
```

You can specify your own log lines via the `www-log-format` setting. These are the available variables.

```
$date		The formatted DateTime (e.g. 01-01-1970 11:53 oid)
$ip		The IP that connected
$request	A string with the request (e.g. "GET/settings")
```


## A word about logging

MailerQ writes all events to RabbitMQ message queues. The recommended
way of handling events is therefore to write scripts or applications that process
the data from these message queues. This is much more powerful than periodically
processing log files:

- the message queues receive more events than the log files
- the per-event data published to message queues can be much richer than the log file data
- consuming from messages queues allows real-time event handling
- handling data from message queues is more scalable (by adding consumers)
- no blocking and slow disk operations are necessary

For all of the above reasons, the first MailerQ versions did not even have
logging capabilities. We did not want to slow down our high-performance MTA
by having it write data to disk - it was up to other scripts and applications to
read the results from the message queues, react to them and write data to
appropriate log files. With this architecture, hiccups in disk IO could not slow
down email deliveries.

However, although this worked (and works!) perfectly for us, we found out
that many users still want to have log files to monitor what is going
on. So we've added the logging feature, and we use threads to prevent that
IO hiccups can be a problem. But keep in mind that once you find yourself
writing cron jobs to process log files, you would probably be better off
writing a script that processes data from the message queues.
