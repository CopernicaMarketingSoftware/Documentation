# De REST API in een notendop

Je kunt gemakkelijk een applicatie aanmelden via het dashboard van de Copernica 
website. Na het opgeven van een naam, krijg je een API key. Met deze key kun je
vervolgens calls maken naar de Copernica REST API.


## HTTP requests

Met de REST API kun je HTTP requests sturen naar de servers van Copernica. 
De requests worden door onze API servers verwerkt en de opgehaalde of bewerkte 
data wordt in JSON formaat teruggestuurd. Copernica ondersteunt vier verschillende 
soorten requests:

* HTTP GET voor het ophalen van data;
* HTTP POST voor het toevoegen van nieuwe data;
* HTTP PUT voor het bijwerken van bestaande data;
* HTTP DELETE om data te verwijderen.

*Het verschil tussen HTTP POST en HTTP PUT is in de praktijk vaak een grijs gebied,
omdat het ongeveer hetzelfde resultaat oplevert. Echter, met het oog op de toekomst 
wordt aangeraden om het onderscheid wel te hanteren.*


## Meer informatie

De volgende artikelen bevatten ook uitgebreide informatie over de REST API:

* [OAuth koppeling maken met de REST API](rest-oauth)
* [Requests naar de API sturen en antwoorden verwerken](rest-requests)
* [Overzicht van de beschikbare API methodes](rest-api)
* [Veelgebruikte REST parameters bij het opvragen van lijsten](rest-paging)