# Campaign Tutorial: Lead Scoring en Nurturing

Lead nurturing is het proces waarin potentiële nieuwe klanten, ook wel 
leads genoemd, begeleid worden tot de aanschaf van een product of service 
door de geleidelijke toevoer van informatie.

Met Copernica's follow-up manager kunnen we dit proces niet alleen automatiseren, 
maar ook aanpassen voor een goede ervaring voor elke lead. We introduceren 
ook het bekende concept van een *leadscore*, die de interesse van een 
gebruiker moet reflecteren. Een gebruiker begint met een score van nul en 
de score wordt verhoogd elke keer dat er een actie ondernomen wordt die 
interesse aangeeft in jouw bedrijf, product of service. Wanneer de leadscore 
hoog genoeg is kan het sales team actie ondernemen. Deze tutorial laat zien 
hoe je een zogeheten drip campaign op kan zetten om leads te begeleiden.

## De campagne voorbereiden

### Content

Het doel van deze campagne is om nieuwe leads te begeleiden met de juiste 
informatie om uiteindelijk tot een koop over te gaan. Denk na over de interesses 
en behoeftes van een potentiële klant: Welke informatie hebben zij nodig? 
Wat vinden zij interessant? Wat onderscheidt jouw bedrijf van de concurrentie?

Natuurlijk is niet iedereen even geïnteresseerd. In deze tutorial beschouwen 
we drie verschillende types content, geschikt voor gebruikers met verschillende 
hoeveelheden interesse in jouw product of service.

* Lichte content: Dit is lichte, simpele content die bedoelt is om de interesse 
van je leads te trekken. Je kunt ze bijvoorbeeld tips, blogs of korte video's 
sturen die gerelateerd zijn aan jouw product of service. Pas op dat je 
hier de lead nog niet te veel onder druk zet om te kopen. De leadscore 
wordt door interesse in dit soort content maar met een kleine hoeveelheid verhoogd.
* Medium content: Deze content is geschikt voor mensen die al geïnteresseerd 
zijn in jouw product of gerelateerde producten. Dit is het moment om mensen 
te laten weten waarom ze voor jouw product moeten kiezen; Stuur hen een brochure, 
de voordelen van jouw product, een uitnodiging voor je nieuwsbrief, een korting, 
etc. Je kan de leadscore met een iets grotere hoeveelheid verhogen bij interesse 
in dit soort content.
* Zware content: Op dit punt is de lead erg geïnteresseerd. Dit is het moment 
om de lead over de streep te trekken. Wees niet bang om het persoonlijk aan 
te pakken; Bel de lead op of stuur een uitnodiging voor een bezoek aan je bedrijf 
of een congres. Daarnaast kun je bijvoorbeeld een speciaal aanbod sturen als 
de klant nu beslist. Wanneer de klant in gaat op deze informatie kun je de leadscore 
flink verhogen.

Denk na over hoe jouw content zich verhoudt tot deze categorieën en of je 
misschien extra content nodig hebt. Bereid dan de e-mail templates voor je 
campagne voor.

### Interesse bijhouden

Je kunt de interesse van de leads bijhouden in het profiel. Je kunt velden 
bijhouden waarin je aangeeft waar gebruikers op geklikt hebben of een leadscore 
bijhouden. Nadat je de velden hebt aangemaakt kun je opvolgacties aanmaken 
voor alle links naar je content.

Als je wil opslaan welke content bekeken is kun je de 
[tutorial over profiel verrijking](./campaign-tutorial-profile-enrichment) 
raadplegen. Als je een leadscore bijhoudt kun je de waarde verhogen met een 
Javascript execution box in de geavanceerde modus van de follow-up manager. 
Gebruik de volgende code in de Javascript box:

```Javascript
// voeg 1 toe aan de score als de score al bestaat
if (profile.fields.leadscore) profile.fields.leadscore + = 1;

// zet de leadscore op 1 als deze nog niet bestaat
else profile.fields.leadscore = 1;
```

## De informatiestroom opbouwen

Als je er zeker van bent dat de content naar smaak is en de informatie 
in het profiel wordt bijgehouden kun je de opvolgactie voor de informatie 
aanmaken. De structuur ziet er grofweg zo uit:

- Send email box: Stuur wat content naar de gebruiker. Maak een link 'email delivery' aan naar 
- Delay box: Geef de gebruiker wat tijd om te reageren. Maak een link aan naar
- Check destination box: Evalueer de reactie van de gebruiker en handel deze af.

In de laatste stap kun je checken of de lead op bepaalde links heeft geklikt 
of wat zijn huidige leadscore is. Je kunt dan bedenken wat je wil doen; 
De lead met rust laten, wat beter is voor je reputatie als deze niet reageert, 
meer informatie sturen, het profiel updaten, etc. Als je ervoor kiest om 
meer informatie te versturen moet je de bovenstaande stappen opnieuw doorlopen. 

De sleutel naar een succesvolle campagne is de interesse van je leads 
goed peilen en je content erop aanpassen. Het kan ook nuttig zijn om eerst 
een flowchart te maken om je follow-up overzichtelijk te houden.

## Het eindpunt

Uiteindelijk zal je campagne aflopen. Dit kan zijn omdat de klant niet 
reageert, omdat je alle informatie gedeeld hebt die je wilde delen of 
omdat de klant al zo geïnteresseerd is dat je deze kan contacteren. 
Wanneer de campagne afgelopen is kun je nadenken over de volgende stap, 
bijvoorbeeld het verwijderen van leads die niet geïnteresseerd zijn of 
het versturen van een mail naar sales voor elke lead met een interessante 
leadscore. Vergeet niet deze laatste stappen toe te voegen aan je follow-up 
om het maximale uit je campagne te halen.

## Meer informatie

Zin om aan de slag te gaan? Met de onderstaande artikelen kun je je meer 
verdiepen in follow-ups en de campagnes die je ermee kunt opzetten.

* [Opvolgacties](./follow-up-manager-ms)
* [Campagne Tutorial: Profiel verrijking](./campaign-tutorial-profile-enrichment)
