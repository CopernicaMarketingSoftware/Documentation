# REST condities: Fax

Waarschuwing: Je bekijkt nu het overzicht voor de oude versie van onze 
API. Wij raden aan om [versie 2](../restv2/rest-api.md) van de API te gebruiken.

Condities zijn kleinere onderdelen van regels. Er hoeft maar aan een 
conditie van een regel te worden voldaan om aan de regel te voldoen. 
Elke conditie heeft specifieke eigenschappen.

Dit artikel gaat over de **fax** conditie. Als je op zoek bent 
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

## Fax per tijdsinterval

Voor deze conditie kun je ook een datum toevoegen, zodat je weet wanneer de
conditie is aangemaakt of geüpdatet. Deze datums kun je op de volgende manier
meegeven aan de POST request:

* before-time:          matcht alleen de Fax conditie voor deze tijd;
* after-time:           matcht alleen de Fax conditie na deze tijd;
* before-mutation:      tijdverschil voor de Fax conditie;
* after-mutation:       tijdverschil na de Fax conditie.

```text
'YYYY-MM-DD HH:MM:SS'
'2017-01-01 00:00:00'
```

De 'mutation' properties accepteren voor de value de volgende stringvolgorde:

```text
'["plus/minus", "YYYY-MM-DD", "HH:MM:SS"]'
'["plus", "2017-01-01", "05:43:21"]'
```

## Voorbeelden

Met de fax conditie kun je een selectie maken van mensen die meer dan 
10 berichten hebben ontvangen in de laatste twee maanden, zodat je niet 
te veel berichten verstuurt naar dezelfde persoon. Zo voorkom je dat je 
als verstuurder van spam wordt geregistreerd. De volgende conditie geldt 
als dit het geval is:

```php
// vereiste module
require_once("copernica_rest_api.php");

// maak een API object met je eigen token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // selecteer fax conditie
    'type' => 'Fax',

    // gebruik tijdsinterval
    'after-time' => '2017-01-01 00:00:00',

    // stel nummer in
    'number' => '10',

    // stel operator in
    'operator' => '>'

    // gebruik matchmode
    'match-mode' => 'match_profiles_that_received_nothing',
);

// voer het verzoek uit
$result = $api->post("rule/id/conditions", $data);

// print het resultaat
print_r($result);
```

Dit voorbeeld vereist de [REST API class](./rest-php).

## Meer informatie

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
* [Conditie type change](rest-condition-type-change)
* [Conditie type date](rest-condition-type-date)
* [Conditie type doublefield](rest-condition-type-doublefield)
* [Conditie type email](rest-condition-type-email)
* [Conditie type export](rest-condition-type-export)
* [Conditie type field](rest-condition-type-field)
* [Conditie type interest](rest-condition-type-interest)
* [Conditie type lastcontact](rest-condition-type-lastcontact)
* [Conditie type miniview](rest-condition-type-miniview)
* [Conditie type part](rest-condition-type-part)
* [Conditie type referview](rest-condition-type-referview)
* [Conditie type sms](rest-condition-type-sms)
* [Conditie type survey](rest-condition-type-survey)
* [Conditie type todo](rest-condition-type-todo)
