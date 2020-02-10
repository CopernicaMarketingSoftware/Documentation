# Smarty

Er zijn veel standaard Smarty functies beschikbaar in de Publisher, een paar functies zijn
specifiek voor Copernica zoals de *webonly* functie en de *unsubscribe* functie.

Sommige functies bestaan uit een open- en een sluittag en hebben invloed op
de tekst die door de tags wordt omsloten:

```text
{mailonly}
    Klik <a href="{webversion}">hier</a> voor de webversie
{/mailonly}
```

Hieronder zie je een overzicht van enkele Smarty functies:       

| Functie naam                                                          | Functie omschrijving                                                         |
|-----------------------------------------------------------------------|------------------------------------------------------------------------------|
| [{assign}](./personalization-functions-assign)                        | waarde toekennen aan een variabele                                           |
| [{capture}](./personalization-functions-capture)                      | tekst in een variabele opslaan                                               |
| [{condition}](./personalization-functions-condition)                  | conditioneel blok op basis van JavaScript                                    |
| [{counter}](./personalization-functions-counter)                      | teller                                                                       |
| [{fetch}](./personalization-functions-fetch)                          | inladen van een externe gehoste content                                      |
| [{foreach}](./personalization-functions-foreach)                      | itereren over een array                                                      |
| [{if}](./personalization-functions-if)                                | conditionele blokken                                                         |
| [{in_miniselection}](./personalization-functions-in_miniselection)    | blok dat alleen wordt getoond indien subprofiel tot een miniselectie behoort |
| [{in_selection}](./personalization-functions-in_selection)            | blok dat alleen wordt getoond indien profiel tot een selectie behoort        |
| [{literal}](./personalization-functions-literal)                      | blok markeren dat letterlijk genomen wordt                                   |
| [{linkfile}](./personalization-functions-linkfile)                    | linken naar een file                                                         |
| [{linkpdf}](./personalization-functions-linkpdf)                      | linken naar een PDF bestand                                                  |
| [{loadfeed}](./personalization-functions-loadfeed)                    | inladen van een externe RSS feed                                             |
| [{loadfile}](./personalization-functions-loadfile)                    | inladen van een bestand                                                      |
| [{loadprofile}](./personalization-functions-loadprofile)                    | inladen van een profiel                                                      |
| [{loadsubprofile}](./personalization-functions-loadsubprofile)                    | inladen van een subprofiel                                                      |
| [{mailonly}](./personalization-functions-mailonly)                    | blok markeren dat alleen in de mailversie wordt getoond                      |
| [{math}](./personalization-functions-math)                            | berekening uitvoeren                                                          |
| [{$smarty.now}](./smarty-date)                                                  | datum variabele                                                        |
| [{survey}](./personalization-functions-survey)                        | inladen van een enquête                                                      |
| [{textformat}](./personalization-functions-textformat)                  | tekst formatteren                                                            |
| [{unsubscribe}](./personalization-functions-unsubscribe)              | afmeldlink                                                                   |
| [{webform}](./personalization-functions-webform)                      | inladen van een webformulier                                                 |
| [{webonly}](./personalization-functions-webonly)                      | blok markeren dat alleen in de webversie wordt getoond                       |
| [{webversion}](./emailings-publisher-webversion)                      | webversielink                      |
