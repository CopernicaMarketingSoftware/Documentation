# Fax condition

Je kunt gebruik maken van een Fax condition, door een property ("type")
en een value ("Fax") op te geven. Daarna ben je in staat om de 
eigenschappen naar wens op te geven. In de onderstaande tabel vind je alle 
eigenschappen van de Fax condition en een voorbeeld van een request.


## Individuele eigenschappen

* match-mode: 					matchmode van de mailing condition. Zie matchmode tabel.
* required-destination: 		bestemming van de mailing. Mogelijke waarden:

"profile"; <br>
"subprofile"; <br>
"anything" als beide mag.

* document: 					naam van het document gebruikt voor matchmode. (Alleen bij "match_profiles_that_received_document", "match_profiles_that_received_not_document");
* template: 					naam van de template van de condition;
* number: 						het aantal berichten dat door de ontvanger moeten zijn ontvangen;
* operator: 					de operator om het aantal berichten van de ontvanger met de waarde van number te vergelijken. Ondersteunde operatoren:

= (gelijk); <br>
\!= (niet gelijk); <br>
<\> (tussen); <br>
< (minder dan); <br>
\> (meer dan).


## Match modes

| Match modus                               | Omschrijving                                                           |
|-------------------------------------------|------------------------------------------------------------------------|
| match_profiles_that_received_something    | Match alle profielen die iets ontvangen hebben.                        |
| match_profiles_that_received_document     | Match alle profielen die een specifiek document ontvangen hebben.      |
| match_profiles_that_received_nothing      | Match alle profielen die niets ontvangen hebben.                       |
| match_profiles_that_received_not_document | Match alle profielen die niet een specifiek document ontvangen hebben. |


## Toevoegen van een datum

Voor deze conditie kun je ook een datum toevoegen, zodat je weet wanneer de
conditie is aangemaakt of geüpdatet. Deze datums kun je op de volgende manier
meegeven aan de POST request:

* before-time:          matcht alleen de Fax condition voor deze tijd;
* after-time:           matcht alleen de Fax condition na deze tijd;
* before-mutation:      tijdverschil voor de Fax condition;
* after-mutation:       tijdverschil na de Fax condition.


## Voorbeelden

Met de fax condition kun je een selectie maken van mensen die meer dan 
10 berichten hebben ontvangen in de laatste twee maanden, zodat je niet 
te veel berichten verstuurt naar dezelfde persoon. Zo voorkom je dat je 
als verstuurder van spam wordt geregistreerd.  De waarden voor de selectie
zien er als volgt uit:

```php
// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

$data = array(
// declare that you want to use the Fax type
'type' => 'Fax',

// use the after-time property
'after-time' => '2017-01-01 00:00:00',

// set the number
'number' => '10',

// set the operator
'operator' => '>'


// use property
'match-mode' => 'match_profiles_that_received_nothing',
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
* [Email condition](rest-condition-type-email)
* [Sms condition](rest-condition-type-sms)
