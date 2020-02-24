# Impression Record Information

Every impression from messages sent via Publisher is logged in the
pom-impressions log files. Each record represents the opening 
of an email by a destination, which means there can be multiple impressions
for a single destination.
You can download the content of these files in CSV, JSON, and XML format 
using the [REST logfiles API](rest-get-logfiles), or the dashboard. 
These log files contain the following data in the respective order:

| Data         | Description                                                 |
| ------------ | ----------------------------------------------------------- |
| id           | The ID of the message the triggered the impression          |
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
| subprofile   | The ID of the subprofile                                    |
| template     | The ID of the used template                                 |
| document     | The ID of the used document                                 |

## Other logfile names

* [Marketing Suite general log](./rest-cdm-attempts-logfile)
* [Marketing Suite abuse log](./rest-cdm-abuse-logfile)
* [Marketing Suite click log](./rest-cdm-click-logfile)
* [Marketing Suite delivery log](./rest-cdm-delivery-logfile)
* [Marketing Suite error log](./rest-cdm-error-logfile)
* [Marketing Suite retry log](./rest-cdm-retry-logfile)
* [Marketing Suite unsubscribe log](./rest-cdm-impression-logfile)
* [Publisher general log](./rest-pom-attempts-logfile)
* [Publisher abuse log](./rest-pom-abuses-logfile)
* [Publisher clicks (new style) log](./rest-pom-clicks-logfile)
* [Publisher clicks (old style) log](./rest-pom-clicks-old-logfile)
* [Publisher delivery log](./rest-pom-deliveries-logfile)
* [Publisher error log](./rest-pom-errors-logfile)
* [Publisher impressions log](./rest-pom-impressions-logfile)
* [Publisher retry log](./rest-pom-retries-logfile)
* [Publisher unsubscribe log](./rest-pom-unsubscribes-logfile)

## More information on logfiles

* [List of all API calls](rest-api)
* [GET logfiles names](rest-get-logfiles-names)
* [GET logfiles JSON](./rest-get-logfiles-json.md)
* [GET logfiles CSV](./rest-get-logfiles-csv.md)
* [GET logfiles XML](./rest-get-logfiles-xml.md)
