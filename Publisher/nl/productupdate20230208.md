# Productupdate - Delen van statistieken

## Delen van statistieken
In Marketing Suite is het mogelijk gemaakt om een statistieken rapport te delen van een verzonden mailing. Hiermee kun je derden inzicht geven in de resultaten van een verzonden campagne. 

Je vindt deze optie in de statistieken van je verzonden mailing onder de knop 'Statistieken delen'.

## Marketing Suite
- Bij het bewerken van een voorwaarde op een blok in je drag-and-drop-template kun je nu direct je wijziging opslaan zonder in je template te moeten klikken.
- In de toolbar aan de onderkant van een drag-and-drop-template is een knop toegevoegd naar de gezondheidscheck. Hiermee kun je zien of er fouten in je template zitten.
- Bij het inroosteren van een mailing met een terugkerend schema wordt in de agenda weergegeven op welke dagen de mail zal worden verzonden.
- Bij de sender domains hebben we blauwe vinkjes toegevoegd wanneer de DNS afwijkt van het aanbevolen record, maar waarbij het record *op dit moment* valide is om een mailing te versturen. In verband met eventuele toekomstige wijzigingen aan onze infrastructuur raden wij zoveel mogelijk aan om de DNS-aanbevelingen correct over te nemen zodat een groen vinkje zichtbaar wordt.
- Binnen de verzonden e-mailings van een profiel is het nu mogelijk om in te zien door welke opvolgactie een specifieke mail is opgestart.
- In je [mediabibliotheek](https://ms.copernica.com/#/medialibraries) hebben we de optie toegevoegd om je afbeeldingen en bestanden te downloaden.
- Het IP-adres van een klik wordt nu meegegeven in de webhook.
- Bij je [notificatie-instellingen](https://ms.copernica.com/#/admin/user/notifications) is het mogelijk om een notificatie in te stellen als API-calls boven een eigen ingestelde limiet komen.
- Bugfix: in de [resultaten-module](https://ms.copernica.com/#/results) zijn AB-tests op basis van HTML-documenten weer zichtbaar.
- Bugfix: in de statistieken van een document worden individuele mailings nu ook opgenomen.
- Bugfix: na het verwijderen van een (sub)profiel blijven de mailing statistieken inzichtelijk. Deze zijn alleen niet meer gelinkt aan een (sub)profiel.
- Bugfix: in het [dashboard](https://ms.copernica.com/#/menu) wordt nu ook bij de knop 'maak een mailing aan' gebruik gemaakt van het nieuwe verzendscherm.
- Bugfix: bij het gebruik van een link naar LinkedIn wordt geen foutmelding meer getoond in de gezondheidscheck van je template.
- Bugfix: we versturen nu enkel de notificatie over een hoog foutpercentage wanneer er minimaal 2% fouten zijn in je verzonden mailing.

## Publisher
- Bugfix: er is een probleem verholpen met het downloaden van PDF-bestanden in bulk.
- Bugfix: wanneer je met je muis over de selectie gaat komt het aantal profielen weer overeen met het daadwerkelijke aantal profielen in de selectie.

## API
- Bij het ophalen van [document-statistieken](https://www.copernica.com/nl/documentation/restv3/rest-get-publisher-document-statistics) is het mogelijk gemaakt om te filteren op het type mailing, het minimaal en maximaal aantal ontvangers en of de e-mail gestart is als opvolgactie.
- Het dominante resultaat is toegevoegd aan de REST API-call voor het ophalen van statistieken van [Publisher](https://www.copernica.com/nl/documentation/restv3/rest-get-publisher-emailing-statistics)- en [Marketing Suite](https://www.copernica.com/nl/documentation/restv3/rest-get-ms-emailing-statistics)-mailings.
- Bij het ophalen van de [testgroepen](https://www.copernica.com/nl/documentation/restv3/rest-get-publisher-emailing-testgroups) van een mailing wordt nu ook het template ID teruggegeven.
- Bugfix: in de SOAP API is het weer mogelijk om het Account_sendSMS-endpoint aan te roepen.
