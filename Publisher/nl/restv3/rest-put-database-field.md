# REST API: PUT database field

Als je de eigenschappen van een databaseveld wilt bijwerken, zoals de naam
of het type van het veld, dan kun je dit doen door een HTTP PUT request naar
de volgende URL te sturen:

`https://api.copernica.com/v3/database/$id/field/$id?access_token=XXX`

De eerste `$id` variabele in de URL moet worden vervangen door de numerieke 
identifier of de naam van de database waarvan je een veld wilt bewerken. De
tweede `$id` variabele bevat de naam of het ID van het veld.

## Beschikbare parameters

De volgende variabelen kunnen in de body van het HTTP PUT commando worden
geplaatst:

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

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// importeer de vereiste klasse
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data voor het verzoek:
// selectieveld met naam "extra-veld", de opties A, B en C 
// waarvan C de standaard is
$data = array(
    'name'      =>  'extra_veld',
    'type'      =>  'select',
    'value'     =>  'A\nB\nC*'
);

// voer het verzoek uit
api->put("database/{$databaseID}/field/{veldID}", $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api)
* [Databasevelden](../database-fields)
* [Opvragen van databasevelden](./rest-get-database-fields)
* [Aanmaken van een databaseveld](./rest-post-database-fields)
* [Verwijderen van een veld](./rest-delete-database-field)
