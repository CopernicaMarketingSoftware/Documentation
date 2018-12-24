# REST API: PUT rule conditions

Een methode om condities voor een regel aan te passen. 
Je kunt de methode aanroepen met een HTTP PUT request naar de volgende URL:

`https://api.copernica.com/v2/rule/$id/conditions/$type?access_token=xxxx`

De `$id` is de ID van de regel, de `$type` is het type conditie dat je 
voor de regel aan wil passen.

## Verschillende type conditions

De body van het bericht kan de volgende eigenschappen bevatten voor een 
conditie:

- **type**: type van de conditie

Je kunt verschillende type condities gebruiken.
De precieze eigenschappen hangen af van het type van de conditie. 
In onderstaande lijst zijn alle condities weergegeven. Je kunt 
precies lezen wat iedere conditie inhoudt door erop te klikken:

- [Change conditie](./rest-condition-type-change.md)
- [Date conditie](./rest-condition-type-date.md)
- [DoubleField conditie](./rest-condition-type-doublefield.md)
- [E-mail conditie](./rest-condition-type-email.md)
- [Export conditie](./rest-condition-type-export.md)
- [Fax conditie](./rest-condition-type-fax.md)
- [Field conditie](./rest-condition-type-field.md)
- [Interest conditie](./rest-condition-type-interest.md)
- [LastContact conditie](./rest-condition-type-lastcontact.md)
- [MiniView conditie](./rest-condition-type-miniview.md)
- [SMS conditie](./rest-condition-type-sms.md)
- [ToDo conditie](./rest-condition-type-todo.md)
- [Survey conditie](./rest-condition-type-survey.md)
- [Part conditie](./rest-condition-type-part.md)
- [ReferView conditie](./rest-condition-type-referview.md)

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe de API method te gebruiken is. 
Hier wordt aan de conditie voldaan als het veld "voornaam" de waarde "Bob" heeft.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// parameters voor de methode
$data = array(
    'type'  => 'field',
    'field' => 'voornaam',
    'value' => 'Bob'
);

// voer het verzoek uit en print het resultaat
$api->post("rule/{regelID}/conditions/", array(), $data);

// bij een succesvolle call wordt de id van het aangemaakte verzoek teruggegeven
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API methodes](rest-api)
* [GET rule](./rest-get-rule)
* [POST view rules](./rest-post-view-rules)
* [POST rule condities](./rest-post-rule-conditions)
