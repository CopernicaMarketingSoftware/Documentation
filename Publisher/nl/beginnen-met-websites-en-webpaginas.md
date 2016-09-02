Enquetes en formulieren die je hebt gemaakt onder Content kunnen alleen
worden gepubliceerd op een webpagina (en dus niet in een
e-maildocument). Websites en webpagina's maak en beheer je in het
onderdeel Websites. Dit artikel zal je op weg helpen bij het aanmaken
van een eerste website.

Inhoudsopgave
-------------

-   [Templates en webpagina's](#1)
-   [Nieuwe website maken](#2)
-   [Nieuwe webtemplate maken](#3)
-   [Webpagina maken](#4)
-   [Formulier of enquete publiceren](#5)
-   [Domein koppelen aan website](#6)
-   [Naar webpagina linken vanuit een emailing](#7)
-   [Standaardpagina, foutpagina en loginpagina instellen](#8)
-   [Webpagina afschermen voor niet-ingelogde gebruikers of alle
    gebruikers](#9)
-   [Bestanden en afbeeldingen beheren](#10)

Templates en webpagina's
------------------------

Net als e-maildocumenten werk je in het onderdeel Websites met
**templates** en **documenten**. Met het verschil dat wij een document
hier een **webpagina** noemen. Een template vormt de blauwdruk voor je
webpagina. In de template bepaal de lay-out en structuur en met behulp
van tekst-, afbeelding- en loopblokken bepaal je waar later op de
webpagina content kan worden toegevoegd door de eindgebruiker.
Webtemplates en -pagina's kunnen op de dezelfde wijze worden
gepersonaliseerd als e-maildocumenten met het gebruik van Smarty code.

**Belangrijk om te weten:**

-   Een website kan meerdere pagina's bevatten.
-   Deze individuele pagina's kunnen worden gebaseerd op verschillende
    webtemplates.
-   Aan de website koppel je een domeinnaam. Je kan ook verschillende
    domeinnamen koppelen aan een enkele website.
-   Het is niet mogelijk hetzelfde domein te gebruiken voor meerdere
    websites.
-   Als je een domein hebt gekoppeld aan een website, kan je de
    onderliggende webpagina's openen via
    http://domein.jouwdomein.nl/naamwebpagina
-   Webpagina's worden gefactureerd vanaf het moment dat er een werkende
    domeinnaam aan de website is gekoppeld.

Nieuwe website maken
--------------------

In het website menu kies je voor *Nieuwe website...*

-   Kies in het dialoogvenster een naam voor de website. Deze naam is
    alleen voor gebruikers van de software zichtbaar en is dus niet je
    domeinnaam.

Om je eerste webpagina te maken, heb je een webtemplate nodig. Als je
nog geen webtemplate hebt, kan je kiezen voor het volgende:

Webtemplate maken
-----------------

Je kan een nieuwe template maken, een bestaande template kopiëren of een
template importeren vanaf je computer.

-   **Een nieuwe webtemplate maken.** Kies in het template menu voor
    Nieuwe template... en maak een basistemplate met behulp van HTML
    code en dynamische template blokken.
-   **Een webtemplate importeren.** Maak eerst een nieuwe (lege)
    template aan. Kies vervolgens voor template importeren vanuit het
    Template menu. Localiseer het HTML bestand of het ZIP-bestand (met
    afbeeldingen) op je computer en upload deze naar de applicatie.
-   **Een e-mailtemplate gebruiken**. E-mailtemplates kunnen prima als
    basis dienen voor webpagina's. Maak onder websites een nieuwe
    template in kies in het dialoogvenster voor de optie **Webtemplate
    of e-mailtemplate kopiëren**. Een naar Websites gekopieerd
    e-mailtemplate kan zonder problemen worden bewerkt / aangepast. Dit
    heeft geen invloed op de originele e-mailtemplate.

[Meer lezen over het maken van
templates](http://www.copernica.com/nl/ondersteuning/templates-en-documenten)

Webpagina maken
---------------

Je hebt een website en een webtemplate. Het is nu mogelijk om een eerste
webpagina aan te maken.

-   Selecteer in het linkeroverzicht voor websites voor de website
    waaronder je de pagina wilt aanmaken.
-   Kies in het menu Pagina voor N**ieuwe webpagina**
-   Kies de template waarop je de pagina wilt baseren.
-   Geef de webpagina een naam. Via deze naam is de webpagina straks ook
    te bereiken in je internetbrowser. De naam kan later ook nog
    aangepast worden.
-   Kies 'Opslaan'

Je webpagina wordt nu aangemaakt. Klik onderaan de webpagina op
**Bewerkmodus** om de inhoud van de webpagina te bewerken.

Formulier, feed of enquete publiceren
-------------------------------------

Om een formulier, enquete of feed die je hebt gemaakt in het onderdeel
Content te publiceren, maak je gebruik van de **speciale tag** of kies
je voor de optie **Invoegen speciale content** die je kan vinden in het
dialoogvenster voor het bewerken van een **Tekstblok**.

-   De tag voor het [publiceren van een
    webformulier](http://www.copernica.com/nl/ondersteuning/webformulier-op-webpagina-plaatsen)
    is **{webform name="naamformulier"}**
-   De tag voor het [publiceren van een
    enquete](http://www.copernica.com/nl/ondersteuning/enquete-in-webpagina-invoegen)
    is**{survey name="naamvanenquete"}**
-   De tag voor het [publiceren van een RSS of Atom
    feed](http://www.copernica.com/nl/ondersteuning/de-loadfeed-functie)
    is **{loadfeed feed="naam van feed"}**

Om de webpagina te bekijken met de gepubliceerde content klik je
onderaan op **Voorbeeldweergave**. Let op, een formulier of enquete
werkt niet vanuit de applicatie. Om het formulier te testen, moet deze
worden ingevuld op de website vanuit de browser. Hiervoor moet je eerst
een domein koppelen aan de website.

Domein koppelen aan website
---------------------------

Een website is bereikbaar via een domeinnaam. Dit kan bijvoorbeeld
*www.jouwdomein.nl* zijn, maar veruit de meeste gebruikers kiezen voor
het gebruik van een **subdomein** onder het domein van hun bedrijf:
*formulieren.mijnbedrijf.nl*

> Stap 1. Maak in de DNS van uwbedrijf.nl een nieuw subdomein aan. Maak
> op dit subdomein een CNAME aan die verwijst naar
> *publisher.copernica.com*
>
> Stap 2. De domein kan vervolgens in de applicatie worden gekoppeld aan
> de website middels *Website* \> **Domeinen**. Het kan enige tijd duren
> voordat de website daadwerkelijk bereikbaar wordt via de gekoppelde
> domein.

Om een CNAME aan te maken heb je dus toegang nodig tot het domeinbeheer
van je bedrijfsdomein. Het kan dus zijn dat je hiervoor even de
netwerk/systeembeheerder moet lastigvallen.

-   [Meer lezen over het koppelen van een
    domeinnaam](http://www.copernica.com/nl/ondersteuning/een-domeinnaam-koppelen-aan-een-website)
-   [Meer lezen over het maken een van CNAME
    record](http://support.google.com/blogger/bin/answer.py?hl=nl&answer=58317)

Naar webpagina linken vanuit een e-mailing
------------------------------------------

Om ervoor te zorgen dat gebruikers die vanuit je e-maildocument
doorklikken naar je webpagina direct zijn ingelogd, dien je de hyperlink
uit te breiden met inlogcode. Dit heeft een aantal voordelen:

-   formulieren kunnen worden ingevuld met data van deze gebruiker
-   enqueteresultaten kunnen worden gekoppeld aan het profiel
-   de webpagina kan worden gepersonaliseerd met gegevens uit het
    profiel
-   de gebruiker hoeft dus niet eerst in te loggen op de webpagina.

Om de gebruiker direct in te laten loggen voeg je de volgende code toe
aan de link in het e-maildocument:

> `http://subdomein.uwdomein.nl/naamwebpagina?profile={$profile.id}&code={$profile.code}`****

en als je personaliseert vanuit een subprofiel

> `http://subdomein.uwdomein.nl/naamwebpagina?subprofile={$subprofile.id}&code={$subprofile.code}`****

Als je geen zin hebt om deze code handmatig toe te voegen, kan je ook
gebruik maken van de functie **Hyperlinks uitbreiden...** in het
e-maildocument menu.

-   [Meer lezen over het uitbreiden van hyperlinks met
    inlogcode](http://www.copernica.com/nl/ondersteuning/hyperlinks-uitbreiden-met-inlogcode)

Standaardpagina, foutpagina en loginpagina instellen
----------------------------------------------------

Per website kan je instellen welke pagina moet worden getoond in
specifieke gevallen

Je stelt deze pagina's in onder *Website menu \>***Standaard
pagina's...**

-   **Home page:** deze pagina wordt getoond wanneer iemand naar de
    website gaat zonder hierbij een specifieke pagina op te geven, dus:
    http://subdomein.uwdomein.nl/
-   **Foutpagina:** deze pagina wordt getoond wanneer iemand naar een
    webpagina op jouw website gaat die niet bestaat, bijvoorbeeld
    http://subdomein.uwdomein.nl/eorighnwoernfl (ervanuitgaande dat er
    op jouw website geen pagina bestaat die *eorighnwoernfl*heet)
-   **Loginpagina:** deze pagina wordt getoond wanneer iemand naar een
    webpagina op jouw website gaat die alleen toegankelijk is voor
    ingelogde gebruikers. Op deze pagina kan je bijvoorbeeld een
    inlogformulier plaatsen, zodat de gebruiker alsnog kan inloggen (of
    zich aanmelden).

Webpagina afschermen voor niet-ingelogde gebruikers of alle gebruikers
----------------------------------------------------------------------

Standaard zijn alle pagina's die je aanmaakt in de software voor de hele
wereld toegankelijk. Om een pagina alleen toegangelijke te maken voor
ingelogde bezoekers kies je in het Webpagina menu voor **Toegang
instellen...**

Bezoekers die hier toch naartoe browsen worden automatisch doorverwezen
naar de ingestelde **inlogpagina**.

Met hetzelde dialoogvenster kan je een pagina ook (tijdelijk)
deactiveren. De pagina is dan niet meer beschikbaar. Bezoekers die hier
toch naartoe browsen worden automatisch doorverwezen naar de ingestelde
**foutpagina**.

Bestanden en afbeeldingen beheren
---------------------------------

Bestanden en afbeeldingen kunnen worden geupload naar de template, het
document of naar een gekoppelde Media Library (deze kan je aanmaken
onder Content). Je kan vervolgens in je HTML broncode verwijzen naar een
bestand of afbeelding door te verwijzen naar de volledige naam van het
bestand, bijvoorbeeld \<img src="afbeelding.png"\>, of je kan de
geuploade afbeelding aan een document toevoegen middels een
afbeeldingblok.

-   [Meer lezen over het beheren van bestanden een
    afbeeldingen](http://www.copernica.com/nl/ondersteuning/beheren-van-afbeeldingen-en-bestanden)

