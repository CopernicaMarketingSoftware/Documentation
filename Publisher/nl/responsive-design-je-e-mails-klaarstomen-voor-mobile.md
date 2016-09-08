![responsive design: email for
mobile](../images/email-marketing-mobile.jpg "responsive design: email for mobile")
In de afgelopen drie jaar is het gebruik van smartphones geëxplodeerd.
Het wordt voor e-mailmarketers dan ook steeds belangrijker hun [e-mails
te optimaliseren voor mobiel
gebruik](http://www.copernica.com/nl/over-ons/nieuws/html-nieuwsbrieven-opmaken-voor-mobiel-gebruik).
Daarbij is het belangrijk goed te letten op het gebruik van smartphones
binnen je eigen doelgroep(en). Maar de cijfers spreken voor zich: steeds
meer mensen hebben een of meerdere mobiele apparaten waarmee zij online
kunnen en hun e-mails mee openen.

Een paar van die cijfers:

-   In de leeftijdgroep van 18 tot 24 zakte het gebruik van web-based
    e-mail in 2011 in de VS met 34% en steeg het gebruik van mobile
    e-mail met ruim 32%. *–
    [Comscore](http://www.comscore.com/Insights/Presentations_and_Whitepapers/2012/2012_US_Digital_Future_in_Focus)
    (Februari 2012)*
-   Er wordt tegenwoordig meer e-mail mobiel gelezen dan op een desktop
    e-mailprogramma of via webmail. Volgens statistieken wordt 38% van
    alle e-mails nu op een mobiel apparaat geopend, 33% op de desktop en
    29% in webmail.
    *[Litmus](http://litmus.com/blog/mobile-email-opens-increase-123-in-18-months)
    - (Oktober 2012)*

Organisaties houden nog te weinig rekening met dit toenemende gebruik.
E-mails en websites worden vaak nog opgemaakt voor desktop gebruik.
Daarbij wordt vaak vergeten het design aan te passen voor het mobiele
gebruik. Door responsive design toe te passen, los je dit probleem op en
stoom je jouw websites en e-mails klaar voor [mobiel
gebruik](http://www.marketingfacts.nl/berichten/slechte-mobiele-performance-schaadt-bedrijven).

Wat is responsive design?
-------------------------

Responsive design is een designtechniek waarbij gebruik wordt gemaakt
van speciale CSS3 code genaamd “media queries”. Met deze media queries
kan je gemakkelijk bepalen welke stijl wordt toegepast wanneer je e-mail
of website wordt geopend op een digitaal apparaat zoals een smartphone.
Een voorbeeld:

    <style type="text/css">
      @media only screen and (max-device-width: 480px) {
    /* mobile-specific CSS styles go here */
    }
      /* regular CSS styles go here */
    </style>

Bij deze media query wordt gekeken naar de variabelen die jij formuleert
in je code. In dit geval wordt er gekeken of je e-mail wordt geopend op
een scherm en of de breedte van dat scherm groter of kleiner is dan
480px. Wanneer de breedte kleiner is dan 480px wordt in dit geval de CSS
code voor het mobiele scherm ingeladen. Is de breedte groter dan 480px,
wordt de normale CSS ingeladen.

Responsive design komt er dus op neer dat de inhoud en layout van je
e-mail aangepast wordt aan de hand van bv. schermgrootte,
schermresolutie en oriëntatie van het scherm (landscape of portrait). Zo
kom je niet alleen de gebruikers tegemoet die je e-mails lezen op
desktop of via webmail maar ook zij die je e-mails lezen op hun mobiele
apparaat. Je draagt dus bij aan een betere [user
experience!](http://www.marketingfacts.nl/berichten/the-web-and-beyond-alles-over-user-experience)

Verschil tussen responsive & fluid design
-----------------------------------------

Ben je al wat langer met e-mailmarketing aan de slag en het design van
e-mail(templates) dan weet je dat er ook vaak gebruik wordt gemaakt van
fluid design bij het optimaliseren van e-mails voor meerdere apparaten.
Wat is dan het verschil tussen fluid en responsive design?

Het belangrijkste verschil is dat fluid design gebruik maakt van
percentages om content proportioneel aan te passen aan verschillende
schermgroottes. Bv: width=”90%”.

Responsive design maakt gebruik van de CSS media queries om per
schermgrootte (of schermtype, orientatie,…) een verschillende layout toe
te passen. Je hebt daarbij dus veel meer controle over je layout dan bij
fluid design.

Hoe pas ik responsive design toe?
---------------------------------

Natuurlijk wordt pas echt duidelijk hoe responsive design werkt als je
een voorbeeld ziet.

*Content je volledige scherm laten vullen*

Vaak hoor je dat je het design van een e-mail zo simpel mogelijk moet
houden. Het gebruik van 1 kolom in e-mails wordt dan ook aangeraden.
Daarbij is het ook belangrijk dat je content op alle apparaten
schermvullend is om voor een nette uitstraling te zorgen. Je HTML-code
ziet er dan bv. als volgt uit:

    <table cellpadding="0" cellspacing="0" border="0" id="mainContent">
       <tr>
        <td><img src="header.jpg" alt="" class="bodyImage" /></td>
       </tr>
       <tr>
         <td class="bodyContent">Bericht</td>
       </tr>
    </table>

De classes die je meegeeft aan de tabelcellen komen terug in je media
query. De classes mainContent, bodyImage en bodyContent zorgen ervoor
dat je content de volledige breedte van je scherm beslaan. Je media
queries zien er dus als volgt uit:

    @media only screen and (max-width: 540px) {
    table[id=mainContent] {
    max-width: 600px !important;
    width: 100% !important;
    }
    }

    @media only screen and (max-width: 540px) {
    img[class=bodyImage] {
    height:auto !important;
    max-width: 600px !important;
    width: 100% !important;
    }
    } 

    @media only screen and (max-width: 540px) {
    td[class=bodyContent] {
    font-size: 14px !important;
    line-height: 125% !important;
    padding-right: 10px;
    padding-left: 10px;
    padding-top: 0 !important;
    }
    } 

Wanneer zet ik dan responsive design in?
----------------------------------------

Voor je al je tijd en moeite stopt in die optimalisatie van je e-mails
(en websites) is het goed om te weten voor wie je dat doet. Leest jouw
doelgroep je e-mails wel op hun smartphone of tablet? Analyseer daarom
eerst je klantenbestand en de statistieken van je e-mailcampagnes om te
zien of de toepassing van responsive design wel zin heeft.

Vraag bijvoorbeeld aan ontvangers of ze de mobiele versie willen
ontvangen via een wijzigingsformulier of een klik in de nieuwsbrief. Of
vraag dit meteen bij hun aanmelding voor je nieuwsbrief.

*Dit artikel is reeds verschenen op Marketingfacts: [Responsive design:
je e-mails klaarstomen voor
mobile](http://www.marketingfacts.nl/berichten/responsive-design-je-e-mails-klaarstomen-voor-mobile/).*
