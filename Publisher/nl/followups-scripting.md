# Followups met javascript

Als je zelf je eigen mailings programmeert, dan kun je gebruik maken van
javascript om allerlei opvolgacties aan hyperlinks te koppelen. Deze scriptjes
worden door Copernica uitgevoerd zodra iemand op zo'n hyperlink klikt. Dit
werkt ongeveer hetzelfde als de scripts die je in een "onclick" attribuut
van een hyperlink plaatst, met een belangrijk verschil: de scripts worden niet
door de browser uitgevoerd, maar op de servers van Copernica.

Je kunt de scriptjes op een aantal manieren aan hyperlinks koppelen:

* je kunt ze in het "data-script" attribuut plaatsen van een &lt;a&gt; tag.
* of je kunt ze met de drag-and-drop editor invoeren. 


## Beschikbare objecten

In het script kun je gebruik maken van verschillende voorgedefinieerde variabelen 
en objecten waarmee je gegevens uit je account kunt ophalen, en gegevens kunt
bijwerken. Je hebt bijvoorbeeld toegang tot de gegevens van het profiel dat
op de hyperlink klikte. De volgende variabelen zijn beschikbaar:

* [**copernica**](./followups-scripting-copernica.md)
* [**message**](./followups-scripting-message.md)
* [**mailing**](./followups-scripting-mailing.md)
* [**template**](./followups-scripting-template.md)
* [**profile**](./followups-scripting-profile.md)
* [**subprofile**](./followups-scripting-subprofile.md)
* [**destination**](./followups-scripting-destination.md)

## Een eenvoudig voorbeeld

Je kunt heel makkelijk een profiel aanpassen als iemand op een link klikt:

    <a href="http://www.example.com" data-script="profile.fields.newsletter = 'no';">klik hier om af te melden</a>

Als iemand op de link klikt, wordt het script in het "data-script" attribuut
uitgevoerd. In bovenstaand voorbeeld wordt het veld "newsletter" op "no"
gezet bij een klik.

Overigens, als je de broncode van een verstuurd bericht inspecteert, dan zul
je het data-script attribuut niet meer aantreffen. Het script wordt uit de
mail gefilterd voordat het bericht wordt verstuurd. Maar Copernica heeft het
script wel opgeslagen en voert het uit als op de link wordt geklikt.
