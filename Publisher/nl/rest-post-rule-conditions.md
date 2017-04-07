# REST API: regel condities aanpassen
Een methode om condities voor een regel aan te passen. Deze methode ondersteunt geen parameters. De method kan aangeroepen worden met een HTTP POST verzoek aan de volgende URL:

`https://api.copernica.com/v1/rule/$id/conditions?access_token=xxxx`

De `$id` moet hier vervangen worden door de identifier van de regel waaraan je een conditie toe wilt voegen.

## Beschikbare parameters

De message body kan de volgende eigenschappen voor de conditie bevatten:

- **type**: type van de conditie
- **rule**: numeriek ID van regel waar de conditie toe hoort

De precieze eigenschappen hangen af van het type van de conditie. Voor een overzicht van de ondersteunde voorwaarden en de eigenschappen die zij bezitten kunt u de volgende specifiekere artikels bekijken:

- [Veranderings voorwaarden](./rest-condition-type-change.md)
- [Datum voorwaarden](./rest-condition-type-date.md)
- [DoubleField voorwaarden](./rest-condition-type-doublefield.md)
- [Email voorwaarden](./rest-condition-type-email.md)
- [Export voorwaarden](./rest-condition-type-export.md)
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

	// vereiste scripts
	require_once('copernica_rest_api.php');

	// verander dit naar je access token
	$api = new CopernicaRestApi("your-access-token");

	// parameters voor de methode
	$data = array(
		'type' = 'date'
	)

	// voer het verzoek uit en print het resultaat
	$api->post("rule/1234/conditions", array(), $data);

Dit voorbeeld vereist de [CopernicaRestApi klasse](rest-php).

## Meer informatie

* [Overzicht van alle API methodes](rest-api)
* [Regels opvragen](./rest-get-rules)
* [Regels per ID opvragen](./rest-get-rule)
* [Een regel aanmaken](./rest-post-rule)
