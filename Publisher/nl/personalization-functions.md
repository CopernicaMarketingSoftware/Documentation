# Functies en blokken

Naast variabelen kun je ook gebruik maken van functies. Een functie ziet er
hetzelfde uit als een variabele, maar dan zonder dollarteken. De volgende 
functie kun je bijvoorbeeld gebruiken om een link naar de webversie van een 
e-mail te maken:

    {webversion}

Sommige functies hebben een bijbehorende sluittag, net als veel HTML elementen:

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

* **[{assign}](./personalization-function-assign)**: waarde toekennen aan een variabele
* **[{capture}](./personalization-function-capture)**: tekst in een variabele opslaan
* **[{condition}](./personalization-function-condition)**: conditioneel blok op basis van javascript
* **[{counter}](./personalization-function-counter)**: oplopende teller
* **[{cycle}](./personalization-function-cycle)**: wisselen tussen twee waardes
* **[{feed}](./personalization-function-feed)**: inladen van een externe RSS feed
* **[{fetch}](./personalization-function-fetch)**: inladen van een externe gehoste content
* **[{foreach}](./personalization-function-foreach)**: itereren over een array
* **[{if}](./personalization-function-if)**: conditionele blokken
* **[{in_miniselection}](./personalization-function-in_miniselection)**: blok dat alleen wordt getoond indien subprofiel tot een miniselectie behoort
* **[{in_selection}](./personalization-function-in_selection)**: blok dat alleen wordt getoond indien profiel tot een selectie behoort
* **[{ldelim}](./personalization-function-ldelim)**: linkeraccolade
* **[{literal}](./personalization-function-literal)**: blok markeren waarbinnen accolades mogen worden gebruikt
* **[{linkemail}](./personalization-function-linkemail)**: linken naar de webversie van een andere mailing
* **[{linkfile}](./personalization-function-linkfile)**: linken naar een file
* **[{linkpdf}](./personalization-function-linkpdf)**: linken naar een PDF bestand
* **[{loadfeed}](./personalization-function-loadfeed)**: inladen van een externe RSS feed
* **[{loadfile}](./personalization-function-loadfile)**: inladen van een bestand
* **[{mailonly}](./personalization-function-mailonly)**: blok markeren dat alleen in de mailversie wordt getoond
* **[{math}](./personalization-function-math)**: berekening uitvoeren
* **[{rawcapture}](./personalization-function-rawcapture)**: als {capture}, maar dan zonder html escaping
* **[{strip}](./personalization-function-strip)**: witruimte verwijderen
* **[{survey}](./personalization-function-survey)**: inladen van een enquête
* **[{rdelim}](./personalization-function-rdelim)**: rechteraccolade
* **[{textformat}](./personalization-function-textform)**: tekst opmaken
* **[{unsubscribe}](./personalization-function-unsubscribe)**: afmeldlink
* **[{webform}](./personalization-function-webform)**: inladen van een webformulier
* **[{webonly}](./personalization-function-webonly)**: blok markeren dat alleen in de webversie wordt getoond

