# REST API: PUT template translations (drag-and-drop-templates)

Methode om een bestaande vertaling bij te werken van een template. Dit is een HTTP PUT-methode
naar het volgende adres:

`https://api.copernica.com/v3/ms/templates/$id/translations?access_token=xxxx`

## Beschikbare parameters

* **language**: taal van het template in een array

## Voorbeeld in JSON

De volgende JSON demonstreert hoe je de API methode kunt gebruiken:

URL: `https://api.copernica.com/v3/ms/template/{$tempalteID}/translations?languages[]=de_DE&languages[]=nl_NL&access_token=xxx`

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
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters voor het selecteren van profielen
$parameters = array(
    'language'  =>  array("language=="nl_NL")
);

// velden die bewerkt moeten worden
$texts = array(
    '73a5a4794893bbce6832ca706284ed31-attr-alt' =>  array(
        'nl_NL' => 'new_text'
    )
);

// de velden en interesses vormen samen de data voor het verzoek
$data = array(
    'texts'    =>  $texts
);


// voer het verzoek uit
$api->put("ms/template/$id/translations", $data, $parameters);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
