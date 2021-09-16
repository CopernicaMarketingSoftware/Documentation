# Abuse Record Information

Every message sent with Marketing Suite that triggered an abuse message is 
logged in the cdm-abuse log files. Abuse messages are triggered when someone 
reports your emailing as spam. This lowers your [sender reputation](../sender-reputation), 
which can in turn lead to poor deliverability. You can download the content of these
files in CSV, JSON, and XML format using the [REST logfiles API](rest-get-logfiles),
or the dashboard. These log files contain the following data in the
respective order:

| Data         | Description                                                  |
| ------------ | ------------------------------------------------------------ |
| id           | The ID of the mail that triggered the abuse                  |
| time         | The time when the abuse was reported                         |
| mail         | The abuse mail                                               |
| email        | The email address to which the original mail was sent        |
| tags         | The tags of the mail (semicolon separated)                   |
| senderdomain | The sender domain name from which the original mail was sent |
| profile      | The profile ID                                               |
| subprofile   | The subprofile ID                                            |
| template     | The ID of the used template                                  |

## Other logfile names

* [Marketing Suite general log](./rest-cdm-attempts-logfile)
* [Marketing Suite click log](./rest-cdm-click-logfile)
* [Marketing Suite delivery log](./rest-cdm-delivery-logfile)
* [Marketing Suite error log](./rest-cdm-error-logfile)
* [Marketing Suite impressions log](./rest-cdm-impression-logfile)
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
