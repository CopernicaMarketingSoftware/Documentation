# REST API: GET view rule

Selecties gebruiken regels om te beslissen welke profielen worden gebruikt 
in de selectie en welke niet. Profielen die tenminste een regel matchen worden 
toegevoegd. Om de informatie van een enkele regel op te vragen kan er een 
HTTP GET verzoek worden verstuurd naar de volgende URL:

`https://api.copernica.com/v2/view/$id/rule/$id?access_token=xxxx`

De eerste `$id` code moet vervangen worden met de numerieke identifier 
van de selectie waar je een regel uit wilt opvragen. De tweede `$id` 
parameter moet de ID van de regel zijn.

## Teruggegeven velden

Het resultaat van deze methode is een regel met bijhorende informatie:

* **ID**: numerieke identifier van de regel
* **name**: naam van de regel
* **view**: ID van de selectie waar de regel bij hoort
* **conditions**: array van voorwaarden voor de regel
* **disabled**: Boolean om aan te geven of de regel wel (true) of niet (false) geactiveerd is
* **inversed**: Boolean die aangeeft of de regel wel (true) of niet (false) een inverse is. 

### Condities

De 'conditions' zijn voorwaarden waaraan voldaan moet worden 
om met een profiel te matchen. De **conditions** eigenschap die wordt 
teruggeven heeft een array van voorwaarde objecten, die elk de volgende eigenschappen bezitten:

* **ID**: numerieke identifier van de voorwaarde
* **type**: type van de voorwaarde
* **rule**: numerieke identifier van de regel waar de voorwaarde bij hoort

De precieze eigenschappen hangen af van het type van de 'condition'. Specifiekere 
uitleg is te vinden onder het "Meer informatie" kopje. 

### JSON voorbeeld

De JSON voor een regel ziet er bijvoorbeeld zo uit:

```json
{  
    "ID":"4012",
    "name":"Rule",
    "view":"4184",
    "conditions":{  
    "start":0,
    "limit":100,
    "count":1,
    "data":[  
        {  
            "ID":"2110",
            "type":"Field",
            "rule":"4039",
            "comparison":"equals",
            "field":{  
                "ID":"22142",
                "name":"subscribed",
                "type":"text",
                "value":"no",
                "displayed":false,
                "ordered":false,
                "length":"255",
                "textlines":"3",
                "hidden":false,
                "index":false
            },
            "value":"yes",
            "other-field":false,
            "numeric-comparison":false
        }
    ],
    "total":1
    },
    "inversed":false,
    "disabled":false
}
```

## Voorbeeld in PHP

Het volgende script kan gebruikt worden om de eigenschappen van een regel op te vragen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer de methode uit en print het resultaat
print_r($api->get("view/{$view}/rule/{$regelID}"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api.md)
* [Opvragen van selectie regels](./rest-get-view-rules.md)
* [Toevoegen van een regel aan een selectie](./rest-post-view-rules.md)
* [Aanpassen van een regel](./rest-put-rule.md)
* [Verwijderen van een regel](./rest-delete-rule.md)
* [Aanpassen van een conditie](./rest-put-condition.md)
* [Verwijderen van een conditie](./rest-delete-condition.md)

De condities waaruit regels bestaan verschillen onderling flink. Daarom 
gaan de onderstaande artikelen dieper in op de verschillende soorten condities.

* [Veranderings voorwaarden](./rest-condition-type-change.md)
* [Datum voorwaarden](./rest-condition-type-date.md)
* [DoubleField voorwaarden](./rest-condition-type-doublefield.md)
* [Email voorwaarden](./rest-condition-type-email.md)
* [Fax voorwaarden](./rest-condition-type-fax.md)
* [Veld voorwaarden](./rest-condition-type-field.md)
* [Interesse voorwaarden](./rest-condition-type-interest.md)
* [LastContact voorwaarden](./rest-condition-type-lastcontact.md)
* [Miniview voorwaarden](./rest-condition-type-miniview.md)
* [SMS voorwaarden](./rest-condition-type-sms.md)
* [Todo voorwaarden](./rest-condition-type-todo.md)
* [Survey voorwaarden](./rest-condition-type-survey.md)
* [Part voorwaarden](./rest-condition-type-part.md)
* [ReferView voorwaarden](./rest-condition-type-referview.md)
