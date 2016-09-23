Als je extra gegevens aan een
[profiel](./introduction-to-databases.md "Personaliseren met behulp van multidimensionale databases")
wilt koppelen, welke aankopen iemand heeft gedaan in je webshop
bijvoorbeeld, kun je dat het makkelijkst doen door gebruik te maken van
een [multidimensionale
database](./creating-your-own-databases.md).

In Copernica hoeven profielgegevens daarom niet perse in een platte
structuur te worden opgeslagen (bijvoorbeeld naam, e-mailadres,
woonplaats), maar kunnen ze ook multidimensionaal worden bewaard.
Voorheen kon dit alleen door voor elke dimensie een collectie (een
verzameling van gegevens of ‘subprofielen’ die gekoppeld zijn aan een
profiel) aan te maken in de database. Nu heb je echter ook de
mogelijkheid gegevens uit verschillende databases aan elkaar koppelen,
waardoor het gebruik van de door veel gebruikers als lastig ervaren
collecties niet meer nodig is.

In e-mailings kun je vervolgens personaliseren op basis van die
verschillende databases.

Hoe gaat dat in zijn werk?
--------------------------

Stel: je wilt van je database met bedrijven bijhouden welke werknemers
zij allemaal in dienst hebben. En in e-mailings wil je bij de
personalisatie gebruikmaken van zowel bedrijfsnamen, als namen van
werknemers. Natuurlijk zijn er meer voorbeelden denkbaar, welke
producten iemand in een webshop heeft gekocht bijvoorbeeld, maar voor
deze tutorial houden we bedrijven en werknemers aan.

-   Een database met *Bedrijven* waar voor elk bedrijf de naam wordt
    opgeslagen.
-   Een database met *Medewerkers* waar bij elke medewerker de naam en
    het e-mailadres wordt opgeslagen.

Hoe richt je een dergelijke database in?
----------------------------------------

Als je wilt bijhouden welke medewerkers een bedrijf heeft, doe je dat
niet door een extra veld aan te maken in de bedrijvendatabase, maar
juist een extra veld in de database *Medewerkers*. In Copernica kun je
in de medewerkersdatabase een zogenaamd referentieveld aanmaken dat
verwijst naar de database *Bedrijven*. Kortom: in de database
*Bedrijven* hebben we dan twee velden: *ID* en *Bedrijfsnaam*, en in de
database *Medewerkers* krijgen we drie velden: *ID*, *Naam* en een
referentieveld *Werkgever* dat je laat verwijzen naar de database
*Bedrijven*.

We kunnen onze databases dan vullen met de volgende gegevens:

**Database *Bedrijven*** \
 ID 1, bedrijfsnaam: Initech \
 ID 2, bedrijfsnaam: Intertrode

**Database *Medewerkers***\
 ID 1, naam: Milton Waddams, werkgever: 1\
 ID 2, naam: Peter Gibbons, werkgever: 1\
 ID 3, naam: Michael Bolton, werkgever: 2

Omdat bij het inrichten van de database is ingesteld dat *Werkgever* een
referentieveld is, weet de software nu dat Milton en Peter bij Initech
werken, en Michael bij Intertrode.

Personaliseren
--------------

Hoe kun je hier nu op personaliseren? Veronderstel dat je een mailing
wilt sturen aan alle medewerkers. In de mailing wil je personaliseren op
naam van de medewerker, en het bedrijf waar ze voor werken.

*Beste {\$naam|escape},*\
\
 *Volgens onze gegevens werk je bij bedrijf
{\$werkgever.bedrijfsnaam|escape}.*\
\

In bovenstaand voorbeeld maken we gebruik van de korte notatie, maar je
zou ook kunnen personaliseren met {\$profile.naam} en
{\$profile.werkgever.bedrijfsnaam}. Hoe dan ook: het is eenvoudig. Omdat
is aangegeven dat *werkgever* een referentieveld is, worden automatisch
alle gegevens van het profiel waarnaar wordt verwezen in die variabele
ingeladen.

