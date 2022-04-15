# REST API: PUT minicondition

Een methode om een miniconditie aan te passen.
Je kunt de method aanroepen met een HTTP PUT-request naar de volgende URL:

`https://api.copernica.com/v3/minicondition/$type/$id?access_token=xxxx`

De `$type` en`$id` moeten hier vervangen worden door het type en de ID 
van de miniconditie respectievelijk.

## Beschikbare parameters

Er zijn per miniconditie verschillende parameters beschikbaar. Je kunt 
precies lezen wat iedere miniconditie inhoudt door het bijhorende artikel in 
de onderstaande links aan te klikken:

- [Change miniconditie](./rest-condition-type-change.md)
- [Date miniconditie](./rest-condition-type-date.md)
- [DoubleField miniconditie](./rest-condition-type-doublefield.md)
- [E-mail miniconditie](./rest-condition-type-email.md)
- [Export miniconditie](./rest-condition-type-export.md)
- [Field miniconditie](./rest-condition-type-field.md)
- [SMS miniconditie](./rest-condition-type-sms.md)
- [Survey miniconditie](./rest-condition-type-survey.md)
- [Part miniconditie](./rest-condition-type-part.md)

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe de API-method te gebruiken is.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters voor de methode
$data = array(
    'after-time'    => '01-01-2000'
);

// voer het verzoek uit en print het resultaat
$api->put("minicondition/{$miniconditieType}/{$miniconditieID}", array(), $data);
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-methodes](rest-api)
