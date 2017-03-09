# REST API: eigenschappen van een minirule aanpassen

Een minirule is voor een miniview wat een regel is voor een selectie. Om de eigenschappen van een minirule aan te passen kan er een HTTP PUT verzoek verstuurd worden naar de volgende URL:

`https://api.copernica.com/v1/minirule/$id?access_token=xxxx`

De $id moet aangepast worden naar de ID van de minirule die je aan wilt passen.

## Beschikbare parameters
De volgende parameters kunnen in de message body geplaatst worden:

- **name**: Naam van de regel
- **view**: ID van de selectie waar de regel bij hoort
- **conditions**: Array van condities voor de regel
- **inversed**: Boolean waarde die aangeeft of de regel geinverteerd moet worden of niet. Als deze op "True" staat worden alleen profielen die *niet* aan de condities voldoen teruggegeven
- **disabled**: Boolean waarde om aan te geven of de regel uitgeschakeld moet worden of niet

## Voorbeeld in PHP

Het volgende voorbeeld demonstreert hoe deze methode gebruikt kan worden:

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// data to be sent to the api
	$data = array(
    	
		'name'   =>  'new rule name',
	);

	// do the call, and print result
	print_r($api->put("minirule/1234", array(), $data));

Dit voorbeeld vereist de [CopernicaRestApi klasse](rest-php).

## Meer informatie 

- [Overzicht van alle API methodes](rest-api)
- [Opvragen van minirules](./rest-get-minirule)
