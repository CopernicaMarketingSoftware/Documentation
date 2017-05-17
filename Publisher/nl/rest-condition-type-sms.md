# Sms condition

Je kunt gebruik maken van een Sms condition, door een property ("type")
en een value ("Sms") op te geven. Daarna ben je in staat om de 
eigenschappen naar wens op te geven. In de onderstaande tabel vind je alle 
eigenschappen van de Sms condition en een voorbeeld van een request.


## Individuele eigenschappen

* match-mode:               matchmode van de mailing conditie. Zie matchmode tabel.
* required-destination:     bestemming van de mailing. Mogelijke waarden: 
"profile"; <br>
"subprofile"; <br>
"anything" als beide mag.

* document:                 naam van het document gebruikt voor matchmode. (Alleen bij
"match_profiles_that_received_document", "match_profiles_that_received_not_document")
* template:                 naam van de template van de conditie.
* number:                   het aantal berichten dat door de ontvanger moeten zijn ontvangen.
* operator:                 de operator om het aantal berichten van de ontvanger met de waarde van number te vergelijken. Ondersteunde operatoren:

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

Voor deze condition kun je ook een datum toevoegen, zodat je weet wanneer de
condition is aangemaakt of geüpdatet. Deze datums kun je op de volgende manier
meegeven aan de POST request:

* before-time:          matcht alleen de Sms condition voor deze tijd;
* after-time:           matcht alleen de Sms condition na deze tijd;
* before-mutation:      tijdverschil voor de Sms condition;
* after-mutation:       tijdverschil na de Sms condition.


## Voorbeeld


Stel dat bij een mailing per ongeluk een verkeerd document is verstuurd.
Het is daarom de bedoeling dat er snel een e-mail achteraan wordt gestuurd. 
Stel dat de originele selectie niet meer bestaat en dat we die niet meer
terug kunnen halen. In dat geval is er altijd nog de Sms condition, waarmee
toch nog naar een specifieke selectie e-mail kan worden verstuurd.

```php
// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

$data = array(

    // declare that you want to use the MiniView type
    'type' => 'Sms',

    // use property document 
    'document' => 'document x',
    'match-mode' => 'match_profiles_that_received_document'
);

// do the call
$result = $api->post("rule/id/conditions", $data);

// print the result
print_r($result);
```

## Meer informatie

* [GET rule conditions](rest-get-rule-conditions)
* [POST rule conditions](rest-post-rule-conditions)
* [Email condition](rest-condition-type-email)
* [Fax condition](rest-condition-type-fax)
