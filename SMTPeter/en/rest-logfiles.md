# Retrieve log files

Everything that passes through SMTPeter gets logged: deliveries, bounces,
clicks, opens - all these events are written to log files. These log
files are accessible through the REST API with the following methods:

```text
(1) https://www.smtpeter.com/v1/logfiles
(2) https://www.smtpeter.com/v1/logfiles/DATE
(3) https://www.smtpeter.com/v1/logfiles/FILENAME
(4) https://www.smtpeter.com/v1/logfiles/FILENAME/header
(5) https://www.smtpeter.com/v1/logfiles/FILENAME/json
(6) https://www.smtpeter.com/v1/logfiles/FILENAME/xml
```

The above methods can be used to (1) see for which dates log files are 
available, to (2) see the log files kept for one specific date, and to 
(3-6) download a single log file.


## Available dates

We store all log files in directories grouped per date. To get an overview 
of all available dates, you can call the "logfiles" method without a
date or filename parameter (the first method shown above). This returns a 
JSON array holding dates.

```json
[ "2016-03-20", "2016-03-21", "2016-03-22" ]
```

The returned dates are UTC dates.


## Log files per date

To get a list of all log files available for one date, you can use the 
second method. The date must be in "YYYY-MM-DD" format. This method
returns a list of all available log files.

```json
[
    "attempts.2016-03-20.log",
    "clicks.2016-03-20.log",
    "opens.2016-03-20.log",
    "dmarc.2016-03-20.log"
]
```

The names of the log files have the form "PREFIX.DATE.log". The "PREFIX" 
tells you what sort of events get logged. The following 
prefixes exist:

| Prefix                                                | Description                                           |
| ----------------------------------------------------- | ----------------------------------------------------- |
| [attempts log file](log-attempts "attempts log file") | information about all messages sent through SMTPeter  |
| [bounces log file](log-bounces "bounces log file")    | information about messages that bounced               |
| [clicks log file](log-clicks "clicks log file")       | information about the clicks generated                |
| [deliveries log file](log-deliveries)                 | information about the messages delivered              |
| [dmarc log file](log-dmarc)                           | information about received dmarc reports              |
| [failures log file](log-failures)                     | information about failed deliveries                   |
| [opens log file](log-opens "opens log file")          | information about when messages are opened            |
| [responses log file](log-responses)                   | information about response mails received by SMTPeter |


## Downloading files

Log files can be downloaded in CSV, JSON, and XML format, so you can use
the tools you are accustomed to, to process the log files. 
To download a log file in the CSV format you, append the name of a log
file to the REST API url. You should use a HTTP GET call to get the log file

```text
https://www.smtpeter.com/v1/logfiles/attempts.2016-03-20.log
```

This returns a CSV file without any variable names. If you want to have
variable names on the first line of your CSV file, you append header to the
call.

```text
https://www.smtpeter.com/v1/logfiles/attempts.2016-03-20.log/header
```

The exact names are given in the articles on the specific logfile (see the
table above). Note that some fields in the returned CSV file contain
newlines, if this is a setting that your CSV processing tool has.

To download the file in JSON format you add "/json" to the filename you
want to download.

```text
https://www.smtpeter.com/v1/logfiles/attempts.2016-03-20.log/json
```

You JSON that you receive is an array containing JSON objects that have
as properties the names of the variables. These names are given in the
articles on the specific log file (see the table above).

Finally if you want to download the files in XML format you add "/xml" to
the file name you want to download.

```text
https://www.smtpeter.com/v1/logfiles/attempts.2016-03-20.log/xml
```

The format of the xml file is as follows:

```xml
<records>
    <record>
        <NAME1>
            value1
        </NAME1>
        <NAME2>
            value2
        </NAME2>
    </record>
    <record>
        <NAME1>
            value1
        </NAME1>
        <NAME2>
            value2
        </NAME2>
    </record>
</records>
```

The NAMEs can be found in the articles on the specific log file articles
(see the table above).