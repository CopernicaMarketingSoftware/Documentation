# REST API: GET template

Dit is een methode om gegevens van een template op te vragen. 
De methode is aan te roepen met een HTTP GET-request naar de volgende URL:

`https://api.copernica.com/v3/publisher/template/$id?access_token=xxxx`

Als `$id` kun je de numerieke identifier van een template opgeven.

## Geretourneerde velden

| Variabele         | Omschrijving                                                                  |
|-------------------|-------------------------------------------------------------------------------|
| **id**            | Unieke identifier van de template.                                            |
| **name**          | Naam van de template.                                                         |
| **description**   | Omschrijving van de template.                                                 |
| **from_address**  | Afzenderadres van de template.                                                |
| **subject**       | Onderwerp van de template.                                                    |
| **archived**      | Geeft aan of de template wel (1) of niet (null) gearchiveerd is.              |
                                                                              
Om de HTML-broncode op te halen kun je `source=true` toevoegen aan de URL:

``https://api.copernica.com/v3/publisher/template/$id?source=true&access_token=xxxx``

### JSON voorbeeld

De JSON voor een template ziet er bijvoorbeeld zo uit:

```json
{
    "id": "145",
    "name": "Dit is een test template",
    "description": "",
    "from_address": "\"Test\" <Test@copernica.com>",
    "subject": "Dit is een test",
    "archived": false,
    "source": "<html><body>Test</body></html>"
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
print_r($api->get("template/{$templateID}"));
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
