# REST API: POST database copy

Methode om een database te kopiëren. Dit is een HTTP POST methode
naar het volgende adres:

`https://api.copernica.com/v3/database/$id/copy?access_token=xxxx`

Hier moet de `$id` vervangen worden door de ID van de database die je 
wil kopiëren. Als het verzoek succesvol wordt uitgevoerd geeft de methode 
de ID van de gekopieërde database terug. Het kan even duren voordat de 
kopie klaar is.

## Beschikbare parameters

Deze methode kan alleen een nieuwe database aanmaken. De naam hiervoor is 
verplicht.

* **name**: Naam voor de kopie van de database. (verplicht)
* **options**: Array met opties voor het kopiëren. (optioneel)

De 'options' array bevat alle optionele mogelijkheden voor het kopiëren van de database. 
Je kunt hier de volgende variabelen meegeven:

* **views**: Een boolean die aangeeft of de selecties mee gekopieërd moeten worden.
* **collections**: Een boolean die aangeeft of de collecties mee gekopieërd moeten worden.
* **miniviews**: Een boolean die aangeeft of de miniselecties mee gekopieërd moeten worden. 
De miniselecties kunnen alleen gekopieërd worden als de collecties ook gekopieërd worden.
* **profiles**: Een boolean die aangeeft of de profielen mee gekopieërd moeten worden.
* **subprofiles**: Een boolean die aangeeft of de subprofielen mee gekopieërd moeten worden. 
Dit is alleen mogelijk als zowel de collecties als de profielen gekopieërd worden.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// stel de opties voor de kopie in
$options = array(
    'collections'   =>  true,
    'miniviews'     =>  true,
    'views'         =>  true,
    'profiles'      =>  true,
    'subprofiles'   =>  true
);

// data voor de methode
$data = array(
    'name'      =>  'Database (copy)',
    'options'   =>  $options
);

// voer de methode uit
print_r($copyID = $api->post("database/{$databaseID}/copy", $data));

// bij een succesvol verzoek wordt de ID van de kopie geretourneerd
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van een lijst van databases](rest-get-databases)
* [Verwijderen van een database](rest-delete-database)
