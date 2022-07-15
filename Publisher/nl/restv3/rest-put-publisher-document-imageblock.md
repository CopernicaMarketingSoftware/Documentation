# REST API: bijwerken van een afbeeldingsblok (Publisher)

Methode om een afbeeldingsblok bij te werken. Dit is een HTTP PUT-methode die toegankelijk is via het volgende adres:

`https://api.copernica.com/v3/publisher/document/$id/imageblock/$id?access_token=xxxx`

De eerste variabele `$id` in de URL moet worden vervangen door de numerieke identifier
van het document die je wilt bewerken. De tweede variabele `$id` moet vervangen worden door de numerieke identifier van het afbeeldingsblok dat je wilt bewerken.

## Beschikbare parameters

De volgende variabelen kunnen in de body van het HTTP PUT-commando worden
geplaatst:

* **condition**: conditie van het afbeeldingsblok

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API-methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data voor de methode
$data = array(
    'condition'   =>  '
        if (profile.Geslacht == "man"){ 
            return true;
        }else{
            return false;
        }
    '
);

// voer verzoek uit
api->put("publisher/document/{$documentID}/imageblock/{$afbeeldingsblokID}", $data);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
