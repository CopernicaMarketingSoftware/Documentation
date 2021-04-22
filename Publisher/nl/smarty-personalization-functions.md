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
| [{condition}](./personalization-functions-condition)                  | conditioneel blok op basis van JavaScript                                    |
| [{fetch}](./personalization-functions-fetch)                          | inladen van extern gehoste content                                      |
| [{in_miniselection}](./personalization-functions-in_miniselection)    | blok dat alleen getoond wordt indien het subprofiel tot een miniselectie behoort |
| [{in_selection}](./personalization-functions-in_selection)            | blok dat alleen getoond wordt indien het profiel tot een selectie behoort        |
| [{linkfile}](./personalization-functions-linkfile)                    | linken naar een bestand                                                      |
| [{linkpdf}](./personalization-functions-linkpdf)                      | linken naar een PDF-bestand                                                  |
| [{loadfeed}](./personalization-functions-loadfeed)                    | inladen van een externe RSS-feed                                             |
| [{loadfile}](./personalization-functions-loadfile)                    | inladen van een bestand                                                      |
| [{loadprofile}](./personalization-functions-loadprofile)              | inladen van een profiel                                                      |
| [{loadsubprofile}](./personalization-functions-loadsubprofile)        | inladen van een subprofiel                                                   |
| [{mailonly}](./personalization-functions-mailonly)                    | blok markeren dat alleen in de mailversie getoond wordt                    |
| [{$smarty.now}](./smarty-date)                                        | datumvariabele                                                              |
| [{survey}](./personalization-functions-survey)                        | inladen van een enquête                                                      |
| [{unsubscribe}](./personalization-functions-unsubscribe)              | uitschrijflink                                       |
| [{webform}](./personalization-functions-webform)                      | inladen van een webformulier                                                 |
| [{webonly}](./personalization-functions-webonly)                      | blok markeren dat alleen in de webversie getoond wordt                       |
| [{webversion}](./emailings-publisher-webversion)                      | link naar de webversie                                                       |

## Standaardfuncties

| Naam                                                                  | Omschrijving                                                                 |
|-----------------------------------------------------------------------|------------------------------------------------------------------------------|
| [{assign}](./personalization-functions-assign)                        | waarde toekennen aan een variabele                                           |
| [{capture}](./personalization-functions-capture)                      | tekst in een variabele opslaan                                               |
| [{counter}](./personalization-functions-counter)                      | teller                                                                       |
| [{foreach}](./personalization-functions-foreach)                      | itereren van een array                                                      |
| [{if}](./personalization-functions-if)                                | conditionele blokken                                                         |
| [{literal}](./personalization-functions-literal)                      | blok markeren voor letterlijke interpretatie                                 |
| [{math}](./personalization-functions-math)                            | berekening uitvoeren                                                         |
| [{$smarty.now}](./smarty-date)                                        | datumvariabele                                                              |
| [{textformat}](./personalization-functions-textformat)                | tekst formatteren                                                            |
