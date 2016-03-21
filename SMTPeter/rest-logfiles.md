# Fetching log files

We store all type of events in our log files. To check which log files are
available you can use the logfiles method. This method can also be used to
download a logfile in csv format.

The logfile method uses the following URIs.
```text
https://www.smtpeter.com/v1/logfiles?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/logfiles/DATE?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/logfiles/FILENAME?access_token=YOUR_API_TOKEN
```

## Get dates

We group our log files per date. To see for which dates we have log files
available for you, you can call the logfile method by using the following
URI:
```text
https://www.smtpeter.com/v1/logfiles?access_token=YOUR_API_TOKEN
```
This call will return a JSON array with all the dates for which log files
are available. The dates are in the format YYYY-MM-DD.

## Get file names per date

To check which log files are available for a certain date you use the following
URI:
```text
https://www.smtpeter.com/v1/logfiles/DATE?access_token=YOUR_API_TOKEN
```
where DATE has the form YYYY-MM-DD.
This call we return a JSON array with the names of all the logfiles for the
particular day. The name of the log file has the form `<prifix>.<dateTime>.<id>.log`.
The `<prefix>` indicates what type of log file it is. We have the following type
of log files:
<!--- @todo add links from table to the log file type --->

| Prefix     | Description
| ---------- | ----------------------------------------------------------------- |
| attempts   | logs that contain information about all messages send to SMTPeter |
| bounces    | logs that contain information about messages that bounced         |
| clicks     | logs that contain information about the clicks generated          |
| deliveries | logs that contain information about the messages delivered        |
| dmarc      | logs that contain information about dmarc reports                 |
| failures   | logs that contain information about failed deliveries             |
| opens      | logs that contain information about when messages are opened      |

The `<dateTime>` has the form YYYYMMDDhhmmss, without any spaces or other characters.
The `<id>` is an identifier that runs from 0 to N. The reason for this extra identifier
is that we can write to multiple files on different servers, to spread the load,
without worrying about name conflicts. Because we use different servers
to generate your log files it is possible that an event
on time x does not show up in the log file with the time stamp just before x
but in an older one. This is something you should keep in mind if you search
for a particular event.


## Downloading log files

If you want to download a logfile, you can use the following URI:

```text
https://www.smtpeter.com/v1/logfiles/FILENAME?access_token=YOUR_API_TOKEN
```
This URI will give you a csv file from the log file with name "FILENAME".
