# Delen van statistieken en werken met slimme elementen

## Delen van statistieken
In Marketing Suite is het mogelijk gemaakt om een statistieken rapport te delen van een verzonden mailing. Hiermee kun je derden inzicht geven in de resultaten van een verzonden campagne. 

Je vindt deze optie in de statistieken van je verzonden mailing onder de knop 'Statistieken delen'.

## Werken met slimme elementen in drag-and-drop-templates
Bij het opmaken van een nieuwsbrief maak je vaak gebruik van dezelfde handelingen. Stel je hebt een webshop en je wilt een e-mail sturen ter promotie van 5 artikelen, dan moet je voor ieder product de afbeelding, productnaam, prijs en link toevoegen. Een aantal van deze elementen, zoals de link, wordt vaak meerdere keren gebruikt. Deze vind je bijvoorbeeld terug achter de titel, de afbeelding en de bestelknop. Als je de volgende dag 5 nieuwe artikelen wilt sturen, moet je deze handelingen opnieuw uitvoeren. Om dit te vereenvoudigen heeft de drag-and-drop-editor de functie 'Slimme elementen'.

Wil je weten hoe je slimme elementen kunt inzetten om je werk te vergemakkelijken? Lees dan meer in [dit artikel](https://www.copernica.com/nl/documentation/email-editor-smart-elements).

## Help ons Copernica te verbeteren
Bij Copernica zijn we continu op zoek naar verbeteringen aan onze software om het gebruiksgemak te vergroten. Veel van deze verzoeken komen binnen bij onze support-afdeling. Dit heeft het afgelopen jaar gezorgd voor onder andere een vernieuwde [drag-and-drop-editor](https://ms.copernica.com/#/design/#helpons), een verbeterde [resultatenmodule](https://ms.copernica.com/#/results/sentmailings#helpons), [AB-tests en split-runs](https://www.copernica.com/nl/documentation/email-editor-ab-splitrun-test#helpons) en verbeteringen aan de [stabiliteit](https://www.copernica.com/nl/blog/post/onderhoud-aan-onze-infrastructuur-overgang-naar-kubernetes).

We zijn benieuwd welke functionaliteiten je graag zou willen toevoegen of welke onderdelen van de software je wilt verbeteren. Stuur een e-mail met je ideeën naar [productowner@copernica.com](mailto:productowner@copernica.com?subject=Ideeën%20Copernica).

Op basis van de aangeleverde verbeteringen kunnen wij bepalen waar het meeste vraag naar is en waar wij als eerste aan gaan werken.

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

## Documentatie
- In [dit artikel](https://www.copernica.com/nl/documentation/email-editor-ab-splitrun-test) geven we je meer informatie over het gebruik van AB-tests en split-runs in de e-mail-editor.
