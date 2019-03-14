# REST API: PUT interest

Je kunt een interesse aanpassen door een HTTP PUT request te 
sturen naar de volgende URL:

`https://api.copernica.com/v2/interest/$id/?access_token=xxxx`

De `$id` moet je vervangen door de numerieke identifier van de interesse die 
je aan wil passen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **name**:     Nieuwe naam voor de interesse
* **group**:    Nieuwe groepsnaam voor de interesse

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// data voor de methode
$data = array(
    'name'  =>  "voetbal",
    'group' =>  "sport"
);

// voer de methode uit en print het resultaat
$api->put("interest/{$interesseID}/", $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Interesses in een database opvragen](./rest-get-database-interests)
