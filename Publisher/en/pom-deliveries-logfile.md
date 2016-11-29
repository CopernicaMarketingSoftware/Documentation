Every mail sent via Publisher that is delivered is logged in the 
pom-deliveries log files. You can download the content of these files 
in CSV, JSON, and XML format using the [REST logfiles API](./logfiles-content),
or the dashboard. These log files contain the following data in the
respective order:

| Data | Description |
| ---- | ----------- |
| id | The id of the message that was delivered |
| time | The time of the delivery |
| attempts | The number of attempts needed before delivery was successful (starting from 0) |
| email | The email address of the delivery |
| tags | The tags of the mail (semicolon separated) |
| senderdomain | The sender domain name that was used |
| groupid | The ID of the group the mail belonged to |
