# REST API: PUT miniview

Een miniview is voor een collectie wat een selectie is voor een database.
Om een miniview aan te passen kan er een HTTP PUT verzoek verstuurd worden
naar de volgende URL:

`https://api.copernica.com/v4/miniview/$id`

De `$id` is de ID van de miniview die je aan wilt passen.

## Beschikbare parameters

De volgende eigenschappen kunnen toegevoegd worden aan de body van het HTTP verzoek:

- **name**: Naam van de miniview/selectie
- **description**: Omschrijving van de selectie

## Voorbeeld in JSON
De volgende JSON demonstreert hoe je de API methode kunt gebruiken:

```json
{
   "name": "new_miniselection",
   "description": "This is a new miniselection"
}
```

## Voorbeeld in PHP
Het volgende voorbeeld demonstreert hoe de methode gebruikt kan worden:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data voor de methode
$data = array(
	'name'		=>  'new_miniselection',
	'description'   =>  'a new description'
);

// voer het verzoek uit en print het resultaat
print_r($api->put("miniview/{$miniviewID}", $data));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

- [Overzicht van alle API methodes](rest-api)
- [Aanpassen van een selectie (van een database)](./rest-put-view)
- [Een lijst van miniviews aanvragen](./rest-get-collection-miniviews)
