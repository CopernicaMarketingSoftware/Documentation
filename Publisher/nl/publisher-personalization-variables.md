# Beschikbare personalisatievariabelen

Over het algemeen personaliseer je mailings met gegevens van de geadresseerde. 
Alle velden van de geadresseerde zijn daarom rechtstreeks beschikbaar als 
personalisatievariabelen. Met andere woorden, als de database velden bevat 
met de naam *voornaam*, *achternaam*, *woonplaats* en *emailadres*, dan kun 
je bij het personaliseren gebruik maken van de gelijknamige 
personalisatievariabelen:

* {$profile.voornaam}
* {$profile.achternaam}
* {$profile.woonplaats}
* {$profile.emailadres}

Je kunt deze variabelen rechtstreeks in de template of het document zetten,
maar je kunt de velden ook benaderen via de voorgedefinieerde objecten 
{$profile}, {$subprofile} en {$destination}.

## Mailings naar profielen

Omdat Copernica gelaagde databases ondersteunt, kunnen mailings worden verstuurd 
naar profielen, maar ook naar de bij profielen horende subprofielen. Deze 
gelaagde structuur heeft gevolgen voor de beschikbare personalisatievariabelen.
Maar of je nu een mailing naar profielen of naar subprofielen verstuurt, er is 
altijd een {$profile} object. In dit object staan de gegevens van het profiel
waarnaar het bericht is gestuurd, of, in het geval van een mailing naar 
subprofielen, van het bij het subprofiel behorende profiel. Dit profiel object
heeft een aantal eigenschappen:

* **{$profile.id}**: numerieke identifier van het profiel
* **{$profile.extra}**: de extra data van het profiel die alleen met de api kan worden ingesteld
* **{$profile.secret}**: de *geheime code* die bij het profiel is opgeslagen
* **{$profile.code}**: alias voor {$profile.secret}, dus de geheime code
* **{$profile.created}**: tijdstip waarop het profiel is aangemaakt (in YYYY-MM-DD hh:mm:ss formaat)
* **{$profile.referrers}**: een optioneel array van profielen die verwijzen naar dit profiel d.m.v. een *foreign key* veld
* **{$profile.*veldnaam*}**: elk veld van het profiel is toegankelijk via {$profile.*veldnaam*}
* **{$profile.*interesse*}**: elke interesse van het profiel is toegankelijk via {$profile.*interesse*}, en heeft de waarde "yes" of "no"
* **{$profile.*collectie*}**: indien er subprofielen zijn, is elke collectie van subprofielen benaderbaar via {$profie.*collectienaam*}

Je kunt eenvoudige personalisaties als {$voornaam} en {$achternaam} dus ook
schrijven als {$profile.voornaam} en {$profile.achternaam}.

## Mailings naar subprofielen

Als je een mailing naar subprofielen stuurt, dan is er naast het hierboven
genoemde {$profile} object ook een {$subprofile} beschikbaar. Dit object heeft
de volgende members:

* **{$subprofile.id}**: numerieke identifier van het subprofiel
* **{$subprofile.secret}**: de *geheime code* die bij het profiel is opgeslagen
* **{$subprofile.code}**: alias voor {$subprofile.secret}, dus de geheime code
* **{$subprofile.created}**: tijdstip waarop het subprofiel is aangemaakt (in YYYY-MM-DD hh:mm:ss formaat)
* **{$subprofile.profile}**: het profiel object (zie hierboven) waartoe dit subprofiel hoort
* **{$subprofile.*veldnaam*}**: elk veld van het subprofiel is toegankelijk via {$subprofile.*veldnaam*}

Als je bij het maken van een template of document nog niet zeker weet of het
verstuurd gaat worden naar een profiel of naar subprofiel, en dus ook niet weet
of je {$profile.veldnaam} of {$subprofile.veldnaam} moet gebruiken, dan kun je 
de {$destination} variabele gebruiken. De {$destination} variabele is een alias voor
{$profile} bij mailings naar profielen, en een alias voor {$subprofile} als
het bericht voor een subprofiel wordt gepersonaliseerd.

## Itereren over subprofielen

