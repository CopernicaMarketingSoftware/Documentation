# ToDo condition

Je kunt gebruik maken van een ToDo condition, door een property ("type")
en een value ("ToDo") op te geven. Daarna ben je in staat om de 
eigenschappen naar wens op te geven. In de onderstaande tabel vind je alle 
eigenschappen van de ToDo condition en een voorbeeld van een request.


## Individuele eigenschappen

* match-type:               match type van het laatste contact. Mogelijke waarden: <br>
"match_intelligent"; <br>
"match_exact".

* match-mode:               matchmode van de lastcontactconditie. Mogelijke waarden: <br>
"match_contacted_profiles"; <br>
"match_not_contacted_profiles". 

* contact-type:             het type contact of geen contact. Mogelijke waarden: <br>
PxPomContactType; <br>
"false".

* min-closed:               minimum hoeveelheid items vereist op de todo lijst;
* max-closed:               maximum hoeveelheid items vereist op de todo lijst;
* user:                     gebruiker van de conditie (PxPomUser), of "false" als er geen selectie nodig is;
* priority:                 vraag prioriteit van geselecteerde todo's op;
* contains:                 zoek string voor het doorzoeken van todo's.


## Toevoegen van een datum

Voor deze condition kun je ook een datum toevoegen, zodat je weet wanneer de
condition is aangemaakt of geüpdatet. Deze datums kun je op de volgende manier
meegeven aan de POST request:

* before-time:              matcht alleen de Sms condition voor deze tijd;
* after-time:               matcht alleen de Sms condition na deze tijd;
* before-mutation:          tijdverschil voor de Sms condition;
* after-mutation:           tijdverschil na de Sms condition.

```text
De 'time' properties accepteren voor de value de volgende stringvolgorde:
'YYYY-MM-DD HH:MM:SS'
'2017-01-01 00:00:00'

De 'mutation' properties accepteren voor de value de volgende stringvolgorde:
'["plus/minus", "YYYY-MM-DD", "HH:MM:SS"]'
'["plus", "2017-01-01", "05:43:21"]'
```

## Voorbeeld

Stel dat je een update hebt uitgebracht voor je software en je klanten daarover 
wilt informeren. Het document voor de e-mail was nog niet klaar, maar je had er 
wel todo's voor aangemaakt. Het document is nu klaar en je wilt een selectie maken 
met de todo's. Je kunt dit doen met de todo condition met de volgende waarden:

* match_type:               "match_intelligent";
* contains:                 naam van document.

Met het gebruik van "match_intelligent" voorkom je dat documenten niet 
gevonden worden door typo's of gespreide woorden.

```php
// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

$data = array(

    // declare that you want to use the ToDo type
    'type' => 'ToDo',

    // use property match-type and contains  
    'match_type' => 'match_intelligent',
    'contains' => 'document name'
);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

## Meer informatie

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
* [LastContact condition](rest-condition-type-lastcontact)
