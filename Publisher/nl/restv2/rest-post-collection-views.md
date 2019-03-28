# REST API: POST collection views

Copernica biedt ook support voor selecties onder collecties. Om een dergelijke 
selectie aan te maken binnen je collectie kun je een HTTP POST verzoek versturen 
naar de volgende URL:

`https://api.copernica.com/v2/collection/$id/views?access_token=xxxx`

Hier moet de `$id` vervangen worden door de numerieke identifier van 
de collectie waaraan je een selectie toe wilt voegen. Als het verzoek 
slaagt wordt de ID van de aangemaakte selectie geretourneerd.

## Beschikbare parameters

Dit verzoek vereist de **name** parameter, waarin de naam voor de 
nieuwe selectie meegegeven wordt.

## PHP voorbeeld

Het volgende PHP voorbeeld demonstreert hoe de methode gebruikt kan worden:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token 
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters om mee te geven aan de call
$data = array(
    'name'     =>  'New selectie'
);

// voer het verzoek uit
$api->post("collection/{$collectionID}/views", array(), $data);

// je ontvangt de ID van de nieuwe selectie als het verzoek succesvol was
```

Het bovenstaande voorbeeld vereist de [CopernicaRestApi klasse](./rest-php).

## Meer informatie

* [Overzicht van alle API methodes](rest-api)
