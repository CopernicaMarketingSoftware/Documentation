Every message sent with Marketing Suite that triggered an abuse message is 
logged in the cdm-abuse log files. You can download the content of these
files in CSV, JSON, and XML format using the [REST logfiles API](./logfiles-content),
or the dashboard. These log files contain the following data in the
respective order:

| Data         | Description                                                  |
| ------------ | ------------------------------------------------------------ |
| id           | The id of the mail that triggered the abuse                  |
| time         | The time when the abuse was reported                         |
| mail         | The abuse mail                                               |
| email        | The email address to which the original mail was sent        |
| tags         | The tags of the mail (semicolon separated)                   |
| senderdomain | The sender domain name from which the original mail was sent |
| profile      | The profile ID                                               |
| subprofile   | The subprofile ID                                            |
| template     | The ID of the used template                                  |
