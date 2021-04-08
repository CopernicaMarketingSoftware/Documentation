# REST API: GET destination/message body (Publisher)

Je kunt de body van een bericht verzonden naar een bestemming opvragen 
met een HTTP GET call naar de URL die hoort bij het soort output dat 
je wil ontvangen. De URL bevat altijd een `$id`. Deze moet vervangen 
worden door de unieke string die een bericht identificeert.

Afhankelijk van het gewenste output formaat zal de teruggegeven data er 
anders uit zien. **MIME** bevat bijvoorbeeld alle headers van het bericht, 
terwijl **text** alleen de platte tekst weergeeft. Het juiste type 
wordt aangegeven in de URL van de call. Het standaard output formaat is 
HTML.

## HTML

HTML staat voor HyperText Language Markup/internet markup. Om de HTML 
van een bericht op te vragen kun je een HTTP get verzoek sturen naar de 
volgende URL:

`https://api.copernica.com/v2/publisher/destination/$id/body?access_token=xxx`

of de volgende URL:

`https://api.copernica.com/v2/publisher/destination/$id/body/html?access_token=xxx`

## MIME

Mime is de internet standaard voor email. Om de MIME van een email op te 
vragen kun je een verzoek versturen naar de volgende URL:

`https://api.copernica.com/v2/publisher/destination/$id/body/mime?access_token=xxx`

## Text

Het is ook mogelijk om de tekstversie van een bericht op te vragen. 
De URL voor dit verzoek is:

`https://api.copernica.com/v2/publisher/destination/$id/body/text?access_token=xxx`

## PHP example

Het volgende voorbeeld bevat een script met alle mogelijkheden om 
de body van een bericht op te vragen:

```php
// import the helper class
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// retrieve the message body in the default format (HTML in this case)
print_r($api->get("publisher/destination/1044554/body"));

// retrieve the message body in HTML
print_r($api->get("publisher/destination/1044554/body/HTML"));

// retrieve the message body in MIME format
print_r($api->get("publisher/destination/1044554/body/mime"));

// retrieve the message body in text format
print_r($api->get("publisher/destination/1044554/body/text"));
```

Dit voorbeeld maakt gebruik van de [CopernicaRestApi klasse](rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [GET destination](./rest-get-publisher-destination)
