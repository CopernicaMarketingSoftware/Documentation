# REST condities: Date

Condities zijn kleinere onderdelen van regels. Er hoeft maar aan een 
conditie van een regel te worden voldaan om aan de regel te voldoen. 
Elke conditie heeft specifieke eigenschappen.

Dit artikel gaat over de **date** conditie. Als je op zoek bent 
naar andere type condities kun je deze vinden onder het kopje *Meer informatie*.

## Eigenschappen

Voor deze conditie zijn de volgende parameters beschikbaar:

* field: het database veld van de date condition;
* compare-mode: vergelijk modus van de date condition.

Compare-mode kan de waarde 'full' of 'ignoreyear' hebben. Bij de eerste waarde
moet de hele datum matchen en bij de tweede waarde mag het jaar anders zijn.

## Date per tijdsinterval

De datum eigenschappen kunnen gebruikt worden om de selectie te limiteren 
binnen een gegeven tijdperiode. Alle variabelen hieronder moeten ingesteld 
worden in YYYY-MM-DD HH:MM:SS formaat.

* before-time: matcht alleen de date conditie voor deze tijd;
* after-time: matcht alleen de date conditie na deze tijd;
* before-mutation: tijdverschil voor de date conditie;
* after-mutation: tijdverschil na de date conditie.

Je kunt in het volgende formaat de waarde voor de 'time' properties meegeven:

```text
'YYYY-MM-DD HH:MM:SS'
'2017-01-01 00:00:00'
```

De 'mutation' properties accepteren voor de value de volgende stringvolgorde:

```text
'["plus/minus", "YYYY-MM-DD", "HH:MM:SS"]'
'["plus", "2017-01-01", "05:43:21"]'
```

## Voorbeeld in PHP

We kijken hier naar een datum in de database in combinatie met een 
after-mutation. Als de datum binnen de after-mutation valt geldt deze conditie.

```php
// vereiste module
require_once("copernica_rest_api.php");

// maak een API object met je eigen token
$api = new CopernicaRestAPI("your-access-token", 3);

$data = array(
    // selecteer date conditie
    'type' => 'Date',

    // gebruik tijdsinterval
    'before-time' => '2018-01-01 00:00:00',

    // gebruik mutatie interval (overschrijft before-time/after-time)
    'after-mutation' => '["plus","2016-01-01", "7:34:23"]',
);

// voer het verzoek uit
$result = $api->post("rule/{$regelID}/conditions", $data);

// print het resultaat
print_r($result);
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
* [Conditie type change](rest-condition-type-change)
* [Conditie type doublefield](rest-condition-type-doublefield)
* [Conditie type email](rest-condition-type-email)
* [Conditie type export](rest-condition-type-export)
* [Conditie type fax](rest-condition-type-fax)
* [Conditie type field](rest-condition-type-field)
* [Conditie type interest](rest-condition-type-interest)
* [Conditie type lastcontact](rest-condition-type-lastcontact)
* [Conditie type miniview](rest-condition-type-miniview)
* [Conditie type part](rest-condition-type-part)
* [Conditie type referview](rest-condition-type-referview)
* [Conditie type sms](rest-condition-type-sms)
* [Conditie type survey](rest-condition-type-survey)
* [Conditie type todo](rest-condition-type-todo)
