# De REST API

## Endpoints

De REST-API is benaderbaar via de endpoints https://api.copernica.com/v2 en 
https://rest.copernica.com/v2. Er zit een subtiel verschil tussen
deze twee endpoints, met name bij het ophalen van [grote datasets](./rest-paging.md). Beide 
endpoints ondersteunen de traditionale HTTP-acties ("GET", "POST", "PUT" en 
"DELETE") op de gebruikelijke wijze, waarbij "POST" is bedoeld om data toe te 
voegen, en "PUT" om data te overschrijven.

* [Overzicht van methodes](./rest-methods.md)
* [Vorige versie van de REST API (v1)](../restv1/rest-api.md)

## API tokens

Om toegang te krijgen tot de API heb je een API token nodig. Dit token moet
je als parameter toevoegen aan elke call die je naar de API stuurt. Bijvoorbeeld
als volgt (je MYTOKEN moet vervangen door je daadwerkelijke token):

```
https://api.copernica.com/v2/path/to/resource?access_token=MYTOKEN
```

Tokens voor je eigen accounts kun je aanmaken in het
[dashboard van Marketing Suite](https://ms.copernica.com/#/admin/account/access-tokens).
Tokens om toegang te krijgen tot accounts van andere bedrijven kun je opvragen
door middel van een [OAuth handshake](./rest-oauth.md). Dit laatste is vooral
praktisch als je koppelingen maakt die je aan derden wilt aanbieden.

Als je een token aanmaakt merk je dat er een onderscheid is tussen API-applicaties
en API-tokens. Dit is vooral relevant voor de OAuth koppelingen (waarbij een buitenstaander
het verschil moet zien tussen de applicatie die wil koppelen (dit is jouw applicatie) en
het toegangsrecht dat die applicatie tot het account krijgt (het API-token). Indien
je geen OAuth koppelingen nodig hebt, kun je volstaan met het gebruik van de
standaardapplicatie bij het aanmaken van API-tokens.

## Data formaat

Als je POST of PUT gebruikt om data naar Copernica te sturen, dan kun je de data 
op verschillende manieren in de body van je request plaatsen. Copernica controleert 
de "content-type" header om te bepalen in welk formaat je de gegevens hebt aangeleverd.

JSON is het krachtigst, omdat je 
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

De content-type header is alleen van toepassing op POST en PUT
requests. GET en DELETE requests ondersteunen geen body data.

## Respons van de API

De respons die je ontvangt van de API servers hangt af van het type verzoek 
en het resultaat hiervan. Veelvoorkomende responsen zijn bijvoorbeeld de "200 OK" 
respons voor een succesvol verzoek en de "400 Bad Request" respons voor een 
verzoek dat niet voltooid kon worden. In het geval van een gefaald verzoek 
bevat de response body een error bericht.

Een succesvol GET verzoek geeft een "200 OK" respons, met een string in JSON formaat 
in de response body. Het is ook mogelijk dat een "301 Moved Permanently" 
respons wordt teruggegeven wanneer een verzoek naar een nieuwe URL verplaatst is. 

Andere status codes zijn bijvoorbeeld de "201 Created" respons voor een succesvol 
POST verzoek. In het geval van een succesvolle aanpassing door middel van een 
PUT call zal er een "200 OK" code teruggegeven worden. Bij PUT 
calls is het ook mogelijk dat er een of meerdere nieuwe entiteiten 
aangemaakt worden, in welk geval er een "303 See Other" code geretourneerd wordt. 
POST en PUT verzoeken kunnen ook **X-location** headers bevatten met een URL 
van de nieuw aangemaakte entiteit. Bijvoorbeeld "X-location: https://api.copernica.com/v2/profile/$profileID"
voor een nieuw aangemaakt profiel of geüpdatete profielen. Succesvolle 
DELETE verzoeken bevatten een **X-deleted** header, bijvoorbeeld: "X-deleted: profile $profileID".

POST, PUT en DELETE calls hebben geen response body (of de body is leeg), _tenzij_
er een fout is opgetreden.

## Paging van grote data-sets

De REST-API stuurt standaard alleen batches terug met een beperkte omvang. Je moet
daarom (meestal) paging-parameters zoals *start* en *limit* meegeven om duidelijk
te maken wel deel van de resultaten je opvraagt. Voor sommige methodes
kan de API wel complete data-sets teruggeven.

* [Paging en grote data sets](./rest-paging.php)


## Handige scripts

Hoewel het gebruik van de REST API niet moeilijk is, hebben we wat scripts
geschreven die het _nog makkelijker_ maken om de API te gebruiken.

* [PHP script voor API koppelingen](./rest-php.md)


