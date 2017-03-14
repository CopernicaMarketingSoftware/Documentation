# REST API: aanvragen van interesses van een profiel

Om de interesses van een profiel op te vragen kun je een HTTP GET
verzoek sturen naar de volgende URL:

`https://api.copernica.com/v1/profile/$id/interests?access_token=xxxx`

De `$id` moet vervangen worden door de ID van het profiel waarvan je de interesses op wil vragen.

## Teruggegeven velden

Deze methode geeft een array van JSON interesse objecten terug. Elk object heeft de volgende eigenschappen:

- **ID**: numerieke identifier van de interesse
- **name**: de naam van de interesse
- **group**: de groep waar de interesse bij hoort

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode gebruikt:

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // voer het verzoek uit en print het resultaat
    print_r($api->get("profile/1234/interests"));

Dit voorbeeld vereist de [CopernicaRestApi klasse](rest-php).

## Meer informatie

- [Overzicht van alle API methodes](rest-api)
- [Opvragen van alle profiel informatie](rest-get-profile)
