# REST API: POST database fields

Methode om een veld toe te voegen aan een bestaande database. Dit is een HTTP 
POST call naar het volgende adres:

`https://api.copernica.com/v3/database/$id/fields?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier of de naam van de 
database waar je een veld aan wilt toevoegen. De naam van het veld en eventuele
andere waardes moeten als message body aan het HTTP request worden toegevoegd.

## Beschikbare parameters

De volgende variabelen kunnen in de body van de HTTP POST call worden geplaatst.

* name:             naam van het nieuw aan te maken veld (verplicht);
* type:             type van het nieuwe veld;
* value:            standaardwaarde van het nieuwe veld;
* displayed:        boolean waarde om aan te geven dat het veld in de user interface in lijsten en grids moet worden geplaatst;
* ordered:          boolean waarde of profielen standaard op basis van dit veld zijn gesorteerd;
* length:           maximum lengte voor teksten;
* textlines:        voor tekstvelden: het aantal regels in formulieren om het veld te bewerken;
* hidden:           boolean waarde om aan te geven dat een velt nooit zichtbaar mag zijn in de user interface;
* index:            boolean waarde of een index op het veld moet worden aangemaakt.

Een veld kan de volgende types hebben:

* integer:          numerieke waarde;
* float:            numeriek *floating point* nummer (komma-getal);
* date:             datumveld dat verplicht moet zijn ingevuld;
* empty_date:       datumveld dat ook leeg gelaten mag worden;
* datetime:         veld met datum + tijdstip dat moet zijn ingevuld;
* empty_datetime:   veld met datum + tijdstip dat leeg mag worden gelaten;
* text:             regulier tekstveld;
* email:            veld met een e-mailadres dat wordt gebruikt voor mailings (maximaal 1 per database);
* phone:            telefoonveld;
* phone_fax:        telefoonveld met faxnummer dat kan worden gebruikt voor faxmailings (maximaal 1 per database);
* phone_gsm:        telefoonveld met mobiel nummer dat kan worden gebruikt voor smsberichten (maximaal 1 per database);
* select:           meerkeuzeveld. Hier worden de keuzes gescheiden door new line delimiters (`\n`) en de standaardkeuze 
                    aangegeven met een asterisk (*) achter de optie;
* big: groot        tekstveld;
* foreign_key:      numerieke waarde met verwijzing naar een ander profiel.

[Hier](../database-fields) lees je meer over databasevelden.

## Voorbeeld

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// importeer de vereiste klasse
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// data voor het verzoek:
// selectieveld met naam "extra-veld", de opties A, B en C 
// waarvan C de standaard is
$data = array(
    'name'      =>  'extra-veld',
    'type'      =>  'select',
    'value'     =>  'A\nB\nC*'
);

// voer het verzoek uit
$api->post("database/{$databaseID}/fields", $data);

// bij een succesvolle call wordt het id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Databasevelden](../database-fields)
* [Opvragen van databasevelden](rest-get-database-fields)
* [Aanpassen van een databaseveld](rest-put-database-field)
* [Verwijderen van een databaseveld](rest-delete-database-field)
