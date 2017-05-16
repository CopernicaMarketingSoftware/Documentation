# DoubleField condition

Je kunt gebruik maken van een change condition,
door een property ("type") en een value ("DoubleField")
op te geven. Daarna ben je in staat om de conditie 
naar wens op te geven. Je kunt, na het opgeven van 
de type, uit twee eigenschappen kiezen:

* match-mode: matcht modus van de DoubleField conditie. Zie de match mode tabel.
* fields: de combinatie van velden die gecheckt moet worden.

In de onderstaande tabel vind je alle mogelijke match modes en een voorbeeld 
van een request.

| Match mode                   | Omschrijving                                         |
|------------------------------|------------------------------------------------------|
| match_unique_profiles        | Matcht alle unieke profielen                         |
| match_non_unique_profiles    | Matcht alle niet unieke profielen                    |
| match_repeated_profiles      | Matcht alle profielen die eerder voorkwamen          |
| match_non_repeated_profiles  | Matcht alle profielen die niet eerder voorkwamen     |
| match_last_profiles          | Matcht alle profielen die later niet voorkomen       |
| match_toberepeated_profiles  | Matcht alle profielen die ook voorkomen een hoger ID |


## Voorbeeld

Stel dat je uit een database alleen de mensen wilt selecteren met een unieke naam. 
Je kunt dit doen door een selectie te maken van de voor- en achternaam velden. Vervolgens
match je deze twee velden door middel van de matchmode. Hieronder zie je precies hoe dat 
werkt.

```php

// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

$data = array(
// declare that you want to use the DoubleField type
'type' => 'DoubleField',

// use match-mode with desired value
'match-mode' => 'match_unique_profiles',

// and select from which field
'fields' => '[voornaam, achternaam]',
);

// do the call
$result = $api->get("rule/id/conditions", $data);

// print the result
print_r($result);
```

## Meer informatie

* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
* [Conditie type veld](rest-condition-type-field)