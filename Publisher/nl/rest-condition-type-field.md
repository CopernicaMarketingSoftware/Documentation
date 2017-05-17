# Field condition

Je kunt gebruik maken van een e-mail condition, door een property ("type")
en een value ("Field") op te geven. Daarna ben je in staat om de 
eigenschappen naar wens op te geven. In de onderstaande tabel vind je alle 
eigenschappen van de Field condition en een voorbeeld van een request.


## Individuele eigenschappen

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
een selectie te maken op de ouders. Je doet dit met de field condition. 

```php
// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

$data = array(

// declare that you want to use the Field type
'type' => 'Field',

// use property field and check to see wether it is true
'field' => 'has_children',
'value' => 'yes',

);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

Dit voorbeeld vereist de [REST API class](./rest-php).


## Meer informatie

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
* [Interest condition](rest-condition-type-interest)