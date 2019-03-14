# REST API: POST collection miniviews

Waarschuwing: Je bekijkt nu het overzicht voor de oude versie van onze 
API. Wij raden aan om [versie 2](../restv2/rest-api.md) van de API te gebruiken.

Om een nieuwe selectie aan te maken, moet je een HTTP POST request sturen
naar de volgende URL. De selectie wordt dan direct onder de collectie aangemaakt.

`https://api.copernica.com/v1/collectie/$id/miniviews?access_token=xxxx`

De code **$id** moet je vervangen door de numerieke identifier of de naam van de 
collectie waar je een selectie aan wilt toevoegen. De naam van de selectie moet
als message body aan het HTTP request worden toegevoegd.


## Beschikbare parameters

De volgende variabele moet in de body van de HTTP POST call worden geplaatst.

- **name**: Naam van de nieuw aan te maken selectie (verplicht).
- **description**: Beschrijving van de nieuwe selectie
- **parent-type**: Geeft aan of de selectie onder een onder selectie of de database is geplaatst
- **parent-id**: ID van de selectie/database waar de selectie onder valt


## Voorbeeld

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// data voor de methode
$data = array(
    'name'      =>  'mijn-selectie', 
    'description'	=> 'voorbeeld selectie',
    'has-rules'	=> False
);

// voer het verzoek uit
$api->post("collection/id/miniviews", $data);
// bij een succesvolle call wordt het id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API class](rest-php).


## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [GET collection miniview](rest-get-collection-miniviews)
* [GET miniview rules](rest-get-miniview-rules)
* [POST miniview rules](rest-post-miniview-rules)
