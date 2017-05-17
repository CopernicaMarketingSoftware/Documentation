# E-mail condition

Je kunt gebruik maken van een e-mail condition, door een property ("type")
en een value ("Email") op te geven. Daarna ben je in staat om de 
eigenschappen naar wens op te geven. In de onderstaande tabel vind je alle 
eigenschappen van de Email condition en een voorbeeld van een request.


## E-mail condition eigenschappen

* match-mode:                 match mode van de mailing conditie. Zie match modus tabel;
* required-destination:       bestemming van de mailing. Mogelijke waarden:

"profile"; <br>
"subprofile"; <br>
"anything" als beide mag.

* document:                   naam van het document gebruikt voor matchmode. (Alleen bij "match_profiles_that_received_document", "match_profiles_that_received_not_document");
* template:                   naam van de template van de conditie;
* number:                     het aantal berichten dat door de ontvanger moeten zijn ontvangen;
* operator:                   de operator om het aantal berichten van de ontvanger met de waarde van number te vergelijken. Ondersteunde operatoren: <br>

= (gelijk); <br>
\!= (niet gelijk); <br>
<\> (tussen); <br>
< (minder dan); <br>
\> (meer dan). 


## Match modes

Je kunt, net zoals bij de [DoubleField](rest-condition-type-doublefield) conditie, 
gebruik maken van match modes. Hiermee kun je gemakkelijk segmenteren op bepaalde 
uitkomsten van je verstuurde e-mails. In de onderstaande tabel vind je alle mogelijke 
match modes.


| Match modes                               | Omschrijving                                                           |
|-------------------------------------------|------------------------------------------------------------------------|
| match_profiles_that_received_something    | Match alle profielen die iets ontvangen hebben.                        |
| match_profiles_that_received_document     | Match alle profielen die een specifiek document ontvangen hebben.      |
| match_profiles_that_received_nothing      | Match alle profielen die niets ontvangen hebben.                       |
| match_profiles_that_received_not_document | Match alle profielen die niet een specifiek document ontvangen hebben. |


## Individuele eigenschappen

* required-result: het resultaat van een e-mail. Zie ook de required result tabel;
* clicked-url: gespecificeerde URL voor de required-result die in dit geval op "clickonurl" staat;
* required-errors: error codes om te gebruiken met "error" als required-result. Mogelijke waarden: 

```text
"mailmessage", "unreachable", "nocontent", "nohost", "nodata", "privateiprange", "other", "temp" 
voor een tijdelijke error en "final" voor een onoplosbare error.
```

## Required results

De volgende tabel bevat de mogelijke waarden voor het required result en 
hun omschrijvingen.

| Required result | Omschrijving                                      |
|-----------------|---------------------------------------------------|
| nocheck         | Check alleen of document verstuurd is.            |
| view            | Pageview moet geregistreerd zijn.                 |
| viewnoclick     | Pageview geregistreerd, maar geen klik.           |
| anyclick        | Klik op URL moet geregistreerd zijn.              |
| clickonurl      | Klik op specifieke URL moet zijn geregistreerd.   |
| noclick         | Geen klik geregistreerd.                          |
| error           | Error bericht moet ontvangen zijn.                |
| noerror         | Er mogen geen errors geregistreerd zijn.          |
| abuse           | Misbruik moet zijn geregistreerd.                 |
| noabuse         | Er mag geen misbruik zijn geregistreerd.          |
| nothing         | Er is geen resultaat geregistreerd.               |
| anything        | Er is een, welk dan ook, resultaat geregistreerd. |


## Toevoegen van een datum

Voor deze condition kun je ook een datum toevoegen, zodat je weet wanneer de
condition is aangemaakt of geüpdatet. Deze datums kun je op de volgende manier
meegeven aan de POST request:

* before-time:          matcht alleen de Email condition voor deze tijd;
* after-time:           matcht alleen de Email condition na deze tijd;
* before-mutation:      tijdverschil voor de Email condition;
* after-mutation:       tijdverschil na de Email condition.

```text
De 'time' properties accepteren voor de value de volgende stringvolgorde:
'YYYY-MM-DD HH:MM:SS'
'201701-01 00:00:00'

De 'mutation' properties accepteren voor de value de volgende stringvolgorde:
'["plus/minus", "YYYY-MM-DD", "HH:MM:SS"]'
'["plus", "2017-01-01", "05:43:21"]'
```


## Voorbeeld

Je kunt met bovenstaande eigenschappen op een hele geavanceerde manier selecties maken.
Stel dat je een aparte selectie wilt aanmaken voor klanten die je e-mails ontvangen. 
Een e-mail kan wel of niet aankomen en dat wil je graag na kunnen gaan. Je doet dit
door de property "required-result" te combineren met de values "error" of "noerror". 

Je kunt ook een selectie aanmaken voor mensen die op een specifieke URL 
hebben geklikt. Zo kun je bijvoorbeeld, als de URL naar een product linkt, 
later nog een e-mail sturen met meer informatie over dit product. Zo verhoog 
je de kans dat je klanten uiteindelijk een aankoop doen. 

```php
// required code
require_once("copernica_rest_api.php");

// create an API object (add your own access token!)
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // declare that you want to use the Email condition type
    'type' => 'Email',
    // then you set the property of choice
    'required-result' => 'clickonurl',
    // and in this case the required URL
    'required-url' => 'wwww.example.com',

    // you could also choose to use the match mode
    'match-mode' => 'match_profiles_that_received_something'
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
* [Sms condition](rest-condition-type-sms)
* [Fax condition](rest-condition-type-fax)