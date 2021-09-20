# REST API: GET consumption

Een overzicht van het verbruik in je account kun je opvragen
met de volgende URL:

`https://api.copernica.com/v3/consumption?access_token=xxx`

## Beschikbare parameters

De volgende parameters moeten aan de URL als variabelen worden toegevoegd:

* **begin**: begindatum voor het op te vragen verbruik van je account
* **end**: einddatum voor het op te vragen verbruik van je account

## Geretourneerde velden

De methode retourneert het opgesplitste verbruik van je account.

* **emals**: het aantal verzonden e-mailings in de opgegeven periode
* **texts**: het aantal verzonden SMS-mailings in de opgegeven periode
* **fax**: het aantal verzonden fax-mailings in de opgegeven periode
* **webpages**: het aantal actieve webpagina's in de opgegeven periode
* **apicalls**: het aantal uitgevoerde API calls in de opgegeven periode
* **litmustests**: het aantal uitgevoerde Litmus tests in de opgegeven periode
* **twofiftyoktests**: het aantal uitgevoerde inboxplaatsings-tests in de opgegeven periode

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander naar je acces token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters voor de methode
$parameters = array(
    'start'     =>  '2020-01-01',
    'end'       =>  '2021-01-01',
);

// voer methode uit en print resultaat
print_r($api->get("consumption", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).
    
## Meer informatie

* [Overzicht van alle API calls](rest-api)

