Every message sent with Publisher that triggered an error is logged in the
pom-errors log files. You can download the content of these files in CSV,
JSON, and XML format using the [REST logfiles API](./logfiles-content),
or the dashboard. These log files contain the following data in the
respective order:


| Data | Description |
| ---- | ----------- |
| id | The id of the message that triggered the error |
| time | The time when the error was reported to us |
| type | The type of error |
| status |The status of the error |
| description | The description of the error |
| code | The error code |
| content |
| email | The email address to which the original message was sent 
| tags | The tags of the message (semicolon separated |
| senderdomain | The sender domain name that was used |
| groupid | The group ID the mail belonged to |
