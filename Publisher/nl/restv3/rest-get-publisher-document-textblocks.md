# REST API: GET document textblocks (Publisher)

Dit is een methode om de tekstblokken van een document op te vragen. 
De methode is aan te roepen met een HTTP GET-request naar de volgende URL:

`https://api.copernica.com/v3/publisher/document/$id/textblocks?access_token=xxxx`

Als `$id` kun je de numerieke identifier van een document opgeven.

## Geretourneerde velden

| Variabele         | Omschrijving                                                                  |
|-------------------|-------------------------------------------------------------------------------|
| **id**            | Unieke identifier van het textblok.                                           |
| **parent**        | Unieke identifier van het bovenliggende textblok.                             |
| **name**          | Naam van het textblok.                                                        |
| **iteration**     | Iteratie waar het textblok in zit.                                            |
| **condition**     | Eventuele condities van het textblok.                                         |
| **content**       | Inhoud van het textblok.                                                      |

### JSON voorbeeld

De JSON voor het ophalen van textblokken ziet er bijvoorbeeld zo uit:

```json
{
    "id": "1",
    "parent": "",
    "name": "textlock",
    "iteration": "0",
    "condition": "",
    "content": "Dit is een test"
}
```

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe je de API-methode kunt aanroepen:

```php
// vereiste scripts
require_once("copernica_rest_api.php");

// verander dit in je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// voer de opdracht uit en print het resultaat
print_r($api->get("publisher/document/{$documentID}/textblocks"));
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
