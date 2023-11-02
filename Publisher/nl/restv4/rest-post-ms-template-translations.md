# REST API: POST template translations (drag-and-drop-templates)

Methode om een nieuwe vertaling toe te voegen aan een template. Dit is een HTTP POST-methode
naar het volgende adres:

`https://api.copernica.com/v4/ms/templates/$id/translations`

## Beschikbare parameters

* **language**: taal van het template

## Voorbeeld in JSON

De volgende JSON demonstreert hoe je de API methode kunt gebruiken:

```json
{
    "language": "de_DE"
}
```

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data voor de methode
$data = array(
    'language'          =>  'de_DE'
);

// voer het verzoek uit
$api->post("ms/template/$id/translations", $data);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
