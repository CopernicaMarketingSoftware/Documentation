# REST API: Impressie registratie in Marketing Suite

Elke impressie van berichten verstuurd met de Marketing Suite is
opgeslagen in de cdm-impression log files. Je kunt de 
inhoud hiervan downloaden in CSV, JSON en XML formaat. Zie "Meer informatie 
over logfiles" voor instructies van het opvragen hiervan. De logfiles 
bevatten de volgende informatie.

| Data         | Omschrijving                                      |
| ------------ | ------------------------------------------------- |
| id           | ID van het bericht                                |
| time         | Tijdstip van de impressie                         |
| ip           | IP adres van aanroepen impressie                  |
| header       | Header van het verzoek van de impressie           |
| email        | Email adres van de ontvanger                      |
| tags         | Tags van het bericht, gescheiden door puntkommas  |
| countrycode  | Code van het land waar de impressie gebeurde      |
| countryname  | Naam van het land waar de impressie gebeurde      |
| regioncode   | Code van de regio waar de impressie gebeurde      |
| city         | Naam van de stad waar de impressie gebeurde       |
| senderdomain | Domein van de verzender                           |
| profile      | ID van het profiel van de ontvanger               |
| subprofile   | Id van het subprofiel van de ontvanger            |
| template     | ID van de gebruikte template                      |

## Andere logfiles

* [Marketing suite algemeen log](./rest-cdm-attempts-logfiles)
* [Marketing suite misbruik log](./rest-cdm-abuses-logfile)
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
