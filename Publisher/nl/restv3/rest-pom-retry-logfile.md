# Herzend registratie in Publisher

Als een bericht uit Publisher niet meteen aankomt proberen we het 
opnieuw te verzenden, deze herzendingen worden bijgehouden in de "pom-retry" 
logfiles. Elke nieuwe poging om het bericht af te leveren wordt bijgehouden 
in deze logfile. Je kunt de inhoud hiervan downloaden in CSV, JSON en XML formaat. 
Zie "Meer informatie over logfiles" voor instructies van het opvragen hiervan. 
De logfiles bevatten de volgende informatie.

| Data         | Omschrijving                                  |
| ------------ | --------------------------------------------- |
| id           | ID van het bericht                            |
| time         | Tijdstip van de verzendpoging                 |
| attempt      | Aantal pogingen tot tijdstip van de poging    |
| email        | E-mailadres van de ontvanger                  |
| tags         | Tags van de mail, gescheiden door puntkomma's |
| senderdomain | Domein van de verzender                       |
| profile      | ID van het profiel van de ontvanger           |
| subprofile   | ID van het subprofiel van de ontvanger        |
| template     | ID van het gebruikte template                 |

## Andere logfiles

* [Marketing suite algemeen log](./rest-cdm-attempts-logfiles)
* [Marketing suite misbruik log](./rest-cdm-abuse-logfile)
* [Marketing suite click log](./rest-cdm-click-logfile)
* [Marketing suite ontvangst log](./rest-cdm-delivery-logfile)
* [Marketing suite error log](./rest-cdm-error-logfile)
* [Marketing suite impressies log](./rest-cdm-impression-logfile)
* [Marketing suite herzendingen log](./rest-cdm-retry-logfile)
* [Marketing suite uitschrijvingen log](./rest-cdm-unsubscribe-logfile)
* [Publisher algemeen log](./rest-pom-attempts-logfile)
* [Publisher misbruik log](./rest-pom-abuse-logfile)
* [Publisher clicks (nieuwe stijl) log](./rest-pom-clicks-logfile)
* [Publisher clicks (oude stijl) log](./rest-pom-clicks-logfile)
* [Publisher ontvangst log](./rest-pom-delivery-logfile)
* [Publisher error log](./rest-pom-error-logfile)
* [Publisher impressies log](./rest-pom-impression-logfile)
* [Publisher uitschrijvingen log](./rest-pom-unsubscribe-logfile)


## Meer informatie over logfiles

* [Overzicht van alle API calls](rest-api)
* [Vraag namen van logfiles op](rest-get-logfiles-names)
* [Een logfile downloaden in JSON formaat](./rest-get-logfiles-json.md)
* [Een logfile downloaden in CSV formaat](./rest-get-logfiles-csv.md)
* [Een logfile downloaden in XML formaat](./rest-get-logfiles-xml.md)
