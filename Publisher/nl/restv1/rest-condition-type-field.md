# REST condities: Field

Waarschuwing: Je bekijkt nu het overzicht voor de oude versie van onze 
API. Wij raden aan om [versie 2](../restv2/rest-api.md) van de API te gebruiken.

Condities zijn kleinere onderdelen van regels. Er hoeft maar aan een 
conditie van een regel te worden voldaan om aan de regel te voldoen. 
Elke conditie heeft specifieke eigenschappen.

Dit artikel gaat over de **field** conditie. Als je op zoek bent 
naar andere type condities kun je deze vinden onder het kopje *Meer informatie*.

## Eigenschappen

* comparison:           vergelijk type voor fieldconditie. Zie de comparison types tabel.
* field:                veld om te vergelijken met waarde.
* value:                waarde om mee te vergelijken. (Aanpassing hiervan reset other-field).
* other-field:          ander veld om field mee te vergelijken. Als deze is ingesteld wordt value niet gebruikt.
* numeric-comparison:   boolean value om aan te geven of value numeriek wordt vergeleken.

## Comparison types

De volgende tabel bevat de mogelijke waarden voor de comparison types en hun
omschrijvingen.

| Comparison types | Omschrijving   |
|------------------|----------------|
|equals            | Gelijk aan     |
|not equals        | Ongelijk aan   |
|contains          | Bevat          |
|not contains      | Bevat niet     |
|less              | Minder dan     |
|more              | Meer dan       |
|is email          | Is een mail    |
|regexp            | Regex          |
|is-numeric        | Is numeriek    |

## Voorbeelden

Stel dat je door middel van een "has_children" veld, weet welke profielen 
kinderen hebben. In dit geval kun je een specifieke doelgroep e-mailen door
een selectie te maken op de ouders. Je doet dit met de field conditie, die 
geldt wanneer dit voorbeeldt geldt. 

```php
// vereiste module
require_once("copernica_rest_api.php");

// maak een API object met je eigen token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // selecteer field conditie
    'type' => 'Field',

    // selecteer veld
    'field' => 'has_children',
    
    // stel waarde in
    'value' => 'yes',
);

// voer het verzoek uit
$result = $api->post("rule/id/conditions", $data);

// print het resultaat
print_r($result);
```

Dit voorbeeld vereist de [REST API class](./rest-php).

## Meer informatie

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
* [Conditie type change](rest-condition-type-change)
* [Conditie type date](rest-condition-type-date)
* [Conditie type doublefield](rest-condition-type-doublefield)
* [Conditie type email](rest-condition-type-email)
* [Conditie type export](rest-condition-type-export)
* [Conditie type fax](rest-condition-type-fax)
* [Conditie type interest](rest-condition-type-interest)
* [Conditie type lastcontact](rest-condition-type-lastcontact)
* [Conditie type miniview](rest-condition-type-miniview)
* [Conditie type part](rest-condition-type-part)
* [Conditie type referview](rest-condition-type-referview)
* [Conditie type sms](rest-condition-type-sms)
* [Conditie type survey](rest-condition-type-survey)
* [Conditie type todo](rest-condition-type-todo)
