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
* **{assign}**: waarde toekennen aan een variabele
* **{capture}**: tekst in een variabele opslaan
* **{condition}**: conditioneel blok op basis van javascript
* **{counter}**: oplopende teller
* **{cycle}**: wisselen tussen twee waardes
* **{feed}**: inladen van een externe RSS feed
* **{fetch}**: inladen van een externe gehoste content
* **{foreach}**: itereren over een array
* **{if}**: conditionele blokken
* **{in_miniselection}**: blok dat alleen wordt getoond indien subprofiel tot een miniselectie behoort
* **{in_selection}**: blok dat alleen wordt getoond indien profiel tot een selectie behoort
* **{ldelim}**: linkeraccolade
* **{literal}**: blok markeren waarbinnen accolades mogen worden gebruikt
* **{linkemail}**: linken naar de webversie van een andere mailing
* **{linkfile}**: linken naar een file
* **{linkpdf}**: linken naar een PDF bestand
* **{loadfeed}**: inladen van een externe RSS feed
* **{loadfile}**: inladen van een bestand
* **{mailonly}**: blok markeren dat alleen in de mailversie wordt getoond
* **{math}**: berekening uitvoeren
* **{rawcapture}**: als {capture}, maar dan zonder html escaping
* **{strip}**: witruimte verwijderen
* **{survey}**: inladen van een enquête
* **{rdelim}**: rechteraccolade
* **{textformat}**: tekst opmaken
* **{unsubscribe}**: afmeldlink
* **{webform}**: inladen van een webformulier
* **{webonly}**: blok markeren dat alleen in de webversie wordt getoond

