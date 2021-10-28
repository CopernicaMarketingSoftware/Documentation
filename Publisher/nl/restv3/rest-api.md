# De REST API

## Endpoints

De REST API is benaderbaar via de endpoints https://api.copernica.com/v3 en 
https://rest.copernica.com/v3. Er is een subtiel verschil tussen
deze twee endpoints, met name bij het ophalen van [grote datasets](./rest-paging.md). Beide 
endpoints ondersteunen de traditionele HTTP-acties ("GET", "POST", "PUT" en 
"DELETE") op de gebruikelijke wijze. Daarbij is "POST" bedoeld om data toe te 
voegen, terwijl "PUT" bedoeld is om data te overschrijven.

* [Overzicht van methodes](./rest-methods.md)
* [Vorige versie van de REST API (v2)](../restv2/rest-api.md)
* [Vorige versie van de REST API (v1)](../restv1/rest-api.md)

## API-tokens

Om toegang te krijgen tot de API heb je een API-token nodig. Je voegt dit token als parameter toe aan elke call die je naar de API stuurt. Dat kan bijvoorbeeld als volgt ("MYTOKEN" wordt vervangen door je daadwerkelijke token):

```
https://api.copernica.com/v3/path/to/resource?access_token=MYTOKEN
```

Je maakt tokens voor je eigen accounts aan in het
[Marketing Suite-dashboard](https://ms.copernica.com/#/admin/account/access-tokens).
Tokens die toegang verlenen tot accounts van andere bedrijven worden opgevraagd
door middel van een [OAuth-handshake](./rest-oauth.md). Dat laatste is vooral van toepassing
wanneer je koppelingen maakt voor derden.

We maken onderscheid tussen API-applicaties en API-tokens. Dat onderscheid is met name relevant voor 
OAuth-koppelingen. Daarbij moet een buitenstaander het verschil kunnen zien tussen de applicatie die 
je wilt koppelen (jouw applicatie) en het toegangsrecht dat verkregen wordt (het API-token). 
Indien je geen OAuth-koppelingen nodig hebt kun je bij het aanmaken van API-tokens volstaan met het 
gebruik van de standaardapplicatie.

## Dataformaat

Als je POST of PUT gebruikt om data naar Copernica te versturen, dan kun je de data 
op verschillende manieren in de body van je request plaatsen. Copernica controleert 
de content-type-header om het formaat van de aangeleverde gegevens te bepalen.

JSON biedt de meest krachtige methode. Daarmee kun je complex geneste datastructuren uitwisselen met Copernica.
We ondersteunen echter ook de traditionele methode waarbij variabelen door middel van HTTP POST-requests worden 
verstuurd. In het onderstaande voorbeeld versturen we een request naar de REST API om een profiel met ID 1234 aan 
te maken in de database. De body bevat een JSON-object met de eigenschappen van het nieuwe profiel:

```
POST /database/1234/profiles?access_token=yourtoken HTTP/1.1
Host: api.copernica.com
Content-Type: application/json

{"email":"info@example.com"}
```

In plaats van het bovenstaande request (dat gebruik maakt van JSON) had je echter ook een 'traditioneel' HTTP POST-request kunnen versturen:

```
POST /database/1234/profiles?access_token=yourtoken HTTP/1.1
Host: api.copernica.com
Content-Type: application/x-www-form-urlencoded

email=info@example.com
```

De content-type-header is alleen van toepassing op POST- en PUT-requests. 
GET- en DELETE-requests ondersteunen geen data in de body.

## Respons van de API

De respons die je ontvangt van de API-servers hangt af van het type verzoek 
en het resultaat hiervan. Veelvoorkomende responsen zijn bijvoorbeeld de "200 OK"-respons 
(bij een succesvol verzoek) en de "400 Bad Request"-respons (bij een verzoek dat niet voltooid 
kon worden). In het geval van een gefaald verzoek bevat de response-body een error.

Een succesvol GET-verzoek geeft een "200 OK"-respons met een string in JSON-formaat 
in de response-body. Wanneer een verzoek naar een nieuwe URL verplaatst is is het
mogelijk dat er een "301 Moved Permanently"-respons wordt gegeven. 

Andere statuscodes zijn ook mogelijk. De "201 Created"-respons voor een succesvol 
POST-verzoek is hiervan een voorbeeld. Bij PUT- en DELETE-verzoeken wordt er standaard een "204 No Content" teruggegeven, tenzij door het PUT-verzoek één of meerdere nieuwe entiteiten worden aangemaakt. In dit geval geven wij een "201 Created"-respons.

POST- en PUT-verzoeken kunnen ook **X-location**-headers bevatten met een URL 
van de nieuw aangemaakte entiteit. In het geval van een nieuw aangemaakt profiel 
of geüpdatete profielen ziet dat er als volgt uit: 
```
"X-location: https://api.copernica.com/v3/profile/$profileID"
```

Succesvolle DELETE-verzoeken bevatten een **X-deleted**-header, bijvoorbeeld: 
```
"X-deleted: profile $profileID".
```

POST-, PUT- en DELETE-calls hebben geen response-body (of de body is leeg), _tenzij_
er een fout is opgetreden.

## Paging van grote datasets

De REST API stuurt standaard alleen batches terug met een beperkte omvang. Je moet
daarom (meestal) paging-parameters zoals *start* en *limit* meegeven om duidelijk
te maken welk deel van de resultaten je opvraagt. Voor sommige methodes
kan de API wel complete datasets teruggeven.

* [Paging en grote datasets](./rest-paging.md)

## Handige scripts

Hoewel het gebruik van de REST API eenvoudig is hebben we een aantal scripts
geschreven die het _nog makkelijker_ maken om de API te gebruiken.

* [PHP-script voor API-koppelingen](./rest-php.md)
