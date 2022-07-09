# REST API: GET document loopblocks (Publisher)

Dit is een methode om de loopblokken van een document op te vragen. 
De methode is aan te roepen met een HTTP GET-request naar de volgende URL:

`https://api.copernica.com/v3/publisher/document/$id/loopblocks?access_token=xxxx`

Als `$id` kun je de numerieke identifier van een document opgeven.

## Geretourneerde velden

| Variabele         | Omschrijving                                                                  |
|-------------------|-------------------------------------------------------------------------------|
| **id**            | Unieke identifier van het loopblok.                                           |
| **parent**        | Unieke identifier van het bovenliggende loopblok.                             |
| **name**          | Naam van het loopblok.                                                        |
| **iteration**     | Aantal iteraties van het loopblok.                                            |
| **condition**     | Eventuele condities van het loopblok.                                         |
| **iterations**    | Aantal iteraties van het loopblok.                                            | 

### JSON voorbeeld

De JSON voor het ophalen van loopblokken ziet er bijvoorbeeld zo uit:

```json
{
  "data": [
     {
        "id": "1",
        "parent": ""
        "name": "loopblock1",
        "iteration": "0",
        "condition": "",
        "iterations": "1"
    },
    {
        "id": "2",
        "parent": "1",
        "name": "loopblock2",
        "iteration": "1",
        "condition": "",
        "iterations": 0
    }
  ]
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
print_r($api->get("document/{$documentID}/loopblocks"));
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
