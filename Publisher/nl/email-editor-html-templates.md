# HTML-templates

Als je meer vrijheid of geavanceerdere mailings wilt versturen dan mogelijk met drag-and-drop templates kun je gebruik maken van HTML-templates. Kennis van HTML en CSS is noodzakelijk voor het opzetten van een HTML-template.

## Structuur HTML-templates en HTML-documenten
Een HTML-template bestaat uit HTML en CSS en bevat de globale opmaak van de e-mail en de elementen die voor elke mailing vaststaan (zoals logo's en een afmeldlink). Verder bevat een template [contentblokken](./emailings-publisher-contentblocks) die later kunnen worden ingevuld. Als je een mailing wilt samenstellen maak je op basis van een template een document aan, en kun je de contentblokken vullen met teksten en afbeeldingen.

Vaak worden templates gemaakt door webdesigners of programmeurs. Zij bepalen de opmaak van de mailing en wijzen de plaatsen aan waar teksten en afbeeldingen kunnen worden geplaatst (de layout). Als een template eenmaal is gebouwd, kan deze door bijvoorbeeld een marketeer worden voorzien van teksten en afbeeldingen. Zo kunnen er complete mailings mee worden verstuurd. Voor die tweede stap is geen kennis van HTML vereist.

## Voorbeeld
Om een nieuwe HTML-template aan te maken ga je naar [HTML-templates](https://ms.copernica.com/#/design) en kies je voor **Aanmaken -> Template aanmaken**. Na het aanmaken van de template kun je de HTML-code toevoegen.

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

Vervolgens kun je een document aanmaken onder bovenstaand template. Dit doe je via **Aanmaken -> Document aanmaken**.  
Zoals je hierboven kunt zien staat er in dit template een tekstblok genaamd "_voorbeeld_". In je document kun je dit blok nu voorzien van tekst door erop te klikken in de _hybride modus_ of _bewerkmodus_ (deze vind je onderin het document onder _weergave_) of via _blokken bewerken_ in de toolbar van het document.  

## Contentblokken
Er zijn drie tags waarmee je contentblokken maakt: [text], [image] en [loop]. Deze tags kun je in de broncode van de template opnemen om aan te geven dat daar op documentniveau content kan worden geplaatst. De werking van de [text] en [image] tags spreekt voor zich: op elke plek in de template waar je deze tags plaatst, kunnen later op documentniveau teksten en afbeeldingen worden geplaatst. De loop-tags behoeven wat meer uitleg, en stellen je in staat om op documentniveau herhalingen in te voeren. Als je bijvoorbeeld gebruikers in staat wilt stellen om mailings te maken met een variabel aantal paragrafen of een variabel aantal artikelen, dan kun en dit doen door loopblokken in de template op te nemen.

Lees voor meer informatie het artikel over [contentblokken](./emailings-publisher-contentblocks).

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
Afbeeldingen worden meestal pas op documentniveau toegevoegd. Maar ook in de template kun je al afbeeldingen plaatsen, zoals het bedrijfslogo dat voor elke mailing hetzelfde is. Dit doe je met HTML [`<img>-tags`](https://www.w3schools.com/tags/tag_img.asp). Deze afbeeldingen kunnen van een externe locatie zijn (buiten Copernica om), zijn gekoppeld aan het template (onder _bestanden en afbeeldingen_ in het template) of in een _mediabibliotheek staan.

Bij je template of document kun je onder _bestanden en afbeeldingen_ afbeeldingen uploaden die specifiek aan die template of document gekoppeld worden. Wil je een afbeelding in meerdere templates gebruiken, kun je het beste gebruik maken van je _mediabibliotheek_. Deze optie vind je in de toolbar van je template. Afbeeldingen die hierin zijn opgenomen zijn beschikbaar in je modules.  
