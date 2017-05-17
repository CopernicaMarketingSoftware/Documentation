# Part condition

Je kunt gebruik maken van een Part condition, door een property ("type")
en een value ("Part") op te geven. Daarna ben je in staat om de 
eigenschappen naar wens op te geven. In de onderstaande tabel vind je alle 
eigenschappen van de Part condition en een voorbeeld van een request.


## Individuele eigenschappen

* begin: 			het eerst geselecteerde profiel als een getal of percentage. Je kunt hier een negatieve waarde gebruiken om vanaf het eind te beginnen met tellen.
* length: 			het aantal geselecteerde profielen als getal of percentage. 
* fields: 			alle velden gebruikt in deze conditie.


## Voorbeeld

Met de Part condition kun je gemakkelijk een gedeelte van een selectie bekijken 
die een bepaalde veldwaarde hebben. 


```php
// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

$data = array(

// declare that you want to use the Part type
'type' => 'Part',

// use properties
'begin' => '54',
'length' => '20',
'fields' => 'dog_owner',

);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

## Meer informatie

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)