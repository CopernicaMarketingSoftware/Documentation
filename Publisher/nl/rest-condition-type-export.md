# Export condition

Je kunt gebruik maken van een Export condition, door een property ("type")
en een value ("Export") op te geven. Daarna ben je in staat om de 
eigenschappen naar wens op te geven. In de onderstaande tabel vind je alle 
eigenschappen van de Email condition en een voorbeeld van een request.


## Individuele eigenschappen

* include-never-exported-profiles: een boolean value om aan te geven of 
profielen die niet eerder zijn geëxporteerd, alsnog meengenomen moeten 
worden.


## Toevoegen van een datum

Voor deze conditie kun je ook een datum toevoegen, zodat je weet wanneer de
conditie is aangemaakt of geüpdatet. Deze datums kun je op de volgende manier
meegeven aan de POST request:

* before-time:          matcht alleen de Export condition voor deze tijd;
* after-time:           matcht alleen de Export condition na deze tijd;
* before-mutation:      tijdverschil voor de Export condition;
* after-mutation:       tijdverschil na de Export condition.


## Voorbeeld

Je kunt ook selecteren op profielen die je voor een bepaalde dag een keer 
hebt geëxporteerd. Hieronder is weergegeven hoe je zo'n scenario vertaald
naar daadwerkelijke code.

```php
// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!
$api = new CopernicaRestApi("my-access-token");

$data = array(

// declare that you want to use the Export type
'type' => 'Export',

// use property
'include-never-exported-profiles' => true,

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
