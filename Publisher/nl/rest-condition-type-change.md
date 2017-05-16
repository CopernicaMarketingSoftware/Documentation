# Change conditions

Je kunt gebruik maken van een change condition,
door een property ("type") en een value ("Change")
op te geven. Daarna ben je in staat om de conditie 
naar wens op te geven. In de onderstaande tabel 
vind je alle condities en een voorbeeld van een request.

| Change type          | Omschrijving                     |
|----------------------|----------------------------------|
| any                  | Elke verandering                 |
| none                 | Geen verandering                 |
| field                | Veld waarde veranderd            |
| nofield              | Veld waarde onveranderd          |
| new                  | Profiel werd aangemaakt          |
| notnew               | Profiel werd niet aangemaakt     |
| edit                 | Profiel werd aangepast           |
| noedit               | Profiel werd niet aangepast      |
| newsubprofile        | Nieuw subprofiel aangemaakt      |
| nonewsubprofile      | Geen nieuw subprofiel aangemaakt |
| editsubprofile       | Subprofiel werd veranderd        |
| noeditsubprofile     | Subprofiel werd niet veranderd   |
| removesubprofile     | Subprofiel werd verwijderd       |
| noremovesubprofile   | Subprofiel werd niet verwijderd  |
| interest             | Interesses veranderd             |
| gotinterest          | Nieuwe interesse toegevoegd      |
| lostinterest         | Interesse verloren               |


## Voorbeeld 

```php
// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // declare that you want to use the change type
    'type' => 'Change',
    // then you use the condition
    'change-type' => 'any'
);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

## Toevoegen van een datum

Voor deze conditie kun je ook een datum toevoegen, zodat je weet wanneer de
conditie is aangemaakt of geüpdatet. Deze datums kun je op de volgende manier
meegeven aan de POST request:

* before-time: 			matcht alleen de change conditie voor deze tijd;
* after-time: 			matcht alleen de change conditie na deze tijd;
* before-mutation: 		tijdverschil voor de change conditie;
* after-mutation: 		tijdverschil na de change conditie.

```text
De 'time' properties accepteren voor de value de volgende stringvolgorde:
'YYYY-MM-DD HH:MM:SS'
'201701-01 00:00:00'

De 'mutation' properties accepteren voor de value de volgende stringvolgorde:
'["plus/minus", "YYYY-MM-DD", "HH:MM:SS"]'
'["plus", "2017-01-01", "05:43:21"]'
```

## Meer informatie

* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)