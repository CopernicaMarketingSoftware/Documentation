# REST API: GET Publisher personalized document (subprofiel)

Je kan een gepersonaliseerd Publisher document van een subprofiel opvragen met 
een HTTP GET-call naar de volgende URL:

`https://api.copernica.com/v3/subprofile/$subprofileID/publisher/document/$documentID?access_token=xxxx`

Hier moet `$subprofileID` vervangen worden door het ID van het subprofiel en `$documentID` door het ID van het document. 

## Teruggegeven velden

Deze methode geeft een JSON-object terug met de volgende informatie:

* **ID**: ID van het document
* **template**: ID van de template
* **name**: naam van het document
* **description**: omschrijving van het document
* **from_address**: afzenderadres van het document
* **subject**: onderwerp van het document
* **archived**: geeft aan of dit document gearchiveerd is (true) of niet (false)
* **source**: gepersonaliseerde broncode van het document op basis van het opgegeven subprofiel ID

## JSON voorbeeld

De JSON ziet er bijvoorbeeld zo uit:

```json
{
    "id": "285",
    "template": "114",
    "name": "Test",
    "description": "",
    "from_address": "\"Jeroen\" <info@copernica.com>",
    "subject": "Test",
    "archived": false,
    "source": "<html>\n\t<body>\nDit is een test<br />\n</body>\n</html>"
}
```

## PHP voorbeeld

Dit script demonstreert hoe je de API-methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token 
$api = new CopernicaRestAPI("your-access-token", 3);

// voer het verzoek uit
print_r($api->get("subprofile/{$subprofileID}/publisher/document/{$documentID}"));
```

Dit voorbeeld vereist de [REST API-klasse](./rest-php).

## Meer informatie
* [Overzicht van alle calls](./rest-api)




