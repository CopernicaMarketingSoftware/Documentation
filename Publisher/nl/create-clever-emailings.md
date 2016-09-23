Een simpele email in platte tekst, emails in de huisstijl van je bedrijf
of een gepersonaliseerde boodschap op maat maken? Via Copernica stel je
in een paar stappen je eigen email marketing campagne samen. Gebruik
daarvoor je eigen HTML-kennis of één van onze voorontworpen email
templates. Binnen Copernica beschik je over alle tools die je nodig hebt
om professionele en slimme emails te maken.

Maak je eigen emails met behulp van templates
---------------------------------------------

![Maak je eigen emails met behulp van
templates](../images/create-email-content-copernica.gif "Maak je eigen emails met behulp van templates")

Zelf je emails opmaken en in een mooi jasje steken? Dat kan met de
toegankelijke WYSIWYG-editor van Copernica. Hiermee maak je handig en
snel je eigen aanpassingen in je email. Geef zo naar eigen wens je email
een eigen stijl en vul deze met de gewenste inhoud.

Zit je zonder inspiratie of heb je simpelweg geen tijd om zelf een email
te ontwerpen? Geen nood. Copernica heeft samen met zijn
[partners](./register-as-copernica-partner.md "Ontdek ons partnerprogramma")
een breed aanbod aan verschillende email templates opgemaakt. Deze
gebruik je als basis voor je eigen email marketing campagne. Kies een
template, voeg je eigen content en stijl toe en je bent klaar voor
verzenden.

Ben je een HTML-expert of ben je thuis in het [opmaken van eigen
templates](./create-custom-templates.md "Opmaken van eigen templates"),
dan kan je zo aan de slag met onze template-editor. Begin bij het begin
en ontwerp of importeer je eigen op maat gemaakte templates in
Copernica.

Personaliseer je email campagnes
--------------------------------

![Personaliseer je
e-mailings](../images/nl-personalize-content-copernica.gif "Personaliseer je e-mailings")

Verbeter de resultaten van je email campagnes door ze te personaliseren.
Copernica stelt je in staat je emails volledig te personaliseren
gebaseerd op al de opgeslagen gegevens uit je Copernica
[database](./creating-your-own-databases.md "Maak je eigen database").
Personaliseer niet alleen op basis van relatiegegevens maar bijvoorbeeld
ook aan de hand van historische gegevens, campagneresultaten,
enquêteresultaten en nog veel meer.

-   Voeg persoonlijke gegevens toe zoals naam, adres of aangekochte
    producten
-   Pas de inhoud of lay-out van je emails aan op basis van interesses
    of voorkeuren
-   Personaliseer je onderwerpregel of een webformulier waar je naar
    verwijst in je e-mailing

Copernica werkt voor de personalisering van je e-mailings en andere
email marketing campagnes met Smarty tags of Smarty code. Dit is een
template engine voor PHP. De code wordt gekenmerkt door het gebruik van
accolades (**{** en **}**) en het dollarteken **\$**.

### Hoe werkt personalisatie met Smarty?

Eens je aan de gang gaat met deze personalisatiecode, merk je al gauw
dat het makkelijk en leuk werkt. Jij bepaalt zelf welke gegevens
terugkomen in je emails. Copernica vult de velden met Smarty-tags aan
met de persoonlijke relatiegegevens voor je de [emails
verzendt](./send-emailings-to-relations.md "Verzenden naar je doelgroep").
Alle gegevens die je opslaat in je
[database](./creating-your-own-databases.md "Maak je eigen database"),
gebruik je eenvoudig voor het personaliseren van je emails. Hieronder
een voorbeeld om aan te tonen hoe het werkt:

  ------------------------------------------------------------------------------
  Bijvoorbeeld:                                  Wordt omgezet naar:
  ---------------------------------------------- -------------------------------
  Beste {\$Aanhef}{\$Voornaam}{\$Achternaam},\   Beste Mr. Piet Jansen,\
   Bedankt voor je aanmelding.\                   Bedankt voor je aanmelding.\
   Met vriendelijke groet,\                       Met vriendelijke groet,\
   {\$Accountmanager}                             Piet Kramer
  ------------------------------------------------------------------------------

Dynamische content voor persoonlijke email marketing
----------------------------------------------------

![Dynamische content in je
e-mailing](../images/load-rss-in-email-copernica.gif "Dynamische content in je e-mailing")

Wil je graag je relaties op de hoogte houden van jouw nieuwste producten
of je laatste nieuws (bijvoorbeeld van je website)? Copernica biedt
hiervoor een prima oplossing in de vorm van contentfeeds oftewel [RSS of
Atom feeds](./rss-or-atom-feed.md "RSS of Atom feeds").
Maak je eigen feed(s) eenvoudig aan binnen Copernica. Gebruik deze in je
e-mailings om zo, volledig automatisch, de inhoud actueel te houden.

### Eigen stijl meegeven aan je contentfeed

Iedere feed geef je ook makkelijk een eigen stijl. Bepaal zelf hoeveel,
en in welke volgorde, feedartikelen meegenomen moeten worden in je
e-mailing. Voeg bijvoorbeeld de drie meest gekochte producten toe aan je
email campagne.

Dat stel je in met behulp van een CSS-stylesheet of XSLT-stijldocument.
In Copernica maak je deze documenten zelf aan of voeg je reeds bestaande
stijldocumenten toe. Met een eigen stijl maak je je email nieuwsbrieven
nog persoonlijker en voeg je wat dynamiek toe aan het geheel.

Emails opmaken met de SOAP API
------------------------------

Copernica beschikt over een krachtige SOAP API. Deze stelt je in staat
eenvoudig een koppeling te maken tussen jouw externe softwarepakket en
Copernica. Via de [SOAP API](./soap-api-documentation.md "SOAP API")
is het ook mogelijk om email documenten samen te stellen, externe
content in je emails te laden en uiteindelijk je email campagnes te
verzenden.
