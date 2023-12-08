# REST API: PUT collection field

Methode om een bepaald veld in een collectie aan te passen.
Om deze methode uit te voeren kun je een HTTP PUT verzoek sturen aan de volgende URL:

`https://api.copernica/com/v3/collection/$id/field/$id?access_token=xxxx`

De eerste `$id` is de collectie waarvan je het veld aan wilt passen en
de tweede `$id` is de ID van het veld dat je aan wilt passen.
De rest van de informatie voor het veld moet toegevoegd worden aan de message body van het HTTP verzoek.

## Beschikbare parameters

De volgende variabelen kunnen meegegeven worden aan de body van het verzoek:

- **name**: Naam van het veld
- **type** Type van het veld
- **value**: Waarde van het veld
- **displayed**: Boolean waarde om aan te geven of het veld zichtbaar moet zijn in lijsten en grids in de gebruikers interface
- **ordered**: Boolean waarde om aan te geven of profielen standaard bij dit veld gesorteerd moeten worden
- **length**: Maximum lengte voor text velden
- **textlines**: Hoeveelheid regels beschikbaar in text velden
- **hidden**: Boolean waarde om aan te geven of een veld altijd verborgen moet worden voor een gebruiker
- **index**: Boolean waarde om aan te geven of er een index aangemaakt moet worden op het veld
- **lock**: Boolean waarde om aan te geven dat het veld enkel via de API aangepast of verwijderd mag worden

## Voorbeeld in JSON

De volgende JSON demonstreert hoe je de API methode kunt gebruiken:

```json
{
  "name": "text_veld",
  "type": "text",
  "value": "dit is een tekstveld",
  "displayed": true,
  "ordered": false,
  "length": 50,
  "textlines": 1,
  "hidden": false,
  "index": false
}
```

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe deze methode gebruikt kan worden.

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to be sent to the api
$data = array(
    'name'      => 'nieuwe_naam'
);

// do the call
api->put("collection/{$collectieID}/field", $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).


## Meer informatie

- [Overzicht van alle API methodes](rest-api)
- [Aanpassen veld in de database](rest-put-database-field)
- [Aanpassen veld van een profiel](rest-put-profile-field)

