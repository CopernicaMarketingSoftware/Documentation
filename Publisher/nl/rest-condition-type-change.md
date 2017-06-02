# REST condities: Change

Condities zijn kleinere onderdelen van regels. Er hoeft maar aan een 
conditie van een regel te worden voldaan om aan de regel te voldoen. 
Elke conditie heeft specifieke eigenschappen.

Dit artikel gaat over de **change** conditie. Als je op zoek bent 
naar andere type condities kun je deze vinden onder het kopje *Meer informatie*.

## Change types

Er zijn verschillende soorten veranderingen die kunnen voorkomen in je 
database. Daarom kun je bij de change conditie een type en een waarde 
opgeven. In de onderstaande tabel vindt je de soorten veranderingen 
die gebruikt kunnen worden voor de conditie.

| Change type          | Omschrijving                     |
|----------------------|----------------------------------|
| any                  | elke verandering                 |
| none                 | geen verandering                 |
| field                | field waarde veranderd           |
| nofield              | field waarde onveranderd         |
| new                  | profile werd aangemaakt          |
| notnew               | profile werd niet aangemaakt     |
| edit                 | profile werd aangepast           |
| noedit               | profile werd niet aangepast      |
| newsubprofile        | nieuw subprofile aangemaakt      |
| nonewsubprofile      | geen nieuw subprofile aangemaakt |
| editsubprofile       | subprofile werd veranderd        |
| noeditsubprofile     | subprofile werd niet veranderd   |
| removesubprofile     | subprofile werd verwijderd       |
| noremovesubprofile   | subprofile werd niet verwijderd  |
| interest             | interest veranderd               |
| gotinterest          | nieuwe interest toegevoegd       |
| lostinterest         | interest verloren                |

## Change per tijdsinterval

Voor deze conditie kun je ook een datum toevoegen, zodat je weet wanneer de
conditie is aangemaakt of geüpdatet. Je kunt tijd op de volgende manieren 
gebruiken:

* before-time: 			matcht alleen de change condition voor deze tijd;
* after-time: 			matcht alleen de change condition na deze tijd;
* before-mutation: 		tijdverschil voor de change condition;
* after-mutation: 		tijdverschil na de change condition.

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

```php
// vereiste module
require_once("copernica_rest_api.php");

// maak een API object met je eigen token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // selecteer email conditie
    'type' => 'Change',
    // selecteer gewenste eigenschappen
    'change-type' => 'any'
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
* [Conditie type date](rest-condition-type-date)
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
