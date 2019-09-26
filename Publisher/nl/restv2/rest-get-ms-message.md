# REST API: GET message (Marketing Suite)

Als je algemene informatie van een met Marketing Suite verstuurde mail wilt
hebben, dan kun je een eenvoudige HTTP GET call naar de volgende URL sturen.

`https://api.copernica.com/v2/ms/message/$id?access_token=xxxx`

waar `$id` de unieke string van het bericht is.

Je kunt de methode om een Publisher bericht op te vragen [hier](./rest-get-publisher-message) vinden.

## Geretourneerde waarde

* **ID**: Unieke identifier van het bericht.
* **timestampsent**: Tijdstempel van versturen van het bericht.
* **profile**: Corresponderend profiel ID.
* **subprofile**: Corresponderend subprofiel ID.
* **mailing**: ID van de mailing die bij dit bericht hoort.

## PHP Voorbeeld

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer de methode uit en print het resultaat
print_r($api->get("ms/message/{$berichtID}"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van een message body](./rest-get-ms-message-body)
