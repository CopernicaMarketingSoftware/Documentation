# REST API: POST view views (genestelde selecties)

Copernica ondersteund ook genestelde selecties. Om een genestelde selectie 
aan te maken kan er een HTTP post request gestuurd worden naar de volgende URL:

`https://api.copernica.com/v3/view/$id/views?access_token=xxxx`

De code `$id` moet hier vervangen worden door de ID of naam van de selectie.

## Beschikbare parameters

De volgende parameters kunnen toegevoegd worden aan de body van het bericht. 
De eigenschappen van deze genestelde selectie zien er hetzelfde uit als 
die van een reguliere selectie.

- **name**: 				naam van de selectie
- **description**: 			omschrijving van de selectie

## Voorbeeld in JSON

De volgende JSON demonstreert hoe je de API methode kunt gebruiken:

```json
{
    "name": "new_view_name",
    "description": "new view description"
}
```

## Voorbeeld in PHP

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters voor de methode
$data = array(
    'name'              =>  'new_selection',
    'description'       =>  'new description'
);

// voer het verzoek uit
$api->post("view/{$viewID}/views", array(), $data);

// bij een succesvolle call wordt het id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

- [Overzicht van alle API-methodes](rest-api)
- [GET view views](./rest-get-view-views)
