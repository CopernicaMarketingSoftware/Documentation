# REST API: GET (Marketing Suite) emailings

Deze methode vraagt een lijst op van alle mailings verstuurd met de 
Marketing Suite. De methode maakt een HTTP call naar het volgende adres:

`https://api.copernica.com/v2/old/emailings?access=token=xxxx`

De overeenkomende methode voor de Publisher kun je 
[hier](./rest-get-ms-emailings) vinden.

## Beschikbare parameters

* **type**: Het type mailing. Dit kan een massa ('mass') mailing zijn of 
een individuele ('individual') mailing. De methode zal standaard beide 
opvragen.
* **followups**: Gebruik 'yes' om alleen mailings getriggered door opvolgacties op te vragen en 
'no' om alleen reguliere mailings op te vragen. De methode zal standaard beide 
opvragen.
* **mindestinations**: Vraag alleen mailings met dit minimum aantal ontvangers op.
* **maxdestinations**: Vraag alleen mailings met dit maximum aantal ontvangers op.
* **fromdate**: Vraag alleen mailings na deze datum op.
* **todate**: Vraag alleen mailings voor deze datum op.

Deze methode ondersteunt ook [paging parameters](./rest-paging).

## Teruggegeven velden

Deze methode geeft een JSON array terug met een start index, limiet en 
het totale aantal resultaten. Deze array bevat ook een data array met 
de mailings die de parameters matchen. Elke mailing is een array die 
de volgende informatie bevat:

* **id**: ID van de mailing
* **timestamp**: Tijdstempel van de mailing
* **destinations**: Hoeveelheid (geplande) ontvangers van de mailing.
* **type**: Type van de mailing. Een individuele mailing is 'individual' 
en een massa mailing is 'massa'.
* **target**: Bevat het type van het doelwit van de mailing en de ID 
en types van de entiteiten hierboven (bijvoorbeeld de database waar een 
collectie onder valt)

## PHP Voorbeeld

Het volgende script demonstreert hoe je deze methode kunt gebruiken. Omdat we de 
CopernicaRestAPI klasse gebruiken hoef je je geen zorgen te maken over het escapen 
van speciale karakters; dit wordt automatisch afgehandeld.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token");

// parameters om aan de call mee te geven
$parameters = array(
    'limit'             => 10,
    'type'              => 'mass',
    'followups'         => 'no',
    'registerclicks'    => 'yes',
);

// voer het verzoek uit en print het resultaat
print_r($api->get("emailings", $parameters));
```

Het bovenstaande voorbeeld vereist de [CopernicaRestApi klasse](./rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api)
* [Opvragen van Publisher mailings](./rest-get-emailings)
