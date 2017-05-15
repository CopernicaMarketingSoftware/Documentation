# POST rule conditions

Een methode om *conditions* voor een *rule* aan te maken. 
Je kunt de method aanroepen met een HTTP POST request naar de volgende URL:

`https://api.copernica.com/v1/rule/$id/conditions?access_token=xxxx`

De `$id` moet hier vervangen worden door de identifier van de rule waaraan je de condition wilt toevoegen.


## Verschillende type conditions

Je kunt verschillende conditions aan een rule toevoegen. 
De precieze eigenschappen hangen af van het type van de conditie. 
In onderstaande lijst zijn alle conditions weergegeven. Je kunt 
precies lezen wat iedere condition inhoudt door erop te klikken:

- [Change conditions](./rest-condition-type-change.md)
- [Date conditions](./rest-condition-type-date.md)
- [DoubleField conditions](./rest-condition-type-doublefield.md)
- [E-mail conditions](./rest-condition-type-email.md)
- [Export conditions](./rest-condition-type-export.md)
- [Fax conditions](./rest-condition-type-fax.md)
- [Field conditions](./rest-condition-type-field.md)
- [Interesse conditions](./rest-condition-type-interest.md)
- [LastContact conditions](./rest-condition-type-lastcontact.md)
- [MiniView conditions](./rest-condition-type-miniview.md)
- [SMS conditions](./rest-condition-type-sms.md)
- [Todo conditions](./rest-condition-type-todo.md)
- [Survey conditions](./rest-condition-type-survey.md)
- [Part conditions](./rest-condition-type-part.md)
- [ReferView conditions](./rest-condition-type-referview.md)


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
$api->post("rule/1234/conditions", array(), $data);
```

Dit voorbeeld kun je gebruiken in onze [Copernica REST API class](rest-php).


## Meer informatie

* [Overzicht van alle API methodes](rest-api)
* [GET rules voor specifieke ID](./rest-get-rule)
* [POST rule](./rest-post-view-rules)
