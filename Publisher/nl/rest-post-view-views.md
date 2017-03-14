# REST API: aanpassen van genestelde selecties

Copernica ondersteund ook genestelde selecties. Om een genestelde selectie aan te passen kan er een HTTP post request gestuurd worden naar de volgende URL:

`https://api.copernica.com/view/$id/views?access_token=xxxx`

De eerste `$id` moet hier vervangen worden door de bovenliggende selectie en de tweede $id door de lager gelegen selectie.

## Beschikbare parameters

De volgende parameters kunnen toegevoegd worden aan de body van het bericht. De eigenschappen van deze genestelde selectie zien er hetzelfde uit als die van een reguliere selectie.

- **name**: Naam van de selectie
- **description**: Omschrijving van de selectie
- **parent-type**: Type van de bovenliggende structuur; selectie of database?
- **parent-id**: ID van de selectie of database waar de selectie onder valt
- **has-children**: Boolean waarde om aan te geven of er nog selecties onder deze selectie liggen
- **has-referred**: Boolean waarde om aan te geven of er andere selecties naar deze selectie verwijzen
- **has-rules**: Boolean waarde om te geven of de selectie regels heeft

## Voorbeeld in PHP
Het volgende voorbeeld in PHP demonstreert hoe je deze methode gebruikt:

	// vereiste scripts
	require_once('copernica_rest_api.php');

	// verander dit naar je access token
	$api = new CopernicaRestApi("your-access-token");

	// parameters voor de methode
	$data = array(
	    'description'     =>  'new description'
	);

	// voer het verzoek uit
	$api->post("view/1234/views", array(), $data);

Dit voorbeeld vereist de [CopernicaRestApi klasse](rest-php).

## Meer informatie
- [Overzicht van alle API methodes](rest-api)
- [Vraag lijst van genestelde selecties op](./rest-get-view-views)


