# REST API: POST imports

Je kunt een import starten door een HTTP PUT-request te sturen naar de volgende URL:

`https://api.copernica.com/v3/imports?access_token=xxxx`

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **database**: ID van de database.
* **name**: Naam van de import.
* **followups**: Moeten opvolgacties uitgevoerd worden op (sub)profielen in import? (true/**false**)
* **autostart**: Moet de import direct uitgevoerd worden? (**true**/false)
* **rebuild**: Moeten de selecties worden opgebouwd na de import? (true/**false**)
* **action**: Welk doel heeft de import? Opties: add, update, update or add, ignore or add, delete.
* **keyFields**: Array van sleutelvelden die gebruikt worden bij de import. 
* **ignoreEmptyFields**: Moeten lege velden in het importbestand genegeerd worden en de originele waarde blijven bestaan? (true/**false**)
* **removeMissing**: Moeten de (sub)profielen die niet in het importbestand voorkomen verwijderd worden uit de database? (true/**false**)
* **deleteTarget**: Bij de action *delete* kun je hier aangeven wat je wilt verwijderen. (**profile**/subprofile)
* **location**: URL naar een externe locatie waar het importbestand te vinden is. 
* **source**: De data als je de import niet vanuit een externe locatie ophaalt (string of array).
* **format**: Optionele parameter waarin het formaat van de source aangegeven kan worden zodra er gebruik gemaakt wordt van een string als *source*. (csv/json)
* **delimiter**: Scheidingsteken van de data. Verplicht bij een CSV-bestand en geen array-input. ("\t", ",", ";")

**Opmerking**: de standaardwaarde is vetgedrukt. 

## Voorbeeld in PHP

Het volgende PHP-script demonstreert hoe je de API-methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data voor de methode
$data = array(
	"database" 	    		=> 1,
	"name"				      => "TestImport",
	"rebuild"			      => true,
	"action"			      => "update or add",
	"keyFields"			    => array("Email"),
	"format"			      => "json",
	"source"			      => '[
		{ 
			"Email": "support@copernica.com", 
			"Contactpersoon": "Jeroen" 
		}, 
		{ 
			"Email": "info@copernica.com", 
			"Contactpersoon": "Danny" 
		}
	]'
);

// voer de methode uit en print het resultaat
$api->post("imports/", $data);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Voorbeeld met subprofielen in PHP

Het volgende PHP-script demonstreert hoe je de API-methode kunt aanroepen in combinatie met subprofielen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data voor de methode
$data = array(
	"database" 	    		=> 1,
	"name"				      => "TestImport",
	"rebuild"			      => true,
	"action"			      => "update or add",
	"keyFields"			    => array("Email", "Order.OrderID"),
	"format"			      => "json",
	"source"			      => '[
		{ 
			"Email": "support@copernica.com", 
			"Contactpersoon": "Jeroen",
			"Order.OrderID": "00001", 
			"Order.Status": "Completed" 
		}, 
		{ 
			"Email": "info@copernica.com", 
			"Contactpersoon": "Danny", 
			"Order.OrderID": "00002", 
			"Order.Status": "Shipped" 
		}
	]'
);

// voer de methode uit en print het resultaat
$api->post("imports/", $data);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
