# Failure logfiles

Log files with the prefix "bounces" hold information about bounced messages.
You can download the content of these files in CSV format using the
[REST logfiles API](rest-logfiles). These log files contain the following
data in the respective order:

| Data        | Description                                                   |
| ----------- | ------------------------------------------------------------- |
| Message id  | The unique id of the message that was bounced                 |
| time        | The time we received the bounce (YY-MM-DD hh:mm:ss formatted) |
| envelope    | The envelope of the message                                   |
| recipient   | The recipient of the message                                  |
| mime        | The mime content                                              |

The mime field in the returned CSV file contains newlines, so a script that
processes the CSV file needs to be a little smarter than just look for
the next newlines to find the next record.
