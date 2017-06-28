# REST API: POST collection fields

Methode om een veld toe te voegen aan een bestaande collectie. Dit is een HTTP 
POST call naar het volgende adres:

`https://api.copernica.com/v1/collection/$id/fields?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van de collectie
waar je een veld aan wilt toevoegen. De naam van het veld, en eventuele
andere waardes moeten als message body aan het HTTP request worden toegevoegd. 
Bij een succesvolle call wordt de ID van het aangemaakte verzoek teruggegeven.

## Beschikbare parameters

De volgende variabelen kunnen in de body van de HTTP POST call worden geplaatst.

* **name**: Naam van het nieuw aan te maken veld. Dit veld is verplicht
* **type**: Type van het nieuwe veld
* **value**: Standaardwaarde van het nieuwe veld
* **textlines**: Voor tekstvelden: het aantal regels in formulieren om het veld te bewerken
* **length**: Maximum lengte voor teksten
* **index**: Boolean waarde of een index op het veld moet worden aangemaakt
* **displayed**: Boolean waarde om aan te geven dat het veld in de user interface in lijsten en grids moet worden geplaatst
* **hidden**: Boolean waarde om aan te geven dat een velt nooit zichtbaar mag zijn in de user interface
* **ordered**: Boolean waarde of profielen standaard op basis van dit veld zijn gesorteerd

Een veld kan de volgende types hebben:

* **integer**: numerieke waarde
* **float**: numeriek *floating point* nummer ("komma-getal")
* **date**: datumveld dat verplicht moet zijn ingevuld
* **empty_data**: datumveld dat ook leeg gelaten mag worden
* **datetime**: veld met datum + tijdstip dat moet zijn ingevuld
* **empty_datetime**: veld met datum + tijdstip dat leeg mag worden gelaten
* **text**: regulier tekstveld
* **email**: veld met een e-mailadres dat wordt gebruikt voor mailings (maximaal 1 per database)
* **phone**: telefoonveld
* **phone_fax**: telefoonveld met faxnummer dat kan worden gebruikt voor faxmailings (maximaal 1 per database)
* **phone_gsm**: telefoonveld met mobiel nummer dat kan worden gebruikt voor sms berichten (maximaal 1 per database)
* **select**: meerkeuzeveld
* **big**: groot tekstveld
* **foreign_key**: numerieke waarde met verwijzing naar ander profiel


## Voorbeeld

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// data voor het verzoek
$data = array(
    'name'      =>  'extra-veld',
    'type'      =>  'text'
);

// voer het verzoek uit
$api->post("collection/1234/fields", $data);

// bij een succesvolle call wordt de id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [GET collection fields](rest-get-collection-fields)
* [PUT collection field](rest-put-collection-field)
* [DELETE collection field](rest-delete-collection-field)
