DoubleField condition

Om gebruik te maken van de doublefield condition moet je 
ervoor zorgen dat je gebruik maakt van de 'DoubleField' value
bij de 'type' property. Daarna ben je in staat om de 
conditie naar wens op te geven. Je kunt, na het opgeven
van de type, uit twee eigenschappen kiezen:

* match-mode: matcht modus van de doublefield conditie. Zie de match mode tabel.
* fields: de combinatie van velden die gecheckt moet worden.

In de onderstaande tabel vind je alle condities voor de match mode en een voorbeeld 
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

Laten we zeggen dat we alleen de mensen willen selecteren met een unieke naam. 
We kunnen deze selectie maken door de velden voor de voornaam en achternaam te 
bekijken met de juiste matchmode. Om deze mensen te omschrijven kunnen we de volgende 
waarden gebruiken:

```php

// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

    $data = array(
    // declare that you want to use the doublefiel type
    'type' => 'DoubleField',

    // use match-mode with desired value
    'match-mode' => 'match_unique_profiles',

    // and select from which field
    'fields' => '[voornaam, achternaam]',
);

// do the call
$result = $api->get("rule/1234/conditions", $data);

// print the result
print_r($result);
```

## Meer informatie

* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
* [Conditie type veld](rest-condition-type-field)