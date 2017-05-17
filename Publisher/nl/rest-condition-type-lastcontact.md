# LastContact condition

Je kunt gebruik maken van een LastContact condition, door een property ("type")
en een value ("LastContact") op te geven. Daarna ben je in staat om de
eigenschappen naar wens op te geven. In de onderstaande tabel vind je alle 
eigenschappen van de LastContact condition en een voorbeeld van een request.


## Individuele eigenschappen

* match-type:       match type van het laatste contact. Mogelijke waarden:
"match_intelligent"; <br>
"match_exact".

* match-mode:       matchmode van de lastcontactconditie. Mogelijke waarden: 
"match_contacted_profiles"; <br>
"match_not_contacted_profiles".

* contact-type:     het type contact of geen contact. Mogelijke waarden:
"PxPomContactType"; <br>
"false".

* min-closed:       minimum hoeveelheid items vereist op de contact lijst.
* max-closed:       maximum hoeveelheid items vereist op de contact lijst.
* user:             gebruiker van de conditie (PxPomUser), of "false" als er geen selectie nodig is.
* priority:         vraag prioriteit van geselecteerde contacten op.
* contains:         zoek string voor het doorzoeken van contact rapporten.


## Toevoegen van een datum

Voor deze condition kun je ook een datum toevoegen, zodat je weet wanneer de
condition is aangemaakt of geüpdatet. Deze datums kun je op de volgende manier
meegeven aan de POST request:

* before-time:          matcht alleen de change condition voor deze tijd;
* after-time:           matcht alleen de change condition na deze tijd;
* before-mutation:      tijdverschil voor de change condition;
* after-mutation:       tijdverschil na de change condition.

```text
De 'time' properties accepteren voor de value de volgende stringvolgorde:
'YYYY-MM-DD HH:MM:SS'
'2017-01-01 00:00:00'

De 'mutation' properties accepteren voor de value de volgende stringvolgorde:
'["plus/minus", "YYYY-MM-DD", "HH:MM:SS"]'
'["plus", "2017-01-01", "05:43:21"]'
```

## Voorbeeld

Het is ook mogelijk om een selectie te maken naar aanleiding van een contact moment.
Je kunt zo bijvoorbeeld testen of een werknemener zijn werk goed doet omtrent het
helpen van klanten. Hieronder is een zo'n scenario vertaald naar de daadwerkelijk 
conditie.

```php

// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

$data = array(

    // declare that you want to use the LastContact type
    'type' => 'LastContact',

    // use property match-mode
    'after-time' => '2016-12-11 00:34:56',
    'min-closed' => '3',
    'contains' => 'Bob' 
);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

## Meer informatie

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
* [ToDo condition](rest-condition-type-todo)