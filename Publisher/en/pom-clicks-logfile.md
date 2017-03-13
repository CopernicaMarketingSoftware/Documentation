Every click on every link from messages sent via Publisher is
logged in the pom-clicks log files. You can download the content of these
files in CSV, JSON, and XML format using the [REST logfiles API](./logfiles-content),
or the dashboard. These log files contain the following data in the
respective order:

| Data         | Description                                             |
| ------------ | ------------------------------------------------------- |
| id           | The ID of the message from which was clicked            |
| time         | The time when the click occurred                        |
| ip           | The IP address that clicked                             |
| header       | The header of the request form the click                |
| email        | The email address to which the mail was originally sent |
| tags         | The tags of the message (semicolon separated)           |
| countrycode  | The code of the country in which the click occurred     |
| countryname  | The name of the country in which the click occurred     |
| regioncode   | The code of the region in which the click occurred      |
| city         | The name of the city in which the click occurred        |
| linkinfo     | The link ID                                             |
| senderdomain | The sender domain from which the message was sent       |
| groupid      | The ID of the group to which the mail belonged to       |
| profile      | The ID of the profile                                   |
| subprofile   | The ID of the subprofile                                |
| template     | The ID of the used template                             |
| document     | The ID of the used document                             |