In dit voorbeeld heeft de database *Bedrijven* slechts één veld,
namelijk *bedrijfsnaam* - maar in een live omgeving is dit natuurlijk
veel uitgebreider.

Een stap verder
---------------

Laten we het een stap verder gaan - we willen nu een mailing versturen
aan alle bedrijven (dan moet er natuurlijk nog wel een e-mailveld aan
het bedrijf worden toegevoegd, dus naast de bedrijfsnaam hebben we nu
ook een e-mailadres) en in die e-mail willen we melden welke medewerkers
er bij het bedrijf werken. Om precies te achterhalen welke andere
databases en welke andere profielen er naar een bedrijf verwijzen, heeft
elk profiel voortaan standaard ook een referentieveld. Via dit veld kun
je opvragen welke verwijzende profielen er zijn:

*Mailing aan bedrijf {\$bedrijfsnaam|escape},*\
 \
 *Dit zijn jullie medewerkers:*\
 *{foreach \$referrers.medewerkers as \$medewerker}*\
 *    {\$medewerker.naam|escape}*\
 *{/foreach}*

Opnieuw gebruiken we de korte notatie. Het had ook met
{\$profile.bedrijfsnaam} en {\$profile.referrers.medewerkers} gekund. De
variabele {\$profile.referrers} bevat alle databases die verwijzen naar
het profiel, en via {\$profile.referrers.*databasenaam*} kun je door die
verwijzende profielen heen itereren.

Nog een stap verder
-------------------

De volgende uitdaging: we willen nu een mailing sturen naar alle
medewerkers, en bij elke medewerker willen we opnieuw melden bij welk
bedrijf hij werkt, maar ook wie er volgens ons zijn of haar collega's
zijn:

*Beste {\$naam|escape},*\
 \
 *Volgens onze gegevens werk je bij bedrijf
{\$werkgever.bedrijfsnaam|escape}.*\
 \
 *{if \$werkgever.referrers.medewerkers|count \> 1}*\
 *    En dit zijn je collega's:*\
 *     {foreach from=\$werkgever.referrers.medewerkers item=collega}*\
 *        {if \$collega.id != \$id}*\
 *            {\$collega.naam|escape}*\
 *        {/if}*\
 *    {/foreach}*\
 *{/if}*

Het begint makkelijk: we sturen de mailing naar de database
*Werknemers*, dus de variabele {\$naam} bevat gewoon de naam van de
medewerker. Ook redelijk simpel is de variabele {\$werkgever}, een veld
dat verwijst naar het profiel uit de bedrijvendatabase, en waar dus weer
de bedrijfsnaam van kan worden opgevraagd: {\$werkgever.bedrijfsnaam}.

Als we nu willen weten welke profielen uit de database *Medewerkers*
naar dat bedrijf verwijzen (met andere woorden: welke medewerkers dat
bedrijf heeft), dan kunnen we dat opvragen via de 'referrers'-variabele:
{\$werkgever.referrers.medewerkers}. Dan zie je in ons voorbeeld nog
twee {if} statements staan. Hiermee zorgen we dat we alleen maar de
collega's van de desbetreffende medewerker opsommen en niet de naam van
de medewerker zelf. Eerst controleren we of het bedrijf wel meer dan een
medewerker heeft. Want als het bedrijf maar een medewerker zou hebben,
dan moet dit automatisch wel de persoon zijn naar wie de mailing wordt
verzonden, en hoeven we ook niet het zinnetje "dit zijn je collega's" in
de mailing op te nemen. Binnen de loop van medewerkers staat een tweede
{if} statement waarmee we zorgen dat we alleen de namen van collega's
opsommen, en niet van de geadresseerde zelf. Als we deze mailing zouden
versturen aan onze voorbeelddatabase, dan zou Michael Bolton een mailtje
ontvangen waarin alleen maar de tekst "Volgens onze gegevens werk je bij
Intertrode" staat. Milton en Peter zouden een mail ontvangen waarin ze
zien dat ze één collega hebben.

