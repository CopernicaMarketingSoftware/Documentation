# REST API: POST collection miniviews

Om een nieuwe selectie aan te maken, moet je een HTTP POST request sturen
naar de volgende URL. De selectie wordt dan direct onder de collectie aangemaakt.

`https://api.copernica.com/v3/collection/$id/miniviews?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier of de naam van de 
collectie waar je een selectie aan wilt toevoegen. De naam van de selectie moet
als message body aan het HTTP request worden toegevoegd.


## Beschikbare parameters

De volgende variabele moet in de body van de HTTP POST call worden geplaatst.

- **name**: Naam van de nieuw aan te maken selectie (verplicht).

## Voorbeeld

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data voor de methode
$data = array(
    'name'          =>  'mijn-selectie', 
);

// voer het verzoek uit
$api->post("collection/{$collectieID}/miniviews", $data);

// bij een succesvolle call wordt het id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [GET collection miniview](rest-get-collection-miniviews)
* [GET miniview rules](rest-get-miniview-rules)
* [POST miniview rules](rest-post-miniview-rules)
