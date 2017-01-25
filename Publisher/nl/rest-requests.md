# Requests en replies van de REST API

Als je een website of app hebt gekoppeld aan [de REST API](rest-api) van Copernica,
dan kan deze applicatie HTTP requests sturen naar het *endpoint* van de API
op onze server. Het adres van dit endpoint is *https://api.copernica.com/path/to/resource*.
Het "/path/to/resource" deel van de URL is voor elk request anders, en bepaalt
welke data je opvraagt of wijzigt. Ook moet je aan de URL altijd een *access_token*
parameter toevoegen om jouw applicatie te identificeren.

Je kunt HTTP GET requests sturen om data op te vragen, HTTP POST en HTTP PUT
om gegevens toe te voegen of te wijzigen, en HTTP DELETE om dingen te verwijderen.
De data die je bij een GET request terugkrijgt is meestal een JSON object. Voor
POST, PUT en DELETE requests zit het antwoord in de header.


## Data naar Copernica sturen

Als je POST of PUT gebruikt om data naar Copernica te sturen, dan kun je de data 
die bij het request hoort op verschillende manieren in de body van je request
plaatsen. Copernica controleert de "content-type" header om te bepalen in welk
formaat je de gegevens hebt aangeleverd.

De krachtigste manier is om JSON in je request body te gebruiken, omdat je 
hiermee ook complexe geneste datastructuren naar Copernica kunt sturen. We 
ondersteunen echter ook de traditionele manier om variabelen met HTTP POST 
requests mee te sturen. Het volgende voorbeeld demonstreert het request dat
je naar de REST API kunt sturen om een profiel aan te maken in de database met
ID 1234. De body van het request bevat een JSON object met de eigenschappen
van het nieuwe profiel.

    POST /database/1234/profiles?access_token=yourtoken HTTP/1.1
    Host: api.copernica.com
    Content-Type: application/json
    
    {"email":"info@example.com"}

In plaats van het bovenstaande request dat gebruik maakt van JSON, had je 
echter ook een "traditioneel" HTTP POST request kunnen sturen:

    POST /database/1234/profiles?access_token=yourtoken HTTP/1.1
    Host: api.copernica.com
    Content-Type: application/x-www-form-urlencoded
    
    email=info@example.com

De content-type header is natuurlijk alleen van toepassing op POST en PUT
requests. GET en DELETE requests ondersteunen geen body data.


## Het antwoord verwerken

Het antwoord dat Copernica terugstuurt is afhankelijk van het request type.
Op GET requests krijg je een "200 OK" bericht terug als de opgevraagde 
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


## Meer informatie

De volgende artikelen bevatten ook relevante informatie over de REST API:

* [Overzicht van de beschikbare API methodes](rest-reference)
* [Veelgebruikte REST parameters bij het opvragen van lijsten](rest-paging)
