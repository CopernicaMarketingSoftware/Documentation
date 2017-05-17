# ReferView condition

Je kunt gebruik maken van een ReferView condition, door een property ("type")
en een value ("ReferView") op te geven. Daarna ben je in staat om de 
eigenschappen naar wens op te geven. In de onderstaande tabel vind je alle 
eigenschappen van de ReferView condition en een voorbeeld van een request.


## Individuele eigenschappen

* refer-view: 			view waar de conditie naar verwijst.
* check-type: 			boolean value om aan te geven of een profiel zichtbaar moet zijn in de andere view. Mogelijke waarden: 
"yes"; <br>
"no".


## Voorbeeld

Je kunt deze condition gebruiken als je na wilt gaan of twee profielen geen
enkele overlap hebben.

```php

// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // declare that you want to use the Referview
    'type' => 'ReferView',

    // use the checktype to determine if you want to select other views
    'check-type' => 'no'
);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

Het is ook mogelijk om een overkoepelende view te maken, die juist wel 
uit de andere views selecteert. Je kunt dit doen door check-type op 
"yes" in plaats van "no" te zetten.


## Meer informatie

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
* [MiniView condition](rest-condition-type-miniview)