Meerdere referentievelden
-------------------------

We gaan nog een stap verder. In de database *Medewerkers*was er maar een
referentieveld opgenomen: het veld *werkgever*. Wat gebeurt er als er
meerdere referentievelden zijn? Bijvoorbeeld niet alleen een veld
*werkgever*, maar ook een veld *vorige\_werkgever* dat ook naar de
database *Bedrijven* verwijst? In een mailing naar de medewerkers kun je
beide velden natuurlijk gewoon gebruiken met {\$werkgever.bedrijfsnaam}
en {\$vorige\_werkgever.bedrijfsnaam}. Maar wat gebeurt er als je
{\$werkgever.referrers.medewerkers} aanroept?

De variabele {\$referrers.medewerkers} bevat alle verwijzingen vanuit de
database *Medewerkers* - dus ongeacht welk referentieveld je gebruikt.
We moeten dus ons volgende voorbeeld een beetje aanpassen, omdat we
alleen de huidige collega's willen vermelden. Dat kan door precies aan
te geven op basis van welk referentieveld je wilt selecteren:

*Beste {\$naam|escape},*\
\
 *Volgens onze gegevens werk je bij bedrijf
{\$werkgever.bedrijfsnaam|escape}.*\
\
 *{if \$werkgever.referrers["werkgever@medewerkers"]|count \> 1}*\
 *    En dit zijn je collega's:*\
 *     {foreach from=\$werkgever.referrers["werkgever@medewerkers"]
item=collega}*\
 *        {if \$collega.id != \$id}*\
 *            {\$collega.naam|escape}*\
 *        {/if}*\
 *    {/foreach}*\
 *{/if}*

Zo simpel is het. Normaal gesproken bevat {\$referrers.medewerkers} (of
{\$referrers["medewerkers"] - je kunt dat in Smarty op meerdere manieren
schrijven, met een punt-notatie of met vierkante haakjes) alle
verwijzingen vanuit de database *Medewerkers*. Met een @-teken kun je
aangeven dat je alleen de verwijzingen door een specifiek referentieveld
wilt gebruiken. Omdat de Smarty engine in de war raakt van
apenstaartjes, moet je dit nog even tussen quotes en vierkante haken
plaatsen.

**Let op:** voor het maken van templates met Copernica worden ook
vierkante haken gebruikt. Als je bovenstaande personalisatie dus in een
template wilt gebruiken, moet je de vierkante haken vervangen door
[ldelim] en [rdelim]. Voor personalisatie binnen een document, in een
tekstblok bijvoorbeeld, hoef je je hier geen zorgen over te maken.

Javascript
----------

Alle variabelen die toegankelijk zijn in Smarty, kun je ook via
javascript aanspreken. Javascript gebruik je bijvoorbeeld voor condities
bij opvolgacties of conditionele tekstblokken. Daar waar je in smarty
{\$profile.naam} kon gebruiken, is er in javascript de equivalente
variabele profile.naam. Een overzichtje:

**Smarty**\
 *{\$profile.naam}   *

**Javascript-alternatief**\
 *profile.naam*

**Smarty**\
 *{\$profile.werkgever.bedrijfsnaam} *

**Javascript-alternatief**\
 *profile.werkgever.bedrijfsnaam*

**Smarty**\
 *{foreach \$profile.werkgever.referrers.medewerkers as \$medewerker}*\
 *{/foreach}*

**Javascript-alternatief**\
 *for (var i=0; i\<profile.werkgever.referrers.medewerkers.length; i++)
{*\
 *...*\
 *}*

**Smarty**\
 *{foreach \$profile.werkgever.referrers["werkgever@medewerkers"] as
\$medewerker}*\
 *    ...*\
 *{/foreach}*

**Javascript-alternatief**\
 *for (var i=0;
i\<profile.werkgever.referrers["werkgever@medewerkers"].length; i++) {*\
 *...*\
 *}*
