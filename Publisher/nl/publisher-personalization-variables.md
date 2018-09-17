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
* **{$profile.referrers}**: een optioneel array van profielen die verwijzen naar dit profiel d.m.v. een *referentieveld*
* **{$profile.*veldnaam*}**: elk veld van het profiel is toegankelijk via {$profile.*veldnaam*}
* **{$profile.*interesse*}**: elke interesse van het profiel is toegankelijk via {$profile.*interesse*}, en heeft de waarde "yes" of "no"
* **{$profile.*collectie*}**: indien er subprofielen zijn, is elke collectie van subprofielen benaderbaar via {$profie.*collectienaam*}

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

## Document gegevens

* **{$document.id}** ID van het document
* **{$document.name}** Huidige naam van het document
* **{$snapshot.name}** Naam van het document op het moment van versturen (zelfs als de naam gewijzigd is achteraf)
* **{$document.created}** Tijdstip van het aanmaken van het document
* **{$document.lastmodified}** Tijdstip van de laatste wijziging aan het document
* **{$document.template}** Template object
* **{$document.language}** Taal instellingen van het document

## Template gegevens

* **{$template.id}** ID van het template
* **{$template.name}** Naam van het template
* **{$template.description}** Beschrijving van het template
* **{$template.pdf}** Naam van het originele PDF bestand
* **{$template.pages}** Aantal pagina's van de PDF 
* **{$template.created}** Tijdstip van het aanmaken van het template
* **{$template.lastmodified}** Tijdstip van de laatste wijziging aan het template
* **{$template.archive}** Is het template gearchiveerd?
* **{$template.quality}** Kwaliteit van het template: screen/press/print (alleen voor PDF templates)
* **{$smarty.version}** Smarty versie van het template

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

Op templateniveau kun je [extra variabelen](./publisher-personalization-functions#assign)
toevoegen. De extra personalisatievariabelen zijn daarna benaderbaar
via de gegeven naam.

    {$variabele}
    
## Data en tijden dynamisch weergeven

Met behulp van de {$smarty.now} functie van Smarty, kun je dynamisch data en tijden tonen in mailings en landingspagina's.

We zetten enkele mogelijkheden op een rij. Een volledig overzicht vind je op de website van Smarty](http://www.smarty.net/docsv2/en/language.modifiers.tpl).

### Enkele toepassingen

-   Toon automatisch het huidige weeknummer of maand bovenaan een
    nieuwsbrief
-   Stuur het tijdstip van invullen automatisch mee in een webformulier
-   Sluit een enquete automatisch nadat de uiterste invuldatum is
    verstreken

Om een datum (in seconden sinds 1970) te tonen gebruik je
`{$smarty.now}`.

Met de `date_format` modifier kun je vervolgens de seconden omzetten
naar een ander formaat.

Voorbeeld: om de huidige datum om te zetten naar het formaat YYYY-MM-DD
dat je kunt opslaan in een datumveld gebruik je:

`{$smarty.now|date_format:"%Y-%m-%d"}`

Hieronder zie je een aantal voorbeelden:

```
{$smarty.now|date_format}                // Dec 4, 2014
{$smarty.now|date_format:"%D"}           // 12/04/14
{$smarty.now|date_format:"%d-%m-%Y"}     // 04-12-2014
{$smarty.now|date_format:"%A, %e %B %Y"} // Tuesday, 4 december 2014
{$smarty.now|date_format:"%A"}           // Tuesday
{$smarty.now|date_format:"%c"}           // Tu 04 dec 2014 15:20:28 CET
```
Een volledige lijst van mogelijkheden kun je vinden op de officiele
documentatie van Smarty.

### Data in een andere taal en tijdzone tonen

Een datum wordt automatisch weergegeven in de taal en tijdzone van het
template of document. Om de weergavetaal van personalisatie te bekijken,
kies je linksonderaan de template of document
**Personalisatie-instellingen**.

### Morgen, overmorgen en de dag daar weer na

Is je actie slechts een dag geldig? Smarty voorziet hierin.

`{"tomorrow"|date_format:"%A, %B %e, %Y"}`

Overmorgen:

`{"+2 days"|date_format:"%A, %B %e, %Y"}`

Enzovoorts...

### Timestamp vs smarty.now

Naast `{$smarty.now}` kun je ook gebruik maken van `{$timestamp}`.
Timestamp berekent het aantal seconden die zijn verstreken sinds de UNIX
epoch tijd (middennacht 1970-01-01 00:00:00 UTC). In tegenstelling tot
smarty.now, die standaard gebruik maakt van de locale 0000-00-00.
Timestamp is nuttig als je te maken hebt met verschillende tijdzones.
Het kan nu 13u00 zijn in Nederland. In Amerika pas over 7 uur. Het
aantal seconden verstreken sinds 1970-01-01 00:00:00 UTC is echter een
vast gegeven, en dus tijdzone onafhankelijk.

### Data vergelijken

Het is mogelijk om condities te maken waarin je bijvoorbeeld data in
een database met elkaar vergelijkt.

```txt
{if $order_date < $invoice_date} ...do something.. {/if}
```

De data moeten natuurlijk wel in hetzelfde formaat zijn opgeslagen om de vergelijking te doen.

Op deze wijze kun je ook formulieren, enquetes tonen op basis van de huidige tijd:

```
De enquete mag niet meer worden ingevuld na 25 maart 2017

{capture assign="currentDate"}{$smarty.now|date_format:"%Y-%m-%d"}{/capture}
{capture assign="endDate"}2017-03-25{/capture}
{if $currentDate < $endDate}
{survey name="jouw enquete"}
{else}
  Helaas, het invullen van deze enquete is niet meer mogelijk
{/if}
```


## Referentievelden

Maar er kan meer. Je kunt in een database *Reverentievelden* aanmaken. Dit zijn
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

Bekijk ook dit voorbeeld [Personaliseren met behulp van multidimensionale databases](./personalizing-using-multi-dimensional-databases.md)

## Meer informatie over personaliseren

* [Personalisatie functies](./publisher-personalization-functions)
* [Personalisatie modifiers](./personalization-modifiers)
