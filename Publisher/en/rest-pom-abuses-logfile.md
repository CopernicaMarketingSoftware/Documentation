# Abuse Record Information

Every message sent with Publisher that triggered an abuse message is 
logged in the pom-abuses log files. You can download the content of these
files in CSV, JSON, and XML format using the [REST logfiles API](rest-get-logfiles),
or the dashboard. These log files contain the following data in the
respective order:


| Data         | Description                                                  |
| ------------ | ------------------------------------------------------------ |
| id           | The id of the mail that triggered the abuse                  |
| time         | The time when the abuse was reported                         |
| mail         | The abuse mail                                               |
| email        | The email address to which the original mail was sent        |
| tags         | The tags of the mail (semicolon separated)                   |
| senderdomain | The sender domain name from which the original mail was sent |
| groupid      | The emailing group the mail belonged to                      |
| profile      | The ID of the profile                                        |
| subprofile   | The ID of the subprofile                                     |
| template     | The ID of the used template                                  |
| document     | The ID of the used document                                  |

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
