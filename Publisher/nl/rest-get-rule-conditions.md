# GET rule conditions

Een methode om conditions van een rule op te vragen. 
Je kunt de method aanroepen met een HTTP GET request naar de volgende URL:

`https://api.copernica.com/v1/rule/$id/conditions?access_token=xxxx`

De `$id` moet hier vervangen worden door de ID van de rule waarvan je de condition wilt vragen.


## Verschillende type conditions

In onderstaande lijst zijn alle conditions weergegeven die mogelijk 
kunnen worden teruggegeven door de REST API. Je kunt precies lezen 
wat iedere condition inhoudt door erop te klikken:

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
require_once("copernica_rest_api.php");

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// voer het verzoek uit en print het resultaat
print_r($api->get("rule/id/conditions"));
```

Dit voorbeeld vereist de [REST API class](./rest-php).


## Meer informatie

* [Overzicht van alle API methodes](./rest-api)
* [Get rules](./rest-get-rules)
* [Get rules voor specifieke ID](./rest-get-rule)