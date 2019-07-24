# REST API: GET view rules

Om alle regels uit een selectie op te vragen kun je een HTTP GET request 
sturen naar de volgende URL:

`https://api.copernica.com/v2/view/$id/rules?access_token=xxxx`

De `$id` moet hier vervangen worden door de ID van de selectie waar 
je de regels van op wilt vragen.

## Ondersteunde parameters

Je kunt een of meer van de volgende parameters toevoegen aan de URL:

- **start**: de eerste regel om op te vragen
- **limit**: de maximale grootte van opgevraagde regels
- **total**: boolean waarde om wel of niet het totaal matchende regels te laten zien

Je kan meer informatie vinden over de **start**, **limit** en **total** parameters 
in ons [artikel over paging](./rest-paging.md).

## Teruggegeven velden

Deze methode geeft JSON object terug met een lijst regels onder het **data** veld. 
Voor elke regel worden de volgende velden teruggegeven:

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

## Voorbeeld

Het volgende script kan worden gebruikt om regels op te vragen uit een 
selectie.

```php
    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestAPI("your-access-token", 2);

    // parameters to pass to the call
    $parameters = array(
        'limit'     =>  100,
    );
    
    // do the call, and print result
    print_r($api->get("view/{$viewID}/rules", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API methodes](rest-api)
* [Opvragen van een regel](./rest-get-rule)
* [Opvragen van een regel voor een selectie](./get-view-rule)
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

