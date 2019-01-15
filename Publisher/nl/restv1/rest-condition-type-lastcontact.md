# REST condities: LastContact

Waarschuwing: Je bekijkt nu het overzicht voor de oude versie van onze 
API. Wij raden aan om [versie 2](../restv2/rest-api.md) van de API te gebruiken.

Condities zijn kleinere onderdelen van regels. Er hoeft maar aan een 
conditie van een regel te worden voldaan om aan de regel te voldoen. 
Elke conditie heeft specifieke eigenschappen.

Dit artikel gaat over de **lastcontact** conditie. Als je op zoek bent 
naar andere type condities kun je deze vinden onder het kopje *Meer informatie*.

## Eigenschappen

* match-type:       match type van het laatste contact. Mogelijke waarden: 
"match_intelligent" of "match_exact".
* match-mode:       matchmode van de lastcontactconditie. Mogelijke waarden: 
"match_contacted_profiles", "match_not_contacted_profiles".
* contact-type:     het type contact of geen contact. Mogelijke waarden: 
"PxPomContactType", "false".
* min-closed:       minimum hoeveelheid items vereist op de contact lijst.
* max-closed:       maximum hoeveelheid items vereist op de contact lijst.
* user:             gebruiker van de conditie (PxPomUser), of "false" als er geen selectie nodig is.
* priority:         vraag prioriteit van geselecteerde contacten op.
* contains:         zoek string voor het doorzoeken van contact rapporten.

## LastContact per tijdsinterval

Voor deze conditie kun je ook een datum toevoegen, zodat je weet wanneer de
conditie is aangemaakt of geüpdatet. Deze datums kun je op de volgende manier
meegeven aan de POST request:

* before-time:          matcht alleen de lastcontact conditie voor deze tijd;
* after-time:           matcht alleen de lastcontact conditie na deze tijd;
* before-mutation:      tijdverschil voor de lastcontact conditie;
* after-mutation:       tijdverschil na de lastcontact conditie.

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

Het is ook mogelijk om een selectie te maken naar aanleiding van een contactmoment.
Je kunt zo bijvoorbeeld testen of een werknemer zijn werk goed doet omtrent het
helpen van klanten. Hieronder is een zo'n scenario vertaald naar de daadwerkelijk 
conditie.

```php
// vereiste module
require_once("copernica_rest_api.php");

// maak een API object met je eigen token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // selecteer lastcontact conditie
    'type' => 'LastContact',

    // gebruik tijdsinterval
    'after-time' => '2016-12-11 00:34:56',
    
    // stel minimum in
    'min-closed' => '3',
    
    // zoek 'Bob' in rapporten
    'contains' => 'Bob' 
);

// voer het verzoek uit
$result = $api->post("rule/id/conditions", $data);

// print het resultaat
print_r($result);
```

Dit voorbeeld vereist de [REST API class](./rest-php).

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
* [Conditie type miniview](rest-condition-type-miniview)
* [Conditie type part](rest-condition-type-part)
* [Conditie type referview](rest-condition-type-referview)
* [Conditie type sms](rest-condition-type-sms)
* [Conditie type survey](rest-condition-type-survey)
* [Conditie type todo](rest-condition-type-todo)