Als je gebruik maakt van een gelaagde databasestructuur, dan kun je *itereren*
over de subprofielen die aan een profiel zijn gelinkt. Als je, bijvoorbeeld,
eigenaar van een dierenwinkel bent en een database met klantgegevens hebt met 
per klant een collecties met katten en een collectie met honden, dan kun je 
dit soort personalisaties maken:

    Beste {$profile.voornaam},
    
    Volgens onze database heb je {$profile.katten|count} katten en 
    {$profile.honden|count} honden. 
    
    De dieren in ons systeem:
    
    {foreach from=$profile.katten item=kat}
        {$kat.naam} (kat)
    {/foreach}
    {foreach from=$profile.honder item=hond}
        {$hond.naam} (hond)
    {/foreach}

Bovenstaand eenvoudige voorbeeld demonstreert hoe krachtig de personalisatiemogelijkheden
zijn. Zowel de profielgegevens als de subprofieldata kun je gebruiken voor het
personaliseren van je mailings. 

## Foreign key velden

Maar er kan meer. Je kunt in een database *foreign key* velden aanmaken. Dit zijn
numerieke velden met daarin het ID van een profiel in dezelfde of zelfs een heel
andere database. Dit type veld stelt je in staat om relationele objectmodellen te
maken en te gebruiken bij het personaliseren.

Om het eenvoudig te houden gaan we verder met het hiervoor gebruikte voorbeeld 
van de dierenwinkel. Stel dat in de klantendatabase een foreign key veld *dierenarts* 
is opgenomen dat verwijst naar een database met gegevens van dierenartsen.
Je kunt dan in de mailing naar je klanten ook gebruik maken van gegevens van
de dierenarts.

    Beste {$profile.voornaam},
    
    Volgens ons systeem is uw dierenarts {$profile.dierenarts.naam}.
 
Bij het personaliseren herkent Copernica dat *dierenarts* een foreign key veld
is. Alle velden van de desbetreffende dierenarts zijn dan automatisch beschikbaar.
{$profile.dierenarts} is een object en heeft dezelfde soort properties als 
het "gewone" {$profile} object, met ook weer collecties en foreign keys.
Je kun dus eindeloos de diepte in.

Maar het kan ook andersom. Je kunt een mailing naar de dierenartsen sturen, en
verwijzen naar de patiënten van de dierenarts. Hiervoor is de {$profile.referrers}
variabele. De variabele {$profile.referrers.klanten} bevat alle profielen in de
database "klanten" die verwijzen naar het profiel. Je kunt zelfs specifiek
opgeven welk foreign key veld je wilt gebruiken, wat handig als je meerdere foreign
key velden hebt: {$profile.referrers.dierenarts@klanten}.

## Accounts en mailings

Naast de {$profile} en {$subprofile} objecten, kun je ook gebruik maken van
een {$account} en {$mailing} object met gegevens over de mailing. In het
{$account} object zitten de volgende members:

* **{$account.id}**: numerieke identifier van je account
* **{$account.name}**: naam van je account

Het {$mailing} object is wat uitgebreider, en bevat allerlei instellingen
van de mailing waartoe het bericht behoort:

* **{$mailing.sendtime}**: tijdstip waarop de mailing wordt verstuurd, in YYYY-MM-DD hh:mm:ss format
* **{$mailing.sendtimestamp}**: zelfde als de *sendtime* property, maar dan als unix timestamp (aantal seconden sinds 1 jan 1970)
* **{$mailing.trigger}**: optioneel object dat de mailing heeft opgestart
* **{$mailing.snapshot.name}**: de naam van het document dat voor de mailing wordt gebruikt
* **{$mailing.snapshot.created}**: tijdstip waarop een snapshot van het document is gemaakt (YYYY-MM-DD hh:mm::ss notatie)
* **{$mailing.snapshot.subject}**: onderwerp van de mailing 

## Extra personalisatievariabelen toevoegen

Op templateniveau kun je [extra variabelen](./personalization-functions-assign)
toevoegen. De extra personalisatievariabelen zijn daarna benaderbaar
via de gegeven naam.

    {$variabele}

## Meer informatie

* [Personalisatie functies](./personalization-functions)
* [Personalisatie modifiers](./personalization-modifiers)
