# REST API: Impression Record Information

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
* [Publisher clicks log](./rest-pom-clicks-logfile)
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
