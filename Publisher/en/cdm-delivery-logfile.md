# Delivery Record Information

Every mail sent via Marketing Suite that is delivered is logged in the 
cdm-delivery log files. You can download the content of these files 
in CSV, JSON, and XML format using the [REST logfiles API](./rest-get-logfiles),
or the dashboard. These log files contain the following data in the
respective order:

| Data         | Description                                                                    |
| ------------ | ------------------------------------------------------------------------------ |
| id           | The id of the message that was delivered                                       |
| time         | The time of the delivery                                                       |
| attempts     | The number of attempts needed before delivery was successful (starting from 0) |
| email        | The email address of the delivery                                              |
| tags         | The tags of the mail (semicolon separated)                                     |
| senderdomain | The sender domain name who sent the original mail                              |
| profile      | The ID of the profile                                                          |
| subprofile   | The ID of the subprofile                                                       |
| template     | The ID of the used template                                                    |
