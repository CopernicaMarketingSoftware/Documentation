# REST API: GET document imageblocks (Publisher)

Dit is een methode om de afbeeldingsblokken van een document op te vragen. 
De methode is aan te roepen met een HTTP GET-request naar de volgende URL:

`https://api.copernica.com/v4/publisher/document/$id/imageblocks`

Als `$id` kun je de numerieke identifier van een document opgeven.

## Geretourneerde velden

| Variabele         | Omschrijving                                                                  |
|-------------------|-------------------------------------------------------------------------------|
| **ID**            | Unieke identifier van het afbeeldingsblok.                                    |
| **parentID**      | Unieke identifier van het bovenliggende afbeeldingsblok.                      |
| **name**          | Naam van het afbeeldingsblok.                                                 |
| **iteration**     | Iteratie waar het afbeeldingsblok in zit.                                     |
| **condition**     | Eventuele condities van het afbeeldingsblok.                                  |

### JSON voorbeeld

De JSON voor het ophalen van afbeeldingsblokken ziet er bijvoorbeeld zo uit:

```json
{
    "ID": "1",
    "parentID": "",
    "name": "imageblock",
    "iteration": "0",
    "condition": "",
}
```

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe je de API-methode kunt aanroepen:

```php
// vereiste scripts
require_once("copernica_rest_api.php");

// verander dit in je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// voer de opdracht uit en print het resultaat
print_r($api->get("publisher/document/{$documentID}/imageblocks"));
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
