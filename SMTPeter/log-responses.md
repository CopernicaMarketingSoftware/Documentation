# Responses log files

Log files with the prefix "responses' hold information about the responses
that you sent e-mail generate that are not bounces. An example of such a
response is an automatic out-of-office-reply. You can download the content
of these files in CSV format using the [REST logfiles API](rest-logfiles).
These log files contain the following data in the respective order:

| Data        | Description                                                     |
| ----------- | --------------------------------------------------------------- |
| Message id  | The unique id of the message that generated the response        |
| time        | The time we received the response (YY-MM-DD hh:mm:ss formatted) |
| envelope    | The envelope of the message                                     |
| recipient   | The recipient of the message                                    |
| mime        | The mime content                                                |

The mime field in the returned CSV file contains newlines, so a script that
processes the CSV file needs to be a little smarter than just look for
the next newlines to find the next record.
