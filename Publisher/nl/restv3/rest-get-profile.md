# REST API: GET profile

Als je alle gegevens van een enkel profiel wilt opvragen, dan kun je die
opvragen door middel van een eenvoudige HTTP GET call naar de volgende URL

`https://api.copernica.com/v3/profile/$id?access_token=xxxx`

De `$id` moet je vervangen door de numerieke identifier van het profiel
dat je opvraagt.

## Geretourneerde velden

De methode retourneert gegevens van een profiel. De volgende eigenschappen 
worden teruggegeven:

* **ID**: ID van het profiel
* **fields**: Associative array van veldnamen en veldwaardes
* **interests**: Array van de interesses van het profiel
* **database**: ID van de database waarin het profiel is opgeslagen
* **secret**: De "geheime" code die aan een profiel is gekoppeld
* **created**: Tijdstip waarop het profiel in aangemaakt, in YYYY-MM-DD hh:mm:ss formaat
* **modified**: Tijdstip waarop het profiel voor het laatst is bijgewerkt, in YYYY-MM-DD hh:mm:ss formaat
* **removed**: Geeft aan of het profiel verwijderd is of niet

### JSON example

De JSON voor een profiel ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"18381",
   "fields":{  
      "name":"Test",
      "email":"test@example.com",
   },
   "interests":[  
      "baseball",
      "soccer"
   ],
   "database":"7616",
   "secret":"e5903b43c08g011f7a1e1f2644f618be",
   "created":"2013-01-06 14:19:51",
   "modified":"2019-02-21 13:26:21",
   "removed":false
}
```

## Voorbeeld

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// voer de methode uit en print het resultaat
print_r($api->get("profile/{$profielID}"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van profiel ID's](rest-get-database-profileids)
* [Profiel toevoegen aan een database](rest-post-database-profiles)
* [Profiel bijwerken](rest-put-profile-fields)
* [Profiel verwijderen](rest-delete-profile)
