# Impression Record Information

Every impression from messages sent via Marketing Suite is
logged in the cdm-impression log files. You can download the content of these
files in CSV, JSON, and XML format using the [REST logfiles API](rest-get-logfiles),
or the dashboard. These log files contain the following data in the
respective order:

| Data         | Description                                             |
| ------------ | ------------------------------------------------------- |
| id           | The ID of the messsage the triggered the impression     |
| time         | The time when the impression took place                 |
| ip           | The IP address from which the impression was triggered  |
| header       | The header of the request for the impression            |
| email        | The email address to which the original mail was sent   |
| tags         | The tags of the mail (semicolon separated)              |
| countrycode  | The country code in which the impression took place     |
| countryname  | The country name in which the impression took place     |
| regioncode   | The region code in which the impressiosn took place     |
| city         | The city in which the impression took place             |
| senderdomain | The sender domain from which the original mail was sent |
| profile      | The ID of the profile                                   |
| subprofile   | The ID of the subprofile                                |
| template     | The ID of the used template                             |
