# REST API: PUT template translations (drag-and-drop-templates)

Methode om een bestaande vertaling bij te werken van een template. Dit is een HTTP PUT-methode
naar het volgende adres:

`https://api.copernica.com/v4/ms/templates/$id/translations`

## Beschikbare parameters

* **language**: taal van het template in een array

## Body data
Naast de parameters die je aan de URL meegeeft, moet je ook body data aan het PUT request toevoegen. In de body van het verzoek geeft je aan een "texts" array van de elementen die aangepast moeten worden. Deze elementen bevatten vervolgens een array met de taal van het template en de nieuwe input.

Om de unieke ID's van de elementen te ontvangen kun je gebruik maken van de [GET translations methode](./rest-get-ms-template-translations)

## Voorbeeld in JSON

De volgende JSON demonstreert hoe je de API methode kunt gebruiken:

URL: `https://api.copernica.com/v4/ms/template/{$tempalteID}/translations?languages[]=de_DE&languages[]=nl_NL`

```json
{
  "texts": {
    "73a5a4794893bbce6832ca706284ed31-attr-alt":{
        "nl_NL":"new_text",
        "de_DE":"new_textDE"
    }
  }
}
```

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// parameters voor het selecteren van talen
$parameters = array(
    'languages'  =>  array("nl_NL")
);

// elementen die bewerkt moeten worden
$texts = array(
    '73a5a4794893bbce6832ca706284ed31-attr-alt' =>  array(
        'nl_NL' => 'new_text'
    )
);

// de teksten voor het verzoek
$data = array(
    'texts'    =>  $texts
);

// voer het verzoek uit
$api->put("ms/template/$id/translations", $data, $parameters);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
