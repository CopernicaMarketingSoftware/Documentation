# Failure logfiles

Log files with the prefix "failures" hold information about the messages
for which delivery failed. You can download the content of these files
in CSV, JSON, and XML format using the [REST logfiles API](rest-logfiles)
or the dashboard. These log files contain the following data in the respective
order:

| Name        | Description                                                                             |
| ----------- | --------------------------------------------------------------------------------------- |
| id          | The unique id of the message for which delivery failed                                  |
| time        | The time when we received the failed delivery notification (YY-MM-DD hh:mm:ss formatted)|
| envelope    | The envelope of the message that failed                                                 |
| recipient   | The recipient of the failed message                                                     |
| attempt     | The attempt number (starting from zero)                                                 |
| from        | The from IP address                                                                     |
| to          | The to IP address                                                                       |
| type        | The result type                                                                         |
| code        | The SMTP error code                                                                     |
| status      | SMTP status code (like "5.0.0")                                                         |
| description | Human readable description received over SMTP                                           |
| state       | State in the SMTP protocol during which the error occured                               |
| tags        | The tags of the message (semicolon separated)                                           |
