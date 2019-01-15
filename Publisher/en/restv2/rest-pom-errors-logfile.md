# Errors Record Information

Every message sent with Publisher that triggered an error is logged in the
pom-errors log files. You can download the content of these files in CSV,
JSON, and XML format using the [REST logfiles API](rest-get-logfiles),
or the dashboard. These log files contain the following data in the
respective order:


| Data         | Description                                              |
| ------------ | -------------------------------------------------------- |
| id           | The ID of the message that triggered the error           |
| time         | The time when the error was reported to us               |
| type         | The type of error                                        |
| status       | The status of the error                                  |
| description  | The description of the error                             |
| code         | The error code                                           |
| content      | The content of the error message                         |
| email        | The email address to which the original message was sent |
| tags         | The tags of the message (semicolon separated             |
| senderdomain | The sender domain name that was used                     |
| groupid      | The group ID the mail belonged to                        |
| profile      | The ID of the profile                                    |
| subprofile   | The ID of the sub profile                                |
| template     | The ID of the used template                              |
| document     | The ID of the used document                              |

## Other logfile names

* [Marketing Suite general log](./rest-cdm-attempts-logfile)
* [Marketing Suite abuse log](./rest-cdm-abuse-logfile)
* [Marketing Suite click log](./rest-cdm-click-logfile)
* [Marketing Suite delivery log](./rest-cdm-delivery-logfile)
* [Marketing Suite error log](./rest-cdm-error-logfile)
* [Marketing Suite impressions log](./rest-cdm-impression-logfile)
* [Marketing Suite retry log](./rest-cdm-retry-logfile)
* [Marketing Suite unsubscribe log](./rest-cdm-impression-logfile)
* [Publisher general log](./rest-pom-attempts-logfile)
* [Publisher abuse log](./rest-pom-abuses-logfile)
* [Publisher clicks log](./rest-pom-clicks-logfile)
* [Publisher delivery log](./rest-pom-deliveries-logfile)
* [Publisher impressions log](./rest-pom-impressions-logfile)
* [Publisher retry log](./rest-pom-retries-logfile)
* [Publisher unsubscribe log](./rest-pom-unsubscribes-logfile)

## More information on logfiles

* [List of all API calls](rest-api)
* [GET logfiles names](rest-get-logfiles-names)
* [GET logfiles JSON](./rest-get-logfiles-json.md)
* [GET logfiles CSV](./rest-get-logfiles-csv.md)
* [GET logfiles XML](./rest-get-logfiles-xml.md)
