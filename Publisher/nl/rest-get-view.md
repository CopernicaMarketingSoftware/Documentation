# REST API: vraag selectie metadata op

Een methode om de metadata van een database op te vragen. De methode kan aangeroepen worden met een HTTP GET verzoek aan de volgende URL:

`https://api.copernica.com/v1/view/$id?access_token=xxxx`

Hier moet de `$id` vervangen worden met de numerieke identifier van de database waarvan de selecties moeten worden opgevraagd.

## Beschikbare parameters

Er zijn geen beschikbare parameters voor deze methode.

## Geretourneerde velden

- **ID**: unieke numerieke identifier van selectie
- **name**: naam van de selectie
- **description**: beschrijving van de selectie
- **parent-type**: type van de parent (view/database)
- **parent-id**: id van de parent
- **has-children**: geeft aan of de selectie zelf selecties bevat
- **has-referred**: geeft aan of er andere selecties zijn die naar deze selectie refereren.
- **has-rules**: geeft aan of de selectie regels heeft

## Voorbeeld in PHP

Het volgende voorbeeld demonstreert hoe deze methode gebruikt kan worden met de API:

	// vereiste scripts
	require_once('copernica_rest_api.php');

	// verander dit naar je access token
	$api = new CopernicaRestApi("your-access-token");

	// voer de methode uit en print het resultaat
	print_r($api->get("view/1234"));

Dit voorbeeld gebruikt de [CopernicaRestAPi klasse](rest-php).

## Meer informatie

* [Overzicht van alle REST API methods](./rest-api)
* [Vraag selectie regels op](./rest-get-view-rules)

