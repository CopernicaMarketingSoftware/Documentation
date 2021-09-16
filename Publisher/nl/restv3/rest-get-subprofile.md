# REST API: GET subprofile

Als je alle gegevens van een enkel subprofiel wilt opvragen, dan kun je die
opvragen door middel van een eenvoudige HTTP GET call naar de volgende URL

`https://api.copernica.com/v3/subprofile/$id?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van het subprofiel
dat je opvraagt.

## Teruggegeven velden

De methode retourneert gegevens van een subprofiel. De volgende eigenschappen 
worden teruggegeven:

* **ID**: ID van het subprofiel.
* **secret**: De "geheime" code die aan een subprofiel is gekoppeld.
* **fields**: Associative array / object van veldnamen en veldwaardes.
* **profile**: ID van het profiel waar het subprofiel onder hoort.
* **collection**: ID van de collectie waarin het subprofiel is opgeslagen.
* **created**: Tijdstip waarop het subprofiel in aangemaakt, in YYYY-MM-DD hh:mm:ss formaat.
* **modified**: Tijdstip waarop het subprofiel voor het laatst is bijgewerkt, in YYYY-MM-DD hh:mm:ss formaat.
* **removed**: Geeft aan of het subprofiel verwijderd is ('true') of niet ('false').

### JSON voorbeeld

De JSON voor een subprofiel ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"20285",
   "secret":"132879300b4731870080b1cd301fd43d",
   "fields":{  
   },
   "profile":"2139358",
   "collection":"6312",
   "created":"2008-08-25 16:14:56",
   "modified":"2010-08-25 16:15:56",
   "removed":false
}
```

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer de methode uit en print het resultaat
print_r($api->get("subprofile/{$subprofielID}"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).
    
## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van profiel ID's](rest-get-database-subprofileids)
* [Profiel toevoegen aan een database](rest-post-profile-subprofiles)
* [Profiel bijwerken](rest-put-subprofile-fields)
* [Profiel verwijderen](rest-delete-subprofile)
