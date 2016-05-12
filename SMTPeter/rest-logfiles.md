# Fetching log files

Everything that passes through SMTPeter gets logged: deliveries, bounces,
clicks, opens - all these events are written to log files. These log
files are accessible through the REST API with the following methods:

```text
(1) https://www.smtpeter.com/v1/logfiles?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/logfiles/DATE?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/logfiles/FILENAME?access_token=YOUR_API_TOKEN
```

The above methods can be used to (1) see for which dates log files are 
available, to (2) see the log files kept for one specific date, and to 
(3) download a single log file.


## Available dates

We store all log files in directories grouped per date. To get an overview 
of all available dates, you can call the "logfiles" method without a
date or filename parameter (the first method shown above). This returns a 
JSON array holding dates.

````json
[ "2016-03-20", "2016-03-21", "2016-03-22" ]
````

The returned dates are UTC dates.


## Log files per date

To get a list of all log files available for one date, you can use the 
second method. The date must be in "YYYY-MM-DD" format. This method
returns a list of all available log files.

````json
[
    "attempts.20160320082244.0.log",
    "attempts.20160320121703.0.log",
    "clicks.20160320113322.0.log",
    "opens.20160320113503.0.log",
    "dmarc.20160320030255.0.log"
]
````

The names of the log files have the form "PREFIX.DATETIME.ID.log". The 
"ID" part in each log file is used to prevent naming conflicts. If multiple 
SMTPeter servers need to write to the log simultaneously, they use different 
ids. The consequence is that it is possible that an event that happened on 
time X does not show up in the log file that was started right before X, 
but in an older one. Keep this in mind if you search through the logs.

The "PREFIX" tells you what sort of events get logged. The following 
prefixes exist:

| Prefix                                                         | Description
| -------------------------------------------------------------- | ----------------------------------------------------- |
| [attempts](log-attempts "attempts log file")                   | information about all messages sent through SMTPeter  |
| [bounces](log-bounces "bounces log file")                      | information about messages that bounced               |
| [clicks](log-clicks "clicks log file")                         | information about the clicks generated                |
| [deliveries](log-deliveries)                                   | information about the messages delivered              |
| [dmarc](log-dmarc)                                             | information about received dmarc reports              |
| [failures](log-failures)                                       | information about failed deliveries                   |
| [opens](log-opens "opens log file")                            | information about when messages are opened            |
| [responses](log-responses)                                     | information about response mails received by SMTPeter |


## Downloading files

To download a log file, append the name of a log file to the REST API
url. You should use a HTTP GET call to get the log file

````text
https://www.smtpeter.com/v1/logfiles/attempts.20160320082244.0.log?access_token=YOUR_API_TOKEN
````

This returns a CSV file. Some fields in the returned CSV file contain
newlines, so a script that processes the CSV file needs to be a little
smarter than just look for the next newlines to find the next record.
To get more information about the content of the CSV files you can click
the links in the table above.

