# REST condities: Email

Condities zijn kleinere onderdelen van regels. Er hoeft maar aan een 
conditie van een regel te worden voldaan om aan de regel te voldoen. 
Elke conditie heeft specifieke eigenschappen.

Dit artikel gaat over de **date** conditie. Als je op zoek bent 
naar andere type condities kun je deze vinden onder het kopje *Meer informatie*.

## E-mail type

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
"mailmessage", "unreachable", "nocontent", "nohost", "nodata", "privateiprange", "other", "temp" 
voor een tijdelijke error en "final" voor een onoplosbare error.

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

## Email per tijdsinterval

Voor deze conditie kun je ook een datum toevoegen, zodat je weet wanneer de
conditie is aangemaakt of geüpdatet. Deze datums kun je op de volgende manier
meegeven aan de POST request:

* before-time:          matcht alleen de Email conditie voor deze tijd;
* after-time:           matcht alleen de Email conditie na deze tijd;
* before-mutation:      tijdverschil voor de Email conditie;
* after-mutation:       tijdverschil na de Email conditie.

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

Je kunt met bovenstaande eigenschappen op een hele geavanceerde manier selecties maken.
Stel dat je een aparte selectie wilt aanmaken voor klanten die je e-mails ontvangen. 
Een e-mail kan wel of niet aankomen en dat wil je graag na kunnen gaan. Je doet dit
door de property "required-result" te combineren met de values "error" of "noerror". 

Je kunt ook een selectie aanmaken voor mensen die op een specifieke URL 
hebben geklikt. Zo kun je bijvoorbeeld, als de URL naar een product linkt, 
later nog een e-mail sturen met meer informatie over dit product. Zo verhoog 
je de kans dat je klanten uiteindelijk een aankoop doen. 

```php
// vereiste module
require_once("copernica_rest_api.php");

// maak een API object met je eigen token
$api = new CopernicaRestApi("my-access-token");

$data = array(
    // selecteer email conditie
    'type' => 'Email',
    
    // selecteer gewenste eigenschappen
    'required-result' => 'clickonurl',
    
    // selecteer (in dit geval) de juiste URL
    'required-url' => 'wwww.example.com',

    // gebruik matchmode
    'match-mode' => 'match_profiles_that_received_something'
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
