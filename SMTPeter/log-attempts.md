# Attempts log files

Every message that is sent to SMTPeter is logged in log files with the prefix
"attempts". You can download the content of these files in CSV, JSON, and XML
format using the [REST logfiles API](rest-logfiles), or the dashboard. 
These log files contain the following data in the respective order:

| Data       | Description                                                                                                             |
| -----------| ----------------------------------------------------------------------------------------------------------------------- |
| id         | The unique message id of the sent message                                                                               |
| time       | The time when the message was received by us in the form YYYY-MM-DD hh:mm:ss                                            |
| envelope   | The envelope of the message                                                                                             |
| recipient  | The recipient of the message                                                                                            |
| properties | The properties (preventscam, inlinecss, trackbounces, trackopens, and trackclicks) of the message (semicolon separated) |
| tags       | The tags of the message (semicolon separated)                                                                           |
