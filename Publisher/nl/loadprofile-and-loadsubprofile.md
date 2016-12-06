Normaal gesproken gebeurt Smarty-personalisatie met data uit de
geadresseerde database. Maar indien je meerdere databases hebt met
gerelateerde data, laat je hier dan niet door beperken! Met de functie
Loadprofile kun je profielen uit (andere!) databases inladen.
Loadsubprofile doet datzelfde, maar dan met subprofielen uit een
(andere) databases. Het kan echter ook gebruikt worden om meerdere
subprofielen onder het geadresseerde profiel in te laden.

Eerst een eenvoudig voorbeeld: loadprofile wordt gebruikt om een profiel
uit een andere database op te halen.

~~~~ {.language-php}
{loadprofile source="naamvananderedatabase" assign=geladenprofiel}
~~~~

*Source* moet de naam van een database in hetzelfde account bevatten.
Alleen het eerste profiel uit die database wordt opgehaald en is
vervolgens aan te roepen met de variable \$geladenprofiel. Als je een
specifiek profiel uit een database wilt halen, dan kan dat op basis van
het ID. Dit gaat als volgt:

~~~~ {.language-php}
{loadprofile source="naamvananderedatabase" id=1337 assign=geladenprofiel}
~~~~

Het is ook mogelijk om profielen uit een selectie op te halen, waarbij
*source* naast de databasenaam ook de selectienaam moet bevatten,
gescheiden met een punt(.).

~~~~ {.language-php}
 {loadprofile source="naamvananderedatabase.selectieindiedatabase" assign=geladenprofiel}
~~~~

Om subprofielen uit een (andere) database op te halen, gebruik je
*loadsubprofile*. Hierbij moet *source* niet alleen een databasenaam
bevatten, maar ook de naam van de collectie waaruit je de subprofielen
wilt halen. (Een database kan immers meerdere collecties bevatten.) Een
voorbeeld waarbij we alle het eerste subprofiel van profiel met id 1337
uit database *naamvananderedatabase*, collectie *collectieuitdatabase*
halen.

~~~~ {.language-php}
{loadsubprofile source="naamvananderedatabase:collectieuitdatabase" profile=1337 assign=geladensubprofiel}
~~~~

Nu kunnen we het geladen subprofiel oproepen met variabele
*\$geladensubprofiel*. Als de collectie persoonsgegevens bevat van
medewerkers van het bedrijf uit profiel met id 1337, dan kunnen we die
gegevens als volgt opvragen (een voorbeeld):
*{\$geladensubprofiel.Voornaam}*.

Meerdere (sub)profielen
-----------------------

Een database bevat meerdere profielen en subprofielen en het kan
voorkomen dat je meerdere wilt inladen. Een praktisch voorbeeld: in je
database 'Relaties' staan bedrijven (per bedrijf een profiel) en in
'Relaties' staat de collectie 'Medewerkers'. In die collectie staan de
gegevens van één of meerdere medewerkers van het bedrijf. Stel dat we
naar alle bedrijven in database 'Relaties' een mailtje willen sturen met
informatie over de bij ons bekende medewerkers, dan willen we dus alle
subprofielen uit collectie 'Medewerkers' ophalen:

Om *meerdere subprofielen op te halen* is het mogelijk om optie
**multiple** te gebruiken. Een voorbeeld aan de hand van de hierboven
beschreven situatie:

~~~~ {.language-php}
{loadsubprofile source="Relaties:Medewerkers" profile=$profile.id assign=geladensubprofielen multiple=true}
~~~~

Met bovenstaande code worden alle subprofielen geladen uit database
'Relaties'; Collectie 'Mederwerkers' welke horen bij het profiel met id
\$profile.id. Smarty-personalisatie zal ervoor zorgen dat de waarde van
\$profile.id gelijk is aan de geadresseerde van het mailtje. Alle
bijbehorende subprofielen worden in \$geladensubprofielen gezet.

