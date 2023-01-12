# Slimme elementen

Bij het opmaken van een nieuwsbrief maak je vaak gebruik van dezelfde handelingen. Stel je hebt een webshop en je wilt een e-mail sturen ter promotie van 5 artikelen, dan moet je voor ieder product de afbeelding, productnaam, prijs en link toevoegen. Een aantal van deze elementen, zoals de link, worden vaak meerdere keren gebruikt. Deze vind je bijvoorbeeld terug achter de titel, de afbeelding en de bestelknop. Als je de volgende dag 5 nieuwe artikelen wilt sturen, moet je deze handelingen opnieuw doen. Om dit te vereenvoudigen heeft de drag-and-drop-editor de functie 'Slimme elementen'. 

## Wat is een slim element
Een slim element is een lijn, structuur of container waarin alle basis blokken zijn toegevoegd, zoals een afbeeldingsblok, tekstblok en een knop, maar met de optie om de data als variabele op te halen vanaf een externe locatie.

Je stelt hierbij eenmalig de volgorde en de eigenschappen van de blokken in en kunt vervolgens met één druk op de knop de content op de juiste plek inladen.

## Hoe werken slimme elementen?
In onderstaand voorbeeld gaan we producten ophalen vanuit de Coolblue-website, maar je kan hier ook iedere andere URL voor gebruiken.

### Maak een standaard structuur voor je slimme element
We maken een standaard structuur zoals we deze willen gebruiken in de nieuwsbrief. In dit geval gaan we voor een structuur waarbij we twee producten naast elkaar willen gaan tonen. Voor ieder product willen we het volgende tonen:
- afbeelding
- titel
- omschrijving
- knop met link om te bestellen

Deze blokken plaatsen we samen in één container. De titel maken we hierbij vetgedrukt.   
De opmaak voeren we door voor één van de twee blokken in de container:

![Voorbeeld_structuur](../images/nl/slimmelementen1.png)
*Voorbeeld structuur*

### Variabelen aanmaken
Selecteer de container waar alle blokken in staan en ga naar het tabblad 'Data' bij de container-opties. Hier kun je de optie aanzetten om gebruik te maken van slimme elementen. Vervolgens zie je onder 'Configuratie' al één variabele staan, namelijk 'url'. Wij gebruiken het plus-icoon om een nieuwe variabele toe te voegen. Als opties krijg je enkele voorgedefinieerde variabelen. Wij kiezen onderaan voor de optie 'Variabele *var*'. De 'Variabele' en 'Naam' geven we beide de tekst 'afbeelding'. Ditzelfde doen we door een variabele aan te maken voor de *titel*, *omschrijving* en *link*. 

De configuratie ziet er nu zo uit:  
![configuratie](../images/nl/slimmelementen2.png)

### CSS-selectors instellen
Bij iedere variabelen die je zojuist hebt aangemaakt heb je twee *Overeenstemmingsprincipes*:
- Intern
- Extern

Bij intern kun je aangeven welke classes je gebruikt in je template waar je de gegevens in wilt gaan laden. Bij extern geef je aan welke classes vanaf de externe locatie je wilt inladen.

Voordat we dit kunnen invullen moeten we eerst CSS-classes toevoegen aan de blokken die wij hebben toegevoegd. Hiervoor selecteren we de gehele, inmiddels 'slimme', container en klikken op *Code bekijken* (links bovenin).

In deze broncode gaan we aan ieder blok een extra class meegeven zodat het systeem weet wat aangepast moet worden. We gebruiken de volgende namen:
- slim_afbeelding
- slim_titel
- slim_omschrijving
- slim_link

Voor de afbeelding voegen we deze toe aan de bestaande 'href' class en voor de link voegen wij deze toe aan de bestaande class binnen het img-attribuut.

Omdat de titel dikgedrukt moet worden, zullen we hier de class moeten plaatsen op het `<strong>`-attribuut. Als we het hier aan de class in de bovenliggende `<td>` zouden toevoegen zou het dikgedrukte komen te vervallen bij het inladen van de nieuwe content.

Voor de tekst voegen we een `<span>` met de class toe binnen het `<p>`-attribuut. Dit doen we zodat de opmaak behouden blijft.

