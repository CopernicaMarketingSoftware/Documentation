# REST condities: SMS

Condities zijn kleinere onderdelen van regels. Er hoeft maar aan een 
conditie van een regel te worden voldaan om aan de regel te voldoen. 
Elke conditie heeft specifieke eigenschappen.

Dit artikel gaat over de **SMS** conditie. Als je op zoek bent 
naar andere type condities kun je deze vinden onder het kopje *Meer informatie*.

## Eigenschappen

Voor deze conditie zijn de volgende parameters beschikbaar:

* match-mode:                 match mode van de mailing conditie. Zie match modus tabel;
* required-destination:       bestemming van de mailing. Mogelijke waarden: "profile", "subprofile", "anything" (als beide mogen).
* document:                   naam van het document gebruikt voor matchmode. (Alleen bij "match_profiles_that_received_document", "match_profiles_that_received_not_document");
* template:                   naam van de template van de conditie;
* number:                     het aantal berichten dat door de ontvanger moeten zijn ontvangen;
* operator:                   de operator om het aantal berichten van de 
ontvanger met de waarde van number te vergelijken. Ondersteunde operatoren: 
= (gelijk), \!= (niet gelijk),<\> (tussen), < (minder dan), \> (meer dan). 

In de onderstaande tabel vind je alle mogelijke match modes.

| Match modus                               | Omschrijving                                                           |
|-------------------------------------------|------------------------------------------------------------------------|
| match_profiles_that_received_something    | Match alle profielen die iets ontvangen hebben.                        |
| match_profiles_that_received_document     | Match alle profielen die een specifiek document ontvangen hebben.      |
| match_profiles_that_received_nothing      | Match alle profielen die niets ontvangen hebben.                       |
| match_profiles_that_received_not_document | Match alle profielen die niet een specifiek document ontvangen hebben. |

## SMS per tijdsinterval

Voor deze conditie kun je ook een datum toevoegen, zodat je weet wanneer de
conditie is aangemaakt of geüpdatet. Deze datums kun je op de volgende manier
meegeven aan de POST request:

* before-time:          matcht alleen de SMS conditie voor deze tijd;
* after-time:           matcht alleen de SMS conditie na deze tijd;
* before-mutation:      tijdverschil voor de SMS conditie;
* after-mutation:       tijdverschil na de SMS conditie.

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

Stel dat bij een mailing per ongeluk een verkeerd document is verstuurd.
Het is daarom de bedoeling dat er snel een e-mail achteraan wordt gestuurd. 
Stel dat de originele selectie niet meer bestaat en dat we die niet meer
terug kunnen halen. In dat geval is er altijd nog de SMS conditie, waarmee
toch nog naar een specifieke selectie e-mail kan worden verstuurd.

```php
// vereiste module
require_once("copernica_rest_api.php");

// maak een API object met je eigen token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // selecteer sms conditie
    'type' => 'Sms',

    // stel document in
    'document' => 'document x',
    
    // gebruik matchmode
    'match-mode' => 'match_profiles_that_received_document'
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
* [Conditie type survey](rest-condition-type-survey)
* [Conditie type todo](rest-condition-type-todo)
