# Requests en replies van de REST API

Na het [registreren van je applicatie](./rest-introduction) kan deze 
HTTP requests sturen naar het *endpoint* van de API op onze server. 
Het adres van dit endpoint is:

`https://api.copernica.com/v2/path/to/resource?access_token=yourtoken`.

Het "/path/to/resource" deel van de URL is voor elk verzoek anders, en bepaalt
welke data je opvraagt of wijzigt. Ook moet je aan de URL altijd een **access_token**
parameter toevoegen om jouw applicatie te identificeren.

Je kunt HTTP GET requests sturen om data op te vragen, HTTP POST en HTTP PUT
om gegevens toe te voegen of te wijzigen, en HTTP DELETE om gegevens te verwijderen.
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

```
    POST /database/1234/profiles?access_token=yourtoken HTTP/1.1
    Host: api.copernica.com
    Content-Type: application/json
    
    {"email":"info@example.com"}
```

In plaats van het bovenstaande request dat gebruik maakt van JSON, had je 
echter ook een "traditioneel" HTTP POST request kunnen sturen:

```
    POST /database/1234/profiles?access_token=yourtoken HTTP/1.1
    Host: api.copernica.com
    Content-Type: application/x-www-form-urlencoded
    
    email=info@example.com
```

De content-type header is natuurlijk alleen van toepassing op POST en PUT
requests. GET en DELETE requests ondersteunen geen body data.

## Respons van de API

De respons die je ontvangt van de API servers hangt af van het type verzoek 
en het resultaat hiervan. Veelvoorkomende responsen zijn bijvoorbeeld de "200 OK" 
respons voor een succesvol verzoek en de "400 Bad Request" respons voor een 
verzoek dat niet voltooid kon worden. In het geval van een gefaald verzoek 
bevat de response body een error bericht.

Een succesvol GET verzoek zal een "200 OK" respons ontvangen. De verzochte 
data zal als een string in JSON formaat geëncodeerd worden geretourneerd en 
bevat zich in de response body. Het is ook mogelijk een "301 Moved Permanently" 
respons te ontvangen wanneer een verzoek naar een nieuwe URL verplaatst is. 

Andere status codes zijn bijvoorbeeld de "201 Created" respons voor een succesvol 
POST verzoek. In het geval van een succesvolle aanpassing door middel van een 
PUT call zal er een "200 OK" code teruggegeven worden. In het geval van de PUT 
call is het echter ook mogelijk dat er een of meerdere nieuwe entiteiten 
aangemaakt worden, in welk geval er een "303 See Other" code geretourneerd zal worden. 
POST en PUT verzoeken kunnen ook **X-location** headers bevatten met een URL 
van de nieuw aangemaakte entiteit. Bijvoorbeeld `X-location: https://api.copernica.com/v1/profile/$profileID` 
voor een nieuw aangemaakt profiel of geüpdatete profielen.

DELETE verzoeken kunnen ook resulteren in een "204 No Content" respons 
als de data die verwijderd had moeten worden niet gevonden is. Succesvolle 
DELETE verzoeken bevatten een **X-deleted** header, bijvoorbeeld: `X-deleted: profile $profileID`.

POST, PUT en DELETE calls die niet geresulteerd zijn in een error zullen 
geen data bevatten in de response body.

## Meer informatie

De volgende artikelen bevatten ook relevante informatie over de REST API:

* [Overzicht van de beschikbare API methodes](rest-api)
* [Veelgebruikte REST parameters bij het opvragen van lijsten](rest-paging)
