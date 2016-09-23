In het [vorige artikel over de
API](https://www.copernica.com/nl/blog/hij-bijt-niet-een-introductie-tot-copernicas-rest-api)
over de API werd besproken wat de API is en waar hij voor gebruikt kan
worden. In dit tweede deel gaan we dieper in op HTTP requests en leer je
hoe je ze zelf kunt maken met behulp van code of een interface.

Opbouw van de API
-----------------

De API is zo opgebouwd dat je uitgaat van een (onderdeel van) een
database en van daaruit alles dat een niveau dieper zit kunt aanroepen.
Als je bijvoorbeeld de collecties in een database wil zien, gebruik je
`database/$databaseID/collections`. Als je alle subprofielen in een
collectie wil zien, gebruik je `collection/$profile_ID/subprofiles`. Als
je alle velden van een subprofiel wil zien, gebruik je
`subprofile/$subprofileID/fields`.

Hetzelfde geldt voor informatie over emailings: om alle bestemmingen van
mailings te zien, ga je naar `emailings/$emailingID/destinations` en als
je de clicks van een bepaalde bestemming wil zien doe je dat met
`emailingdestination/$destinationID/clicks`. Er zijn ook functies die je
over alle emailings kunt aanroepen, zoals bijvoorbeeld `/abuses` of
`/clicks`. Een overzicht van alle beschikbare calls vind je
[hier](https://www.copernica.com/nl/support/rest/the-copernica-rest-api).

Ook voor views/selecties en regels kun je acties uitvoeren. Zo kun je
views en miniviews aanmaken en regels en condities maken en aanpassen.

Opbouw van een call
-------------------

Een HTTP request bestaat uit de volgende onderdelen:

-   De [URI](https://en.wikipedia.org/wiki/Uniform_Resource_Identifier),
    een verwijzing naar de bron waar je de data vandaan wil halen met
    daarin tevens de query, de opdracht die je de server geeft.
-   [Header
    fields](https://en.wikipedia.org/wiki/List_of_HTTP_header_fields):
    deze geven informatie over de request weer, zoals bijvoorbeeld het
    type content van de body, de datum, de server, et cetera.
-   De body: de body is optioneel voor een HTTP-bericht. Het bevat alle
    data die meegestuurd worden met het bericht. Hier zet je dus de data
    die je wilt toevoegen aan een database en wanneer je een response
    krijgt van de server staan hier ook de opgevraagde data in.

Het is niet gebruikelijk om HTTP requests helemaal zelf te schrijven.
Als je van plan bent om je eigen requests te gaan schrijven raden we je
aan om een library te gebruiken om je leven te vergemakkelijken, zoals
In [de
documentatie](https://www.copernica.com/nl/support/rest/example-get-post-and-delete-requests)
vind je bruikbare voorbeelden van verschillende calls in PHP. Wanneer je
liever geen scripts wil schrijven of niet met de command line wil
werken, kun je een programma gebruiken, bijvoorbeeld
[Postman](http://www.getpostman.com/). Postman biedt je een interface om
requests te maken waarbij je de mogelijkheid krijgt om je eigen body te
maken, maar je geen code hoeft te schrijven.

Verschillende soorten calls en hun syntax
-----------------------------------------

Zoals beschreven in het vorige artikel maakt de Copernica REST API
gebruik van 4 soorten requests: GET, POST, PUT en DELETE. Hieronder
staat per call beschreven hoe je hem doet.

### GET en DELETE

Zowel een request als de output van een request hebben een vast format
waarin data wordt verzonden. Om iets uit de API te krijgen, moet je dus
een correct gevormde call maken. Bij de Copernica REST API ziet de URI
van een GET of DELETE call er zo uit:

    https://api.copernica.com/database/$databaseID/profiles?access_token=your_access_token

Hierin zijn 'database','\$databaseID' en 'profiles' vervangbaar om een
andere method te gebruiken. Your\_access\_token moet uiteraard vervangen
worden door jouw eigen access token.

#### Parameters

Je kunt een GET of DELETE call ook specifieker maken, als je
bijvoorbeeld op een specifieke achternaam of leeftijd wil filteren. Dit
doe je door parameters mee te geven aan de call. Parameters zien er als
volgt uit in de URI:

    https://api.copernica.com/database/$databaseID/profiles?parameter1=value&parameter2=value&parameter3=value&access_token=your_access_token

#### Start en limit

De 'start' en 'limit'-parameters kun je gebruiken om een range te geven
waarover geïtereerd moet worden. De default range is van 0 tot maximaal
100. Door de parameter `limit=200` te gebruiken, laat je tot 200
resultaten zien.

#### Fields[] {#fields[]}

Sommige request methods hebben een optionele parameter fields[].
Fields[] zorgt ervoor dat je voorwaarden kunt stellen aan de data die je
ontvangt. Je kunt verschillende
[operators](https://www.copernica.com/en/support/rest/rest-api-parameters)
gebruiken om voorwaarden te stellen, zoals == (is gelijk aan), != is
niet gelijk aan), \>= (groter of gelijk aan) enzovoorts.

Om bijvoorbeeld een voornaam de zoeken, kun je de parameter
`fields[]=Firstname==Henk` gebruiken (als je het veld voor de voornaam
'Firstname' hebt genoemd) In de URI ziet het er dan zo uit:

    https://api.copernica.com/database/$databaseID/profiles?fields[]=Firstname%3D%3DHenk&access_token=your_access_token

Je kunt meerdere condities stellen voor je filtering. Parameters scheid
je met een '&'-teken. Wil je bijvoorbeeld alle mensen zoeken die Henk
Visser heten, dan kun je ook de parameter voor 'Lastname' vermelden:

    https://api.copernica.com/database/$databaseID/profiles?fields[]=Firstname%3D%3DHenk&fields[]=Lastname%3D%3DVisser&
    access_token=your_access_token

Let hierbij wel op dat je je URI correct encodet, anders wordt de
structuur ervan verkeerd geïnterpreteerd en krijg je geen resultaat. In
bovenstaande URI bijvoorbeeld is de '==' in `Lastname==Visser` veranderd
naar %3D%3D, omdat `Lastname==Visser` een enkel element is, in
tegenstelling tot de '=' in `fields[]=`, waar de '=' een deel is van de
structuur van de query. Een overzicht van URL-encoded karakters vind je
[hier](http://www.degraeve.com/reference/urlencoding.php).

### POST en PUT

POST en PUT volgen qua URI dezelfde regels als een GET of DELETE
request, behalve dat ze geen parameters in de URI hebben, maar een body
om aan te geven welke data je wil toevoegen aan de database. Deze body
wordt over het algemeen in [JSON](http://www.json.org/) geschreven,
waarin je door middel van key:value paren de informatie die in de
database moet komen specificeert. Je kunt voor alle velden die bestaan
in je database informatie toevoegen. Als we bijvoorbeeld Henk Visser aan
onze database willen toevoegen, zou ons JSON bestand er zo uit kunnen
zien:

    { 
       "firstname" : "Henk"
        "lastname" : " Visser"
        "email" : "henk.visser@copernica.com"
     }

Als we een item willen toevoegen aan onze database doen we dat als
volgt:

-   In Postman:

    -   Selecteer 'POST' als request
    -   Vul de juiste URI in met je access key
    -   Klik op 'Body'
    -   Vul key:value paren in onder 'x-www-urlencoded' of maak een JSON
        bestand onder 'raw'
-   In PHP:
    -   [Zie
        voorbeeld](https://www.copernica.com/nl/support/rest/example-get-post-and-delete-requests)

Nu je hebt geleerd hoe calls werken en hoe je ze moet doen, kunnen we
aan het echte werk beginnen: het verwerken van de vergaarde data. In het
volgende artikel bespreken we hoe je jouw data op een nuttige en
efficiente manier (periodiek) kunt exporteren, zodat je statistieken zo
gerapporteerd worden als jij wil en je niet meer gelimiteerd bent door
de opties van Publisher.
