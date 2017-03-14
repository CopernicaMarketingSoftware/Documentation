# REST API: Geregistreerd misbruik in de Marketing Suite

Elk bericht dat verstuurd is met Marketing suite en een misbruik notificatie 
heeft veroorzaakt wordt opgeslagen in de cdm-abuse log files. Je kunt de 
inhoud hiervan downloaden in CSV, JSON en XML formaat. Zie "Meer informatie 
over logfiles" voor instructies van het opvragen hiervan. De logfiles 
bevatten de volgende informatie.

| Data         | Omschrijving                                                 |
| ------------ | ------------------------------------------------------------ |
| id           | ID van de mail                                               |
| time         | Tijd van rapporteren misbruik                                |
| mail         | Betreffende mail                                             |
| email        | Email adres van de ontvanger                                 |
| tags         | Tags van de mail, gescheiden met puntkomma's                 |
| senderdomain | Domein naam van de verzender                                 |
| profile      | ID van het profiel van de ontvanger                          |
| subprofile   | ID van het subprofiel van de ontvanger                       |
| template     | ID van de gebruikte template                                 |

## Andere logfiles

* [Marketing suite algemeen log](./rest-cdm-attempts-logfiles)
* [Marketing suite click log](./rest-cdm-click-logfile)
* [Marketing suite ontvangst log](./rest-cdm-delivery-logfile)
* [Marketing suite error log](./rest-cdm-error-logfile)
* [Marketing suite impressies log](./rest-cdm-impression-logfile)
* [Marketing suite herzendingen log](./rest-cdm-retry-logfile)
* [Marketing suite uitschrijvingen log](./rest-cdm-unsubscribes-logfile)
* [Publisher algemeen log](./rest-pom-attempts-logfile)
* [Publisher misbruik log](./rest-pom-abuses-logfile)
* [Publisher clicks log](./rest-pom-clicks-logfile)
* [Publisher ontvangst log](./rest-pom-deliveries-logfile)
* [Publisher error log](./rest-pom-errors-logfile)
* [Publisher impressies log](./rest-pom-impressions-logfile)
* [Publisher herzendingen log](./rest-pom-retries-logfile)
* [Publisher uitschrijvingen log](./rest-pom-unsubscribes-logfile)


## Meer informatie over log files

* [Overzicht van alle API calls](rest-api)
* [Vraag namen van logfiles op](rest-get-logfiles-names)
* [Een logfile downloaden in JSON formaat](./rest-get-logfiles-json.md)
* [Een logfile downloaden in CSV formaat](./rest-get-logfiles-csv.md)
* [Een logfile downloaden in XML formaat](./rest-get-logfiles-xml.md)
