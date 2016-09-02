Het onderscheid tussen hard en softbounces lijkt evident, maar in de
praktijk zijn er vele verschillende oorzaken mogelijk waardoor een
e-mail niet (al dan niet tijdelijk) kan worden afgeleverd. Omdat het
onderscheid hard en soft naar onze smaak iets te beperkt is, kijken we
liever naar het tijdstip in het afleverproces waarop de fout is
opgetreden.

Het verwerken en afleveren van een e-mail verloopt in een vijftal
stappen.

-   Stap 1: De domeinnaam wordt omgezet naar een IP-adres
-   Stap 2: Er wordt verbinding gemaakt met het IP-adres
-   Stap 3: Er wordt contact gelegd met de ontvangende mailserver
    (bijvoorbeeld Hotmail)
-   Stap 4: De e-mail wordt geaccepteerd door de ontvangende mailserver,
    of stuurt direct een foutcode terug
-   Stap 5: Als het later alsnog misgaat (ook al is de mail ontvangen
    door de mailserver), dan wordt een e-mailbericht aan ons
    teruggestuurd, met hierin (meestal) een foutcode. Deze foutcodes
    staan [hier](http://www.emailaddressmanager.com/tips/codes.html)
    verder toegelicht.

Sommige mensen noemen alle fouten die gedurende stap 1 tot en met 3
optreden een hardbounce, en alles daarna een softbounce. Anderen noemen
stap 4 als breekpunt. Weer anderen negeren deze stappen en gebruiken de
foutcodes om te achterhalen of de afleverpoging resulteerde in een hard
of softbounce.

Wanneer de fout is opgetreden bij jouw e-mails, kan je terugvinden in
het tabblad **Fouten**. Ook vind je hier de **foutcode** die is
teruggegeven.

Het oplossen afleverfouten
--------------------------

Wat je kunt doen aan fouten, verschilt per gebruiker van de software en
per geadresseerde. Sommige gebruikers zullen de mogelijkheid hebben via
een andere route contact op te nemen met de ontvanger om een correct
e-mailadres te verkrijgen.

Als een e-mailadres blijft bouncen, dan kan het e-mailadres beter
verwijderd worden. Voor het selecteren van e-mailadressen op basis van
afleverfouten kan je gebruik maken van het selectietype [check op
resultaten
e-mailcampagnes](http://www.copernica.com/nl/ondersteuning/selectie-condities-check-op-resultaten-campagnes)
.

E-mail foutcodes
----------------

Wanneer een e-mail niet kan worden afgeleverd, wordt door de ontvangende
mailserver meestal een bericht teruggestuurd, met hierin een foutcode en
een korte omschrijving van de fout.

-   Soft bounces: temporary errors. Foutcodes beginnen met een 4 (4.XX)
-   Hard bounces: persistent errors. Foutcodes beginnen met een 5 (5.XX)

Een lijst van alle foutcodes die kunnen worden teruggegeven vind je op
[http://www.e-mailaddressmanager.com/tips/codes.html](http://www.emailaddressmanager.com/tips/codes.html)
