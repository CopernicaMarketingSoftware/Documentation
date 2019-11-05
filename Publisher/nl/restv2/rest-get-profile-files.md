# REST API: GET profile files

Profielen kunnen folders en subfolders bevatten met verschillende soorten bestanden. 
Je kunt informatie hierover opvragen door een HTTP GET verzoek sturen naar de volgende URL:

`https://api.copernica.com/v2/profile/$id/files?access_token=xxxx`

De eerste `$id` moet vervangen worden met de ID van het profiel waar de 
informatie van opgevraagd wordt.

## Teruggegeven velden

De methode retourneert een JSON object met de subprofielen onder het **data**
veld. Elk subprofiel bevat de volgende velden:

* **ID**: ID van het bestand.
* **name**: De naam van het bestand.
* **directory**: Het pad naar de folder waar het bestand zich bevindt.
* **author**: Auteur van het bestand.
* **created**: Tijdstip waarop het bestand is aangemaakt, in YYYY-MM-DD hh:mm:ss formaat.
* **modified**: Tijdstip waarop het bestand voor het laatst is bijgewerkt, in YYYY-MM-DD hh:mm:ss formaat.
* **size**: Grootte van het bestand in bytes.

### JSON voorbeeld

De JSON voor een enkel subprofiel ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"20285",
   "name":"cat.png",
   "directory":"Images/Animals",
   "author":"Copernica BV",
   "created":"2008-08-25 16:14:56",
   "modified":"2010-08-25 16:15:56",
   "size":131364
}
```

## Voorbeeld

Het volgende PHP script demonstreert hoe de API method te gebruiken is.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit en print het resultaat
print_r($api->get("profile/{$profielID}/files"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

- [Overzicht van alle API methodes](rest-api)
- [Alle profielinformatie opvragen](rest-get-profile)
