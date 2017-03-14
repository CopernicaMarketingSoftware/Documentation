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

## Other logfile names

* [Marketing suite general log](./rest-cdm-attempts-logfiles)
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
* [Publisher unsubscribe log](./rest-pom-unsubscribes-logfile)


## More information on logfiles

* [List of all API calls](rest-api)
* [Get names of log files](rest-get-logfiles-names)
* [Downloading a logfile in JSON format](./rest-get-logfiles-json.md)
* [Downloading a logfile in CSV format](./rest-get-logfiles-csv.md)
* [Downloading a logfile in XML format](./rest-get-logfiles-xml.md)
