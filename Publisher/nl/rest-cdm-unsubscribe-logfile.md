# REST API: Geregistreerde uitschrijvingen in Marketing Suite

Berichten verzonden via Marketing Suite die een uitschrijving hebben veroorzaakt 
worden bijgehouden in de cdm-unsubscribe log files. Je kunt de 
inhoud hiervan downloaden in CSV, JSON en XML formaat. Zie "Meer informatie 
over logfiles" voor instructies van het opvragen hiervan. De logfiles 
bevatten de volgende informatie.

| Data         | Omschrijving                                  |
| ------------ | --------------------------------------------- |
| id           | ID van het bericht                            |
| time         | Tijdstip van uitschrijving                    |
| email        | Emailadres van de ontvanger                   |
| tags         | Tags van de mail, gescheiden door puntkommas  |
| senderdomain | Domein van de verzender                       |
| profile      | ID van het profiel                            |
| subprofile   | ID van het subprofiel                         |
| template     | ID van de gebruikte template                  |

## Andere logfiles

* [Marketing Suite algemeen log](./rest-cdm-attempts-logfile)
* [Marketing Suite misbruik log](./rest-cdm-abuse-logfile)
* [Marketing Suite click log](./rest-cdm-click-logfile)
* [Marketing Suite ontvangst log](./rest-cdm-delivery-logfile)
* [Marketing Suite error log](./rest-cdm-error-logfile)
* [Marketing Suite impressies log](./rest-cdm-impression-logfile)
* [Marketing Suite herzendingen log](./rest-cdm-retry-logfile)
* [Publisher algemeen log](./rest-pom-attempts-logfile)
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
