# Followups met javascript

Als je zelf je eigen mailings programmeert, dan kun je gebruik maken van
javascript om allerlei opvolgacties aan hyperlinks te koppelen. Deze scripts
worden door Copernica uitgevoerd zodra iemand op zo'n hyperlink klikt. Dit
werkt ongeveer hetzelfde als de scripts die je in een "onclick" attribuut
van een hyperlink plaatst, met een belangrijk verschil: de scripts worden niet
door de browser uitgevoerd, maar op de servers van Copernica.

Je kunt de scriptjes op een aantal manieren aan hyperlinks koppelen:

* je kunt ze in het "data-script" attribuut plaatsen van een &lt;a&gt; tag.
* of je kunt ze met de drag-and-drop editor invoeren. 

## Beschikbare objecten

In het script kun je gebruik maken van verschillende voorgedefinieerde variabelen 
en objecten waarmee je gegevens uit je account kunt ophalen en gegevens kunt
bijwerken. Je hebt bijvoorbeeld toegang tot de gegevens van het profiel dat
op de hyperlink klikte. De volgende variabelen zijn beschikbaar:

* [**copernica**](./followups-scripting-copernica)
* [**mailing**](./followups-scripting-mailing)
* [**message**](./followups-scripting-message)
* [**template**](./followups-scripting-template)
* [**database**](./followups-scripting-database)
* [**collection**](./followups-scripting-collection)
* [**profile**](./followups-scripting-profile)
* [**subprofile**](./followups-scripting-subprofile)
* [**destination**](./followups-scripting-destination)

Een aantal van deze objecten hebben een eigen [data object](./followups-scripting-data) 
dat je kunt gebruiken om zelf informatie op te slaan. Zie de link voor meer informatie.

## Een eenvoudig voorbeeld

Je kunt heel makkelijk een profiel aanpassen als iemand op een link klikt:

    <a href="http://www.example.com" data-script="profile.fields.newsletter = 'no';">klik hier om af te melden</a>

Als iemand op de link klikt, wordt het script in het "data-script" attribuut
uitgevoerd. In bovenstaand voorbeeld wordt het veld "newsletter" dus op "no"
gezet bij een klik. Het voorbeeld is eenvoudig, maar als je wilt kun je
ook heel complexe scripts uitvoeren.

Overigens, als je de broncode van een door Copernica verstuurd bericht inspecteert, 
dan zul je hier nooit een data-script attribuut in aantreffen. Het data-script 
attribuut wordt namelijk uit de mail gefilterd voordat het bericht wordt verstuurd. 
Maar Copernica slaat het script wel op en voert het uit als op de link wordt geklikt.
