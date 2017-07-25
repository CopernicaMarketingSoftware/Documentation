# REST API: POST minirule conditions

Een methode om condities voor een miniregel aan te passen. De method kan 
aangeroepen worden met een HTTP POST verzoek aan de volgende URL:

`https://api.copernica.com/v1/minirule/$id/conditions/$type?access_token=xxxx`

De `$id` moet hier vervangen worden door de identifier van de miniregel 
waaraan je een conditie toe wilt voegen. De `$type` moet vervangen 
worden door het type van de conditie. Bij een 
succesvolle call wordt de ID van het aangemaakte verzoek teruggegeven.

## Beschikbare parameters

De message body kan de volgende eigenschappen hebben voor een conditie:

- type: type van de conditie

De precieze eigenschappen hangen af van het type van de conditie. Voor 
een overzicht van de ondersteunde voorwaarden en de eigenschappen die 
zij bezitten kunt u de volgende specifiekere artikelen bekijken:

- [Veranderings voorwaarden](./rest-condition-type-change.md)
- [Datum voorwaarden](./rest-condition-type-date.md)
- [DoubleField voorwaarden](./rest-condition-type-doublefield.md)
- [Email voorwaarden](./rest-condition-type-email.md)
- [Fax voorwaarden](./rest-condition-type-fax.md)
- [Veld voorwaarden](./rest-condition-type-field.md)
- [Interesse voorwaarden](./rest-condition-type-interest.md)
- [LastContact voorwaarden](./rest-condition-type-lastcontact.md)
- [Miniview voorwaarden](./rest-condition-type-miniview.md)
- [SMS voorwaarden](./rest-condition-type-sms.md)
- [Todo voorwaarden](./rest-condition-type-todo.md)
- [Survey voorwaarden](./rest-condition-type-survey.md)
- [Part voorwaarden](./rest-condition-type-part.md)
- [ReferView voorwaarden](./rest-condition-type-referview.md)

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe de API method te gebruiken is.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// data voor het verzoek
$data = array(
	'type' = 'date'
)

// voer het verzoek uit
$api->post("minirule/id/conditions/id", array(), $data);

// bij een succesvolle call wordt de id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle API methodes](rest-api)
* [GET miniregel](./rest-get-minirule)
* [POST miniregel](./rest-put-minirule)
* [POST miniregel conditie](./rest-post-minirule-condition)
