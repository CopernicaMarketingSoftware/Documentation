# REST API - POST minirule conditions
Een methode om condities voor een miniregel aan te passen. Deze methode ondersteunt geen parameters. De method kan aangeroepen worden met een HTTP POST verzoek aan de volgende URL:

`https://api.copernica.com/v1/minirule/$id/conditions?access_token=xxxx`

De `$id` moet hier vervangen worden door de identifier van de miniregel waaraan je een conditie toe wilt voegen.


## Beschikbare parameters

De message body kan de volgende eigenschappen hebben voor een conditie:

- type: type van de conditie
- rule: numeriek ID van de miniregel waar de conditie toe hoort

De precieze eigenschappen hangen af van het type van de conditie. Voor een overzicht van de ondersteunde voorwaarden en de eigenschappen die zij bezitten kunt u de volgende specifiekere artikels bekijken:

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
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// parameters to pass to the call
$data = array(
	'type' = 'date'
)

// do the call, and print result
$api->post("minirule/id/conditions", array(), $data);
// bij een succesvolle call wordt het id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle API methodes](rest-api)
* [GET minirules](./rest-get-minirules)
* [GET specific minirule](./rest-get-minirule)
* [POST minirule](./rest-post-minirule)
