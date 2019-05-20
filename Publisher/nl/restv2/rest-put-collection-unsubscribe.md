# REST API: PUT collection unsubscribe

Voor elke collectie kunnen apart de instellingen voor unsubscribes worden aangepast. 
Wanneer Copernica's servers een verzoek voor uitschrijving ontvangen geeft 
deze instelling aan wat er in de collectie gebeurt.

Om de instellingen hiervoor aan te passen kan er een HTTP PUT verzoek 
gedaan worden aan de volgende URL:

`https://api.copernica.com/v2/collection/$id/unsubscribe?access_token=xxxx`

Hier moet de `$id` aangepast worden naar de ID van de collectie waar je 
de instellingen voor aan wilt passen. De nieuwe instellingen zelf moeten
toegevoegd worden aan de message body van het verzoek.

## Beschikbare parameters

De volgende variabelen zijn beschikbaar om aan te passen binnen het verzoek:

- **behavior**: de instelling voor unsubscribes
- **fields**: de aanpassingen aan een profiel bij de instellingen 'update'

‘behavior’ heeft drie mogelijke waarden: 'nothing', 'remove' en 'update'. 
'Nothing' betekent dat unsubscriptions genegeerd worden. 'remove' verwijdert 
de profielen van unsubscribers en 'update' kan gebruikt worden om de 
velden van een profiel aan te passen zodat het zichtbaar wordt dat 
deze gebruiker geen email meer wil ontvangen.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe de methode gebruikt kan worden. 
In dit geval gebruiken we een 'update' om het veld 'newsletter' op 'no' te zetten. 
Je kunt nu een [nieuwsbrief selectie](../create-a-mailing-list) aanmaken om ervoor 
te zorgen dat deze uitschrijvers geen e-mails meer ontvangen.

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je acces token
$api = new CopernicaRestAPI("your-access-token", 2);

// data voor de methode
$data = array(
    'behavior'      =>  'update',
    'fields'        =>  array('newsletter' => 'no')
);

// voer het verzoek uit
api->put("collection/{$collectieID}", array(), $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

- [Overzicht van alle API methodes](rest-api)
- [Unsubscribe instellingen van collectie opvragen](rest-get-collection-unsubscribe)
