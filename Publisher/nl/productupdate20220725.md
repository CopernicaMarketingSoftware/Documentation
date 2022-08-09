# A/B-tests en split-runs in Marketing Suite
Binnen Marketing Suite is het nu mogelijk om A/B-tests en split-runs te versturen. Ook is het verzendscherm vernieuwd.

Met een A/B-test stuur je twee verschillende templates naar dezelfde selectie om te bekijken welke content de beste resultaten behaalt. In het verzendscherm is de verdeling van de twee groepen standaard 50/50. Met een slider kan je deze verdeling aanpassen.

Met een split-run stuur je verschillende templates eerst naar een beperkt aantal contacten om te zien welke versie het meeste resultaat (aantal impressies of kliks) oplevert. De meest succesvolle versie wordt vervolgens verstuurd naar het grootste gedeelte van je verzendselectie.

# Filter op datum binnen drag-and-drop-templates
In de statistieken van een drag-and-drop-template is de optie toegevoegd om een periode te selecteren waarover de statistieken moeten worden berekend. Dit is handig bij het gebruik van een template met een periodieke interval.

## Marketing Suite
- Bij het aanpassen en verwijderen van profielen in bulk wordt nu een extra waarschuwing weergegeven. Dit helpt om te voorkomen dat er per ongeluk gegevens worden aangepast of verwijderd. 
- Er zijn [extra personalisatievelden](https://www.copernica.com/nl/documentation/email-editor-personalization-variables) beschikbaar gemaakt voor drag-and-drop-templates.
- Hyperlinks in een feedblok binnen drag-and-drop-templates worden nu ook omgezet naar een tracking-URL. Hiermee is het mogelijk om kliks te meten.
Bij het uitbreiden van hyperlinks is de optie 'niet gelijk aan' toegevoegd aan de conditie voor jouw domeinnaam. 
- In bestaande drag-and-drop-templates is het nu mogelijk om jouw standaard hyperlinkconfiguratie in te laden. Hiervoor ga je binnen je template naar 'Configuratie -> Hyperlinks uitbreiden -> Een standaardconfiguratie kiezen'.
- Bij het gebruik van filters in de [resultaten-module](https://ms.copernica.com/#/results) is het laden van het overzicht geoptimaliseerd.
- Bij de optie om hyperlinks uit te breiden wordt er nu gecontroleerd of je juiste Smarty-code gebruikt.
- Je kan nu toegangsrechten instellen voor [mediabibliotheken](https://ms.copernica.com/#/medialibraries).
- Bugfix: het is weer mogelijk om een subprofiel te openen vanuit een miniselectie.
- Bugfix: in een subprofiel worden niet meer de gegevens van het hoofdprofiel geladen als het ID van beide velden gelijk is.
- Bugfix: bij het periodiek herhalen van een import vanaf een externe locatie wordt nu meerdere keren geprobeerd het bestand op te halen. Dit voorkomt dat de import vast blijft staan op de status 'downloaden'.
- Bugfix: in het volledige rapport van een template of document worden geen lege rijen meer getoond.
- Bugfix: bij het gebruik van een conditioneel blok in een drag-and-drop-template wordt de huidige waarde getoond.
- Bugfix: in de resultaten van een A/B-test wordt de tweede groep niet meer dubbel weergegeven.
- Bugfix: BCC-adressen opgemaakt met de [loadprofile](https://www.copernica.com/nl/documentation/loadprofile-and-loadsubprofile)-tag zijn nu ook zichtbaar in Marketing Suite.
- Bugfix: in Marketing Suite-opvolgacties is het weer mogelijk om het doel op te slaan.
- Bugfix: het uitschakelen van de optie 'Reguliere inhoud verbergen in de voorvertoning in de inbox' is weer mogelijk.
- Bugfix: na het inroosteren van een drag-and-drop-template is het onderwerp nu ook zichtbaar in het overzicht van de ingeroosterde mailings.
- Bugfix: je krijgt geen foutmelding meer bij het schakelen tussen de verschillende weergaven in een HTML-document.
- Bugfix: bij de [senderdomains](https://ms.copernica.com/#/admin/account/senderdomains) is een probleem verholpen waarbij ten onrechte een foutmelding werd weergegeven bij 'Tracking SSL'.

## Rest API
- Het is nu mogelijk om een HTML-template [aan te maken](https://www.copernica.com/nl/documentation/restv3/rest-post-publisher-templates) en [te bewerken](https://www.copernica.com/nl/documentation/restv3/rest-put-publisher-template).
- Het is nu mogelijk om een HTML-document [aan te maken](https://www.copernica.com/nl/documentation/restv3/rest-post-publisher-documents) en [te bewerken](https://www.copernica.com/nl/documentation/restv3/rest-put-publisher-document).
- Het is nu mogelijk om loopblokken van een HTML-document [op te halen](https://www.copernica.com/nl/documentation/restv3/rest-get-publisher-document-loopblocks) en [te bewerken](https://www.copernica.com/nl/documentation/restv3/rest-put-publisher-document-loopblock).
- Het is nu mogelijk om tekstblokken van een HTML-document [op te halen](https://www.copernica.com/nl/documentation/restv3/rest-get-publisher-document-textblocks) en [te bewerken](https://www.copernica.com/nl/documentation/restv3/rest-put-publisher-document-textblock).
- Het is nu mogelijk om afbeeldingsblokken van een HTML-document [op te halen](https://www.copernica.com/nl/documentation/restv3/rest-get-publisher-document-imageblocks) en [te bewerken](https://www.copernica.com/nl/documentation/restv3/rest-put-publisher-document-imageblock).
- Bugfix: bij het opvragen van je templates is het weer mogelijk om enkel niet-gearchiveerde templates op te halen.
