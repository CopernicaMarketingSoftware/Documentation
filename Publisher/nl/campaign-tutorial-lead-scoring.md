# Campagne tutorial: Lead scoring

Lead scoring is een proces waarbij punten worden toegekend om te bepalen 
hoe veelbelovend een lead is. Voor elke lead, of profiel in de database, 
wordt een lead score bijgehouden. Door middel van follow-ups kun je punten 
toevoegen en aftrekken voor alles dat een follow-up triggert. Denk aan 
link kliks, unsubscribes, (sub)profielen die aangemaakt worden, (sub)profielen 
die aangepast worden en subprofielen die verwijderd worden. 

Welke triggers je wilt gebruiken en het aantal punten dat je per trigger 
wil toewijzen of aftrekken hangt compleet van jou af. Deze tutorial legt 
simpelweg uit hoe je een score kan instellen, aanpassen en geeft tips 
over hoe je actie kunt ondernemen bij een veelbelovende lead.

## Lead score aanmaken en aanpassen

### Aanmaken

Selecteer de database waar je de leads in bewaart. Voeg een numeriek 
veld toe waarin je de score bijhoudt en zet de standaard waarde op 0. 
Nu kun je beginnen je leads te tracken.

### Aanpassen

De score aanpassen wordt gedaan met follow-ups, die toegevoegd kunnen worden 
voor databases, collecties, templates en links. Open de follow-up editor 
vanuit een van deze menus en kies de gewenste trigger. We gebruiken een 
Javascript execution box om de score te updaten, maar daarvoor kun je 
zoveel checks en delays toevoegen als je zelf wilt.

Wanneer de rest van je follow-up klaar staat kun je de Javascript 
execution box aanpassen met de volgende code:

```Javascript
// voeg 1 toe aan de score als de score al bestaat
if (profile.fields.leadscore) profile.fields.leadscore + = 1;
 
// zet de leadscore op 1 als deze nog niet bestaat
else profile.fields.leadscore = 1;
```

### Actie ondernemen

Als je lead score hoog genoeg is wil je natuurlijk actie ondernemen. Je kunt 
een handige [selectie](./selections-introduction) aanmaken om de meest 
veelbelovende leads te organizeren. Zo kan bijvoorbeeld jouw sales afdeling 
snel aan de slag. Het is dan wel handig om ook bij te houden of de leads 
al gecontacteerd zijn. 

Zo krijg je het voor elkaar:
* Maak een veld aan genaamd "lead_gecontacteerd" voor de database. Zet de 
default op "nee".
* Maak een nieuwe selectie "NieuweLeads".
* Ga naar de selectie regels en voeg een conditie "Check on field value" 
toe. 
* Selecteer "lead_gecontacteerd", "not equal to" en voer bij de waarde 
"nee" in om te voorkomen dat je mensen die al gecontacteerd zijn toevoegt. 
* Voeg een nieuwe conditie "Check on field value" toe. 
* Selecteer ditmaal de leadscore, "is greater than" en vul bij de waarde 
de minimale leadscore in.
* Sla de selectie op en test deze.

Nu ben je klaar om contact op te nemen met je leads! Dit kan ook met een 
automatische mail, maar zorg er altijd voor dat "lead_gecontacteerd" aangepast 
wordt.

## Meer informatie 

Wil je meer informatie over follow-ups? Wil je weten hoe je meer 
informatie verzamelt over je klanten? 
De links hieronder helpen je vast op weg. 

* [Follow-ups in Marketing Suite](./follow-up-manager-ms)
* [Personalizatie](./personalization)
* [Profiel verrijking tutorial](./campaign-tutorial-profile-enrichment)
