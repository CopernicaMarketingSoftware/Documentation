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

## Leadscore aanmaken

Selecteer de database waar je de leads in bewaart. Voeg een numeriek 
veld toe waarin je de score bijhoudt en zet de standaard waarde op 0. 
Nu kun je beginnen je leads te tracken.

## Leadscore updaten

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

## Actie ondernemen!

Als je leadscore hoog genoeg is wil je natuurlijk actie ondernemen. Je kunt 
een handige [selectie](./selections-introduction) aanmaken om de meest 
veelbelovende leads te organizeren, zodat de sales afdeling deze makkelijk 
kan contacteren. Je kan er ook voor kiezen om een automatische email te sturen, 
bijvoorbeeld om een uitnodiging voor een afspraak te sturen. We laten je 
zien hoe je beide kunt doen.

### Een geautomatiseerde email versturen

De follow-up:
- Ga naar de database of collectie waar je de leads van wil mailen.
- Maak een veld genaamd "lead_gecontacteerd" aan in je database. Zet de 
default op "nee".
- Open de follow-up manager en maak een follow-up aan met "(Sub)profile 
modified" als de trigger. 
- Voeg een "Check destination" box toe; hiermee gaan we checken of de score 
hoog genoeg is. Selecteer het veld met de leadscore en vergelijk deze met 
de gewenste waarde.
- Maak een "match" link met nog een "Check destination" box. Selecteer 
"lead_gecontacteerd" en controleer of deze op "nee" staat, zo niet is deze 
lead al gecontacteerd en hoeven we geen email te sturen.
- Maak opnieuw een "match" link aan en verbind deze met een "Send email" 
box om de daadwerkelijke email te versturen. Vul de details van je mailing 
in.
- Maak hier nog een "match" link naast met een "Update destination" box. 
Hierin selecteer je het "lead_gecontacteerd" veld en verander je de waarde 
naar "ja" om aan te geven dat deze lead nu gecontacteerd is.


Tip: Voeg je sales team toe aan de BCC; zo kunnen zij ook zien dat er 
iemand geïnteresseerd is. Je kunt de email ook rechtstreeks naar de sales 
afdeling sturen.

### Een selectie op basis van de leadscore maken

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

## Meer informatie 

Wil je meer informatie over follow-ups? Wil je weten hoe je meer 
informatie verzamelt over je klanten? 
De links hieronder helpen je vast op weg. 

* [Follow-ups in Marketing Suite](./follow-up-manager-ms)
* [Personalizatie](./personalization)
* [Profiel verrijking tutorial](./campaign-tutorial-profile-enrichment)
