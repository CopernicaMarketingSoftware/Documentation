# REST API: GET collection

Een collectie is een "tweede laag" binnen een database. Als je de numerieke
identifier van een collectie weet, dan kun je met een HTTP GET request de
gegevens van de collectie ophalen:

`https://api.copernica.com/v1/collection/$id?access_token=xxxx`

Als **$id** moet je de numerieke identifier van de collectie opgeven.


## Geretourneerde velden

| Variabele    | Omschrijving                                      |
|--------------|---------------------------------------------------|
| id       	   | Unieke numerieke identifier                       |
| name         | Naam van de collectie                             |
| database     | id van de database waartoe de collectie behoort   |
| fields       | Array met de velden in de collectie               |

De velden worden teruggegeven als arrays van objecten. Als je wilt weten hoe 
deze arrays zijn opgebouwd kun je een blik werpen op de documentatie over het [opvragen van velden in een collectie](rest-get-collection-fields).


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit in je access code access token
$api = new CopernicaRestApi("your-access-token");

// voer de opdracht uit en print het resultaat
print_r($api->get("collection/1234"));
```

Dit voorbeeld vereist de [REST API class](rest-php).


## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Bewerken van een collectie](rest-put-database)
