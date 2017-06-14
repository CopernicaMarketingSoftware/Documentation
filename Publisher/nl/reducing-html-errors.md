# HTML errors in Publisher verminderen

In Publisher worden alle templates geschreven in HTML en soms ontstaan
er zo errors. Als je veel HTML errors hebt kan dit een negatief effect hebben
op de deliverability van je mail. Zie voor meer tips over deliverability
[dit artikel](./deliverability). In dit artikel geven we tips om HTML
errors op te lossen.

Je kunt in je template/document de HTML errors bekijken door op de *Waarschuwingen*
te klikken die in de onderste rand van het scherm toegankelijk zijn.

Deze check kan errors identificeren en meer informatie geven over het
oplossen hiervan.

Sommige HTML errors worden pas zichtbaar wanneer het document is gepersonalizeerd.
Als je klikt op *Voorbeeldweergave* kun je de gepersonalizeerde weergave
aanzetten. Je kunt deze dan checken met de [test ontvanger](./what-is-the-test-destination.md).

![](../images/htmlerrors.png)

## Veelvoorkomende HTML fouten

**Warning: <img\> lacks "alt" attribute**
Je afbeelding heeft geen "alt" attribuut. Dit geeft een alternatieve
beschrijving weer als de afbeelding niet geladen kan worden. Zorg dat je
deze invult, want niet iedereen kan je afbeeldingen zien.

`<img src="car.png"  alt="Picture of a car" />`

**Warning: <*table*\> lacks "summary" attribute**
Je tabel heeft geen summary attribuut om de tabel te beschrijven. Je kunt
simpelweg een lege summary (summary="") toevoegen om deze error op te lossen.

**Warning: trimming empty <*span*\>**
De meeste HTML tags hebben open en sluit tags. Als je deze waarschuwing
ziet mis je de sluit tag.

`<span>Content goes here</span>   Sommige tags sluiten zichzelf <br  />`

**Warning: discarding unexpected </td\>**
De meeste HTML tags hebben open en sluit tags. Als je deze waarschuwing
ziet mis je de open tag.
 
**Error: <dfgsdfg\> is not recognized!**
De tag bestaat niet. Check of je spelling klopt.

**Warning: missing <!DOCTYPE\> declaration**
De HTML doctype mist in de template. Deze waarschuwing kun je negeren.

**Warning: <html element\> proprietary attribute "*attribute name*"**
Het HTML element heeft een attribuut meegekregen dat niet ondersteund wordt.
Check je spelling of verwijder het attribuut.
