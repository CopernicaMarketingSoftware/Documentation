# Logging

All abnormal events, downloads and deliveries are logged by MailerQ in different log files. 

## Error Logs

All abnormal events are logged to the error logfile. This includes failures like databases that are suddenly offline, or RabbitMQ connections that are lost. The name and error of the error log file can be set with the error-log setting.

```
error-log:      <location of file>
```

The filename to which which errors are logged. The file must of course be writable for MailerQ.


## Send logs
MailerQ creates logfiles for all delivery attempts. The directory in
which these log files are stored can be set here, as well as the
name of the logfile. Normally, MailerQ appends a number after each
logfile, for example "attempts.log.12". MailerQ moves on to the next
logfile when the max size or max age of a file is reached. The history
option holds the max number of old files to keep on disk before files
are removed.

The configuration file holds the following options:

```
send-log-directory:         <directory>
send-log-prefix:            <name.log>
send-log-maxsize:           <megabytes> 
send-log-maxage:            <seconds>
send-log-compression:       gzip
send-log-history:           <number of files>
```
The `send-log-directory` is the directory where logfiles with send attempts are 
stored. The directory must be writable for MailerQ. The `send-log-prefix` is the 
prefix for the send log. The default is "attempts.log". The `send-log-maxsize` is the 
maximum size of the log file before MailerQ rotates the log files and continues to 
write to a new file. The default is 100MB. The `send-log-maxage` is the number of seconds 
before MailerQ rotates the log files and moves on to the next file. If not set log files 
will not rotate based on age. The `send-log-compression` option will compress the already 
existing log directory and add new log entries to this compressed folder. Currently 
only gzip compression is supported. The `send-log-history` is the is the maximum 
number of log files MailerQ holds before the oldest file is removed. 


## Download logs 

When MailerQ uses the responsive email feature and creates responsive emails 
based on the JSON input, MailerQ sometimes has to download images from web servers to find
out their size, and/or RSS feeds to include in the mail. All these
downloads are automatically logged. The settings for the download
log are essentially the same as the settings for the send-log:

```
download-log-directory:     <directory>
download-log-prefix:        <name.log>
download-log-maxsize:       <megabytes> 
download-log-maxage:        <seconds>
download-log-compression:   gzip
download-log-history:       <number of files>
```
