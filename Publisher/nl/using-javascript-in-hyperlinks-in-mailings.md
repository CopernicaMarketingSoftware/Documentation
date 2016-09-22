Hyperlinks in Copernica mailings kunnen sinds deze week worden voorzien
van een "data-script"-attribuut. Dit is een interessante nieuwe feature
waarmee op alternatieve en krachtige wijze opvolgacties aan links kunnen
worden gekoppeld.

Normaal gesproken wordt javascript code uit mailings gefilterd. Dit
gebeurt door mailprogramma's die ontvangen berichten weergeven. Het
heeft daarom geen zin om hyperlinks in mailings te voorzien van
bijvoorbeeld een "onclick"- of "onhover"-attribuut om
scriptingfunctionaliteit toe te voegen. Echter, met de data-script tag
kan je toch gebruik maken van scripting om dynamische javascript code
uit te voeren als iemand op een link klikt.

Voorbeeld
---------

Als je een profiel wilt aanpassen naar aanleiding van een klik op een
hyperlink, kun je dat (onder andere) doen door middel van de volgende
hyperlink:

    <a href="http://www.mijnwinkel.com/sport" data-script="profile.fields.voorkeur = 'sport'">

De data-script tag is een Copernica-specifieke uitbreiding van HTML. Bij
het verzenden van de mail wordt deze attributen uit de mail verwijderd
(zodat ze niet bij de ontvangers aankomen). Omdat Copernica alle URL's
in mailings ook aanpast om kliks te registreren, komt iedereen die op
een link klikt echter eerst op de servers van Copernica uit. Daar wordt
de oorspronkelijke hyperlink weer hersteld om de gebruiker razendsnel
door te sturen, en komt ook het oorspronkelijke data-script attribuut
weer beschikbaar.

In de javascript code van het data-script attribuut kun je allerlei
instructies plaatsen om profieldata uit te lezen of aan te passen.

    <a href="http://www.voorbeeld.nl" data-script="profile.fields.aantalkliks++">

Bovenstaand script zorgt er bijvoorbeeld voor dat het profielveld
"aantalkliks" wordt opgehoogd iedere keer als iemand op de link klikt.

Beschikbare gegevens
--------------------

We zijn nu bezig om de eerste versie van dit systeem uit te rollen. Dit
betekent dat het aantal beschikbare features nog wat beperkt is. Op dit
moment kun je het systeem alleen gebruiken voor het uitlezen en
aanpassen van profielen. Hiervoor gebruik je de "profile"-variabele (of
de "subprofile"-variabele indien het een mailing naar subprofielen
betreft).

Een profiel heeft een (read-only) "id"-property, en een (read+write)
"fields"-property om alle profielvelden te benaderen. Voor het gemak mag
je "fields" ook weglaten:

    profile.fields.voorkeur = 'voetbal';
    profile.voorkeur = 'voetbal';

Bovenstaande twee statements doen hetzelfde. Het verdient echter de
voorkeur om altijd "fields" te gebruiken, voor het (onwaarschijnlijke)
geval dat "profile.voorkeur" in een toekomstige versie van het systeem
een andere betekenis krijgt.

Het "oude" opvolgsysteem
------------------------

Natuurlijk blijft het oude opvolgsysteem gewoon werken. Dit nieuwe
systeem ontwikkelen we als aanvulling op het oude systeem, en zal de
komende tijd verder worden uitgewerkt met meer features, bijvoorbeeld om
opvolgmails in te roosteren.
