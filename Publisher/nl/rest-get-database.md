GET database gegevens

Dit is een methode om meta gegevens van een database op te vragen. 
Deze methode ondersteunt geen parameters. De methode is aan te 
roepen met een HTTP GET request naar de volgende URL:

`https://api.copernica.com/v1/database/$id?access_token=xxxx`

Als `$id` kun je de numerieke identifier van een database opgeven, of de naam
van een database.

## Geretourneerde velden

* id: 			uniek ID;
* name: 		naam van de database;
* description: 	omschrijving van de database;
* archived: 	is de database gearchiveerd of niet?;
* created: 		tijdstip waarop de database is aangemaakt;
* fields: 		array met de velden in de database;
* interests: 	array met de interesses in de database;
* collections: 	array met de collecties in de database.

Het is ook mogelijk om apart informatie over fields, interests en
collections op te vragen:

* [GET fields](rest-get-database-fields)
* [GET interests](rest-get-database-interests)
* [GET collections](rest-get-database-collections) 


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once("copernica_rest_api.php");

// verander dit in je access token
$api = new CopernicaRestApi("your-access-token");

// voer de opdracht uit en print het resultaat
print_r($api->get("database/id"));
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Bewerken van een database](rest-put-database)
