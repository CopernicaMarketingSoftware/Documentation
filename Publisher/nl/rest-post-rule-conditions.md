# POST rule conditions

Een methode om *conditions* voor een *rule* aan te maken. 
Je kunt de method aanroepen met een HTTP POST request naar de volgende URL:

`https://api.copernica.com/v1/rule/$id/conditions?access_token=xxxx`

De `$id` moet hier vervangen worden door de ID van de rule waaraan je de condition wilt toevoegen.


## Verschillende type conditions

Je kunt verschillende conditions aan een rule toevoegen. 
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

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// parameters voor de methode
$data = array(
    'type' = 'Date'
);

// voer het verzoek uit en print het resultaat
$api->post("rule/id/conditions", array(), $data);
// bij een succesvolle call wordt het id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld kun je gebruiken in onze [Copernica REST API class](rest-php).


## Meer informatie

* [Overzicht van alle API methodes](rest-api)
* [GET rules voor specifieke ID](./rest-get-rule)
* [POST rule](./rest-post-view-rules)