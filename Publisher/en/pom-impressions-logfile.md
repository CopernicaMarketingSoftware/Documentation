# Impression Record Information

Every impression from messages sent via Publisher is logged in the
pom-impressions log files. You can download the content of these files in
CSV, JSON, and XML format using the [REST logfiles API](rest-get-logfiles),
or the dashboard. These log files contain the following data in the respective
order:


| Data         | Description |
| ------------ | ----------------------------------------------------------- |
| id           | The ID of the messsage the triggered the impression         |
| time         | The time of the impression                                  |
| ip           | The IP address that triggered the impression                |
| header       | The header of the impression request                        |
| email        | The email address to which the original mail was sent       |
| tags         | The tags of the mail (semicolon separated)                  |
| countrycode  | The code of the country in which the impression took place  |
| countryname  | The name of the country in which the impression took place  |
| regioncode   | The code of the region in which the impression took place   |
| city         | The city in which the impression took place                 |
| senderdomain | The sender domain from which the original mail was sent     |
| groupid      | The ID of the group the mail belonged to                    |
| profile      | The ID of the profile                                       |
| subprofile   | The ID of the sub profile                                   |
| template     | The ID of the used template                                 |
| document     | The Id of the used document                                 |
