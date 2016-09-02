Voor een betere deliverability raden wij aan om het aantal HTML-fouten
om een template / document zo laag mogelijk te krijgen. Een paar fouten
zal niet uitmaken, maar een document barstensvol fouten wordt mogelijk
als spam weggezet.

HTML-fouten kunnen er uiteraard ook voor zorgen dat je e-mail in sommige
programma's niet goed wordt weergegeven.

Om te controleren of je document of template fouten bevat, klik je op de
knop met waarschuwingen rechtsonder het geopende document of template.

De check geeft (sumiere) informatie over de gevonden fouten. Sommige
HTML-fouten verschijnen of verdwijnen juist wanneer het document is
gepersonaliseerd. Selecteer de checkbox onderin het venster om het
document in zowel gepersonaliseerde als niet-gepersonaliseerde modus te
controleren.

![](htmlerrors.png)

Document check dialog window. Click on the **errors and warnings
button** below the document to open the dialog window.

Veelvoorkomende HTML-fouten
---------------------------

### Warning: \<img\> lacks "alt" attribute

De afbeelding heeft geen alternatieve beschrijving. Dit kan je beter
oplossen, omdat de alternatieve beschrijving handig kan zijn voor
ontvangers die de afbeeldingen niet kunnen inladen. \
\
`<img src="car.png"  alt="Picture of a car" />`

### Warning: \<*table*\> lacks "summary" attribute

Je kan deze fout oplossen door de tabel een summary="something"
attribuut te geven. Je kan deze waarschuwing ook negeren. Dit heeft geen
nadelige gevolgen voor de afleverkwaliteit.

### Warning: trimming empty \<*span*\>

Veel HTML-tags hebben een open- en een sluit-tag. Als je deze
waarschuwing ziet, dan ontbreekt de sluit-tag. Dit heeft met name
gevolgen voor de weergave in het document. \
 \
`<span>Content goes here</span>   Some HTML tags can be self closed: <br  />`\

### Warning: discarding unexpected \</td\>

Veel HTML tags hebben een open- en een sluittag. Als je deze
waarschuwing ziet, dan ontbreekt de open-tag. Dit heeft met name
gevolgen voor de weergave in het document.

`<td>This is a table cell</td>`

### Error: \<dfgsdfg\> is not recognized!

De tag bestaat in zijn geheel niet. Verwijderen of de tikfout
verbeteren.\

### Warning: missing \<!DOCTYPE\> declaration

Je hebt geen doctype opgegeven in de template broncode. Dit kan je in
principe negeren. \

### Warning: \<html element\> proprietary attribute "*attribute name*"

Het HTML-element heeft een onbekend attribuut. Je kan deze naar eigen
smaak verwijderen of verbeteren. Het heeft voor zover bij ons bekend
geen gevolgen voor de deliverability als HTML tags attributen heeft die
niet bestaan.
