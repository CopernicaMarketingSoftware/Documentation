# Error Record Information

Every message that triggered an error and was sent via Marketing Suite is 
logged in the cdm-error log files. You can download the content of these
files in CSV, JSON, and XML format using the [REST logfiles API](./rest-get-logfiles),
or the dashboard. These log files contain the following data in the
respective order:

| Data         | Description                                              |
| ------------ | -------------------------------------------------------- |
| id           | The id of the message that triggered the error           |
| time         | The time when the error was reported to us               |
| type         | The type of error                                        |
| status       | The status of the error                                  |
| description  | The description of the error                             |
| code         | The error code                                           |
| email        | The email address to which the original message was sent |
| tags         | The tags of the message (semicolon separated             |
| senderdomain | The sender domain name who has sent the message          |
| profile      | The ID of the profile                                    |
| subprofile   | The ID of the subprofile                                 |
| template     | The ID of the used template                              |
