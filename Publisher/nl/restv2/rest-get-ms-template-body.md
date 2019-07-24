# REST API: GET template body (Marketing Suite)

Als je de inhoud van een template gemaakt met de Marketing Suite wil 
opvragen kun je een GET request sturen naar de volgende URL:

`https://api.copernica.com/v2/ms/template/$id/body/$type?access_token=xxxx`

De `$id` is hier de ID van de template en `$type` het formaat waarin je 
de inhoud op wilt vragen. Deze methode kan niet aangeroepen worden met 
een PHP script.

## Types

Het bericht kan in drie formaten opgevraagd worden:

* **MIME**: Internet standaard voor email
* **HTML**: HyperText Language Markup/internet markup
* **Text**: Simpele platte tekst

Afhankelijk van het formaat ziet de output er anders uit. **MIME** bevat 
alle headers bijvoorbeeld, terwijl **text** alleen platte tekst laat zien. 
Je kunt het gewenste type in de URL toevoegen.

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. 
Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("ms/template/{$templateID}/body/mime"));
```

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van alle templates](./rest-get-templates)
* [Opvragen van een template](./rest-get-template)
