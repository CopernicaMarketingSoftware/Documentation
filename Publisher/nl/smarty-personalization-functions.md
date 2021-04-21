# Smarty functies

Binnen Smarty kun je gebruik maken van verschillende functies. 
Een aantal van deze functies zijn specifiek gemaakt voor Copernica. 

De meeste functies bestaan uit een open- en sluittag en hebben invloed op de tekst die binnen deze tags staan.  
Een voorbeeld hiervan is de mailonly-tag:
```text
{mailonly}
    Klik <a href="{webversion}">hier</a> voor de webversie
{/mailonly}
```

De tekst zal nu alleen worden getoond wanneer de gebruiker de nieuwsbrief bekijkt vanuit zijn mailclient.

## Copernica functies

| Naam                                                                  | Omschrijving                                                                 |
|-----------------------------------------------------------------------|------------------------------------------------------------------------------|
| [{condition}](./personalization-functions-condition)                  | conditioneel blok op basis van JavaScript                                    |
| [{fetch}](./personalization-functions-fetch)                          | inladen van een externe gehoste content                                      |
| [{in_miniselection}](./personalization-functions-in_miniselection)    | blok dat alleen wordt getoond indien subprofiel tot een miniselectie behoort |
| [{in_selection}](./personalization-functions-in_selection)            | blok dat alleen wordt getoond indien profiel tot een selectie behoort        |
| [{linkfile}](./personalization-functions-linkfile)                    | linken naar een bestand                                                      |
| [{linkpdf}](./personalization-functions-linkpdf)                      | linken naar een PDF-bestand                                                  |
| [{loadfeed}](./personalization-functions-loadfeed)                    | inladen van een externe RSS-feed                                             |
| [{loadfile}](./personalization-functions-loadfile)                    | inladen van een bestand                                                      |
| [{loadprofile}](./personalization-functions-loadprofile)              | inladen van een profiel                                                      |
| [{loadsubprofile}](./personalization-functions-loadsubprofile)        | inladen van een subprofiel                                                   |
| [{mailonly}](./personalization-functions-mailonly)                    | blok markeren dat alleen in de mailversie wordt getoond                      |
| [{$smarty.now}](./smarty-date)                                        | datum variabele                                                              |
| [{survey}](./personalization-functions-survey)                        | inladen van een enquête                                                      |
| [{unsubscribe}](./personalization-functions-unsubscribe)              | link om afmeldingen te registreren                                           |
| [{webform}](./personalization-functions-webform)                      | inladen van een webformulier                                                 |
| [{webonly}](./personalization-functions-webonly)                      | blok markeren dat alleen in de webversie wordt getoond                       |
| [{webversion}](./emailings-publisher-webversion)                      | link voor de webversie                                                       |

## Standaard functies

| Naam                                                                  | Omschrijving                                                                 |
|-----------------------------------------------------------------------|------------------------------------------------------------------------------|
| [{assign}](./personalization-functions-assign)                        | waarde toekennen aan een variabele                                           |
| [{capture}](./personalization-functions-capture)                      | tekst in een variabele opslaan                                               |
| [{counter}](./personalization-functions-counter)                      | teller                                                                       |
| [{foreach}](./personalization-functions-foreach)                      | itereren over een array                                                      |
| [{if}](./personalization-functions-if)                                | conditionele blokken                                                         |
| [{literal}](./personalization-functions-literal)                      | blok markeren dat letterlijk genomen wordt                                   |
| [{math}](./personalization-functions-math)                            | berekening uitvoeren                                                         |
| [{$smarty.now}](./smarty-date)                                        | datum variabele                                                              |
| [{textformat}](./personalization-functions-textformat)                | tekst formatteren                                                            |
