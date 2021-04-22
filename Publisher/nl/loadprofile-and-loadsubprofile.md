# Loadprofile en loadsubprofile

Smarty-personalisatie heeft doorgaans betrekking tot gegevens uit de geadresseerde database. Het kan echter voorkomen dat je meerdere databases met relevante data tot je beschikking hebt. De loadprofile-functie maakt het mogelijk om profielen uit andere databases in te laden. 

Wil je subprofielgegevens ophalen vanuit de geaddresseerde database of een collectie in een andere database? Dan maak je gebruik van de loadsubprofile-functie.

## Loadprofile

In het onderstaande voorbeeld worden profielgegevens vanuit een andere database ingeladen door middel van de loadprofile-functie:

`{loadprofile source="naamvananderedatabase" assign=geladenprofiel}`

**Source**: hier vul je de naam in van een database in hetzelfde account. Alleen het eerste profiel uit die database wordt opgehaald en is aan te roepen met de variabele {$geladenprofiel.VELDNAAM}. 

Als je een specifiek profiel uit een database wilt halen, dan kan dat op basis van een veldnaam in beide databases. 
Stel je hebt een database (DatabaseA) met al je profielen waarin het veld 'Accountmanager' staat. Je bestemming heeft hier de waarde 'Jan'. Nu wil je uit 'DatabaseB' (waar de accountmanagers in staan) de gegevens van Jan ophalen. In databaseB staat een veld 'Voornaam' waar we op kunnen zoeken. De loadprofile wordt nu:

`{loadprofile source="databaseB" Voornaam=$profile.Accountmanager assign=geladenprofiel}`

Het is ook mogelijk om profielen uit een selectie op te halen, waarbij *source* naast de databasenaam ook de selectienaam moet bevatten,
gescheiden met een punt(.).

`{loadprofile source="naamvananderedatabase.selectieindiedatabase" assign=geladenprofiel}`

## Loadsubprofile
Om subprofielen uit een (andere) database op te halen, gebruik je *loadsubprofile*. Hierbij moet *source* niet alleen een databasenaam bevatten, maar ook de naam van de collectie waaruit je de subprofielen wilt halen (een database kan immers meerdere collecties bevatten). Een voorbeeld waarbij we het eerste subprofiel van de bestemming uit database *naamvananderedatabase*, collectie *collectieuitdatabase* halen is:

`{loadsubprofile source="naamvananderedatabase:collectieuitdatabase" profile=$profile.id assign=geladensubprofiel}`

Nu kunnen we het geladen subprofiel oproepen met variabele *$geladensubprofiel*. Als de collectie persoonsgegevens bevat van medewerkers van het bedrijf, dan kunnen we die gegevens als volgt opvragen (een voorbeeld): *{$geladensubprofiel.Voornaam}*.

### Meerdere (sub)profielen

Een database bevat meerdere profielen en subprofielen en het kan voorkomen dat je meerdere wilt inladen. Een praktisch voorbeeld: in je database 'Relaties' staan bedrijven (per bedrijf een profiel) en in 'Relaties' staat de collectie 'Medewerkers'. In die collectie staan de gegevens van één of meerdere medewerkers van het bedrijf. Stel dat we naar alle bedrijven in database 'Relaties' een mail willen sturen met informatie over de bij ons bekende medewerkers, dan willen we dus alle subprofielen uit collectie 'Medewerkers' ophalen. Hiervoor gebruiken we de optie **multiple**:

`{loadsubprofile source="Relaties:Medewerkers" profile=$profile.id assign=geladensubprofielen multiple=true}`

Met bovenstaande code worden alle subprofielen geladen uit de collectie 'Mederwerkers' binnen de 'Relaties' database welke horen bij je bestemming. Alle bijbehorende subprofielen worden in $geladensubprofielen gezet.

Nu willen we alle opgehaalde subprofielen nog netjes in de mail plaatsen. De variabele $geladensubprofielen is een zogenaamde *array*, een lijst van
gegevens. Die moeten we systematisch doorlopen, waarbij we gebruik maken van de functie *foreach*. Doorgaand op ons praktische voorbeeld:

```
{foreach $geladensubprofielen as $geladensubprofiel} 
    Voornaam: {$geladensubprofiel.Voornaam}<br />
    Achternaam: {$geladensubprofiel.Achternaam}<br /> 
    Email: {$geladensubprofiel.Emailadres}<br />
{/foreach}
```

Hierboven wordt de *array* $geladensubprofielen met subprofielen doorlopen. Tijdens dit doorlopen wordt het huidige subprofiel telkens in $geladensubprofiel gezet. Vervolgens printen we de inhoud van velden 'Voornaam', 'Achternaam' en 'Emailadres' op een overzichtelijk manier.

## Overige opties

Hierboven hebben we de werking van opties **multiple** gezien. Enkele andere opties zijn de volgende:

-   **limit** - Als *multiple* wordt gebruikt, maar je niet alle subprofielen hebt, kun je een beperking opleggen met limit, dus bijvoorbeeld *limit=5* beperkt het aantal geladen (sub)profielen tot 5
-   **profile** - Hierboven gebruikten we *profile* om alle subprofielen behorende tot het geadresseerde profiel op te halen. Het is ook mogelijk deze optie weg te laten, waardoor alle (sub)profielen worden geladen.
-   **orderby='veldnaam asc/desc'** - Als je de resultaten bij het laden van meerdere (sub)profielen wilt sorteren (dan gebruik je dus *multiple=true*), dan kun je *orderby* gebruiken. Tussen de accolades zet je de naam van het veld waarop je wilt sorteren en daarachter kun je *asc* of *desc* zetten om op respectievelijk oplopende of aflopende volgorde te sorteren. Zonder het gebruik van de optie *orderby* wordt er op ID en aflopend gesorteerd.

## In de praktijk

In de uitleg hierboven werd een praktisch voorbeeld geschetst: we willen alle bij ons bekende bedrijven uit database 'Relaties' een mail sturen met de bij ons bekende werknemers die bij dat bedrijf horen. Deze medewerkers staan in collectie 'Medewerkers'. Ter demonstratie willen we maximaal 5 subprofielen in omgekeerd alfabetisch volgorde van voornaam tonen. De code wordt dan als volgt:

```
{loadsubprofile source="Relaties:Medewerkers" profile=$profile.id assign=geladensubprofielen multiple=true limit=5 orderby='Voornaam desc'}

Geachte {$Bedrijfsleider},

Van uw bedrijf, {$Bedrijf} zijn de volgende medewerkers bekend:
{foreach $geladensubprofielen as $geladensubprofiel}
    - {$geladensubprofiel.Voornaam} {$geladensubprofiel.Achternaam}, email: {$geladensubprofiel.Emailadres};
{/foreach}
```

Het resultaat:

```
Geachte Jan Janssen,

Van uw bedrijf, Voorbeeld B.V., zijn de volgende medewerkers bekend:
     - Freek Frekens, email:  f.frekens@voorbeeldbv.nl;
     - Egbert Douwes, email:  e.douwes@voorbeeldbv.nl;
     - Douwe Egberts, email:  d.egberts@voorbeeldbv.nl;
     - Charles Fransman, email:  c.fransman@voorbeeldbv.nl;
     - Bert Bakker, email: b.bakker@voorbeeldbv.nl;
```