Nu willen we alle opgehaalde subprofielen nog netjes in ons mailtje
plaatsen. \$geladensubprofielen is een zogenaamde *array*, een lijst van
gegevens. Die moeten we systematisch doorlopen, waarbij we gebruik maken
van de functie *foreach*. Doorgaand op ons praktische voorbeeld:

~~~~ {.language-php}
{foreach $geladensubprofielen as $geladensubprofiel} //of in Smarty 2: {foreach from=$geladensubprofielen item="geladensubprofiel"}

{$geladensubprofiel.Voornaam} {$geladensubprofiel.Achternaam}. Email: {$geladensubprofiel.Emailadres}
{/foreach}
~~~~

Hierboven wordt de *array* (lijst gegevens) \$geladensubprofielen met
subprofiel doorlopen. Tijdens dit doorlopen wordt het huidige subprofiel
telkens in \$geladensubprofiel gezet. Vervolgens printen we de inhoud
van velden 'Voornaam', 'Achternaam' en 'Emailadres' op een
overzichtelijk manier.

Overige opties
--------------

Hierboven hebben we de werking van opties **multiple** gezien. Enkele
andere opties zijn de volgende:

-   **limit** - Als *multiple* wordt gebruikt, maar je niet alle
    subprofielen hebt, kun je een beperking opleggen met limit, dus
    bijvoorbeeld *limit=5* beperkt het aantal geladen (sub)profielen tot
    5
-   **profile** - Hierboven gebruikten we *profile* om alle subprofielen
    behorende tot het geadresseerde profiel op te halen. Het is ook
    mogelijk deze optie weg te laten, waardoor alle (sub)profielen
    worden geladen.
-   **orderby='veldnaam asc/desc'** - Als je de resultaten bij het laden
    van meerder (sub)profielen wilt sorteren (dan gebruik je dus
    *multiple=true*), dan kun je *orderby* gebruiken. Tussen de
    accolades zet je de naam van het veld waarop je wilt sorteren en
    daarachter kun je *asc* of *desc* zetten om op respectievelijk
    oplopende of aflopende volgorde te sorteren. Zonder het gebruik van
    de optie *orderby* wordt er op ID en aflopend gesorteerd.

In de praktijk
--------------

In de uitleg hierboven werd een praktisch voorbeeld geschetst: we willen
alle bij ons bekende bedrijven uit database 'Relaties' een mailtje
sturen met de bij ons bekende werknemers die bij dat bedrijf horen. Deze
medewerkers staan in collectie 'Medewerkers'. Ter demonstratie willen we
die in omgekeerd alfabetisch volgorde van voornaam sturen. Ook sturen we
maximaal 5. De code:


Geachte {$Bedrijfsleider},
Van uw bedrijf, {$Bedrijf} zijn de volgende medewerkers bekend:

~~~~ {.language-php}

{loadsubprofile source="Relaties:Medewerkers" profile=$profile.id assign=geladensubprofielen multiple=true limit=5 orderby='Voornaam desc' }
    
    <ul>
      {foreach $geladensubprofielen as $geladensubprofiel}
        <li>
            Voornaam: {$geladensubprofiel.Voornaam}, 
            Achternaam: {$geladensubprofiel.Achternaam},
            Email: {$geladensubprofiel.Emailadres}
        </li>
      {/foreach}
    </ul>

~~~~

Het resultaat:

*Beste Jan Janssen,\
\
 Van uw bedrijf, Boodschappen B.V., zijn de volgende medewerkers
bekend:\
 - Freek Frekens, f.frekens@boodschappenbv.nl;\
 - Egbert Douwes, e.douwes@boodschappenbv.nl;\
 - Douwe Egberts, d.egberts@boodschappenbv.nl;\
 - Charles Fransman, c.fransman@boodschappenbv.nl;\
 - Bert Bakker, b.bakker@boodschappenbv.nl;\
*

Ook Albert Albertsma is een medewerker van Boodschappen B.V., maar
gezien we maximaal 5 subprofielen hebben opgevraagd en we dat op
omgekeerd alfabetisch volgorde deden, viel Albert net buiten de boot.
Arme Albert Albertsma...
