# REST API: GET rule conditions

Waarschuwing: Je bekijkt nu het overzicht voor de oude versie van onze 
API. Wij raden aan om [versie 2](../restv2/rest-api.md) van de API te gebruiken.

Een methode om conditions van een rule op te vragen. 
Je kunt de method aanroepen met een HTTP GET request naar de volgende URL:

`https://api.copernica.com/v1/rule/$id/conditions?access_token=xxxx`

De **$id** moet hier vervangen worden door de ID van de rule waarvan je de condition wilt vragen.


## Verschillende type conditions

In onderstaande lijst zijn alle conditions weergegeven die mogelijk 
kunnen worden teruggegeven door de REST API. Je kunt precies lezen 
wat iedere condition inhoudt door erop te klikken:

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

Dit voorbeeld vereist de [REST API class](rest-php).

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
