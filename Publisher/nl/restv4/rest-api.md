# De REST API

## Endpoints

De REST API is benaderbaar via de endpoints https://api.copernica.com/v4 en 
https://rest.copernica.com/v4. Er is een subtiel verschil tussen
deze twee endpoints, met name bij het ophalen van [grote datasets](./rest-paging.md). Beide 
endpoints ondersteunen de traditionele HTTP-acties ("GET", "POST", "PUT" en 
"DELETE") op de gebruikelijke wijze. Daarbij is "POST" bedoeld om data toe te 
voegen, terwijl "PUT" bedoeld is om data te overschrijven.

* [Overzicht van methodes](./rest-methods.md)
* [Vorige versie van de REST API (v3)](../restv3/rest-api.md)

## Authorisatie en API-tokens

Alle calls naar de REST API vereisen dat er een "Authorization" HTTP header wordt meegestuurd met daarin
een token string. Deze header moet met elk GET, PUT, POST en DELETE request worden meegestuurd. Bijvoorbeeld:

```
GET /v4/identity HTTP/1.1
Host: api.copernica.com
Authorization: Bearer abcd.xyz.klmnop
```

Het voorbeeld hierboven is versimpeld, in werkelijkheid zijn de tokens veel langer. De authorization-header
moet beginnen met het woord "Bearer" en bevat daarna een base64 encoded token string op basis waarmee je
toegang hebt tot de API. 

De tokens zijn [JSON Web Tokens](https://jwt.io/introduction) (kortweg: JWT) waarin de
toegangsrechten tot de API zijn opgeslagen. Mocht je dat willen, dan kun je het token dus decoderen en de JSON
data uitlezen, maar dit is niet nodig. Als je de tokens gewoon gebruikt als strings werkt het ook.

Om een JWT token te verkrijgen moet je drie stappen zetten:

1. Handmatig vraag je een API token aan in het Marketing Suite dashboard. Dit API token geeft je nog niet rechtstreeks toegang tot de API.
2. Met het API token kun je bij de authenticatie-server een JSON Web Token (JWT) opvragen dat 24 uur houdbaar is en waarmee je wel toegang hebt tot de API.
3. Gedurende 24 uur kun je daarna met dit tweede token de REST API aanroepen.
4. Na deze 24 uur moet je stap 2 herhalen om een nieuw token op te vragen. Eerder mag ook.

De eerste stap doe je over het algemeen handmatig. De overige stappen zijn normaal gesproken geautomatiseerd.

### Opvragen van een API token

Je kunt API tokens met de hand aanmaken in het [Marketing Suite-dashboard](https://ms.copernica.com/#/admin/account/access-tokens).
Een API token kun je vervolgens gebruiken om een tijdelijk JSON Web Token op te vragen. Bij het aanmaken van een API token kun je 
aangeven dat deze alleen beschikbaar mag zijn voor de API v4. Hiermee voorkom je dat het token gebruikt kan worden in de URL van oudere versies van de API.

### Opvragen van een JWT

Gegeven een API token (zie boven) kun je bij de authorisatie-server een JWT aanvragen. Hiervoor voer je een POST verzoek uit naar: 
`https://authenticate.copernica.com/`. In de body van de call plaats je de access token: `{'access_token':<your_access_token>}`. 
De respons bevat een JWT string. Deze string kun je daarna gebruiken in de calls naar de API server:

### De Authorization header

Aan elke call naar de REST API (ongeacht of dat een GET, POST, PUT of DELETE call is), moet je een "Authorization" header
meegegven. Deze header heeft het formaat "Authorization: Bearer {your_json_web_token}". Als je een call maakt met 'curl'
kan dit op de volgende wijze:

```
curl https://api.copernica.com/v4/identity -H "Authorization: Bearer {your_json_web_token}"
```

Houd er rekening mee dat een JWT 24 uur geldig is. Na deze periode moet je een nieuw verzoek naar de authenticatie-URL sturen.

## OAuth-koppeling
Tokens die toegang verlenen tot accounts van andere bedrijven worden opgevraagd
door middel van een [OAuth-handshake](./rest-oauth.md). Dat laatste is vooral van toepassing wanneer je koppelingen maakt voor derden.

We maken onderscheid tussen API-applicaties en API-tokens. Dat onderscheid is met name relevant voor OAuth-koppelingen. Daarbij moet een buitenstaander het verschil kunnen zien tussen de applicatie die je wilt koppelen (jouw applicatie) en het toegangsrecht dat verkregen wordt (het API-token). 
Indien je geen OAuth-koppelingen nodig hebt kun je bij het aanmaken van API-tokens volstaan met het gebruik van de standaardapplicatie.

## Dataformaat

Als je POST of PUT gebruikt om data naar Copernica te versturen, dan kun je de data 
op verschillende manieren in de body van je request plaatsen. Copernica controleert 
de content-type-header om het formaat van de aangeleverde gegevens te bepalen.

JSON biedt de meest krachtige methode. Daarmee kun je complex geneste datastructuren uitwisselen met Copernica.
We ondersteunen echter ook de traditionele methode waarbij variabelen door middel van HTTP POST-requests worden 
verstuurd. In het onderstaande voorbeeld versturen we een request naar de REST API om een profiel met ID 1234 aan 
te maken in de database. De body bevat een JSON-object met de eigenschappen van het nieuwe profiel:

```
POST /database/1234/profiles HTTP/1.1
Host: api.copernica.com
Content-Type: application/json

{
    "fields":
    {
        "email":"info@example.com"
    }
}
```

In plaats van het bovenstaande request (dat gebruik maakt van JSON) had je echter ook een 'traditioneel' HTTP POST-request kunnen versturen:

```
POST /database/1234/profiles HTTP/1.1
Host: api.copernica.com
Content-Type: application/x-www-form-urlencoded

fields[email]=info@example.com
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

POST-verzoeken kunnen ook **X-location**-headers bevatten met een URL 
van de nieuw aangemaakte entiteit. In het geval van een nieuw aangemaakt profiel 
of geüpdatete profielen ziet dat er als volgt uit: 
```
"X-location: https://api.copernica.com/v4/profile/$profileID"
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
