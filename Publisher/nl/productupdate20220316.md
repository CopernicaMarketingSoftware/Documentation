# Productupdate 16-03-2022

### Gebruik van RSS- en ATOM-feeds binnen je drag-and-drop-templates
We hebben het mogelijk gemaakt om RSS- en ATOM-feeds toe te voegen in je drag-and-drop-templates door middel van het feed blok. Hierdoor heb je de mogelijkheid om content dynamisch in te laden binnen je nieuwsbrief. Hierbij kun je bijvoorbeeld denken aan aanbiedingen, gerelateerde producten of nieuwsberichten.

Het blok werkt op basis van een URL waar de RSS- of ATOM-feed beschikbaar is. Voor de styling kun je gebruik maken van een XSLT-bestand binnen de [XSLT-module](https://ms.copernica.com/en#/xslt). Deze gegevens zal je eenmalig moeten instellen voor je nieuwsbrief. Hierna wordt de content ingeladen op basis van de gegevens uit de feed.

### Conditionele elementen tonen op basis van profielgegevens
Binnen een lijn, structuur en container van je drag-and-drop-template is het mogelijk gemaakt om deze elementen te tonen op basis van gegevens uit het profiel. 

Je vindt de mogelijkheid om een conditie in te stellen onder 'Voorwaarden' in het betreffende element. 

## Marketing Suite
- Het is nu mogelijk om in het verzendscherm naar meerdere bestemmingen tegelijk een mailing in te roosteren. Dit zorgt ervoor dat je niet meerdere keren dezelfde handeling hoeft te verrichten. In de resultaten zullen het aparte mailings blijven.
- De tags voor [{webonly}](https://www.copernica.com/nl/documentation/the-webonly-and-mailonly-functions) en [{mailony}](https://www.copernica.com/nl/documentation/the-webonly-and-mailonly-functions) zijn toegevoegd aan de drag-and-drop-templates.
- We hebben de opties 'font-family' en 'font-size' toegevoegd aan de teksteditor van onze HTML-templates. Hierdoor heb je meer stylingmogelijkheden binnen je tekstblokken.  
- Binnen een [mediabibliotheek](https://ms.copernica.com/#/medialibraries) is het mogelijk gemaakt om alle bestanden in bulk te downloaden. 
- Bugfix: bij het gebruik van 2%F, in plaats van een slash, in de URL wordt deze nu ook omgezet naar een valide URL.
- Bugfix: in de notificatie die je ontvangt na een hoog foutpercentage binnen een campagne wordt nu het juiste percentage weergegeven.

## Publisher
- Bugfix: bij het inplannen van een Publisher mailing op basis van een [RRule](https://www.copernica.com/nl/blog/post/slim-mailings-herhalen-met-rrules) is een probleem opgelost waarbij de mailing direct werd opgestart. 

## REST API / Webhooks
- Bugfix: bij het ophalen van een meerkeuze veld met de API is een probleem verholpen waarbij de ster, die je gebruikt om de default waarde aan te geven, mee wordt gegeven in de naam van het veld.
- Bugfix: het is weer mogelijk om een selectie aan te maken via de REST API.
