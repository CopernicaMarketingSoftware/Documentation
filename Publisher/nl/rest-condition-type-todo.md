# REST condities: ToDo

Condities zijn kleinere onderdelen van regels. Er hoeft maar aan een 
conditie van een regel te worden voldaan om aan de regel te voldoen. 
Elke conditie heeft specifieke eigenschappen.

Dit artikel gaat over de **todo** conditie. Als je op zoek bent 
naar andere type condities kun je deze vinden onder het kopje *Meer informatie*.

## Eigenschappen

Voor deze conditie zijn de volgende parameters beschikbaar:

* match-type:               match type van het laatste contact. 
Mogelijke waarden: "match_intelligent", "match_exact".
* match-mode:               matchmode van de lastcontactconditie, zie matchmodus tabel;
* contact-type:             het type contact of geen contact.
Mogelijke waarden: PxPomContactType, "false";
* min-closed:               minimum hoeveelheid items vereist op de todo lijst;
* max-closed:               maximum hoeveelheid items vereist op de todo lijst;
* user:                     gebruiker van de conditie (PxPomUser), of "false" als er geen selectie nodig is;
* priority:                 vraag prioriteit van geselecteerde todo's op;
* contains:                 zoek string voor het doorzoeken van todo's.

In de onderstaande tabel vind je alle mogelijke match modes.

| Match modes                               | Omschrijving                                                           |
|-------------------------------------------|------------------------------------------------------------------------|
| match_profiles_that_received_something    | Match alle profielen die iets ontvangen hebben.                        |
| match_profiles_that_received_document     | Match alle profielen die een specifiek document ontvangen hebben.      |
| match_profiles_that_received_nothing      | Match alle profielen die niets ontvangen hebben.                       |
| match_profiles_that_received_not_document | Match alle profielen die niet een specifiek document ontvangen hebben. |

## ToDo per tijdsinterval

Voor deze conditie kun je ook een datum toevoegen, zodat je weet wanneer de
conditie is aangemaakt of geüpdatet. Deze datums kun je op de volgende manier
meegeven aan de POST request:

* before-time:              matcht alleen de todo conditie voor deze tijd;
* after-time:               matcht alleen de todo conditie na deze tijd;
* before-mutation:          tijdverschil voor de todo conditie;
* after-mutation:           tijdverschil na de todo conditie.

Je kunt in het volgende formaat de waarde voor de 'time' properties meegeven:

```text
'YYYY-MM-DD HH:MM:SS'
'2017-01-01 00:00:00'
```

De 'mutation' properties accepteren voor de value de volgende stringvolgorde:

```text
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
// vereiste module
require_once("copernica_rest_api.php");

// maak een API object met je eigen token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // selecteer todo conditie
    'type' => 'ToDo',

    // gebruikt matchtype 
    'match_type' => 'match_intelligent',
    
    // zoek op 'document naam'
    'contains' => 'document naam'
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
* [Conditie type survey](rest-condition-type-survey)
* [Conditie type todo](rest-condition-type-todo)
