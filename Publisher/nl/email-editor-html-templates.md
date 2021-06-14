# HTML-templates

HTML-templates bieden meer vrijheid dan drag-and-drop-templates. Daardoor is er ook meer mogelijk. Om een HTML-template te ontwikkelen is kennis van HTML en CSS nodig.

## De structuur van HTML-templates/documenten

Een HTML-template is opgebouwd uit HTML- en CSS-code. Die code bevat de globale opmaak van e-mails en de elementen die daarbij vaststaan. Denk bijvoorbeeld aan logo's of een afmeldlink. Daarnaast bevat een template [contentblokken](./emailings-publisher-contentblocks) die op een later moment worden ingevuld. Wanneer je een mailing wilt samenstellen maak je op basis van een template een document aan.

HTML-templates worden doorgaans gemaakt door webdesigners of programmeurs. Zij bepalen de e-mailopmaak en daarmee de plaatsing van de e-mailcontent (de layout). Vervolgens kan een marketeer de e-mail voorzien van de benodigde content. Voor die tweede stap is geen HTML-kennis vereist.

## Het aanmaken van een HTML-template

Om een nieuwe HTML-template aan te maken navigeer je naar [**'E-mail-editor'**](https://ms.copernica.com/#/design) en kies je voor **'Aanmaken'**, **'Template aanmaken'**. Zodra de template is aangemaakt voeg je de bijbehorende HTML-code toe, bijvoorbeeld:

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

Het bovenstaande voorbeeldtemplate bevat een tekstblok met de tekst "_voorbeeld_". Je kunt deze tekst binnen je document aanpassen door erop te klikken in de **'Hybridemodus'** of **'Bewerkmodus'**. Je vindt deze onderaan het document onder **'Weergave'** of in de toolbar van het document onder **'Blokken bewerken'**.

## Contentblokken
Er zijn drie tags waarmee je contentblokken maakt: `[text]`-, `[image]`- en `[loop]`-tags. Je neemt deze tags op in de broncode van je HTML-template om aan te geven dat daar op documentniveau content kan worden geplaatst. 

`[Text]`- en `[image]`-tags geven de locatie van tekst en afbeeldingen binnen de template aan. `[Loop]`-tags stellen je in staat om herhaling toe te passen. Door `[loop]`-tags op te nemen in de template kunnen mailings bijvoorbeeld worden voorzien van een variabel aantal paragrafen of artikelen.

[Lees hier meer](./emailings-publisher-contentblocks) over het gebruik van contentblokken.

## Wees voorzichtig met [blokhaken]

Blokhaken worden binnen een template gebruikt om contentblokken, `[if]`-statements en templatevariabelen te markeren. Een voorbeeld daarvan vind je [hier](./loop-tag). 

Doordat blokhaken een speciale functie hebben loont het om voorzichtig te zijn met het gebruik ervan. Het toevoegen van reguliere blokhaken in de stylesheet bovenaan de template kan bijvoorbeeld resulteren in een foutmelding. Je voorkomt dit door gebruik te maken van de `[ldelim]`- en `[rdelim]`-tags. Op die manier worden de gebruikte tekens automatisch omgezet naar reguliere blokhaken:

```
<style type="text/css">
    div[ldelim]class=x[rdelim] {
        font-weight: bold;
    }
</style>
```

Het gebruik van `[literal]`- en `[/literal]`-tags is ook mogelijk. Deze methode is bijvoorbeeld geschikt voor grote stukken CSS-code waarbij er geen gebruik wordt gemaakt van contentblokken. Je gebruikt de `[literal]`- en `[/literal]`-tags om het deel van de broncode te markeren waarbinnen blokhaken geen speciale betekenis hebben. Dat doe je bijvoorbeeld als volgt:


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

In de meeste gevallen voeg je afbeeldingen pas op documentniveau toe. Het is echter ook mogelijk om afbeeldingen in de template op te nemen. Denk bijvoorbeeld aan een bedrijfslogo dat voor elke mailing hetzelfde blijft.

Je voegt template-afbeeldingen toe door middel van [`<img>-tags`](https://www.w3schools.com/tags/tag_img.asp). Vervolgens haal je ze op vanuit een mediabibliotheek of externe locatie. 

Je kunt afbeeldingen koppelen aan een specifiek template door ze toe te voegen onder **'Bestanden en afbeeldingen'**. Wil je een afbeelding voor meerdere templates gebruiken? Dan gebruik je de mediabibliotheek in de toolbar van je template. De toegevoegde afbeeldingen zijn dan voor alle modules beschikbaar.
