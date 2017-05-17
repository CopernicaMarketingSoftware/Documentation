# Interest condition

Je kunt gebruik maken van een Interest condition, door een property ("type")
en een value ("Interest") op te geven. Daarna ben je in staat om de 
eigenschappen naar wens op te geven. In de onderstaande tabel vind je alle 
eigenschappen van de Interest condition en een voorbeeld van een request.


## Individuele eigenschappen

* match-mode: 		matchmode van de interest condition. Zie de match-mode tabel.
* interest: 		interesse voor de condition. Dit geeft alleen een valide waarde terug als de match-mode staat op "match_profiles_with_interest" of "match_profiles_without_interest".
* interest-group: 	interessegroep van de condition. Dit geeft alleen een valide waarde terug als de **match-mode** staat op "match_profiles_with_interestgroup" of "match_profiles_without_interestgroup".


## Match Modes

De volgende tabel bevat de mogelijke waarden voor de match mode en hun
omschrijvingen.

| Match mode                           | Omschrijving                                  |
|--------------------------------------|-----------------------------------------------|
|match_profiles_with_interest          | Match alleen profielen met interesse          |
|match_profiles_without_interest       | Match alleen profielen zonder deze interesse  |
|match_profiles_with_interest_group    | Match alleen profielen met interesse groep    |
|match_profiles_without_interestgroup  | Match alleen profielen zonder interesse groep |


## Voorbeeld

Stel dat een sportwinkel een e-mail wilt versturen naar alle klanten die tennis spelen. 
Hiervoor moet tennis wel als interesse in de database zijn aangemaakt. In dit geval kun 
je op een hele effectieve manier je marketing inzetten, want je weet precies welke
interesses je klant heeft. In onderstaand voorbeeld zie je precies hoe je zo'n selectie
kunt maken.

```php
// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

$data = array(

// declare that you want to use the Interest type
'type' => 'Interest',

// use property match-mode
'match-mode' => 'match_profiles_with_interest'

);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

## Meer informatie

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
* [Field condition](rest-condition-type-field)