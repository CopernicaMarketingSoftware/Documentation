# REST API: PUT view

Methode om de properties van een selectie bij te werken. Dit is een HTTP PUT
methode die toegankelijk is via het volgende adres:

`https://api.copernica.com/v4/view/$id?access_token=XXX`

De variabele `$id` in de URL moet worden vervangen door de numerieke identifier
van de selectie die je wilt bewerken.

## Beschikbare parameters

De volgende variabelen kunnen in de body van het HTTP PUT commando worden
geplaatst:

- **name**: de optionele nieuwe naam van de selectie
- **description**: de optionele nieuwe omschrijving van de selectie

## Voorbeeld in JSON

De volgende JSON demonstreert hoe je de API methode kunt gebruiken:

```json
{
    "name": "new_view_name",
    "description": "new view description"
}
```

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data voor de methode
$data = array(
    'description'   =>  'een nieuwe omschrijving',
);

// voer het verzoek uit
api->put("view/{$viewID}", $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van een lijst van selecties in een databases](rest-get-databases-views)
* [Verwijderen van een selectie](rest-delete-view)
