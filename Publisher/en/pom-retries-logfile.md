# Retry Record Information

For messages sent via Publisher that could not directly be delivered
we retry the delivery. These retries are logged  in the the pom-retries log
files. You can download the content of these files in CSV, JSON, and XML
format using the [REST logfiles API](rest-get-logfiles),
or the dashboard. These log files contain the following data in the
respective order:


| Data         | Description                                               |
| ------------ | --------------------------------------------------------- |
| id           | The ID of the message for which we retry a delivery       |
| time         | The time of the retry                                     |
| attempts     | The number of retries so far (counting form 0)            |
| email        | The email address of the original mail for which we retry | 
| tags         | The tags of the mail (semicolon separated)                |
| senderdomain | The sender domain who sent the original mail              |
| groupid      | The ID of the group the mail belongs to                   |
| profile      | The ID of the profile                                     |
| subprofile   | The ID of the subprofile                                  |
| template     | The ID of the used template                               |
| document     | The ID of the used document                               |
