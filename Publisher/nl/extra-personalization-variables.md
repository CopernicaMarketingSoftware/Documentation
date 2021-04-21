# Extra personalisatievariabelen

Over het algemeen personaliseer je mailings met gegevens van de geadresseerde.
Alle velden van de geadresseerde zijn daarom rechtstreeks beschikbaar als personalisatievariabelen. Met andere woorden, als de database velden bevat
met de naam *voornaam*, *achternaam*, *woonplaats* en *emailadres*, dan kun je bij het personaliseren gebruik maken van de gelijknamige
personalisatievariabelen:

* {$profile.voornaam}
* {$profile.achternaam}
* {$profile.woonplaats}
* {$profile.emailadres}

Naast deze mogelijkheden kun je ook gebruik maken van voorgedefineerde objecten. 
Hieronder vind je een overzicht van deze extra personalisatievariabelen.

## Profielen

Omdat Copernica gelaagde databases ondersteunt, kunnen mailings worden verstuurd naar profielen, maar ook naar de bij profielen horende subprofielen. Deze
gelaagde structuur heeft gevolgen voor de beschikbare personalisatievariabelen. Maar of je nu een mailing naar profielen of naar subprofielen verstuurt, er is
altijd een {$profile} object. In dit object staan de gegevens van het profiel waarnaar het bericht is gestuurd, of, in het geval van een mailing naar
subprofielen, van het bij het subprofiel behorende profiel. Dit profiel object heeft een aantal eigenschappen:

* **{$profile.id}**: numerieke identifier van het profiel
* **{$profile.extra}**: de extra data van het profiel die alleen met de API kan worden ingesteld
* **{$profile.secret}**: de *geheime code* die bij het profiel is opgeslagen
* **{$profile.code}**: alias voor {$profile.secret}, dus hetzelfde als de geheime code
* **{$profile.created}**: tijdstip waarop het profiel is aangemaakt (in YYYY-MM-DD hh:mm:ss formaat)
* **{$profile.referrers}**: een optioneel array van profielen die verwijzen naar dit profiel d.m.v. een *referentieveld*
* **{$profile.*veldnaam*}**: elk veld van het profiel is toegankelijk via {$profile.*veldnaam*}
* **{$profile.*interesse*}**: elke interesse van het profiel is toegankelijk via {$profile.*interesse*}, en heeft de waarde "yes" of "no"
* **{$profile.*collectie*}**: indien er subprofielen zijn, is elke collectie van subprofielen benaderbaar via {$profie.*collectienaam*}

## Subprofielen 

Als je een mailing naar subprofielen stuurt, dan is er naast het hierboven genoemde {$profile} object ook een {$subprofile} beschikbaar. Dit object heeft
de volgende members:

* **{$subprofile.id}**: numerieke identifier van het subprofiel
* **{$subprofile.secret}**: de *geheime code* die bij het profiel is opgeslagen
* **{$subprofile.code}**: alias voor {$subprofile.secret}, dus de geheime code
* **{$subprofile.created}**: tijdstip waarop het subprofiel is aangemaakt (in YYYY-MM-DD hh:mm:ss formaat)
* **{$subprofile.profile}**: het profiel object (zie hierboven) waartoe dit subprofiel hoort
* **{$subprofile.*veldnaam*}**: elk veld van het subprofiel is toegankelijk via {$subprofile.*veldnaam*}

Als je bij het maken van een template of document nog niet zeker weet of het verstuurd gaat worden naar een profiel of naar subprofiel, en dus ook niet weet of je {$profile.veldnaam} of {$subprofile.veldnaam} moet gebruiken, dan kun je de {$destination} variabele gebruiken. De {$destination} variabele is een alias voor {$profile} bij mailings naar profielen, en een alias voor {$subprofile} als het bericht voor een subprofiel wordt gepersonaliseerd.

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

Naast de {$profile} en {$subprofile} objecten, kun je in je mailing ook gebruik maken van een {$account} en {$mailing} object met gegevens over de mailing:

* **{$account.id}**: numerieke identifier van je account
* **{$account.name}**: naam van je account
* **{$mailing.sendtime}**: tijdstip waarop de mailing is verstuurd, in YYYY-MM-DD hh:mm:ss format
* **{$mailing.sendtimestamp}**: zelfde als de *sendtime* property, maar dan als unix timestamp (aantal seconden sinds 1 jan 1970)
* **{$mailing.trigger}**: optioneel object dat de mailing heeft opgestart
* **{$mailing.snapshot.name}**: de naam van het document dat voor de mailing is gebruikt
* **{$mailing.snapshot.created}**: tijdstip waarop een snapshot van het document is gemaakt (YYYY-MM-DD hh:mm::ss notatie)
* **{$mailing.snapshot.subject}**: onderwerp van de mailing

## Extra personalisatievariabelen toevoegen

Naast deze standaard objecten, is het mogelijk om eigen personalisatievelden toe te voegen. 
Op templateniveau kun je deze onder '*Configuratie -> Extra personalisatievelden*' toevoegen. In je document, bij *personalisatievariabelen*, kun je deze vervolgens van een waarde voorzien. De waarde kun je vervolgens ophalen met {$property.VELDNAAM}. Dit is vooral handig als je een bepaalde waarde meerdere keren terug wilt laten komen in je template of document.
