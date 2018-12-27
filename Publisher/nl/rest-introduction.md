# De REST API in een notendop

De REST API is makkelijk om te gebruiken. Door middel van API calls worden 
er HTTP verzoeken verstuurd naar de servers van Copernica om data 
op te vragen (HTTP GET), aan te maken (HTTP POST), te updaten (HTTP PUT) 
of te verwijderen (HTTP DELETE). Deze verzoeken worden behandeld door onze 
API servers, waarna er eventueel data teruggestuurd kan worden in een 
formaat dat makkelijk te begrijpen is voor een computer (JSON in dit geval).

## REST versie

Versie 2 van de API is de meest recente versie. In deze nieuwere versie 
zijn een aantal API calls verplaatst om het duidelijk te maken welke 
calls uniek zijn voor de Marketing Suite of de Publisher. Het voordeel 
aan deze nieuwe versie is dat deze duidelijker is en een aantal nieuwe 
calls bevat die je helpen data over je mailings te beheren.

### Upgraden naar v2

1. Als je onze CopernicaRestAPI klasse gebruikt kun je deze nu instantiëren 
met een versie parameter. Op het moment heb je iets als de volgende regel 
in je code staan.

`$api = new CopernicaRestAPI("your-access-token");`

Ten eerste moet de klasse vervangen worden met de [verbeterde klasse](./rest-php) 
die beide versies van de API ondersteunt, waarna je de eerder genoemde 
code kunt veranderen naar:

`$api = new CopernicaRestAPI("your-access-token", 2);`

2. Als je calls gebruikt om mailings of data hierover op te vragen 
zijn deze waarschijnlijk verplaatst. Gebruik onze documentatie om de URL's 
te updaten.

## Registreren van je applicatie of website

Om ongeautoriseerde toegang te voorkomen wordt de API beschermd met access 
token. Om de API te gebruiken moet je eerst je website of applicatie 
registreren bij Copernica om een access token te ontvangen. 

Copernica gebruikt het [*OAuth*](./rest-oauth.md) protocol om applicaties 
toegang te geven tot de API. Dit is een gestandaardizeerd protocol waarvoor 
je eerst je website of applicatie moet registreren. Je kan dit doen met 
het registratie formulier op het [dashboard](/nl/applications) van de 
Copernica website. Het is niet mogelijk te registreren in de Marketing Suite 
of Publisher omgevingen. Na het voltooien van de registratie kun je met een ander 
formulier op het dashboard een of meerdere accounts linken aan je applicatie.

Nadat je de applicatie geregistreerd hebt en aan je account hebt gelinkt 
krijg je toegang tot je API access token. Dit is een lange reeks alphanumerieke 
karakters die meegegeven moet worden aan elke call die je maakt. Als je 
de access token hebt kun je testen of je toegang hebt tot de API met de 
volgende URL, die je direct in je browser in kan voeren:

`https://api.copernica.com/v2/identity?access_token=jouwaccesstoken`

In de URL vervang je de tekst "jouwaccesstoken" met je eigen access token. 
Als je het registratie proces succesvol hebt afgerond geeft deze methode 
een JSON object met de naam van je bedrijf en account terug. 

## HTTP verzoeken

De REST API gebruikt het HTTP protocol voor het uitwisselen van data. Jouw 
website of app kan simpelweg een HTTP verzoek sturen naar een van onze API 
servers om toegang te krijgen tot de data opgeslagen door Copernica. Er 
zijn vier type methodes die worden ondersteund door dit protocol:

* **GET**: Vraagt data op
* **POST**: Maakt data aan en voegt data toe
* **PUT**: Past data aan
* **DELETE**: Verwijdert data

Het is hier belangrijk om de types te onderscheiden. Het verschil tussen 
een HTTP GET of een HTTP POST verzoek is groot. Hoewel de URL voor beide 
hetzelfde kan zijn bepaalt het type van de methode namelijk of er 
data opgevraagd wordt (GET) of overschreven wordt (PUT)!

In de praktijk is het verschil tussen HTTP POST en HTTP PUT minder groot. 
Voor de meeste URL's worden POST en PUT verzoeken hetzelfde behandeld. 
Als je een POST verzoek indient voor een methode die alleen PUT ondersteund 
zullen we deze ook behandelen als een PUT call en andersom. Er zijn 
echter een aantal methodes die PUT en POST verzoeken anders afhandelen. 
Hierom adviseren wij het type methode dat genoemd wordt in de documentatie 
te gebruiken, aangezien het mogelijk is dat API calls aangepast worden in 
de toekomst.

## Meer informatie

De volgende artikelen bevatten meer informatie over de REST API:

* [OAuth integraties met de REST API](./rest-oauth.md)
* [Formaat van verzoeken en antwoorden](./rest-requests.md)
* [Overzicht van alle API methodes](./rest-api.md)
* [Paging](./rest-paging.md)
