# REST API: een selectie verwijderen

Om een selectie van profielen te verwijderen kan er een HTTP DELETE verzoek gestuurd worden naar de volgende URL:

`https://api.copernica.com/v1/view/$id?access_token=xxxx`

De eerste $id moet vervangen worden door de ID van de selectie die je wilt verwijderen. Met deze methode verwijder je alleen de selectie, niet de profielen die erin zitten. Als je de profielen ook wilt verwijderen kun je de hele database verwijderen of individuele profielen verwijderen.

## Voorbeeld in PHP

Het volgende voorbeeld demonstreert het gebruik van deze methode met de API:

	// vereiste scripts
	require_once('copernica_rest_api.php');

	// verander dit naar je access token
	$api = new CopernicaRestApi("your-access-token");

	// voer het verzoek uit
	$api->delete("view/1234");

Dit voorbeeld vereist de [CopernicaRestAPi klasse](rest-php).

## Meer informatie

* [Overzich van alle REST API calls](rest-api)
* [Verwijder een database](rest-delete-database)
* [Vraag alle profielen in selectie op](rest-get-view-profiles)
* [Profiel verwijderen](rest-delete-profile)

