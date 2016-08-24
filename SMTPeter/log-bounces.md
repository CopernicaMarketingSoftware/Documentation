# Failure logfiles

Log files with the prefix "bounces" hold information about bounced messages.
You can download the content of these files in CSV, JSON, and XML format using the
[REST logfiles API](rest-logfiles) or the dashboard. These log files contain the following
data in the respective order:

| Name        | Description                                                   |
| ----------- | ------------------------------------------------------------- |
| Message id  | The unique id of the message that was bounced                 |
| time        | The time we received the bounce (YY-MM-DD hh:mm:ss formatted) |
| envelope    | The envelope of the message                                   |
| recipient   | The recipient of the message                                  |
| mime        | The mime content                                              |
| tags        | The tags of the message that bounced, separated by semicolons |
