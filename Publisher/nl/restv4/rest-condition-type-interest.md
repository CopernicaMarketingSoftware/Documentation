# REST condities: Interest

Condities zijn kleinere onderdelen van regels. Er hoeft maar aan een 
conditie van een regel te worden voldaan om aan de regel te voldoen. 
Elke conditie heeft specifieke eigenschappen.

Dit artikel gaat over de **interest** conditie. Als je op zoek bent 
naar andere type condities kun je deze vinden onder het kopje *Meer informatie*.

## Eigenschappen

Voor deze conditie zijn de volgende parameters beschikbaar:

* match-mode: 		matchmode van de interest conditie. Zie de match-mode tabel.
* interest: 		interesse voor de conditie. Dit geeft alleen een 
valide waarde terug als de match-mode staat op "match_profiles_with_interest", 
"match_profiles_without_interest".
* interest-group: 	interessegroep van de conditie. Dit geeft alleen 
een valide waarde terug als de match-mode staat op "match_profiles_with_interestgroup"
of "match_profiles_without_interestgroup".

In de onderstaande tabel vind je alle mogelijke match modes.

| Match mode                           | Omschrijving                                  |
|--------------------------------------|-----------------------------------------------|
|match_profiles_with_interest          | Match alleen profielen met interesse          |
|match_profiles_without_interest       | Match alleen profielen zonder deze interesse  |
|match_profiles_with_interest_group    | Match alleen profielen met interesse groep    |
|match_profiles_without_interestgroup  | Match alleen profielen zonder interesse groep |

## Voorbeeld in JSON

De volgende JSON demonstreert hoe je de API methode kunt gebruiken:

```json
{
    "type": "Interest",
    "match-mode": "match_profiles_with_interest",
    "interest": "tennis"
}
```

## Voorbeeld in PHP

Stel dat een sportwinkel een e-mail wilt versturen naar alle klanten die tennis spelen. 
Hiervoor moet tennis wel als interesse in de database zijn aangemaakt. In dit geval kun 
je op een hele effectieve manier je marketing inzetten, want je weet precies welke
interesses je klant heeft. In onderstaand voorbeeld laten we zien hoe je de conditie 
instelt, zodat je deze kunt gebruiken voor regels voor een selectie.

```php
// vereiste module
require_once("copernica_rest_api.php");

// maak een API object met je eigen token
$api = new CopernicaRestAPI("your-access-token", 4);

$data = array(
    // selecteer interest conditie
    'type' => 'Interest',

    // gebruik matchmode
    'match-mode' => 'match_profiles_with_interest',

    // selecteer interesse
    'interest' => 'tennis'
);

// voer het verzoek uit
$result = $api->post("rule/{$regelID}/conditions", $data);

// print het resultaat
print_r($result);
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
* [Conditie type change](rest-condition-type-change)
* [Conditie type date](rest-condition-type-date)
* [Conditie type doublefield](rest-condition-type-doublefield)
* [Conditie type email](rest-condition-type-email)
* [Conditie type export](rest-condition-type-export)
* [Conditie type fax](rest-condition-type-fax)
* [Conditie type field](rest-condition-type-field)
* [Conditie type lastcontact](rest-condition-type-lastcontact)
* [Conditie type miniview](rest-condition-type-miniview)
* [Conditie type part](rest-condition-type-part)
* [Conditie type referview](rest-condition-type-referview)
* [Conditie type sms](rest-condition-type-sms)
* [Conditie type survey](rest-condition-type-survey)
* [Conditie type todo](rest-condition-type-todo)
