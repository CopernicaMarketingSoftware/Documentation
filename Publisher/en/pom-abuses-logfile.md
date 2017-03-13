# Abuse Record Information

Every message sent with Publisher that triggered an abuse message is 
logged in the pom-abuses log files. You can download the content of these
files in CSV, JSON, and XML format using the [REST logfiles API](rest-get-logfiles),
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
| groupid      | The emailing group the mail belonged to                      |
| profile      | The ID of the profile                                        |
| subprofile   | The ID of the subprofile                                     |
| template     | The ID of the used template                                  |
| document     | The ID of the used document                                  |
