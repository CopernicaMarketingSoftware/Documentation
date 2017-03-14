# REST API: verwijderen van een regel

Een regel kan verwijderd worden door een HTTP DELETE verzoek te sturen naar de volgende URL:

`https://api.copernica.com/v1/rule/$id?access_token=xxxx`

De `$id` moet vervangen worden door de ID van de regel die je wilt verwijderen.

## Voorbeeld in PHP

Het volgende voorbeeld demonstreert hoe deze methode te gebruiken is:

	// vereiste scripts
	require_once('copernica_rest_api.php');

	// verander dit naar je access token
	$api = new CopernicaRestApi("your-access-token");

	// voer het verzoek uit
	$api->delete("rule/1234");

Dit voorbeeld gebruikt de [CopernicaRestAPi klasse](rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](rest-api)
* [Verwijder een database](rest-delete-database)
* [Een regel aanmaken](rest-get-rule)
* [Een regel aanpassen](rest-put-rule)

