# Attempts Record Information

Every message that is sent via Publisher is logged in the pom-attempts
log files. Each record represents one single attempt to deliver an email, 
no matter the end result. If you are only interested in the deliveries 
you can find them in the [cdm-delivery logfile](./rest-cdm-delivery). 
You can download the content of these files in CSV, JSON, and XML
format using the [REST logfiles API](rest-get-logfiles), or the dashboard. 
These log files contain the following data in the respective order:

| Data         | Description                               |
| ------------ | ----------------------------------------- |
| id           | A unique ID that identifies each message  |
| time         | The time when the mail was sent           |
| groupid      | The ID of the group the mail belongs to   |
| mailingid    | The ID of the mailing                     |
| profileid    | The ID of the profile                     |
| subprofileid | The ID of the subprofile                  |
| databaseid   | The ID of the database                    |
| collectionid | The ID of the collection                  |
| senderdomain | The sender domain that was used           |
| templateid   | The ID of the used template               |
| documentid   | The ID of the used document               |
| tags         | The tags of the mail (semicolon separated)|
| email        | The email to which the mail was sent      |

## Other logfile names

* [Marketing Suite general log](./rest-cdm-attempts-logfile)
* [Marketing Suite abuse log](./rest-cdm-abuse-logfile)
* [Marketing Suite click log](./rest-cdm-click-logfile)
* [Marketing Suite delivery log](./rest-cdm-delivery-logfile)
* [Marketing Suite error log](./rest-cdm-error-logfile)
* [Marketing Suite impressions log](./rest-cdm-impression-logfile)
* [Marketing Suite retry log](./rest-cdm-retry-logfile)
* [Marketing Suite unsubscribe log](./rest-cdm-impression-logfile)
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
