# REST API: POST view copy

Methode om een selectie te kopiëren. Dit is een HTTP POST methode
naar het volgende adres:

`https://api.copernica.com/v2/view/$id/copy?access_token=xxxx`

Hier moet de `$id` vervangen worden door de ID van de selectie die je 
wil kopiëren. Als het verzoek succesvol wordt uitgevoerd geeft de methode 
de ID van de nieuwe selectie terug. Het kan even duren voordat de 
kopie klaar is.

## Beschikbare parameters

Deze methode kan alleen een nieuwe selectie aanmaken. De naam hiervoor is 
verplicht.

* **name**: Naam voor de kopie van de selectie. (verplicht)
* **options**: Array met opties voor het kopiëren. (optioneel)

De 'options' array bevat de optie om selecties mee te kopiëren of niet:

* **views**: Een boolean die aangeeft of de selecties mee gekopieërd moeten worden.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// stel de opties voor de kopie in
$options = array(
    'views'         =>  true
);

// data voor de methode
$data = array(
    'name'      =>  'View (copy)',
    'options'   =>  $options
);

// voer de methode uit
print_r($copyID = $api->post("view/{$viewID}/copy", $data));

// bij een succesvol verzoek wordt de ID van de kopie geretourneerd
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api)
* [Opvragen van een lijst van selecties](./rest-get-view)
* [Verwijderen van een selectie](./rest-delete-view)
