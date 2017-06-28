# REST API: GET minirule conditions

Dit is een methode om alle condities van een miniregel (voor een miniview) op te vragen. Deze methode ondersteunt geen parameters. De methode is aan te roepen met een HTTP GET request naar de volgende URL:

`https://api.copernica.com/v1/minirule/$id/conditions?access_token=xxxx`

De `$id` hier moet vervangen worden door de ID van de miniregel waarvan je de condities op wil vragen.

## Beschikbare parameters

Er zijn geen beschikbare parameters voor deze methode.

## Teruggegeven velden

Deze methode geeft een JSON regel object terug met de volgende eigenschappen:

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

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// voer het verzoek uit en print het resultaat
print_r($api->get("minirule/1234/conditions"));
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle API methodes](./rest-api)
* [GET minirule](./rest-get-minirule)
