# Attempts log files

Every message that is sent to SMTPeter is logged in log files with the prefix
"attempts". You can download the content of these files in CSV, JSON, and XML
format using the [REST logfiles API](rest-logfiles) or the dashboard. 
These log files contain the following data in the respective order:

| Name       | Description                                                                                                             |
| -----------| ----------------------------------------------------------------------------------------------------------------------- |
| id         | The unique message id of the sent message                                                                               |
| time       | The time when the message was received by us (YYYY-MM-DD hh:mm:ss formatted)                                            |
| envelope   | The envelope of the message                                                                                             |
| recipient  | The recipient of the message                                                                                            |
| properties | The properties (preventscam, inlinecss, trackbounces, trackopens, and trackclicks) of the message (semicolon separated) |
| tags       | The tags of the message (semicolon separated)                                                                           |
| templateid | The id of the template that is used for this mailing (0 if no template is used or when it is not available)             |

## More information

* [REST non-send calls](./rest-other-calls)
* [REST retrieve events](./rest-events)
