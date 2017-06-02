# REST condities: Part

Condities zijn kleinere onderdelen van regels. Er hoeft maar aan een 
conditie van een regel te worden voldaan om aan de regel te voldoen. 
Elke conditie heeft specifieke eigenschappen.

Dit artikel gaat over de **part** conditie. Als je op zoek bent 
naar andere type condities kun je deze vinden onder het kopje *Meer informatie*.

## Eigenschappen

Voor deze conditie zijn de volgende parameters beschikbaar:

* begin: 			het eerst geselecteerde profiel als een getal of percentage. Je kunt hier een negatieve waarde gebruiken om vanaf het eind te beginnen met tellen.
* length: 			het aantal geselecteerde profielen als getal of percentage. 
* fields: 			alle velden gebruikt in deze conditie.

## Voorbeeld

Met de part conditie kun je gemakkelijk een gedeelte van een selectie bekijken 
die een bepaalde veldwaarde hebben. We kijken hier naar 20 honden eigenaren 
uit onze selectie.

```php
// vereiste module
require_once("copernica_rest_api.php");

// maak een API object met je eigen token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // selecteer part conditie
    'type' => 'Part',

    // stel begin in
    'begin' => '54',
    
    // stel lengte in
    'length' => '20',
    
    // stel veld in
    'fields' => 'dog_owner',
);

// voer het verzoek uit
$result = $api->post("rule/id/conditions", $data);

// print het resultaat
print_r($result);
```

Dit voorbeeld vereist de [REST API class](./rest-php).

## Meer informatie

* [GET rule condities](rest-get-rule-conditions)
* [POST rule condities](rest-post-rule-conditions)
* [Conditie type change](rest-condition-type-change)
* [Conditie type date](rest-condition-type-date)
* [Conditie type doublefield](rest-condition-type-doublefield)
* [Conditie type email](rest-condition-type-email)
* [Conditie type export](rest-condition-type-export)
* [Conditie type fax](rest-condition-type-fax)
* [Conditie type field](rest-condition-type-field)
* [Conditie type interest](rest-condition-type-interest)
* [Conditie type lastcontact](rest-condition-type-lastcontact)
* [Conditie type miniview](rest-condition-type-miniview)
* [Conditie type referview](rest-condition-type-referview)
* [Conditie type sms](rest-condition-type-sms)
* [Conditie type survey](rest-condition-type-survey)
* [Conditie type todo](rest-condition-type-todo)
