# REST API: regel condities aanpassen
Een methode om condities voor een regel aan te passen. Deze methode ondersteunt geen parameters. De method kan aangeroepen worden met een HTTP POST verzoek aan de volgende URL:

`https://api.copernica.com/v1/rule/$id/conditions?access_token=xxxx`

De $id moet hier vervangen worden door de identifier van de regel waaraan je een conditie toe wilt voegen.

## Beschikbare parameters

The message body can hold the following properties for a condition:

- **id**: numeriek ID van de conditie
- **type**: type van de conditie
- **rule**: numeriek ID van regel waar de conditie toe hoort

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

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// parameters to pass to the call
	$data = array(
		'type' = 'date'
	)

	// do the call, and print result
	$api->post("rule/1234/conditions", array(), $data);

Dit voorbeeld vereist de [CopernicaRestApi klasse](rest-php).

## Meer informatie

* [Overzicht van alle API methodes](rest-api)
* [Regels opvragen](./rest-get-rules)
* [Regels bij ID opvragen](./rest-get-rule)
* [Een regel aanmaken](./rest-post-rule)
