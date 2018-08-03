# Abuses log files

SMTPeter can receive abuse reports that are triggered by your mail. If we
receive such a report we store the information in a logfile with prefix
"abuses". You can download the content of these files in CSV, JSON, and XML
format using the [REST logfiles API](rest-logfiles) or the dashboard. 
These log files contain the following data in the respective order:

| Name       | Description                                                                                                             |
| -----------| ----------------------------------------------------------------------------------------------------------------------- |
| id         | The unique message id of the sent message that triggered the abuse                                                      |
| time       | The time when the message was received by us (YYYY-MM-DD hh:mm:ss formatted)                                            |
| envelope   | The envelope of the message                                                                                             |
| recipient  | The recipient of the original message                                                                                   |
| tags       | The tags of the original message (semicolon separated)                                                                  |
| templateid | The id of the template that is used for the original message (0 if no template is used or when it is not available)     |

## More information

* [REST non-send calls](./rest-other-calls)
* [REST retrieve events](./rest-events)
