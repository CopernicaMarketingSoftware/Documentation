# REST API: Click registratie in de Marketing Suite

Waarschuwing: Je bekijkt nu het overzicht voor de oude versie van onze 
API. Wij raden aan om [versie 2](../restv2/rest-api.md) van de API te gebruiken.

Elke klik op een link in de berichten verstuurd met de Marketing Suite is
opgeslagen in de cdm-click log files. Je kunt de 
inhoud hiervan downloaden in CSV, JSON en XML formaat. Zie "Meer informatie 
over logfiles" voor instructies van het opvragen hiervan. De logfiles 
bevatten de volgende informatie.

| Data         | Omschrijving                                     |
| ------------ | -------------------------------------------------|
| id           | ID van het geklikte bericht                      |
| senderdomain | Domein van de verzender                          |
| time         | Tijdstip van de click                            |
| linkinfo     | ID van de geklikte link                          |
| ip           | IP adres van de klikker                          |
| header       | Header van de request van de klik                |
| email        | Email van de oorspronkelijke ontvanger           |
| tags         | Tags van het bericht, gescheiden door puntkommas |
| countrycode  | Code van het land waarin geklikt werd            |
| countryname  | Naam van het land waarin geklikt werd            |
| regioncode   | Code van de regio waarin geklikt werd            |
| city         | Naam van de stad waarin geklikt werd             |
| profile      | ID van het profiel van de ontvanger              |
| subprofile   | ID van het subprofiel van de ontvanger           |
| template     | ID van het gebruikte template                    |

## Andere logfiles

* [Marketing suite algemeen log](./rest-cdm-attempts-logfile)
* [Marketing suite misbruik log](./rest-cdm-abuse-logfile)
* [Marketing suite ontvangst log](./rest-cdm-delivery-logfile)
* [Marketing suite error log](./rest-cdm-error-logfile)
* [Marketing suite impressies log](./rest-cdm-impression-logfile)
* [Marketing suite herzendingen log](./rest-cdm-retry-logfile)
* [Marketing suite uitschrijvingen log](./rest-cdm-unsubscribe-logfile)
* [Publisher algemeen log](./rest-pom-attempts-logfile)
* [Publisher misbruik log](./rest-pom-abuse-logfile)
* [Publisher clicks log](./rest-pom-clicks-logfile)
* [Publisher ontvangst log](./rest-pom-delivery-logfile)
* [Publisher error log](./rest-pom-error-logfile)
* [Publisher impressies log](./rest-pom-impression-logfile)
* [Publisher herzendingen log](./rest-pom-retry-logfile)
* [Publisher uitschrijvingen log](./rest-pom-unsubscribe-logfile)


## Meer informatie over log files

* [Overzicht van alle API calls](rest-api)
* [Vraag namen van logfiles op](rest-get-logfiles-names)
* [Een logfile downloaden in JSON formaat](./rest-get-logfiles-json.md)
* [Een logfile downloaden in CSV formaat](./rest-get-logfiles-csv.md)
* [Een logfile downloaden in XML formaat](./rest-get-logfiles-xml.md)
