# E-mailings in de Publisher

De Publisher hanteert een andere manier om tot een mooie en werkende template te komen. In vergelijking met Marketing Suite is de aanpak wat technischer en moeilijker, omdat kennis van HTML en CSS vereist is. De Publisher heeft echter wel enkele functionaliteiten die in de Marketing Suite niet bestaan, dit omdat de Publisher al veel langer in ontwikkeling is. Ook zorgt de manier van werken, namelijk met HTML, voor meer vrijheid. 

## Werken met Publisher templates

In de Publisher omgeving wordt een template/documentstructuur
gebruikt. Een template bevat de globale opmaak van de mail en de elementen die
voor elke mailing vaststaan (zoals logo's en een afmeldlink). Verder bevat een
template vooral blanco plekken die later kunnen worden ingevuld. Als je 
een mailing wilt samenstellen maak je op basis van een template een 
document aan, en kun je de blanco plekken vullen met teksten en afbeeldingen.
Een document is dus eigenlijk een ingevulde template.

Vaak is degene die templates bouwt niet dezelfde persoon als diegene die ze gebruikt om mailings (documenten) samenstellen en versturen. Templates worden gemaakt door webdesigners of programmeurs met verstand van HTML.
Zij bepalen de opmaak van de mailing en wijzen de plaatsen aan waar teksten en 
afbeeldingen kunnen worden geplaatst (de layout). Als een template eenmaal is gebouwd kan 
deze door bijvoorbeeld een marketeer worden voorzien van teksten en afbeeldingen, en kunnen er 
mailings mee worden verstuurd.

In dit artikel gaan we dieper in op het ontwerpen van templates. Het is echter
geen beginnerscursus HTML. We gaan er van uit dat je over voldoende kennis van
HTML beschikt om in ieder geval een eenvoudige website te bouwen.

### Een voorbeeld van een Publisher template

Via Copernica Publisher kun je templates maken. Als je voor de "e-mailings"
optie in het hoofdmenu kiest en een nieuwe template aanmaakt, verschijnt aan
de rechterkant van het scherm een groot formulier waar je de broncode van je 
template kunt invoeren. Hier kun je de HTML code van de template plaatsen. Maar
let op: de HTML code die je invoert kun je het beste eenvoudig houden. Hoe 
eenvoudiger de broncode van de template, hoe groter de kans dat je e-mail 
door veel van je ontvangers kan worden gelezen.

```
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
    <p>
        [text name="example"]
    </p>
    </body>
</html>
```

Op documentniveau kan een tekst worden geplaatst op de plek van de [text] tag.

## Contentblokken

Zoals gezegd bestaat een template uit HTML code. Deze kun je zelf maken en je
kunt er blanco plekken in opnemen die later op documentniveau worden voorzien 
van content. Je bepaalt hiermee waar later afbeeldingen en teksten mogen 
worden geplaatst. Deze blanco plekken noemen we *contentblokken*.

Er zijn drie *tags* waarmee je **contentblokken** maakt: [text], [image] en [loop]. 
Deze tags kun je in de broncode van de template opnemen om aan te geven
dat daar op documentniveau content kan worden geplaatst. De werking van de 
[text] en [image] tags spreekt voor zich: op elke plek in de template waar je 
deze tags plaatst, kunnen later op documentniveau teksten en afbeeldingen 
worden geplaatst. De looptags behoeven wat meer uitleg, en stellen je in staat 
om op documentniveau herhalingen in te voeren. Als je bijvoorbeeld gebruikers 
in staat wilt stellen om mailings te maken met een variabel aantal paragrafen 
of een variabel aantal artikelen, dan kun en dit doen door loopblokken in de 
template op te nemen.

Lees voor meer informatie het artikel over [contentblokken](emailings-publisher-contentblocks).


## Let op met blokhaken!

Binnen een template hebben blokhaken ('[' en ']') een speciale betekenis. Deze
tekens worden gebruikt om de hierboven beschreven contentblokken mee te markeren, 
en je kunt ze gebruiken voor [if] statements en templatevariabelen (een voorbeeld
kun je zien in [het artikel over [loop] tags](loop-tag)). Doordat blokhaken een 
speciale betekenis hebben, moet je opletten als je ergens "gewone" blokhaken plaatst, 
zoals in de stylesheet bovenaan een template. Deze blokhaken worden namelijk door
Copernica herkend als het begin van een speciaal onderdeel van de template en 
vaak resulteert dit in een fout. Er zijn twee trucs om dit te voorkomen: door
gebruik te maken van [ldelim] en [rdelim], of door [literal] en [/literal] te
gebruiken.

Als je een gewone blokhaak in een template wilt zetten kun je gebruik maken van 
[ldelim] en [rdelim]. De [ldelim] en [rdelim] tags worden door Copernica 
namelijk automatisch omgezet naar de echte '[' en ']' tekens. Dus als je ergens 
een blokhaak wilt zetten, maar niet wilt dat Copernica deze blokhaak als 
speciaal teken herkent, dan vervang je de blokhaken gewoon door 
[ldelim] en [rdelim]:

```
<style type="text/css">
    div[ldelim]class=x[rdelim] {
        font-weight: bold;
    }
</style>
```

Als je een heel groot stuk CSS code hebt dat vol staat met blokhaken, en waar
bovendien nergens gebruik wordt gemaakt van contentblokken (zodat alle blokhaken
in dat stuk geen speciale template betekenis hebben), dan kun je ook [literal]
en [/literal] gebruiken. Met deze tags kun je een deel van je broncode markeren
waarbinnen alle blokhaken geen speciale betekenis hebben.

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

Foto's en plaatjes worden meestal pas op documentniveau toegevoegd. Maar ook 
in de template kun je al afbeeldingen plaatsen, zoals het bedrijfslogo
dat voor elke mailing immers hetzelfde is. Hier is niks moeilijks aan, en
kun je met doodnormale HTML &lt;img&gt; tags doen. Maar let wel op
dat de afbeelding waar je naar verwijst, ook aan de template is gekoppeld.

Via het dropdown menu van Publisher kun je het dialoogscherm "Bestanden en
afbeeldingen" openen. In dit dialoogvenster kun je alle afbeeldingen en 
bestanden beheren waarnaar in de template wordt verwezen. Als je hier
een afbeelding uploadt, zoals *plaatje.gif*, dan kun je in de template de
&lt;img src="plaatje.gif"&gt; tag plaatsen. Wij zorgen dat de afbeelding
wordt gehost op de servers van Copernica zodat ontvangers van de e-mail de 
afbeelding krijgen te zien.

Je kunt natuurlijk ook zelf de afbeeldingen hosten, maar verstandig is dit 
niet. Als je de afbeelding uploadt naar Copernica, verzorgt Copernica de 
hosting en kunnen we de afbeelding gebruiken om kliks en opens te tracken.

Het dialoogvenster "Bestanden en afbeeldingen" kan ook worden gebruikt om
bestanden te beheren. Dit is een nogal theoretische toepassing. HTML kent
naast de &lt;img&gt; tag ook allerlei andere tags opnemen die verwijzen
naar extern gehoste content. Bijvoorbeeld &lt;object&gt;, &lt;embed&gt;, 
&lt;iframe&gt; en &lt;applet&gt;. Als je dit soort tags gebruikt (wat we *zeer
sterk* afraden), dan kun je het bestand waar naar wordt verwezen, gelijk 
een afbeelding, via dit dialoogvenster koppelen.

## Houd het eenvoudig

E-mailberichten worden op allerlei soorten manieren gelezen: via mobiele devices
zoals tablets (met best een groot scherm), telefoons (klein scherm) of horloges
(piepklein!). Maar ook op gewone laptops en ouderwetse desktops met speciaal
daarvoor ontwikkelde e-mailprogramma's als Outlook of Thunderbird, of met
webmail omgevingen als Gmail of Hotmail. Bovendien gebruiken veel mensen
verouderde software en filteren e-mailprogramma's en providers berichten en 
worden scripts en ingewikkelde CSS codes vaak uit mails verwijderd. Een
template moet dus wel tegen een stootje kunnen. Een eenvoudige template is een 
stuk minder kwetsbaar dan een complexe template, en leidt tot minder problemen 
en een groter bereik.

## Aanmaken templates/documenten

Klik links boven op **Template**>**Nieuwe template** om een nieuwe template aan te maken. In het volgende venster kan er een naam gegeven worden aan de template en kan de template eventueel met voorbeeldcode gevuld worden. In het venster rechts kan het template bekeken en aangepast worden. In het broncode template tabblad kan de html van de template aangepast worden. Hier dienen ook de bovengenoemde contentblokken aangemaakt worden. Om deze contentblokken te vullen moet er een document aangemaakt worden. Klik op **Document**>**Nieuw document** om een document aan het template toe te voegen. Dit document is de uiteindelijk mailing en hierin is het mogelijk om de contentblokken te vullen. 

## Archiveren en mappen

Om structuur te houden binnen de templates is het mogelijk om mappen te maken. Om een map aan te maken klik je op  **Template**>**Beheer mappen**. In dit menu kunnen mappen toegevoegd of aangemaakt worden. Om een template die geselecteerd is naar een map te verplaatsen klik dan op **Template**>**Verplaats in/uit map**. 
Het is ook mogelijk om templates te archiveren. Dit zorgt ervoor dat deze niet meer ingeladen worden en ze verdwijnen uit het overzicht, dit schept meer structuur en scheelt tijd. Klik op  **Template**>**Archiveren** om 1 template te archiveren klik op **Template**>**Archiveren van meerdere documenten** om meerdere templates te archiveren. Linksonder kan het vinkje bij **Archief** aangezet worden om alle gearchiveerde templates te zien. 


