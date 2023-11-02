# REST API: POST database views

Om een nieuwe selectie aan te maken, moet je 
een HTTP POST-request sturen naar de volgende 
URL. De selectie wordt dan direct onder de 
database aangemaakt.

`https://api.copernica.com/v4/database/$id/views`

De code `$id` moet je vervangen door de numerieke identifier of de naam 
van de database waar je een selectie aan wilt toevoegen. De naam van de selectie 
moet als message body aan het HTTP-request worden toegevoegd.

## Beschikbare parameters

De volgende variabele moet in de body van de HTTP 
POST-call worden geplaatst.

- **name**:             naam van de nieuw aan te maken selectie (verplicht)
- **description**:      beschrijving van de nieuwe selectie

## Voorbeeld in JSON

De volgende JSON demonstreert hoe je de API methode kunt gebruiken:

```json
{
  "name": "mijn-selectie",
  "description": "voorbeeld selectie"
}
```

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data voor de methode
$data = array(
    'name'          =>  'mijn-selectie',
    'description'	=> 'voorbeeld selectie',
);

// voer het verzoek uit
$api->post("database/{$databaseID}/views", $data);

// bij een succesvolle call wordt het id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
* [GET database views](rest-get-database-views)
* [GET view rules](rest-get-view-rules)
* [POST view rules](rest-post-view-rules)
