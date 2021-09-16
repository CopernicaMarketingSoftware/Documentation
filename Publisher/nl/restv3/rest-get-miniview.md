# REST API: GET miniview

Een methode om alle metadata van een selectie binnen een collectie op 
te vragen. Deze methode ondersteunt geen parameters en wordt aangeroepen 
met een HTTP GET verzoek aan de volgende URL:

`https://api.copernica.com/v3/miniview/$id?access_token=xxxx`

De `$id` hier moet vervangen worden door de ID of de naam van de collectie 
waarvoor je de selecties op wil vragen.

## Teruggegeven velden

De methode retourneert een JSON object met de volgende eigenschappen:

| Variabele         | Omschrijving                                                                      |
|-------------------|-----------------------------------------------------------------------------------|
| **id**            | ID van de miniselectie.                                                           |
| **name**          | Naam van de miniselectie.                                                         |
| **description**   | Omschrijving van de miniselectie.                                                 |
| **parent-type**   | Type van de parent, in dit geval 'collection'.                                    |
| **parent-id**     | ID van de parent van de miniselectie, in dit geval de collection ID.              |
| **collection**    | ID van de collectie waar deze miniselectie onder valt.                            |
| **last-built**    | Tijdstempel van laatste opbouw van de miniselectie.                               |
| **intentions**    | Array met de intenties voor deze miniselectie (1 of null voor email/sms/fax/pdf). |

### JSON voorbeeld

De JSON voor de miniselectie ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"1525",
   "name":"Miniselection",
   "description":"",
   "parent-type":"collection",
   "parent-id":"21448",
   "collection":"21448",
   "last-built":"2019-06-19 00:48:37"
}
```

## Voorbeeld in PHP

Het volgende voorbeeld demonstreert hoe je deze methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit en print het resultaat
print_r($api->get("view/{$viewID}"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

- [Overzicht van alle API methodes](rest-api)
- [Opvragen selectie regels voor een collectie](./rest-get-miniview-rules)
