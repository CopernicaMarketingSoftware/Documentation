# REST API: GET collection miniviews

Wat selecties zijn voor een database, zijn miniselecties voor een collectie.
Om op te vragen welke miniselecties er op een collectie beschikbaar zijn,
kun je een HTTP GET request naar het volgende adres sturen:

`https://api.copernica.com/v3/collection/$id/miniviews?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van de 
collectie waar je de miniselecties van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

| Variabele | Omschrijving
|-----------|---------------------------------------------------------------|
| **start** | Eerste miniselectie die wordt opgevraagd.                     |
| **limit** | Lengte van de batch die wordt opgevraagd.                     |
| **total** | Toon wel/niet het totaal aantal beschikbare miniselecties.    |

Meer informatie over de betekenis van deze parameters vind je in het
[artikel over paging](rest-paging).

## Teruggegeven velden

De methode retourneert een JSON object met miniselecties onder het **data** 
veld. Voor elke selectie worden de volgende eigenschappen teruggegeven:

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

De JSON voor een enkele miniselectie ziet er bijvoorbeeld zo uit:

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

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit in je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters voor de opvraag
$parameters = array(
    'limit'     =>  100
);

// voer de methode uit en print de resultaten
print_r($api->get("collection/{$collectieID}/miniviews", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Miniselectie toevoegen aan collectie](rest-post-collection-views)
* [Selectieregels opvragen](rest-get-miniview-rules)
