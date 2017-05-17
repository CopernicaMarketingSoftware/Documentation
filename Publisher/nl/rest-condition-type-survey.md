# Survey condition

Je kunt gebruik maken van een Survey condition, door een property ("type")
en een value ("Survey") op te geven. Daarna ben je in staat om de 
eigenschappen naar wens op te geven. In de onderstaande tabel vind je alle 
eigenschappen van de Survey condition en een voorbeeld van een request.


## Individuele eigenschappen

* submitter:            vereiste submitter van de enquête. Zie de required submitters tabel.
* survey-name:          naam van enquête om indien-status te vergelijken.

## Required submitters

De volgende tabel bevat de mogelijke waarde voor **required submitters**  
en hun omschrijvingen.

| Required submitter | Omschrijving                                       |
|--------------------|----------------------------------------------------|
| profile            | Enquête moet ingediend zijn door een profiel.      |
| subprofile         | Enquête moet ingediend zijn door een subprofiel.   |
| anything           | Enquête mag ingediend zijn door profiel/subprofiel |
| none               | Enquête mag niet ingediend zijn.                   |
| noprofile          | Enquête werd niet ingediend door een profiel.      |
| nosubprofile       | Enquête werd niet ingediend door een subprofiel.   |


## Toevoegen van een datum

Voor deze condition kun je ook een datum toevoegen, zodat je weet wanneer de
condition is aangemaakt of geüpdatet. Deze datums kun je op de volgende manier
meegeven aan de POST request:

* before-time:          matcht alleen de Sms condition voor deze tijd;
* after-time:           matcht alleen de Sms condition na deze tijd;
* before-mutation:      tijdverschil voor de Sms condition;
* after-mutation:       tijdverschil na de Sms condition.

```text
De 'time' properties accepteren voor de value de volgende stringvolgorde:
'YYYY-MM-DD HH:MM:SS'
'2017-01-01 00:00:00'

De 'mutation' properties accepteren voor de value de volgende stringvolgorde:
'["plus/minus", "YYYY-MM-DD", "HH:MM:SS"]'
'["plus", "2017-01-01", "05:43:21"]'
```

## Voorbeeld

Stel dat je een belangrijke enquête hebt verstuurd, maar nog niet van alle 
profielen in je database een reactie hebt gekregen. Je kunt dan een selectie 
maken met de survey condition van de mensen die je een reminder wilt sturen. 


* survey-name:          enquête waarvoor je een reminder wilt versturen
* submitter:            "none"


```php
// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

$data = array(

    // declare that you want to use the MiniView type
    'type' => 'Survey',

    // use property for survey-name and submitter
    'survey-name' => 'survey x',
    'submitter' => 'none'

);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```


## Meer informatie

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)