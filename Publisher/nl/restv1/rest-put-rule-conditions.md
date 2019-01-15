# REST API: PUT rule conditions

Waarschuwing: Je bekijkt nu het overzicht voor de oude versie van onze 
API. Wij raden aan om [versie 2](../restv2/rest-api.md) van de API te gebruiken.

Een methode om *conditions* voor een *rule* aan te passen. 
Je kunt de methode aanroepen met een HTTP PUT request naar de volgende URL:

`https://api.copernica.com/v1/rule/$id/conditions/$type?access_token=xxxx`

De **$id** is de ID van de regel, de **$type** is het type conditie dat je 
voor de regel aan wil passen.

## Verschillende type conditions

De body van het bericht kan de volgende eigenschappen bevatten voor een 
conditie:

- **type**: type van de conditie

Je kunt verschillende type condities gebruiken.
De precieze eigenschappen hangen af van het type van de conditie. 
In onderstaande lijst zijn alle conditions weergegeven. Je kunt 
precies lezen wat iedere condition inhoudt door erop te klikken:

- [Change condition](./rest-condition-type-change.md)
- [Date condition](./rest-condition-type-date.md)
- [DoubleField condition](./rest-condition-type-doublefield.md)
- [E-mail condition](./rest-condition-type-email.md)
- [Export condition](./rest-condition-type-export.md)
- [Fax condition](./rest-condition-type-fax.md)
- [Field condition](./rest-condition-type-field.md)
- [Interest condition](./rest-condition-type-interest.md)
- [LastContact condition](./rest-condition-type-lastcontact.md)
- [MiniView condition](./rest-condition-type-miniview.md)
- [SMS condition](./rest-condition-type-sms.md)
- [ToDo condition](./rest-condition-type-todo.md)
- [Survey condition](./rest-condition-type-survey.md)
- [Part condition](./rest-condition-type-part.md)
- [ReferView condition](./rest-condition-type-referview.md)

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe de API method te gebruiken is. 
Hier wordt aan de conditie voldaan als "firstname" de waarde "Bob" heeft.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// parameters voor de methode
$data = array(
    'type' = 'field'
    'field' = 'firstname'
    'value' = 'Bob'
);

// voer het verzoek uit en print het resultaat
$api->post("rule/id/conditions/id", array(), $data);

// bij een succesvolle call wordt de id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API methodes](rest-api)
* [GET rule](./rest-get-rule)
* [POST view rules](./rest-post-view-rules)
* [POST rule condities](./rest-post-rule-conditions)
