# Attempts Record Information

Every message that is sent via Marketing Suite is logged in the cdm-attempts
log files. You can download the content of these files in CSV, JSON, and XML
format using the [REST logfiles API](./rest-get-logfiles), or the dashboard. 
These log files contain the following data in the respective order:

| Data         | Description                                |
| ------------ | ------------------------------------------ |
| id           | A unique id that identifies each message   |
| time         | The time when the mail was sent            |
| mailingid    | The id of the mailing                      |
| profileid    | The id of the profile                      |
| subprofileid | The id of the subprofile                   |
| databaseid   | The id of the database                     |
| collectionid | The id of the collection                   |
| senderdomain | The sender domain that was used            |
| templateid   | The template id                            |
| tags         | The tags of the mail (semicolon separated) |
| email        | The email to which the mail was sent       |

## Other logfile names

* [Marketing suite abuse log](./rest-cdm-abuse-logfile)
* [Marketing suite click log](./rest-cdm-click-logfile)
* [Marketing suite delivery log](./rest-cdm-delivery-logfile)
* [Marketing suite error log](./rest-cdm-error-logfile)
* [Marketing suite impressions log](./rest-cdm-impression-logfile)
* [Marketing suite retry log](./rest-cdm-retry-logfile)
* [Marketing suite unsubscribe log](./rest-cdm-impression-logfile)
* [Publisher general log](./rest-pom-attempts-logfile)
* [Publisher abuse log](./rest-pom-abuses-logfile)
* [Publisher clicks log](./rest-pom-clicks-logfile)
* [Publisher delivery log](./rest-pom-deliveries-logfile)
* [Publisher error log](./rest-pom-errors-logfile)
* [Publisher impressions log](./rest-pom-impressions-logfile)
* [Publisher retry log](./rest-pom-retries-logfile)
* [Publisher unsubscribe log](./rest-pom-unsubscribes-logfile)


## More information on logfiles

* [List of all API calls](rest-api)
* [Get names of log files](rest-get-logfiles-names)
* [Downloading a logfile in JSON format](./rest-get-logfiles-json.md)
* [Downloading a logfile in CSV format](./rest-get-logfiles-csv.md)
* [Downloading a logfile in XML format](./rest-get-logfiles-xml.md)
