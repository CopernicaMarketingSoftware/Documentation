# Smarty-functies

Wanneer je personalisatie toepast door middel van Smarty-code kun je gebruik maken van verschillende functies. 
Een aantal van die functies zijn specifiek aan Copernica. 

De meeste functies bestaan uit een open- en sluittag. De gebruikte code beïnvloed de tekst binnen die twee tags.
De mailonly-tag is hiervan een voorbeeld:

```
{mailonly}
    Klik <a href="{webversion}">hier</a> voor de webversie
{/mailonly}
```

De bovenstaande code zorgt ervoor dat tekst alleen getoond wordt wanneer een gebruiker de nieuwsbrief vanuit zijn e-mailclient bekijkt.

## Copernica-specifieke functies

| Naam                                                                  | Omschrijving                                                                 |
|-----------------------------------------------------------------------|------------------------------------------------------------------------------|
| [{condition}](./personalization-functions-condition)                  | Conditioneel blok op basis van JavaScript                                    |
| [{fetch}](./personalization-functions-fetch)                          | Inladen van extern gehoste content                                      |
| [{in_miniselection}](./personalization-functions-in_miniselection)    | Blok dat alleen getoond wordt indien het subprofiel tot een miniselectie behoort |
| [{in_selection}](./personalization-functions-in_selection)            | Blok dat alleen getoond wordt indien het profiel tot een selectie behoort        |
| [{linkfile}](./personalization-functions-linkfile)                    | Linken naar een bestand                                                      |
| [{linkpdf}](./personalization-functions-linkpdf)                      | Linken naar een PDF-bestand                                                  |
| [{loadfeed}](./personalization-functions-loadfeed)                    | Inladen van een externe RSS-feed                                             |
| [{loadfile}](./personalization-functions-loadfile)                    | Inladen van een bestand                                                      |
| [{loadprofile}](./personalization-functions-loadprofile)              | Inladen van een profiel                                                      |
| [{loadsubprofile}](./personalization-functions-loadsubprofile)        | Inladen van een subprofiel                                                   |
| [{mailonly}](./personalization-functions-mailonly)                    | Blok markeren dat alleen in de mailversie getoond wordt                    |
| [{$smarty.now}](./smarty-date)                                        | Datumvariabele                                                              |
| [{survey}](./personalization-functions-survey)                        | Inladen van een enquête                                                      |
| [{unsubscribe}](./personalization-functions-unsubscribe)              | Uitschrijflink                                       |
| [{webform}](./personalization-functions-webform)                      | Inladen van een webformulier                                                 |
| [{webonly}](./personalization-functions-webonly)                      | Blok markeren dat alleen in de webversie getoond wordt                       |
| [{webversion}](./emailings-publisher-webversion)                      | Link naar de webversie                                                       |

## Standaardfuncties

| Naam                                                                  | Omschrijving                                                                 |
|-----------------------------------------------------------------------|------------------------------------------------------------------------------|
| [{assign}](./personalization-functions-assign)                        | Waarde toekennen aan een variabele                                           |
| [{capture}](./personalization-functions-capture)                      | Tekst in een variabele opslaan                                               |
| [{counter}](./personalization-functions-counter)                      | Teller                                                                       |
| [{foreach}](./personalization-functions-foreach)                      | Itereren van een array                                                      |
| [{if}](./personalization-functions-if)                                | Conditionele blokken                                                         |
| [{literal}](./personalization-functions-literal)                      | Blok markeren voor letterlijke interpretatie                                 |
| [{math}](./personalization-functions-math)                            | Berekening uitvoeren                                                         |
| [{$smarty.now}](./smarty-date)                                        | Datumvariabele                                                              |
| [{textformat}](./personalization-functions-textformat)                | Tekst formatteren                                                            |
