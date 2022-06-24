# REST API: POST Publisher templates

Methode om een nieuw template aan te maken. Dit is een HTTP POST-methode
naar het volgende adres:

`https://api.copernica.com/v3/publisher/templates?access_token=xxxx`

## Beschikbare parameters

* **name**: naam van de nieuw aan te maken template (**verplicht**)
* **description**: omschrijving van de template
* **from_address**: array met 'name' en 'email' voor het afzenderadres
* **subject**: onderwerp van de template
* **source**: de HTML-broncode van de template (**verplicht**)
* **amp**: de AMP-broncode van de template
* **text**: de tekstversie van de template

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe je de API-methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data voor de methode
$data = array(
    'name'          =>  'mijn-test-template',
    'source'        =>  '
    <html>
      <body>
        Dit is een test-template.
      </body>
    </html>
    '
);

// voer het verzoek uit
$api->post("templates", $data);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
