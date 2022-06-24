# REST API: bijwerken van een template (Publisher)

Methode om een template bij te werken. Dit is een HTTP PUT-methode die toegankelijk is via het volgende adres:

`https://api.copernica.com/v3/template/$id?access_token=xxxx`

De variabele `$id` in de URL moet worden vervangen door de numerieke identifier
of de naam van de template die je wilt bewerken.

## Beschikbare parameters

De volgende variabelen kunnen in de body van het HTTP PUT-commando worden
geplaatst:

* **name**: naam van de nieuw aan te maken template
* **description**: omschrijving van de template
* **from_address**: array met 'name' en 'email' voor het afzenderadres
* **subject**: onderwerp van de template
* **source**: de HTML-broncode van de template
* **amp**: de AMP-broncode van de template
* **text**: de tekstversie van de template

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API-methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data voor de methode
$data = array(
    'Source'   =>  '
    <html>
      <body>
        een nieuwe tekst
      </body>
    </html>
    '
);

// voer verzoek uit
api->put("template/{$templateID}", $data);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
