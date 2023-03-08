# REST API: GET destinations (Publisher)
Deze methode kan gebruikt worden als je alle destinations van Publisher(HTML) mailings van een bepaalde periode wilt opvragen. Door een GET request te sturen naar de volgende URL kun je deze gegevens opvragen:
`https://api.copernica.com/v3/publisher/destinations?access_token=xxxx`

## Parameters
* **from**: Begintijd voor het opvragen van de destinations (YYYY-MM-DD).
* **to**: Eindtijd voor het opvragen van de destinations (YYYY-MM-DD).

## Geretourneerde velden
Deze methode geeft een JSON object terug met de volgende data:
* **id**: Hash van de destination
* **timestampsent**: Tijdstip waarop de mailing is verzonden
* **internal**: Intern ID van de ontvanger
* **profile**: ID van het profiel die de mail heeft ontvangen
* **subprofile**: ID van het subprofiel die de mail heeft ontvangen (als de destination een subprofiel was)
* **mailing**: ID van de verzonden mailing
* **emailing-group**: ID van de emailing groep

## PHP example
Het volgende PHP-script demonstreert hoe je de API-methode kunt aanroepen:
```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander naar je acces token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters voor de methode
$parameters = array(
    'from'     =>  '2021-02-01',
    'to'       =>  '2021-02-02',
);

// voer methode uit en print resultaat
print_r($api->get("publisher/destinations", $parameters));
```
Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie
* [Overzicht van alle API calls](./rest-api.md)
