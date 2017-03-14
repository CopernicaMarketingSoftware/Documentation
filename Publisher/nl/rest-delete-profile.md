# REST API: profiel verwijderen

Het verwijderen van een profiel kan gedaan worden door een HTTP DELETE verzoek te sturen naar de volgende URL:

`https://api.copernica.com/v1/profile/$id?access_token=xxxx`

De `$id` hier moet vervangen worden door de ID van het profiel dat je wilt verwijderen.

## Voorbeeld in PHP

Het volgende voorbeeld demonstreert hoe je gebruik maakt van deze methode met de API:

	// vereiste scripts
	require_once('copernica_rest_api.php');

	// verander dit naar je access token
	$api = new CopernicaRestApi("your-access-token");

	// voer het verzoek uit
	$api->delete("profile/1234");

Dit voorbeeld vereist de [CopernicaRestAPi klasse](rest-php).

## More information

* [Overzicht van alle REST API calls](rest-api)
* [Verwijderen van een database](rest-delete-database)
* [Een profiel opvragen](rest-get-profile)
* [Een profiel aanpassen](rest-put-profile)

