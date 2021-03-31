# Geregistreerd misbruik in de Marketing Suite

Elk bericht dat verstuurd is met Marketing Suite en een misbruiknotificatie 
heeft veroorzaakt wordt opgeslagen in de "cdm-abuse" logfiles. Zogenaamde abuses 
worden getriggerd wanneer iemand jouw e-mail rapporteert als spam. Dit verlaagt 
je [verzendreputatie](../send-reputation), wat weer kan leiden tot 
slechte *deliverability*. Je kunt dan merken dat je e-mails minder vaak aankomen. 
Je kunt de inhoud van deze logfile downloaden in CSV, JSON en XML formaat. 
Zie het kopje "Meer informatie over logfiles" voor instructies van het opvragen hiervan. 
De logfiles bevatten de volgende informatie:

| Data         | Omschrijving                                                 |
| ------------ | ------------------------------------------------------------ |
| id           | ID van de mail                                               |
| time         | Tijd van rapporteren misbruik                                |
| mail         | Betreffende mail                                             |
| email        | E-mailadres van de ontvanger                                 |
| tags         | Tags van de mail, gescheiden met puntkomma's                 |
| senderdomain | Domein naam van de verzender                                 |
| profile      | ID van het profiel van de ontvanger                          |
| subprofile   | ID van het subprofiel van de ontvanger                       |
| template     | ID van de gebruikte template                                 |

## Andere logfiles

* [Marketing Suite algemeen log](./rest-cdm-attempts-logfile)
* [Marketing Suite click log](./rest-cdm-click-logfile)
* [Marketing Suite ontvangst log](./rest-cdm-delivery-logfile)
* [Marketing Suite error log](./rest-cdm-error-logfile)
* [Marketing Suite impressies log](./rest-cdm-impression-logfile)
* [Marketing Suite herzendingen log](./rest-cdm-retry-logfile)
* [Marketing Suite uitschrijvingen log](./rest-cdm-unsubscribe-logfile)
* [Publisher algemeen log](./rest-pom-attempts-logfile)
* [Publisher misbruik log](./rest-pom-abuse-logfile)
* [Publisher clicks (nieuwe stijl) log](./rest-pom-clicks-logfile)
* [Publisher clicks (oude stijl) log](./rest-pom-clicks-logfile)
* [Publisher ontvangst log](./rest-pom-delivery-logfile)
* [Publisher error log](./rest-pom-error-logfile)
* [Publisher impressies log](./rest-pom-impression-logfile)
* [Publisher herzendingen log](./rest-pom-retry-logfile)
* [Publisher uitschrijvingen log](./rest-pom-unsubscribe-logfile)

## Meer informatie over log files

* [Overzicht van alle API-calls](rest-api)
* [Vraag namen van logfiles op](rest-get-logfiles-names)
* [Een logfile downloaden in JSON-formaat](./rest-get-logfiles-json.md)
* [Een logfile downloaden in CSV-formaat](./rest-get-logfiles-csv.md)
* [Een logfile downloaden in XML-formaat](./rest-get-logfiles-xml.md)