Dit zal er ongeveer zo uit zien:
```
<td class="es-m-p20b esd-container-frame" width="270" align="left" esdev-config="h3">
    <table width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td align="center" class="esd-block-image" style="font-size:0"><a target="_blank"><img class="adapt-img esdev-empty-img slim_afbeelding" src="https://ms.copernica.com/stable/design/resources/stripo/assets/img/default-img.png" alt width="100%" height="100" style="display: none;"></a></td>
            </tr>
            <tr>
                <td align="left" class="esd-block-text">
                    <p><strong class="slim_titel">Tekst</strong></p>
                </td>
            </tr>
            <tr>
                <td align="left" class="esd-block-text">
                    <p><span class="slim_omschrijving">Tekst</span></p>
                </td>
            </tr>
            <tr>
                <td align="center" class="esd-block-button">
                    <span class="es-button-border">
                        <a href class="es-button slim_link" target="_blank"> Knop </a>
                    </span>
                </td>
            </tr>
        </tbody>
    </table>
</td>
```

Bij de configuratie van het slimme element kunnen we nu per variabelen de interne en externe CSS-selectors aangeven. 

Voor de afbeelding gebruiken wij bij **Intern** de CSS-selector `.slim_afbeelding` en het kenmerk `src`. We willen namelijk de URL aanpassen van het element met de class `slim_afbeelding`.

Bij **Extern** kijken we naar de pagina waar wij de content vanuit willen gaan inladen. In dit geval [deze pagina](https://www.coolblue.nl/product/856352/samsung-lu28r550uqrxen.html). Via de rechtermuis-knop kunnen wij de pagina inspecteren en kijken welke class de afbeelding heeft. In dit geval is dit `product-media-gallery__item-image`:
```
<img class="product-media-gallery__item-image js-product-media-gallery__item-image product-media-gallery__item-image--zoom-cursor--hidden" src="https://image.coolblue.nl/max/500x500/products/1438217" alt="Samsung LU28R550UQRXEN Main Image">
```

We vullen de CSS-selector `product-media-gallery__item-image` in bij *Extern*. Als kenmerk voeren we nogmaals `src` in. We willen namelijk de waarde vanuit 'src' ophalen van het element waarbij de class gelijk is aan 'product-media-gallery__item-image'.

Voor de overige elementen doen we hetzelfde.  
Hieronder een lijst met de gebruikte waardes:

**titel**:   
Intern: 
- CSS-selector: .slim_titel
- Kenmerk: (leeg)  

Extern:  
- CSS-selector: .js-product-name  
- Kenmerk: (leeg)

**Omschrijving**:  
Intern: 
- CSS-selector: .slim_omschrijving
- Kenmerk: (leeg)  

Extern:  
- CSS-selector: .cms-content  
- Kenmerk: (leeg)

**Link**:  
Intern: 
- CSS-selector: .slim_link
- Kenmerk: href  

Extern:  
- CSS-selector: .selectable-card input
- Kenmerk: value

### Link toevoegen
Nu we dit hebben ingesteld, kun je onder zowel **Configuratie** als **Uiterlijk** in de slimme-container een link opgeven. In dit geval gebruik je onderstaande URL: 
[https://www.coolblue.nl/product/856352/samsung-lu28r550uqrxen.html](https://www.coolblue.nl/product/856352/samsung-lu28r550uqrxen.html)

Door op het download-icoon te klikken worden de gegevens in je blokken ingeladen vanuit de externe URL.

## Afkorten van waardes
Op dit moment is de tekst bij de omschrijving vrij lang. Om dit aan te passen kunnen we gebruik maken van *modifiers*. Hiervoor ga je naar je slimme-container, kies je voor 'Data' en open je het configuratie-tabblad. Bij de variabele *omschrijving* voeg je onder *extern* een *modifier* toe. 

Bij *Modifier 1* plaats je `(.{0,150})(.{0,})` en bij *Vervanging* de waarde $1.
De waarde `150` kun je aanpassen naar ieder gewenst aantal karakters die je wilt tonen.

Om vervolgens nog wat achter deze tekst te plaatsen, bijvoorbeeld drie punten, voeg je nog een *modifier* toe. Hier voeg je `(^(.*)$)` toe. Bij 'vervanging' voeg je `$1...` toe. 

De tekst wordt nu afgekapt na 150 karakters en aan het einde worden drie punten toegevoegd. Meer informatie hierover vind je in [dit artikel](https://support.stripo.email/en/articles/6179720-how-to-use-fields-modifier-format-and-separator-helpers-for-smart-elements).
