# Date conditions

Om gebruik te maken van de date condition moet je 
ervoor zorgen dat je gebruik maakt van de 'Date' value
bij de 'type' property. Daarna ben je in staat om de 
conditie naar wens op te geven. Hieronder is uiteengezet
van welke functionaliteiten je gebruik kunt maken. Ook is 
er een voorbeeld van een request gegeven.


## Datum eigenschappen

De datum eigenschappen kunnen gebruikt worden om de selectie te limiteren 
binnen een gegeven tijdperiode. Alle variabelen hieronder moeten ingesteld 
worden in YYYY-MM-DD HH:MM:SS formaat.

* before-time: matcht alleen de change conditie voor deze tijd;
* after-time: matcht alleen de change conditie na deze tijd;
* before-mutation: tijdverschil voor de change conditie;
* after-mutation: tijdverschil na de change conditie.

## Individuele eigenschappen

* field: het database veld van de date condition;
* compare-mode: vergelijk modus van de date condition.

*compare-mode kan de waarde 'full' of 'ignoreyear' hebben. Bij de eerste waarde
moet de hele datum matchen en bij de tweede waarde mag het jaar anders zijn.

## Voorbeeld

```php

// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

    $data = array(
    // declare that you want to use the date type
    'type' => 'Date',

    // use before-time or after-time
    'before-time' => '2018-01-01 00:00:00',

    // or use before-mutation or after-mutation (overwrites the before/after-time)
    'after-mutation' => '["plus","2016-01-01", "7:34:23"]',
);

// do the call
$result = $api->post("rule/1234/conditions", $data);

// print the result
print_r($result);
```


## Meer informatie

* [Regel condities opvragen](rest-get-rule-conditions)
* [Regel condities aanpassen](rest-post-rule-conditions)
* [Conditie type aanpassing](rest-condition-type-change)