# Attempts log files

Every message that is sent to SMTPeter shows up in the attempts log files.
The available information in theses log files is:

* id
* receive
* envelope
* recipient
* properties
* tags


## The attempts CSV log file

A [downloaded](rest-logfiles) attempts log file has the CSV format and
contains the following data in the respective order:

| Data       | Description                                                                                                             |
| -----------| ----------------------------------------------------------------------------------------------------------------------- |
| id         | The unique message id of the sent message                                                                               |
| received   | The time when the message was received by us in the form YYYY-MM-DD hh:mm:ss                                            |
| envelope   | The envelope of the message                                                                                             |
| recipient  | The recipient of the message                                                                                            |
| properties | The properties (preventscam, inlinecss, trackbounces, trackopens, and trackclicks) of the message (semicolon separated) |
| tags       | The tags of the message (semicolon separated)                                                                           |
