# REST API: POST view intentions

Intentions geven aan welke communicatie methoden toegestaan zijn voor deze 
selectie. De intentions voor email, sms, fax en pdf kunnen allemaal aan of 
uitgezet worden, om te voorkomen dat er per ongeluk mailings worden verstuurd.

De HTTP POST methode om de intentions van een selectie aan te passen 
is beschikbaar op het volgende adres:

`https://api.copernica.com/v4/view/$id/intentions`

De `$id` moet hier vervangen worden door de unieke identifier van de selectie. 

## Parameters

Deze methode ondersteunt de volgende parameters. Al deze parameters zijn 
optioneel en als deze niet meegegeven worden verandert er niets aan de 
betreffende intention.

* **email**: Boolean die aangeeft of de selectie gebruikt mag worden 
voor emailen.
* **sms**: Boolean die aangeeft of de selectie gebruikt mag worden 
voor sms berichten.
* **fax**: Boolean die aangeeft of de selectie gebruikt mag worden 
voor fax berichten.
* **pdf**: Boolean die aangeeft of de selectie gebruikt mag worden 
voor het versturen van PDF bestanden.

De intentions kunnen alleen ingeschakeld worden als de juiste velden hiervoor 
aanwezig zijn in de database.

## Voorbeeld in JSON

De volgende JSON demonstreert hoe je de API methode kunt gebruiken:

```json
{
    "email": true,
    "sms": true,
    "fax": false,
    "pdf": false
}
```

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data voor de methode
$data = array(
    'email' =>  true,
    'sms'   =>  true,
    'fax'   =>  true,
    'pdf'   =>  true
);

// voer het verzoek uit
$api->post("view/{$viewID}/intentions", $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [POST database intentions](./rest-post-database-intentions)
* [POST miniview intentions](./rest-post-miniview-intentions)
* [POST collection intentions](./rest-post-collection-intentions)
