# REST API: GET collection

Een collectie is een "tweede laag" binnen een database. Als je de numerieke
identifier van een collectie weet, dan kun je met een HTTP GET request de
gegevens van de collectie ophalen:

`https://api.copernica.com/v2/collection/$id?access_token=xxxx`

Als `$id` moet je de numerieke identifier van de collectie opgeven.

## Geretourneerde velden

| Variabele    | Omschrijving                                      |
|--------------|---------------------------------------------------|
| name         | Naam van de collectie                             |
| database     | ID van de database waartoe de collectie behoort   |
| fields       | Array met de velden in de collectie               |

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit in je access code access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer de opdracht uit en print het resultaat
print_r($api->get("collection/{$collectieID}"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Bewerken van een collectie](rest-put-database)
