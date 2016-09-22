Zou het niet mooi zijn als iedereen die jouw e-mailings ontvangt al op
je call-to-action kon klikken zonder de e-mail te openen? Wat zou dat
voor conversieboost opleveren? Kom er zelf achter door gebruik te maken
van microdata en Schema.org.

![](Copernica_cases/conversion-copernica.jpg "Meer conversie met Schema.org-opmaak voor e-mails")

Wat is Schema.org?
------------------

Schema.org is een
[samenwerking](http://googlewebmastercentral.blogspot.nl/2011/06/introducing-schemaorg-search-engines.html)
tussen Google, Yahoo!, Bing en de Russische zoekmachine Yandex. Het
project geeft webmasters de mogelijkheid via microdata in html-tags
duidelijk te maken waar een pagina over gaat.

Als je bijvoorbeeld schrijft over de film Avatar, is het voor menselijke
lezers gelijk helder waar je het over hebt. Maar voor een zoekmachine is
dat minder duidelijk. Die zou bij wijze van spreken ook kunnen denken
dat je content over een
[profielfoto](http://en.wikipedia.org/wiki/Avatar_(computing)) gaat.

Om deze onduidelijkheid voor zoekmachines weg te nemen, kan je als
beheerder van een pagina daarom de volgende html invoeren:

    <div itemscope itemtype ="http://schema.org/Movie">
      <h1 itemprop="name">Avatar</h1>
      <div itemprop="director" itemscope itemtype="http://schema.org/Person">
      Director: <span itemprop="name">James Cameron</span> (born <span itemprop="birthDate">August 16, 1954</span>)
      </div>
      <span itemprop="genre">Science fiction</span>
      <a href="../movies/avatar-theatrical-trailer.html" itemprop="trailer">Trailer</a>
    </div>

En zoals je ziet maak je hier niet alleen duidelijk dat deze tekst gaat
over de film Avatar, maar ook:

-   In welk genre de film valt
-   Wie de regisseur is
-   Wat zijn geboortedatum is
-   Wat de trailer van de film is

Wat heb je hier als e-mailmarketeer aan?
----------------------------------------

In eerste instantie lijkt het misschien alsof je hier in e-mailmarketing
niets aan hebt. Microdata en Schema.org lijken vooral gericht op seo, en
dat heeft niets te maken met het versturen van e-mails. Toch?

Nou, dat klopt niet helemaal. De scheidslijn tussen [seo en
e-mailmarketing](https://www.copernica.com/nl/blog/zes-deliverability-lessen-die-je-kan-leren-van-seo)
wordt steeds vager nu Google tests uitvoert met het opnemen van iemands
[Gmail inbox in de
zoekresultaten](https://www.copernica.com/nl/blog/gmail-in-de-zoekresultaten-zijn-jouw-e-mails-al-seo-proof).

Maar los van het verbeteren van je zichtbaarheid in Google, zijn er nog
veel meer mogelijkheden voor e-mailmarketing met microdata.

Conversie zonder opens
----------------------

Met behulp van microdata vertel je een e-mailclient namelijk ook wat
voor inhoud je e-mail bevat. Stuur je bijvoorbeeld een uitnodiging voor
een evenement? Met microdata maak je dat duidelijk aan de ontvangende
e-mailclient, waardoor je call-to-action al in de onderwerpregel
zichtbaar kan zijn:

![](Copernica_cases/schema-org-microdata.png "Meer conversie met Schema.org-opmaak voor e-mails")

Hetzelfde kan je doen om:

-   Reviews te verzamelen voor je webshop
-   Iemand op een bevestigingslink te laten klikken
-   Reisgegevens te tonen
-   Iemand te laten inchecken
-   En nog veel meer

Zo geef je ontvangers dus de mogelijkheid al op je call-to-action te
klikken zonder dat ze de e-mail hoeven te openen.

Gmail
-----

Momenteel is Gmail nog de enige e-mailprovider die Schema.org-opmaakt
ondersteunt. Maar gezien het feit dat Schema.org een gezamenlijk project
is met onder andere Yahoo! en Microsoft, duurt het vast niet lang
voordat Yahoo! Mail en Outlook het gebruik van microdata ondersteunen.

Hoe pas ik Schema.org-opmaak toe?
---------------------------------

Om een e-mailclient duidelijk te maken wat je call-to-action is, moet je
eerst bepalen in wat voor categorie deze valt. Op Schema.org vind je een
volledig overzicht van alle mogelijke categorieën, of beter gezegd:
[itemtypes](http://schema.org/docs/full.html).

Als je bijvoorbeeld een uitnodiging verstuurt voor een evenement, maak
je dat duidelijk door in je html te verwijzen naar
[http://schema.org/Event](http://schema.org/Event) en
[http://schema.org/RsvpAction](http://schema.org/RsvpAction). Op die
pagina's staan vervolgens weer allemaal mogelijke eigenschappen, die aan
deze itemtypes zijn toegewezen.

In het bovenstaande geval kan je dus de volgende code in je html
opnemen:

    <div itemscope itemtype="http://schema.org/Event">
      <meta itemprop="name" content="Taco Night"/>
      <meta itemprop="startDate" content="2015-04-18T15:30:00Z"/>
      <meta itemprop="endDate" content="2015-04-18T16:30:00Z"/>
      <div itemprop="location" itemscope itemtype="http://schema.org/Place">
        <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
          <meta itemprop="name" content="Google"/>
          <meta itemprop="streetAddress" content="24 Willie Mays Plaza"/>
          <meta itemprop="addressLocality" content="San Francisco"/>
          <meta itemprop="addressRegion" content="CA"/>
          <meta itemprop="postalCode" content="94107"/>
          <meta itemprop="addressCountry" content="USA"/>
        </div>
      </div>
      <div itemprop="action" itemscope itemtype="http://schema.org/RsvpAction">
        <div itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler">
          <link itemprop="url" href="http://mysite.com/rsvp?eventId=123&value=yes"/>
        </div>
        <link itemprop="attendance" href="http://schema.org/RsvpAttendance/Yes"/>
      </div>
      <div itemprop="action" itemscope itemtype="http://schema.org/RsvpAction">
        <div itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler">
          <link itemprop="url" href="http://mysite.com/rsvp?eventId=123&value=no"/>
        </div>
        <link itemprop="attendance" href="http://schema.org/RsvpAttendance/No"/>
      </div>
      <div itemprop="action" itemscope itemtype="http://schema.org/RsvpAction">
        <div itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler">
          <link itemprop="url" href="http://mysite.com/rsvp?eventId=123&value=maybe"/>
        </div>
        <link itemprop="attendance" href="http://schema.org/RsvpAttendance/Maybe"/>
      </div>
    </div>

Voor het verzoek een review te plaatsen over je webshop, verwijs je weer
naar [http://schema.org/Rating](http://schema.org/Rating):

    <div itemscope itemtype="http://schema.org/EmailMessage">
      <meta itemprop="description" content="We hope you enjoyed your meal at Joe's Diner. Please rate your experience."/>
      <div itemprop="action" itemscope itemtype="http://schema.org/ReviewAction">
        <div itemprop="review" itemscope itemtype="http://schema.org/Review">
          <div itemprop="itemReviewed" itemscope itemtype="http://schema.org/FoodEstablishment">
            <meta itemprop="name" content="Joe's Diner"/>
          </div>
          <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
            <meta itemprop="bestRating" content="5"/>
            <meta itemprop="worstRating" content="1"/>
          </div>
        </div>
        <div itemprop="handler" itemscope itemtype="http://schema.org/HttpActionHandler">
          <link itemprop="url" href="http://reviews.com/review?id=123"/>
          <div itemprop="requiredProperty" itemscope itemtype="http://schema.org/Property">
            <meta itemprop="name" content="review.reviewRating.ratingValue"/>
          </div>
          <link itemprop="method" href="http://schema.org/HttpRequestMethod/POST"/>
        </div>
      </div>
    </div>

Meer voorbeeldcodes voor het toevoegen van microdata aan je e-mails vind
je bij [Google
Developers](https://developers.google.com/gmail/actions/).

**Let op:** Google geeft op zijn Developers-sectie meestal meerdere
manieren aan om Schema.org-opmaak toe te voegen aan een e-mail. Ik raad
je echter aan niet voor de variant te kiezen waarbij je gebruik maakt
van scripts, aangezien dat bij andere e-mailproviders voor
[deliverability](https://www.copernica.com/nl/blog/tips-voor-een-optimale-deliverability-met-copernica)-problemen
kan leiden. Kies dus altijd voor de versie met alleen html.

Hulp nodig?
-----------

Heb je hulp nodig bij het implementeren van microdata aan je e-mails?
Gebruik dan de [Markup
Helper](https://www.google.com/webmasters/markup-helper/) van Google.
Voer de html-broncode van je e-mail in en volg de stappen die de helper
je voorschotelt.

Testen
------

Met de [Rich Snippets Testing
Tool](http://www.google.com/webmasters/tools/richsnippets) van Google
test je heel makkelijk of je html juist is opgemaakt. Overigens geeft
Gmail (nog) geen garanties dat het gebruiken van Schema.org-opmaak
daadwerkelijk leidt tot het tonen van call-to-actions in de
onderwerpregel.
