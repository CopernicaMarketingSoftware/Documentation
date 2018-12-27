# REST condities: DoubleField

Condities zijn kleinere onderdelen van regels. Er hoeft maar aan een 
conditie van een regel te worden voldaan om aan de regel te voldoen. 
Elke conditie heeft specifieke eigenschappen.

Dit artikel gaat over de **doublefield** conditie. Als je op zoek bent 
naar andere type condities kun je deze vinden onder het kopje *Meer informatie*.

## Eigenschappen

Voor deze conditie zijn de volgende parameters beschikbaar:

* match-mode: matcht modus van de DoubleField conditie. Zie de match mode tabel.
* fields: de combinatie van velden die gecheckt moet worden.

In de onderstaande tabel vind je alle mogelijke match modes.

| Match mode                   | Omschrijving                                         |
|------------------------------|------------------------------------------------------|
| match_unique_profiles        | Matcht alle unieke profielen                         |
| match_non_unique_profiles    | Matcht alle niet unieke profielen                    |
| match_repeated_profiles      | Matcht alle profielen die eerder voorkwamen          |
| match_non_repeated_profiles  | Matcht alle profielen die niet eerder voorkwamen     |
| match_last_profiles          | Matcht alle profielen die later niet voorkomen       |
| match_toberepeated_profiles  | Matcht alle profielen die ook voorkomen een hoger ID |

## Voorbeeld

Stel dat je uit een database alleen de mensen wilt selecteren met een unieke naam. 
Je kunt dit doen door een selectie te maken van de voor- en achternaam velden. Vervolgens
match je deze twee velden door middel van de matchmode. Hieronder zie je precies hoe dat 
werkt.

```php
// vereiste module
require_once("copernica_rest_api.php");

// maak een API object met je eigen token
$api = new CopernicaRestAPI("your-access-token", 2);

$data = array(
    // selecteer doublefield conditie
    'type' => 'DoubleField',

    // gebruik matchmode
    'match-mode' => 'match_unique_profiles',

    // selecteer velden voor matchmode
    'fields' => '[voornaam, achternaam]',
);

// voer het verzoek uit
$result = $api->post("rule/{$regelID}/conditions", $data);

// print het resultaat
print_r($result);
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
* [Conditie type change](rest-condition-type-change)
* [Conditie type date](rest-condition-type-date)
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
