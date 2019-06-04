# CSS in Publisher

Cascading Style Sheets, ook wel CSS genoemd, zijn ontworpen om de styling 
en inhoud van een HTML document te scheiden. Met CSS kun je regels opstellen 
voor verschillende HTML structuren om bijvoorbeeld de grootte en kleur van een 
lettertype aan te passen, de opstelling van headers te veranderen, het 
opsommingsteken van een lijst aan te passen of een type omlijsting te 
kiezen voor velden.

Onder het **Stijl** component in de Publisher kun je je eigen stylesheets 
aanmaken of een standaard CSS stylesheet aanpassen. De standaard stylesheet 
bevat duidelijke comments (beginnend met /\* en eindigend met \*/) waaraan 
je kunt zien welke elementen aangepast worden en op welke manier.

Aangezien CSS een wijdverspreide technologie is zullen we in dit artikel 
slechts de toepassing binnen onze software bespreken. Onder 
[meer informatie](./css#meer-informatie) kun je een aantal middelen 
vinden om de taal zelf te leren.

## Aanmaken en onderhouden van stylesheets

Webformulieren, feeds en enquêtes bieden de standaard stylesheet aan. Om een 
stylesheet toe te passen ga je naar het **Stijl** component, waar je 
een nieuwe stylesheet aan kan maken of de standaard stylesheet aan kunt passen. 
De stylesheet is dan echter niet gekoppeld aan het webformulier specifiek, maar 
aan de pagina of template waar het webformulier op gepubliceerd wordt. 
Je kunt een stylesheet linken aan een pagina, document of template in de 
respectievelijke context menus hiervan. Hetzelfde geldt voor enquêtes en 
feeds.

## Testen en voorvertonen van stylesheets

Je kunt een stylesheet testen door een template, mail, webformulier, enquête 
of feed te selecteren in het **Content** component en hierna op de **Preview** 
tab te klikken om een stylesheet te selecteren om te previewen.

![Preview style or xslt](../images/previewstyleorxslt.jpg)

Hier kun je de content bekijken zoals deze aan een gebruiker getoond wordt 
met de toegepaste CSS of [XSLT](./xslt).

## Linken van stylesheets

Om een stylesheet te linken aan je document of template navigeer je naar de 
**Stijl instellen...** optie in het menu. Er wordt dan een **Style** tab 
toegevoegd boven het document of de template. Je kunt vanuit deze tab 
direct de stylesheet aanpassen. Omdat de stylesheet zelf aangepast wordt 
betekent dit dat alle andere objecten die deze stylesheet gebruiken ook 
aangepast zullen worden.

## (In-line) CSS in emailings

Sommige belangrijke email cliënten kunnen of willen CSS niet correct afhandelen. 
Daarom biedt Copernica de optie te converteren naar in-line CSS. Dit betekent 
dat sommige code uit de styling sheet direct in de relevante HTML broncode wordt 
ingevoegd. Door deze conversie toe te staan maximalizeer je de kans dat de 
cliënten de email naar behoren afhandelen en de gebruiker de email tonen 
zoals jij hem bedoeld hebt.

Tijdens het instellen van de styling voor je document krijg je de volgende 
drie opties:
-   De stijlblokken behouden. De stylesheet en headers zullen niet aangepast 
    worden en er vindt geen conversie naar in-line CSS plaats.
-   De stijlblokken converteren naar in-line attributen om het 
    document of de template geschikt te maken voor de meeste email cliënten.
-   De stijlblokken behouden *en* converteren naar in-line attributen.

## Meer informatie

Styling in Publisher:
* [Styling in Publisher](./emailing-publisher-styling)
* [XSLT](./xslt)

Externe bronnen:
* [Mozilla's introductie tot CSS (Engels)](https://developer.mozilla.org/en-US/docs/Learn/CSS/Introduction_to_CSS) 
* [CSS tutorial van tutorialspoint (Engels)](https://www.tutorialspoint.com/css/)
* [CSS tutorial van learnlayout (Nederlands)](http://nl.learnlayout.com/)


