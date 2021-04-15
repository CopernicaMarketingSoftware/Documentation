# Automatische koppelingen

Copernica kan aan andere applicaties gekoppeld worden met behulp van onze 
API's. API's (Application Programming Interfaces) maken het mogelijk 
om softwarematig data uit te wisselen. 
Copernica heeft een SOAP API en een REST API, waarmee je gegevens uit kunt 
lezen of bewerken. Een andere optie om applicaties te koppelen is het gebruik 
van [*WebHooks*](./webhooks), waarmee Copernica je *real time* notificaties 
kan sturen van acties als *kliks*, *opens* en *bounces*.

## REST vs. SOAP

Er zijn twee API's beschikbaar: een REST-API en een SOAP-API. De REST-API
is nieuwer, sneller en simpeler, en kun je dus het beste gebruiken. Echter, 
om oude koppelingen te blijven ondersteunen bieden we ook nog de SOAP-API
aan. De twee API's zijn qua functionaliteit niet volledig identiek, en soms
heb je beide API's tegelijk nodig indien je functies van beide systemen
wilt combineren.

## WebHooks

Naast de API's kent Copernica ook webhooks. Een webhook is
eigenlijk het tegenovergestelde van een API: een API call wordt door een
externe applicatie gedaan. Copernica verwerkt zo'n API call en stuurt het 
juiste antwoord terug. Een API call wordt dus geïnitieerd door de aanroeper.

WebHooks werken andersom. Als er een bepaalde gebeurtenis plaatsvindt,
zoals een klik of een open, dan initieert Copernica de aanroep. Copernica doet
een HTTP POST call naar een server van een gebruiker om de gebruiker van het
event op de hoogte te stellen. Het is aan jou, de gebruiker, om een script op 
je server te plaatsen en de call op te vangen en te verwerken.

Copernica begint pas met het aanroepen van jouw script nadat je dit via het
dashboard van Marketing Suite hebt geconfigureerd. Je moet precies aangeven
in welke events je bent geïnteresseerd, en via welk adres jouw script is
te benaderen.

WebHooks zijn heel krachtig omdat je *realtime* notificaties van 
gebeurtenissen krijgt. Het nadeel van webhooks is echter dat je geen 
controle hebt over de snelheid van de calls. Met name als je een webhook 
instelt die wordt aangeroepen telkens wanneer een mail wordt geopend (en
zoiets gebeurt heel vaak), dan kan de stroom van calls vanuit Copernica 
gigantisch worden. Als jouw servers onvoldoende capaciteit hebben om al deze 
events op te vangen, kun je beter geen webhooks gebruiken.

## Logfiles

Alle events die naar webhooks worden gestuurd, worden ook weggeschreven
naar logfiles. Als je niet in staat bent om webhooks in te stellen omdat
je het tempo van events niet altijd kunt bolwerken, of als het script dat 
de webhook verwerkt even offline was, dan kun je de logfiles uitlezen 
en de gemiste events op die wijze terugvinden.

De logfiles kunnen worden gedownload via het dashboard van Marketing Suite. 
Alle mailinggerelateerde events (zoals verzendingen, bounces, kliks en opens)
worden in logfiles bewaard en kun je via het dashboard uitlezen. Daarnaast
kun je met de REST API deze bestanden downloaden.

## Meer informatie

* [REST API methodes](./restv2/rest-api)
