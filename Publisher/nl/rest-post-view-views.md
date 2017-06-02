# REST API: POST view views

Copernica ondersteund ook genestelde selecties. Om een genestelde selectie aan te passen kan er een HTTP post request gestuurd worden naar de volgende URL:

`https://api.copernica.com/view/$id/views?access_token=xxxx`

De eerste `$id` moet hier vervangen worden door de bovenliggende selectie en de tweede `$id` door de lager gelegen selectie.


## Beschikbare parameters

De volgende parameters kunnen toegevoegd worden aan de body van het bericht. De eigenschappen van deze genestelde selectie zien er hetzelfde uit als die van een reguliere selectie.

- name: 				naam van de selectie;
- description: 			omschrijving van de selectie;
- parent-type: 			type van de bovenliggende structuur; selectie of database;
- parent-id: 			id van de selectie of database waar de selectie onder valt;
- has-children: 		boolean waarde om aan te geven of er nog selecties onder deze selectie liggen;
- has-referred: 		boolean waarde om aan te geven of er andere selecties naar deze selectie verwijzen;
- has-rules: 			boolean waarde om te geven of de selectie regels heeft.


## Voorbeeld

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// parameters voor de methode
$data = array(
    'description'     =>  'new description'
);

// voer het verzoek uit
$api->post("view/id/views", array(), $data);
// bij een succesvolle call wordt het id van het aangemaakte verzoek teruggegeven
```
Dit voorbeeld vereist de [REST API class](rest-php).


## Meer informatie

- [Overzicht van alle API methodes](rest-api)
- [GET view views](./rest-get-view-views)