# REST API: bijwerken van een document (Publisher)

Methode om een document bij te werken. Dit is een HTTP PUT-methode die toegankelijk is via het volgende adres:

`https://api.copernica.com/v3/document/$id?access_token=xxxx`

De variabele `$id` in de URL moet worden vervangen door de numerieke identifier
van het document die je wilt bewerken.

## Beschikbare parameters

De volgende variabelen kunnen in de body van het HTTP PUT-commando worden
geplaatst:

* **name**: naam van het bij te werken document
* **description**: omschrijving van het document
* **from_address**: array met 'name' en 'email' voor het afzenderadres
* **subject**: onderwerp van het document

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe je de API-methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data voor de methode
$data = array(
    'name' => 'Nieuwe_naam'
);

// voer verzoek uit
api->put("document/{$documentID}", $data);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
