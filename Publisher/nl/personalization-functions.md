# Functies en blokken

Naast variabelen kun je ook gebruik maken van functies. Een functie ziet er
hetzelfde uit als een variabele, maar dan zonder dollarteken. De volgende 
functie kun je bijvoorbeeld gebruiken om een link naar de webversie van een 
e-mail te maken:

    {webversion}

Sommige functies bestaan uit een open- en een sluittag en hebben invloed op
de tekst die door de tags wordt omsloten:

    {mailonly}
        Klik <a href="{webversion}">hier</a> voor de webversie
    {/mailonly}
    
Het {mailonly} blok wordt gebruikt om een stuk code te markeren dat alleen 
zichtbaar is in de mailversie van de e-mail. Als het bericht op een andere
manier wordt weergegeven, als webversie bijvoorbeeld, dan wordt de code binnen
het blok niet getoond. In bovenstaand voorbeeld maken we daar handig gebruik 
van: de link naar de webversie hoef je natuurlijk alleen te tonen in de mail,
en nooit in de webversie zelf.


## Beschikbare functies

Er zijn heel veel functies standaard in Smarty, en een paar functies zijn
specifiek voor Copernica. Hieronder zie je alle beschikbare functies:
* **[{assign}](./personalization-functions-assign)**: waarde toekennen aan een variabele
* **[{capture}](./personalization-functions-capture)**: tekst in een variabele opslaan
* **[{condition}](./personalization-functions-condition)**: conditioneel blok op basis van javascript
* **[{counter}](./personalization-functions-counter)**: oplopende teller
* **[{cycle}](./personalization-functions-cycle)**: wisselen tussen twee waardes
* **[{feed}](./personalization-functions-feed)**: inladen van een externe RSS feed
* **[{fetch}](./personalization-functions-fetch)**: inladen van een externe gehoste content
* **[{foreach}](./personalization-functions-foreach)**: itereren over een array
* **[{if}](./personalization-functions-if)**: conditionele blokken
* **[{in_miniselection}](./personalization-functions-in_miniselection)**: blok dat alleen wordt getoond indien subprofiel tot een miniselectie behoort
* **[{in_selection}](./personalization-functions-in_selection)**: blok dat alleen wordt getoond indien profiel tot een selectie behoort
* **[{ldelim}](./personalization-functions-ldelim)**: linkeraccolade
* **[{literal}](./personalization-functions-literal)**: blok markeren waarbinnen accolades mogen worden gebruikt
* **[{linkemail}](./personalization-functions-linkemail)**: linken naar de webversie van een andere mailing
* **[{linkfile}](./personalization-functions-linkfile)**: linken naar een file
* **[{linkpdf}](./personalization-functions-linkpdf)**: linken naar een PDF bestand
* **[{loadfeed}](./personalization-functions-loadfeed)**: inladen van een externe RSS feed
* **[{loadfile}](./personalization-functions-loadfile)**: inladen van een bestand
* **[{mailonly}](./personalization-functions-mailonly)**: blok markeren dat alleen in de mailversie wordt getoond
* **[{math}](./personalization-functions-math)**: berekening uitvoeren
* **[{rawcapture}](./personalization-functions-rawcapture)**: als {capture}, maar dan zonder html escaping
* **[{strip}](./personalization-functions-strip)**: witruimte verwijderen
* **[{survey}](./personalization-functions-survey)**: inladen van een enquête
* **[{rdelim}](./personalization-functions-rdelim)**: rechteraccolade
* **[{textformat}](./personalization-functions-textform)**: tekst opmaken
* **[{unsubscribe}](./personalization-functions-unsubscribe)**: afmeldlink
* **[{webform}](./personalization-functions-webform)**: inladen van een webformulier
* **[{webonly}](./personalization-functions-webonly)**: blok markeren dat alleen in de webversie wordt getoond

