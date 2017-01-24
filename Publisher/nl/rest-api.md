# De REST API

Met de REST API kun je automatische koppelingen met Copernica maken. Je kunt
bijvoorbeeld je website of app zo programmeren dat hij met behulp van de REST
API gegevens in je Copernica-account ophaalt, creëert, updatet of verwijdert.
Dit gaat automatisch, dus buiten de *user interface* om.

De REST API werkt heel eenvoudig. In technisch opzicht komt het er simpelweg
op neer dat jouw website of app HTTP requests naar de servers van Copernica 
stuurt: HTTP GET requests om data op te halen en HTTP POST en HTTP PUT requests 
om data te bewerken. De requests worden door onze API servers verwerkt, en de 
opgehaalde of bewerkte data wordt in een formaat dat makkelijk door computers 
is te verwerken (JSON) teruggestuurd.


## Aanmelden voor de API

Om te voorkomen dat onbevoegden toegang hebben tot de REST API, moet je eerst
jouw website of app aanmelden bij Copernica. Pas nadat je de applicatie hebt
aangemeld en een geldige API key hebt, kun je calls naar de REST API doen.

Het aanmelden van een applicatie kun je doen via het dashboard van de Copernica
website. Dit is wellicht wat anders dan je in eerste instantie zou verwachten,
omdat je meestal gebruik maakt van de Marketing Suite of de Publisher om 
instellingen te wijzigen. Het aanmelden van een applicatie om toegang te krijgen
tot de REST API gaat echter niet via Marketing Suite of Publisher, maar via 
[het dashboard](/nl/applications) op www.copernica.com. Als je een applicatie
aanmeldt, moet je deze applicatie een naam geven, hier kun je bijvoorbeeld het
adres van je website voor gebruiken die de aanroepen gaat doen.

Copernica maakt gebruik van het [*OAuth*](oauth) systeem voor API koppelingen. 
Dit is een krachtig gestandaardiseerd authenticatiesysteem waarin onderscheid 
wordt gemaakt tussen geregistreerde applicaties en koppelingen tussen applicaties 
en accounts. Als je een applicatie bij Copernica aanmeldt, dan is die applicatie 
daarna nog niet in staat om calls naar Copernica te doen. De applicatie heeft 
weliswaar toegang tot de REST API, maar nog niet tot specifieke accounts. Gelukkig 
kan je echter ook deze accountkoppelingen via het Copernica dashboard aanmaken.

Nadat je een applicatie hebt aangemeld en daarna dus ook een koppeling tussen 
de applicatie en een account hebt gemaakt, krijg je een API key. Dit is een 
lange string bestaande uit cijfers en letters die je met elke API call moet 
meesturen. Je kunt testen of alles goed is gegaan door in je browser een API 
adres in te voeren. Als je een JSON bestand terugkrijgt, weet je dat het maken 
van de API koppeling is gelukt. Gebruik bijvoorbeeld het volgende adres:

`https://api.copernica.com/databases?access_token=jouwapikey`

Natuurlijk moet je de tekst "jouwapikey" in bovenstaand voorbeeld vervangen
door de string die je op het dashboard ziet. Als het goed is, krijg je een JSON
bestand terug met daarin alle databases van het account. Voor mensen is
zo'n lijst niet zo makkelijk in het gebruik, maar je zult begrijpen dat 
computerprogramma's hier goed mee uit de voeten kunnen.


## HTTP requests

De REST API maakt gebruik van het HTTP protocol voor het uitwisselen van data.
Jouw website of applicatie kan simpelweg een HTTPS request naar onze server
sturen om gegevens op te halen of bij te werken. Copernica ondersteunt vier
verschillende soorten requests:

* HTTP GET voor het ophalen van data
* HTTP POST voor het toevoegen van nieuwe data
* HTTP PUT voor het bijwerken van bestaande data
* HTTP DELETE om data te verwijderen

Let op dit onderscheid. Soms kun je naar een zelfde URL meerdere soorten 
requests sturen. Het maakt dan nogal uit of je een HTTP GET request stuurt om
alleen maar data op te halen, of juist een HTTP POST om data toe te voegen.

Het verschil tussen HTTP POST en HTTP PUT is in de praktijk niet zo scherp
als dat we het hier stellen. Onze servers behandelen deze twee requests op 
precies dezelfde wijze, en het maakt dus in werkelijk niet uit welke van de 
twee je gebruikt om data toe te voegen of bij te werken. Maar om
toekomstbestendig te zijn, raden we aan om toch een scherp onderscheid tussen
die twee methodes aan te houden.

Bij elk request moet je altijd een access_token variabele meesturen. Je kunt
deze variabele toevoegen aan de URL als gewone get parameter.


## Data naar Copernica sturen

Als je HTTP POST of HTTP PUT requests gebruikt om data naar Copernica te sturen,
dan kun je de data op verschillende manieren insturen. De krachtigste manier 
is om JSON te gebruiken, omdat je hiermee complexe datastructuren naar 
Copernica kunt zenden. We ondersteunen echter ook de normale manier om 
variabelen met HTTP POST requests mee te sturen.

In de header van je request moet je een "content-type" header meesturen. Als
je deze header op "application/json" hebt staan, dan kun je de data als JSON 
insturen.

    POST /database/1234/profiles HTTP/1.1
    Host: api.copernica.com
    Content-Type: application/json
    
    {"email":"info@example.com"}

Bovenstaand HTTP POST request kun je sturen naar Copernica om een profiel
toe te voegen aan de database met ID 1234. Je had echter ook een "traditioneel"
HTTP POST request kunnen sturen:

    POST /database/1234/profiles HTTP/1.1
    Host: api.copernica.com
    Content-Type: application/x-www-form-urlencoded
    
    email=info@example.com

Voor HTTP GET en HTTP DELETE requests geldt dit onderscheid niet. Met zulke 
requests kan geen body data worden meegestuurd en speelt dit dus ook niet.


## Het antwoord verwerken

Het antwoord dat Copernica terugstuurt is afhankelijk van de request methode.
Op HTTP GET requests krijg je een "200 OK" bericht terug als de opgevraagde 
data beschikbaar is, met de data als JSON string in de body van het bericht.

De andere type requests (POST, PUT en DELETE) gebruiken ook de "200 OK"
code als het request is gelukt, maar ze sturen geen data terug. Door middel van 
speciale HTTP headers wordt het resultaat van de actie gerapporteerd. In de 
resultaatheader van succesvolle POST en PUT requests staat een link naar de 
aangepaste/toegevoegde data. Hiervoor gebruiken we een *X-location* header,
bijvoorbeeld "X-location: https://api.copernica.com/profile/$profileID" als 
je een profiel wijzigt of toevoegt. Een succesvolle DELETE request bevat een
*X-deleted* header: "X-deleted: profile $profileID".

Als er een fout optreedt, ontvang je een "400 Bad request" returncode. In de
body staat vaak een JSON bericht met een foutmelding.

