# REST API - POST view

Deze methode voegt een selection/view toe aan de database. Om deze methode uit te voeren kun 
je een HTTP POST verzoek sturen naar de volgende URL:

`https://api.copernica.com/v1/view/$id/view?access_token=xxxx`

De `$id` moet hier vervangen worden door de id van de database waar een view aan toegevoegd 
moet worden.


## Beschikbare parameters

De volgende eigenschappen kunnen meegegeven worden in de message body. Er moet tenminste een naam worden meegegeven.

- name:                     naam van de regel. Deze moet uniek zijn binnen de regelnamen in de selectie en is verplicht;
- description:				korte omschrijving van de view.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe deze methode gebruikt kan worden:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// data voor de methode
$data = array(
    'name'      =>  'view-name',
    'description' =>  'description about view'
);

// voer het verzoek uit
$api->post("database/id/views", $data);
```

Dit voorbeeld vereist de [REST API class](rest-php).


## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [PUT view](rest-put-view)
* [POST rule conditions](rest-post-rule-conditions)
* [GET view rules](rest-get-view-rules)
