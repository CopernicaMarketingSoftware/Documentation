# REST API: GET import

Als je de numerieke identifier van een import weet, dan kun je met een HTTP GET-request de
gegevens van de import ophalen:

`https://api.copernica.com/v3/import/$id?access_token=xxxx`

Als `$id` moet je de numerieke identifier van de import opgeven.

## Geretourneerde velden

De methode retourneert een JSON-object dat de volgende velden bevat:

| Variabele         | Omschrijving                                                                      |
|-------------------|-----------------------------------------------------------------------------------|
| **ID**            | ID van de import                                                                  |
| **name**          | Naam van de import                                                                |
| **type**          | Type import (add, update, update or add, ignore or add, delete)                   |
| **status**        | Huidige status van de import                                                      |
| **totallines**    | Totaal aantal regels in het importbestand                                         |
| **processedlines**| Totaal geïmporteerde regels in het importbestand                                  |
| **lastrun**       | Datum + tijdstip van de laatste keer dat de import is uitgevoerd                  |
| **nextrun**       | Datum + tijdstip van de volgende keer dat de import uitgevoerd wordt              |
| **lasterror**     | Laatste foutmelding die terug is gegeven bij het uitvoeren van de export          |

### JSON voorbeeld

De JSON voor het ophalen van een import ziet er bijvoorbeeld zo uit:

```json
{
  "ID": "12",
  "name": "https://www.copernica.com/import/testimport.csv",
  "type": "add or update",
  "status": "ready for start",
  "totallines": "0",
  "processedLines": "0",
  "lastrun": false,
  "nextrun": false,
  "lasterror": false
}
```

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API-methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit in je access code access token
$api = new CopernicaRestAPI("your-access-token", 3);

// voer de opdracht uit en print het resultaat
print_r($api->get("import/{$importID}"));
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
