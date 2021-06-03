# HTML-templates

HTML-templates bieden meer vrijheid dan drag-and-drop-templates. Daardoor is er ook meer mogelijk. Om een HTML-template te ontwikkelen is kennis van HTML en CSS nodig.

## De structuur van HTML-templates/documenten

Een HTML-template is opgebouwd uit HTML- en CSS-code. Die code bevat de globale opmaak van e-mails en de elementen die daarbij vaststaan. Denk bijvoorbeeld aan logo's of een afmeldlink. 

Daarnaast bevat een template [contentblokken](./emailings-publisher-contentblocks) die op een later moment kunnen worden ingevuld. Wanneer je een mailing wilt samenstellen maak je op basis van een template een document aan. Vervolgens vul je de contentblokken met tekst of afbeeldingen. 

HTML-templates worden doorgaans gemaakt door webdesigners of programmeurs. Zij bepalen de e-mailopmaak en daarmee de plaatsing van de e-mailcontent (de layout). Vervolgens kan een marketeer de e-mail voorzien van de benodigde content. Voor die tweede stap is geen HTML-kennis vereist.

## Het aanmaken van een HTML-template

Om een nieuwe HTML-template aan te maken navigeer je naar [HTML-templates](https://ms.copernica.com/#/design) en kies je voor **'Aanmaken'**, **'Template aanmaken'**. Zodra de template is aangemaakt voeg je de bijbehorende HTML-code toe, bijvoorbeeld:

``` 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
    <p>
        [text name="voorbeeld"]
    </p>
    </body>
</html>
```

Vervolgens maak je een document aan die onder het aangemaakte template valt. Dat doe je via **'Aanmaken'**, **'Document aanmaken'**.  

Het bovenstaande voorbeeldtemplate bevat een tekstblok met de tekst "_voorbeeld_". Je kunt deze tekst binnen je document aanpassen door erop te klikken in de **'Hybride modus'** of **'Bewerkmodus'**. Je vindt deze onderaan het document onder **'Weergave'** of in de toolbar van het document onder **'Blokken bewerken'**.

## Contentblokken
Er zijn drie tags waarmee je contentblokken maakt: _[text]_-, _[image]_- en _[loop]_-tags. Je neemt deze tags op in de broncode van je HTML-template om aan te geven dat daar op documentniveau content kan worden geplaatst. 

_Text_- en _image_-tags geven binnen de template de plekken aan waar teksten en afbeeldingen geplaatst kunnen worden. _Loop_-tags stellen je in staat om herhaling toe te passen. Door _loop_-tags op te nemen in de template kunnen mailings bijvoorbeeld worden voorzien van een variabel aantal paragrafen of artikelen.

[Lees hier meer](./emailings-publisher-contentblocks) over het gebruik van contentblokken.

## Let op met blokhaken!
Binnen een template hebben de blokhaken _[ en ]_ een speciale betekenis. Deze tekens worden gebruikt om de hierboven beschreven contentblokken mee te markeren, en je kunt ze gebruiken voor [if] statements en templatevariabelen (een voorbeeld kun je zien in het artikel over [[loop] tags](./loop-tag)). Doordat blokhaken een speciale betekenis hebben, moet je opletten als je ergens "gewone" blokhaken plaatst, zoals in de stylesheet bovenaan een template. Deze blokhaken worden namelijk door Copernica herkend als het begin van een speciaal onderdeel van de template en vaak resulteert dit in een fout. Er zijn twee trucs om dit te voorkomen: door gebruik te maken van [ldelim] en [rdelim] of door [literal] en [/literal].

Als je een gewone blokhaak in een template wilt zetten kun je gebruik maken van [ldelim] en [rdelim]. De [ldelim] en [rdelim] tags worden door Copernica namelijk automatisch omgezet naar de echte [ en ] tekens. Voorbeeld:  

```
<style type="text/css">
    div[ldelim]class=x[rdelim] {
        font-weight: bold;
    }
</style>
```

Als je een groot stuk CSS-code hebt dat vol staat met blokhaken, en waar geen gebruik wordt gemaakt van contentblokken (zodat alle blokhaken in dat stuk geen speciale template betekenis hebben), dan kun je ook [literal] en [/literal] gebruiken. Met deze tags kun je een deel van je broncode markeren waarbinnen alle blokhaken geen speciale betekenis hebben.

```
<style type="text/css">
     [literal]
         div[class=x] {
             font-weight: bold;
         }
     [/literal]
 </style>
```

## Vaste afbeeldingen
Afbeeldingen worden meestal pas op documentniveau toegevoegd. Maar ook in de template kun je al afbeeldingen plaatsen, zoals het bedrijfslogo dat voor elke mailing hetzelfde is. Dit doe je met HTML [`<img>-tags`](https://www.w3schools.com/tags/tag_img.asp). Deze afbeeldingen kunnen van een externe locatie zijn (buiten Copernica om), zijn gekoppeld aan het template (onder _bestanden en afbeeldingen_ in het template) of in een _mediabibliotheek_ staan.

Bij je template of document kun je onder _bestanden en afbeeldingen_ afbeeldingen uploaden die specifiek aan die template of document gekoppeld worden. Wil je een afbeelding in meerdere templates gebruiken, kun je het beste gebruik maken van je _mediabibliotheek_. Deze optie vind je in de toolbar van je template. Afbeeldingen die hierin zijn opgenomen zijn beschikbaar in al je modules.  
