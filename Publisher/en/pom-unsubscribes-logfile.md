# Unsubscribe Record Information

Messages sent via Publisher that triggered an unsubscribe are logged
in the the pom-unsubscribes log files. You can download the content of these
files in CSV, JSON, and XML format using the [REST logfiles API](rest-get-logfiles),
or the dashboard. These log files contain the following data in the
respective order:

| Data         | Description                                                        |
| ------------ | ------------------------------------------------------------------ |
| id           | The ID of the message that triggered the unsubscibe                |
| time         | The time when the unsubscribe was registered                       |
| email        | The email address of the the message the triggered the unsubscribe |
| tags         | The tags of the email (semicolon separated)                        |
| senderdomain | The sender domain who has sent the message                         |
| groupid      | The ID of the group the mail belonged to                           |
| profile      | The ID of the profile                                              |
| subprofile   | The ID of the sub profile                                          |
| template     | The ID of the used template                                        |
| document     | The ID of the used document                                        |
