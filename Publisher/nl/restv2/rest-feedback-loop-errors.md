# Webhooks error information

[Webhooks](./webhooks), voorheen feedback loops, kunnen errors 
veroorzaken. In de 'feedback-loop-error' logfiles vind je deze errors, met 
de volgende informatie beschikbaar voor elke fout:


| Data         | Description                                               |
| ------------ | --------------------------------------------------------- |
| time         | Tijdstip van de error                                     |
| response     | De HTTP status code                                       |
| recipient    | De IP waar de error veroorzaakt werd                      |
| header       | De header van de error response                           |

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
* [Publisher retries log](./rest-pom-retry-logfile)
* [Publisher uitschrijvingen log](./rest-pom-unsubscribe-logfile)


## Meer informatie over log files

* [Overzicht van alle API calls](rest-api)
* [Vraag namen van logfiles op](rest-get-logfiles-names)
* [Een logfile downloaden in JSON formaat](./rest-get-logfiles-json.md)
* [Een logfile downloaden in CSV formaat](./rest-get-logfiles-csv.md)
* [Een logfile downloaden in XML formaat](./rest-get-logfiles-xml.md)
