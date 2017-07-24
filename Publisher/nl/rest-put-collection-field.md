# REST API: PUT collection field

Methode om een bepaald veld in een collectie aan te passen. Om deze methode uit te voeren kun je een HTTP PUT verzoek sturen aan de volgende URL:

`https://api.copernica/com/v1/collection/$id/field/$id?access_token=xxxx`

De eerste `$id` is de collectie waarvan je het veld aan wilt passen en de tweede `$id` is de ID van het veld dat je aan wilt passen. De rest van de informatie voor het veld moet toegevoegd worden aan de message body van het HTTP verzoek.

## Beschikbare datavelden

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
            
## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe deze methode gebruikt kan worden. 

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// field id dat je wilt bewerken
$id = 1;

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// data voor het verzoek
$data = array(
    'name'      => 'nieuwe_naam'
);

// voer het verzoek uit
$api->put("collection/{$id}/field", $data);
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

- [Overzicht van alle API methodes](rest-api)
- [PUT database field](rest-put-database-field)

