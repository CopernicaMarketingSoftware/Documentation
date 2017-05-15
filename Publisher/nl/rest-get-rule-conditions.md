# Get rule conditions

Dit is een methode om alle conditions van een rule op te vragen. 
Deze methode ondersteunt geen parameters. De methode is aan te 
roepen met een HTTP GET request naar de volgende URL:

`https://api.copernica.com/v1/rule/$id/conditions?access_token=xxxx`

De `$id` hier moet vervangen worden door de ID van de rule waarvan je de conditions op wilt vragen.


## Verschillende type conditions


Je kunt verschillende conditions opvragen. In onderstaande lijst zijn alle 
conditions weergegeven. vJe kunt precies lezen wat iedere condition inhoudt 
door erop te klikken:

- [Veranderings voorwaarden](./rest-condition-type-change.md)
- [Datum voorwaarden](./rest-condition-type-date.md)
- [DoubleField voorwaarden](./rest-condition-type-doublefield.md)
- [E-mail voorwaarden](./rest-condition-type-email.md)
- [Export voorwaarden](./rest-condition-type-export.md)
- [Fax voorwaarden](./rest-condition-type-fax.md)
- [Veld voorwaarden](./rest-condition-type-field.md)
- [Interesse voorwaarden](./rest-condition-type-interest.md)
- [LastContact voorwaarden](./rest-condition-type-lastcontact.md)
- [MiniView voorwaarden](./rest-condition-type-miniview.md)
- [SMS voorwaarden](./rest-condition-type-sms.md)
- [Todo voorwaarden](./rest-condition-type-todo.md)
- [Survey voorwaarden](./rest-condition-type-survey.md)
- [Part voorwaarden](./rest-condition-type-part.md)
- [ReferView voorwaarden](./rest-condition-type-referview.md)


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe de API method te gebruiken is.

```php
// vereiste scripts
require_once("copernica_rest_api.php");

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// voer het verzoek uit en print het resultaat
print_r($api->get("rule/1234/conditions"));
```

Dit voorbeeld vereist de [REST API class](./rest-php).


## Meer informatie

* [Overzicht van alle API methodes](./rest-api)
* [Get rules](./rest-get-rules)
* [Get rules voor specifieke ID](./rest-get-rule)