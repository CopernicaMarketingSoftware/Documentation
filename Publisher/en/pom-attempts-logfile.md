Every message that is sent via Publisher is logged in the pom-attempts
log files. You can download the content of these files in CSV, JSON, and XML
format using the [REST logfiles API](./logfiles-content), or the dashboard. 
These log files contain the following data in the respective order:

| Data         | Description                               |
| ------------ | ----------------------------------------- |
| id           | A unique id that identifies each message  |
| time         | The time when the mail was sent           |
| groupid      | The id of the group the mail belongs to   |
| mailingid    | The id of the mailing                     |
| profileid    | The id of the profile                     |
| subprofileid | The id of the subprofile                  |
| databaseid   | The id of the database                    |
| collectionid | The id of the collection                  |
| senderdomain | The sender domain that was used           |
| templateid   | The ID of the used template               |
| documentid   | The ID of the used document               |
| tags         | The tags of the mail (semicolon separated |
| email        | The email to which the mail was sent      |
