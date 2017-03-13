# Unsubscribe Record Information

Messages sent via Marketing Suite that triggered an unsubscribe are logged
in the the cdm-unsubscribe log files. You can download the content of these
files in CSV, JSON, and XML format using the [REST logfiles API](./rest-get-logfiles),
or the dashboard. These log files contain the following data in the
respective order:

| Data         | Description                                                        |
| ------------ | ------------------------------------------------------------------ |
| id           | The ID of the message that triggered the unsubscibe                |
| time         | The time when the unsubscribe was registered                       |
| email        | The email address of the the message the triggered the unsubscribe |
| tags         | The tags of the email (semicolon separated)                        |
| senderdomain | The sender domain who has sent the message                         |
| profile      | The ID of the profile                                              |
| subprofile   | The ID of the subprofile                                           |
| template     | The ID of the used template                                        |
