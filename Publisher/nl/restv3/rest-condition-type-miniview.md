# REST condities: MiniView

Condities zijn kleinere onderdelen van regels. Er hoeft maar aan een 
conditie van een regel te worden voldaan om aan de regel te voldoen. 
Elke conditie heeft specifieke eigenschappen.

Dit artikel gaat over de **miniview** conditie. Als je op zoek bent 
naar andere type condities kun je deze vinden onder het kopje *Meer informatie*.

## Eigenschappen

Voor deze conditie zijn de volgende parameters beschikbaar:

* mini-view:                    miniview geassocieerd met de conditie
* min-subprofiles:              minimum hoeveelheid subprofielen in de miniview
* max-subprofiles:              maximum hoeveelheid subprofielen in de miniview

## Voorbeeld

Het is mogelijk om meerdere miniviews te combineren als we er te veel hebben. 
Om te checken of een miniview klein genoeg is kunnen we max-subprofiles naar
het maximum aantal subprofielen in de miniview zetten.

```php
// vereiste module
require_once("copernica_rest_api.php");

// maak een API object met je eigen token
$api = new CopernicaRestAPI("your-access-token", 3);

$data = array(
    // selecteer miniview conditie
    'type' => 'MiniView',

    // stel maximum in
    'max-subprofiles' => '14'
);

// voer het verzoek uit
$result = $api->post("rule/{$regelID}/conditions", $data);

// print het resultaat
print_r($result);
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

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
* [Conditie type part](rest-condition-type-part)
* [Conditie type referview](rest-condition-type-referview)
* [Conditie type sms](rest-condition-type-sms)
* [Conditie type survey](rest-condition-type-survey)
* [Conditie type todo](rest-condition-type-todo)
