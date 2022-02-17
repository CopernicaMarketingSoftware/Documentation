# Productupdate 17-02-2022

### Optie om 2048 bit DKIM-sleutel te gebruiken
Binnen de [sender domains](https://ms.copernica.com/#/admin/account/senderdomains) hebben we de optie toegevoegd om je DKIM-sleutel van 1024 bit uit te breiden naar 2048 bit. Dit zorgt voor een verbeterde beveiliging van je sender domain.

Je kunt de lengte van je DKIM-sleutel aanpassen door op je domein te klikken en te kiezen voor 'Instellingen -> DKIM-sleutelgrootte'.
 
### Mediabibliotheken beheren in Marketing Suite
De mediabibliotheken die je eerder alleen in Publisher kon beheren, zijn nu ook toegankelijk in Marketing Suite. Hierdoor is het iets makkelijker en sneller om bestanden en afbeeldingen te beheren. Je vindt deze module onder het kopje [Mediabibliotheken](https://ms.copernica.com/#/medialibraries) in de Marketing Suite.

### Niet langer mogelijk om door webversies te itereren
Door een bug in onze code bleek het mogelijk om webversies te itereren. Hierdoor was het eenvoudig om webversies van verzonden mailings op te halen door derden. Dit probleem is inmiddels aan onze kant verholpen. We hebben onderzocht of er door derden gebruik is gemaakt van deze bug en dit is, met uitzondering van de melder van de bug, niet het geval geweest. 

Mocht je hier verdere vragen over hebben, kun je contact opnemen met onze [supportafdeling](mailto:support@copernica.com)

## Marketing Suite
- We hebben een gezondheidscheck toegevoegd tijdens het inplannen van je drag-and-drop-template. Hierdoor zie je in één overzicht of er aandachtspunten zijn voordat je de mailing verstuurt.
- Bij het toevoegen van een afbeelding in de drag-and-drop-editor hebben we de keuze toegevoegd om een afbeelding van een externe locatie te gebruiken of om een afbeelding direct te uploaden.
- De mogelijkheid om een antwoordadres (reply-to) in te stellen is toegevoegd.
- In de drag-and-drop-editor hebben we een undo/redo optie toegevoegd. Hierdoor kun je gemakkelijk gemaakte wijzigingen ongedaan maken. 
- In de {unsubscribe}-tag kun je nu, net als in Publisher, gebruik maken van een redirect. Meer informatie hierover vind je [hier](https://www.copernica.com/nl/documentation/email-editor-unsubscribelink-webversion).
- Je kunt nu categorieën toevoegen aan je modules binnen de nieuwe drag-and-drop-editor. Onder 'Gereedschap -> Modulecategorieën' in de [e-mail-editor](https://ms.copernica.com/#/design) kun je de categorieën beheren.
- In de verzendinstellingen is het mogelijk gemaakt om de ontdubbeling van profielen uit te schakelen.
- Bij het toevoegen van een opvolgactie op een template of document krijg je een waarschuwing te zien als dit hetzelfde template of document betreft. Dit om een loop van opvolgacties te voorkomen.
- Bij het gebruik van foutieve personalisatie in de tekstversie geven wij nu een melding in de toolbar.
- We hebben de spamscore van je template direct in de toolbar zichtbaar gemaakt.
- We hebben een optie toegevoegd in de voorbeeldweergave van je HTML-document om deze te bekijken in een nieuw tabblad. 
- Bij het exporteren van mailingresultaten worden nu alle velden die op de overzichtspagina van je database worden getoond meegenomen.
- In de [XSLT-module](https://ms.copernica.com/#/xslt) slaan wij de gegevens niet meer automatisch op. Dit om problemen in lopende campagnes te voorkomen.
- Bugfix: in de statistieken zijn de previews nu ook zichtbaar van de templates voor de nieuwe drag-and-drop-editor.
- Bugfix: bij een export binnen het profielen-gedeelte wordt de naam van de import nu gebruikt als bestandsnaam.
- Bugfix: als je gebruik maakt van de optie 'Dit veld standaard sorteren' bij een veld wordt de database nu op basis van dit veld gesorteerd in het overzicht.
- Bugfix: bij het kopiëren van een template worden de toegangsrechten nu ook meegekopieerd.

## Publisher
- Bugfix: in de statistieken wordt de lijst met ontvangers weer getoond.
- Bugfix: bij het uitbreiden van hyperlinks is geen leeg domein meer zichtbaar als standaardwaarde.
- Bugfix: links binnen een if mso-tag, voor Microsoft Outlook, met de optie <v:roundrect> worden nu omgezet naar een tracking link.
- Bugfix: bij het bewerken van een periodieke export van je resultaten worden de juiste instellingen weer ingeladen.
- Bugfix: het bekijken van ingeroosterde mailings uit het verleden is weer mogelijk.
- Bugfix: als je callbacks hebt ingesteld op je database worden deze nu ook uitgevoerd zodra een formulier wordt verzonden.

## REST API / Webhooks
- De access-tokens van de API zijn enkel nog volledig zichtbaar direct na het aanmaken van het token. Om beveiligingsredenen zijn in het vervolg enkel de eerste 16 tekens inzichtelijk. 
- We hebben een optie toegevoegd om de [uitschrijvingen](https://www.copernica.com/nl/documentation/restv3/rest-get-ms-emailing-unsubscribes) van drag-and-drop-templates per mailing op te halen.
