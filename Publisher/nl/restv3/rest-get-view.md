# REST API: GET view

Een methode om de metadata van een database op te vragen. De methode kan 
aangeroepen worden met een HTTP GET verzoek aan de volgende URL:

`https://api.copernica.com/v3/view/$id?access_token=xxxx`

Hier moet de `$id` vervangen worden met de numerieke identifier van de 
database waarvan de selecties moeten worden opgevraagd.

## Beschikbare parameters

Deze methode ondersteunt alleen paging parameters. Meer informatie over 
deze parameters vind je in het [artikel over paging](rest-paging).

## Geretourneerde velden

De methode retourneert een JSON object met de volgende velden:

| Variabele         | Omschrijving                                                                          |
|-------------------|---------------------------------------------------------------------------------------|
| **id**            | Unieke numerieke identifier van selectie.                                             |
| **name**          | Naam van de selectie.                                                                 |
| **description**   | Beschrijving van de selectie.                                                         |
| **parent-type**   | Type van de parent (view/database).                                                   |
| **parent-id**     | ID van de parent.                                                                     |
| **has-children**  | Boolean die aangeeft of de selectie zelf selecties bevat.                             |
| **has-referred**  | Boolean die aangeeft of er andere selecties zijn die naar deze selectie refereren.    |
| **has-rules**     | Boolean die aangeeft of de selectie regels heeft.                                     |
| **database**      | ID van de database waar deze selectie onder valt.                                     |
| **last-built**    | Tijdstempel van de laatste bouw van de selectie.                                      |
| **intentions**    | Array met de intenties voor deze selectie (1 of null voor email/sms/fax/pdf).         |

### JSON voorbeeld

De JSON voor een selectie ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"1384",
   "name":"Leadscoring",
   "description":"",
   "parent-type":"database",
   "parent-id":"7616",
   "has-children":false,
   "has-referred":false,
   "has-rules":true,
   "database":"7616",
   "last-built":"2019-04-17 00:21:26"
}
```

## Voorbeeld in PHP

Het volgende voorbeeld demonstreert hoe deze methode gebruikt kan worden met de API:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// voer de methode uit en print het resultaat
print_r($api->get("view/{$viewID}"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle REST API methods](./rest-api)
* [Vraag selectie regels op](./rest-get-view-rules)
