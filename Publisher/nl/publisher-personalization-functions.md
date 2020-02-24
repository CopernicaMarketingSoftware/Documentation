# Smarty

## Personaliseren binnen de Publisher
In de Publisher kun je van alles personaliseren. Je doet dit met behulp van de zogeheten Smarty code. 
Een personalisatievariabele bestaat uit een dollarteken $, het woord profile of subprofile en de naam van een variabele, geplaatst tussen accolades. De volgende variabelen kun je bijvoorbeeld in een template of document gebruiken:

* `{$profile.naam}`
* `{$profile.email}`
* `{$profile.aanhef}`

Deze personalisatievariabelen werken natuurlijk alleen als je in de database ook velden met de "naam", "email" en "aanhef" hebt opgenomen, en als je voor de geadresseerden van de mailing deze gegevens hebt ingevuld. Als dat het geval is, dan kun je deze variabelen gewoon in je mailing gebruiken:

```
Beste {$profile.aanhef} {$profile.naam},

Je ontvangt deze e-mail omdat bent aangemeld
met het volgende e-mailadres: {$profile.email}.
```

Meer informatie over het personaliseren binnen de Publisher vind je [hier](./emailings-publisher-personalization).

## Personaliseren binnen de Marketing Suite
In de Publisher is het mogelijk om enkel de veldnaam te gebruiken na het $-teken. In de Marketing Suite zal je echter altijd 'profile.' moeten meegeven.

In de Publisher werkt`{$profile.naam}` en `{$naam}`.  
In de Marketing Suite werkt enkel `{$profile.naam}`.

Meer informatie over het personaliseren binnen de Marketing Suite vind je [hier](./emailings-ms-personalization)

## Smarty functies
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

## Tutorials / extra documentatie
* [Persoonlijke aanhef maken](./tutorial-personalized-salutation-in-email-using-smarty-code)
* [Hyperlinks uitbreiden en personaliseren](./personalizing-hyperlinks)
* [Inladen van (sub)profiel data met de load(sub)profile-tag](./loadprofile-and-loadsubprofile)
* [Feed inladen met de loadfeed-tag](./personalization-functions-loadfeed)
