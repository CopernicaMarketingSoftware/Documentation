# REST API: aanvragen van interesses van een profiel

Er zijn verschillende methodes om de interesses van een profiel op te 
vragen. Welke methode het meest geschikt is hangt af van hoe je deze wilt 
gebruiken. Je kunt namelijk een array met de namen van interesses opvragen, 
een array van ID's of een array met JSON objecten.

Hou in gedachten dat $id zoals altijd vervangen moet worden met de numerieke 
identifier van het profiel waar je de interesses van opvraagt.

## Array van interesse namen

Een lijst van namen van interesses kan opgevraagd worden door een HTTP 
GET request te sturen naar de volgende URL:

`https://api.copernica.com/v1/profile/$id/interests?access_token=xxxx`

Deze call geeft simpelweg een lijst van namen van interesses terug. Je kunt 
in je code deze gebruiken om te checken of een profiel een bepaalde interesse 
heeft, bijvoorbeeld.

## Array van interesse ID's

Een lijst van ID's van interesses kan opgevraagd worden door een HTTP 
GET request te sturen naar de volgende URL:

`https://api.copernica.com/v1/profile/$id/interests?access_token=xxxx&return=ids`

Deze call geeft simpelweg een lijst van ID's van interesses terug. Deze 
kun je ook gebruiken voor vergelijkingen of het opvragen van de interesses zelf.

## Array van interesse objects

Een lijst van JSON interesse objecten kan opgevraagd worden door een HTTP 
GET request te sturen naar de volgende URL:

`https://api.copernica.com/v1/profile/$id/interests?access_token=xxxx&return=objects`

Elk object in de array heeft de volgende eigenschappen:

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
