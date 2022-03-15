# Productupdate 16-03-2022

### Gebruik van feeds binnen drag-and-drop-templates
We hebben het mogelijk gemaakt om RSS- en ATOM-feeds toe te voegen in drag-and-drop-templates door middel van het feedblok. Hierdoor heb je de mogelijkheid om content dynamisch in je nieuwsbrief te laden. Denk bijvoorbeeld aan de huidige aanbiedingen die in je feed gepubliceerd staan.

Het blok werkt op basis van een URL waar de RSS- of ATOM-feed beschikbaar is. Deze feeds kun je opmaken door gebruik te maken van een XSLT-bestand binnen de [XSLT-module](https://ms.copernica.com/en#/xslt). Deze gegevens stel je eenmalig in. Hierna wordt de content automatisch ingeladen op basis van de gegevens uit de feed.

### Conditionele elementen tonen op basis van profielgegevens
Binnen een lijn, structuur en container van je drag-and-drop-template is het mogelijk gemaakt om deze elementen te tonen op basis van gegevens uit het profiel dat de e-mail ontvangt. 

Je vindt de mogelijkheid om een conditie in te stellen onder de optie 'Voorwaarden' in het betreffende element. 

## Marketing Suite
- Het is nu mogelijk om in het verzendscherm naar meerdere bestemmingen tegelijk een mailing in te roosteren. Dit voorkomt dat je dezelfde handeling meerdere keren moet verrichten. De mailings worden opgestart als aparte mailings met eigen statistieken.
- De tags voor [{webonly}](https://www.copernica.com/nl/documentation/the-webonly-and-mailonly-functions) en [{mailony}](https://www.copernica.com/nl/documentation/the-webonly-and-mailonly-functions) zijn toegevoegd aan de drag-and-drop-templates.
- We hebben de opties 'font-family' en 'font-size' toegevoegd aan de teksteditor van onze HTML-templates. Hierdoor heb je meer stylingmogelijkheden binnen je tekstblokken.  
- Binnen een [mediabibliotheek](https://ms.copernica.com/#/medialibraries) is het mogelijk gemaakt om alle afbeeldingen en bestanden in bulk te downloaden. 
- Bugfix: wanneer in plaats van een slash in de URL gebruik wordt gemaakt van 2% wordt deze nu ook omgezet naar een valide URL en krijgt de ontvanger geen foutmelding meer te zien.
- Bugfix: in de notificatie die je ontvangt na een hoog foutpercentage binnen een campagne wordt nu het juiste foutpercentage weergegeven.

## Publisher
- Bugfix: bij het inplannen van een Publisher mailing op basis van een [RRule](https://www.copernica.com/nl/blog/post/slim-mailings-herhalen-met-rrules) is een probleem opgelost waarbij de mailing direct werd opgestart. 

## REST API / Webhooks
- Bugfix: wanneer je gebruik maakt van een ster om de standaardwaarde bij een meerkeuzeveld aan te geven wordt de ster niet meer meegegeven bij het ophalen van de veldwaardes via de API.
- Bugfix: het is weer mogelijk om een selectie aan te maken via de REST API.
