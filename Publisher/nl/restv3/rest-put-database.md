# REST API: bijwerken gegevens van een database

Methode om de properties van een database bij te werken. Dit is een HTTP PUT
methode die toegankelijk is via het volgende adres:

`https://api.copernica.com/v3/database/$id?access_token=xxxx`

De variabele `$id` in de URL moet worden vervangen door de numerieke identifier
of de naam van de database die je wilt bewerken.

## Beschikbare parameters

De volgende variabelen kunnen in de body van het HTTP PUT commando worden
geplaatst:

- name:             de optionele nieuwe naam van de database;
- description:      de optionele nieuwe omschrijving van de database;
- archived:         optionele boolean waarde om de database te archiveren;

## Voorbeeld in JSON

Het volgende JSON demonstreert hoe je de API methode kunt gebruiken:

```json
{
    "name": "new_database_name",
    "description": "a new description",
    "archived": false
}
```

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data voor de methode
$data = array(
    'description'   =>  'een nieuwe omschrijving',
    'archived'      =>  true
);

// voer verzoek uit
api->put("database/{$databaseID}", $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van een lijst van databases](rest-get-databases)
