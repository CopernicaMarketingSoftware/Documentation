# REST API: pas eigenschappen van een regel aan

Dit is een methode om de eigenschappen van een bestaande regel aan te passen. Om deze uit te voeren kan er een HTTP PUT verzoek worden verstuurd naar de volgende URL:

`https://api.copernica.com/v1/rule/$id?access_token=xxxx`

De `$id` moet hier vervangen worden door de ID van de regel waarvan je de eigenschappen aan wilt passen.

## Beschikbare parameters
De volgende eigenschappen voor de regel kunnen toegevoegd worden aan de HTTP PUT command:

- **name**: naam van de regel
- **description**: omschrijving van de regel
- **view**: ID van de selectie waar de regel bij hoort
- **conditions**: array van condities van de regel
- **inversed**: boolean waarde om aan te geven of de regel wel of niet geinverteerd moet worden. Als deze op "True" staat worden er alleen profielen teruggegeven die niet aan de condities voldoen.
- **disabled**: boolean waarde om aan te geven of een regel uitgeschakeld moet worden of niet.

## Voorbeeld in PHP

Het volgende voorbeeld laat zien hoe je deze methode gebruikt met de API:

	// vereiste scripts
	require_once('copernica_rest_api.php');

	// verander dit naar je access token
	$api = new CopernicaRestApi("your-access-token");

	// data voor de methode
	$data = array(
    	'description'   =>  'a new description',
    	'has_rules'      =>  true
	);

	// voer het verzoek uit en print het resultaat
	print_r($api->put("database/1234", array(), $data));

Dit voorbeeld vereist de [CopernicaRestAPi klasse](rest-php).

## Meer informatie

* [Overzicht van alle REST API methods](./rest-api)
* [Een regel aanmaken](./rest-put-view-rules)

