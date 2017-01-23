# Publisher templates

In de oude Copernica Publisher omgeving wordt een template/documentstructuur
gebruikt. Een template bevat de globale opmaak van de mail en de elementen die
voor elke mailing vaststaan (zoals logo's en een afmeldlink). Verder bevat een
template vooral blanco plekken die later nog kunnen worden ingevuld. Als je 
een mailing wilt samenstellen, maak je op basis van een template eerst een 
document aan, en kun je de blanco plekken vullen met teksten en afbeeldingen.
Een document is dus eigenlijk een ingevulde template.

Vaak (maar niet altijd!) is er een rolverdeling tussen de mensen die templates 
bouwen, en marketeers die mailings (documenten) samenstellen en versturen. 
Templates worden gemaakt door webdesigners of programmeurs met verstand van HTML.
Zij bepalen de opmaak van de mailing en wijzen de plaatsen aan waar teksten en 
afbeeldingen kunnen worden geplaatst. Als een template eenmaal is gebouwd kan 
deze door marketeers worden voorzien van teksten en afbeeldingen, en kunnen er 
mailings mee worden verstuurd.

In dit artikel gaan we dieper in op het ontwerpen van templates. Het is echter
geen beginnerscursus HTML. We gaan er van uit dat je over voldoende kennis van
HTML beschikt om in ieder geval een eenvoudige website te bouwen.


## Houd het eenvoudig

Via Copernica Publisher kun je templates maken. Als je voor de "e-mailings"
optie in het hoofdmenu kiest en een nieuwe template aanmaakt, verschijnt aan
de rechterkant van het scherm een groot formulier waar je de broncode van je 
template kunt invoeren. Hier kun je de HTML code van de template plaatsen. Maar
let op: de HTML code die je invoert kun je het beste eenvoudig houden. Hoe 
eenvoudiger de broncode van de template, hoe groter de kans dat je e-mail 
door veel van je ontvangers kan worden gelezen.

E-mailberichten worden op allerlei soorten manieren gelezen: via mobiele devices
zoals tablets (met best een groot scherm), telefoons (klein scherm) of horloges
(piepklein!). Maar ook op gewone laptops en ouderwetse desktops met speciaal
daarvoor ontwikkelde e-mailprogramma's als Outlook of Thunderbird, of met
webmail omgevingen als Gmail of Hotmail. Bovendien gebruiken veel mensen
verouderde software en filteren e-mailprogramma's en providers berichten en 
worden scripts en ingewikkelde CSS codes vaak uit mails verwijderd. Een 
eenvoudige template is een stuk minder kwetsbaar dan een complexe template,
en leidt tot minder problemen en een groter bereik.

Maar uiteindelijk ben je, als gebruiker van Copernica, helemaal vrij om je
template zo op te maken als je zelf wilt. Copernica verstuurt de HTML code
precies zoals jij die hebt ingevoerd, en je kunt het dus zo bont maken als
je maar wilt.


## Contentblokken

In een template kun je blanco plekken opnemen die later op documentniveau
worden voorzien van content. Je bepaalt hiermee waar later afbeeldingen en 
teksten mogen worden geplaatst. Dit noemen we *contentblokken*.

Er zijn drie *tags* waarmee je contentblokken maakt: [text], [image] en [loop]. 
Deze tags kun je in de broncode van de template opnemen om aan te geven
dat daar op documentniveau content kan worden geplaatst. De werking van de 
[text] en [image] tags spreekt voor zich: op elke plek in de template waar je 
deze tags plaatst, kunnen later op documentniveau teksten en afbeeldingen 
worden geplaatst. De looptags behoeven wat meer uitleg, en stellen je in staat 
om op documentniveau herhalingen in te voeren. Als je bijvoorbeeld gebruikers 
in staat wilt stellen om mailings te maken met een variabel aantal paragrafen 
of een variabel aantal artikelen, dan kun en dit doen door loopblokken in de 
template op te nemen.


## Vaste afbeeldingen

Afbeeldingen worden meestal op documentniveau toegevoegd. Maar ook 
in de template kun je al afbeeldingen plaatsen, zoals het bedrijfslogo
dat voor elke mailing immers hetzelfde is. Hier is niks bijzonders aan, en
kun je met doodnormale HTML <&lt;img&gt>; tags doen. Maar let wel even op
dat de afbeelding waar je naar verwijst, ook aan de template is gekoppeld.

Via het dropdown menu van Publisher kun je het dialoogscherm "Bestanden en
afbeeldingen" openen. In dit dialoogvenster kun je alle afbeeldingen en 
bestanden beheren waarnaar in de template wordt verwezen. Als je hier
een afbeelding uploadt, zoals *plaatje.gif*, dan kun je in de template de
&lt;img src="plaatje.gif"&gt; tag plaatsen. Copernica zorgt dat de afbeelding
wordt gehost zodat ontvangers van de e-mail de afbeelding ook krijgen te zien.

Je kunt natuurlijk ook zelf de afbeeldingen hosten (&lt;img src="http://www.mijnbedrijf.nl/plaatje.gif"&gt;),
maar verstandig is dit niet. Als je de afbeelding uploadt naar Copernica,
verzorgt Copernica de hosting en kunnen we de afbeelding gebruiken om kliks
en opens te tracken.

