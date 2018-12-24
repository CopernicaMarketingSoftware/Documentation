# REST condities: Survey

Condities zijn kleinere onderdelen van regels. Er hoeft maar aan een 
conditie van een regel te worden voldaan om aan de regel te voldoen. 
Elke conditie heeft specifieke eigenschappen.

Dit artikel gaat over de **survey** conditie. Als je op zoek bent 
naar andere type condities kun je deze vinden onder het kopje *Meer informatie*.

## Eigenschappen

Voor deze conditie zijn de volgende parameters beschikbaar:

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

## Surveys per tijdsinterval

Voor deze conditie kun je ook een datum toevoegen, zodat je weet wanneer de
conditie is aangemaakt of geüpdatet. Deze datums kun je op de volgende manier
meegeven aan de POST request:

* before-time:          matcht alleen de survey conditie voor deze tijd;
* after-time:           matcht alleen de survey conditie na deze tijd;
* before-mutation:      tijdverschil voor de survey conditie;
* after-mutation:       tijdverschil na de survey conditie.

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
maken met de survey conditie van de mensen die je een reminder wilt sturen. 

```php
// vereiste module
require_once("copernica_rest_api.php");

// maak een API object met je eigen token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // selecteer survey conditie
    'type' => 'Survey',

    // stel survey naam in
    'survey-name' => 'survey x',
    
    // stel submitter in
    // (none = niet ingevuld!)
    'submitter' => 'none'
);

// voer het verzoek uit
$result = $api->post("rule/{$regelID}/conditions", $data);

// print het resultaat
print_r($result);
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [GET rule condities](rest-get-rule-conditions)
* [POST rule condities](rest-post-rule-conditions)
* [Conditie type change](rest-condition-type-change)
* [Conditie type date](rest-condition-type-date)
* [Conditie type doublefield](rest-condition-type-doublefield)
* [Conditie type email](rest-condition-type-email)
* [Conditie type export](rest-condition-type-export)
* [Conditie type fax](rest-condition-type-fax)
* [Conditie type field](rest-condition-type-field)
* [Conditie type interest](rest-condition-type-interest)
* [Conditie type lastcontact](rest-condition-type-lastcontact)
* [Conditie type miniview](rest-condition-type-miniview)
* [Conditie type part](rest-condition-type-part)
* [Conditie type referview](rest-condition-type-referview)
* [Conditie type sms](rest-condition-type-sms)
* [Conditie type todo](rest-condition-type-todo)
