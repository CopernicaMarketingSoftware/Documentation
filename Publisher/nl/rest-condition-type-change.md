# Change conditions

Je kunt gebruik maken van een change condition,
door een property ("type") en een value ("Change")
op te geven. Daarna ben je in staat om de condition 
naar wens op te geven. In de onderstaande tabel 
vind je alle condities en een voorbeeld van een request.

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


## Toevoegen van een datum

Voor deze condition kun je ook een datum toevoegen, zodat je weet wanneer de
condition is aangemaakt of geüpdatet. Deze datums kun je op de volgende manier
meegeven aan de POST request:

* before-time: 			matcht alleen de change condition voor deze tijd;
* after-time: 			matcht alleen de change condition na deze tijd;
* before-mutation: 		tijdverschil voor de change condition;
* after-mutation: 		tijdverschil na de change condition.

```text
De 'time' properties accepteren voor de value de volgende stringvolgorde:
'YYYY-MM-DD HH:MM:SS'
'2017-01-01 00:00:00'

De 'mutation' properties accepteren voor de value de volgende stringvolgorde:
'["plus/minus", "YYYY-MM-DD", "HH:MM:SS"]'
'["plus", "2017-01-01", "05:43:21"]'
```


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

Dit voorbeeld vereist de [REST API class](./rest-php).


## Meer informatie

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)