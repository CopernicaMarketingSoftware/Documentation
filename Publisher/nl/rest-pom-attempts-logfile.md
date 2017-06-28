# REST API: Algemene Marketing Suite informatie

Elk bericht dat wordt verstuurd via Marketing Suite wordt opgeslagen in de 
cdm-attempts logfiles. Je kunt deze downloaden in CSV, JSON of XML formaat.
Instructies hiervoor kun je vinden onder "Meer informatie over logfiles", 
of je kunt ze via het dashboard downloaden. De logfiles bevatten de volgende 
informatie. 

| Data         | Omschrijving                                  |
| ------------ | ----------------------------------------------|
| id           | ID van het bericht                            |
| time         | Tijdstip van verzending                       |
| mailingid    | ID van de mailing                             |
| profileid    | ID van het profiel van de ontvanger           |
| subprofileid | ID van het subprofiel van de ontvanger        |
| databaseid   | ID van de database                            |
| collectionid | ID van de collectie                           |
| senderdomain | Domein van de verzender                       |
| templateid   | ID van de template                            |
| tags         | Tags van de email, gescheiden met puntkomma's |
| email        | Email van de ontvanger                        |

## Andere logfiles

** [Marketing Suite algemeen log](./rest-cdm-attempts-logfile)
* [Marketing Suite misbruik log](./rest-cdm-abuse-logfile)
* [Marketing Suite click log](./rest-cdm-click-logfile)
* [Marketing Suite ontvangst log](./rest-cdm-delivery-logfile)
* [Marketing Suite error log](./rest-cdm-error-logfile)
* [Marketing Suite impressies log](./rest-cdm-impression-logfile)
* [Marketing Suite herzendingen log](./rest-cdm-retry-logfile)
* [Marketing Suite uitschrijvingen log](./rest-cdm-unsubscribe-logfile)
* [Publisher misbruik log](./rest-pom-abuse-logfile)
* [Publisher clicks log](./rest-pom-clicks-logfile)
* [Publisher ontvangst log](./rest-pom-delivery-logfile)
* [Publisher error log](./rest-pom-error-logfile)
* [Publisher impressies log](./rest-pom-impression-logfile)
* [Publisher herzendingen log](./rest-pom-retry-logfile)
* [Publisher uitschrijvingen log](./rest-pom-unsubscribe-logfile)

## Meer informatie over logfiles

* [Overzicht van alle API calls](rest-api)
* [GET logfiles names](rest-get-logfiles-names)
* [GET logfiles JSON](./rest-get-logfiles-json.md)
* [GET logfiles CSV](./rest-get-logfiles-csv.md)
* [GET logfiles XML](./rest-get-logfiles-xml.md)
