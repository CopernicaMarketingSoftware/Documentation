# MiniView condition

Je kunt gebruik maken van een MiniView condition, door een property ("type")
en een value ("MiniView") op te geven. Daarna ben je in staat om de 
eigenschappen naar wens op te geven. In de onderstaande tabel vind je alle 
eigenschappen van de MiniView condition en een voorbeeld van een request.


## Individuele eigenschappen

* mini-view:                    miniview geassocieerd met de conditie
* min-subprofiles:              minimum hoeveelheid subprofielen in de miniview
* max-subprofiles:              maximum hoevelheid subprofielen in de miniview


## Voorbeeld

Het is mogelijk om meerdere miniviews te combineren als we er te veel hebben. 
Om te checken of een miniview klein genoeg is kunnen we max-subprofiles naar
het maximum aantal subprofielen in de miniview zetten

```php
// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

$data = array(

    // declare that you want to use the MiniView type
    'type' => 'MiniView',

    // use property mini-view to get 
    'max-subprofiles' => '14'

);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

## Meer informatie

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
* [ReferView condition](rest-condition-type-referview)