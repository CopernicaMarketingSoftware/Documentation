# REST API: GET emailings (Publisher)

Deze methode vraagt een lijst op van alle mailings verstuurd met Publisher. 
De methode maakt een HTTP call naar het volgende adres:

`https://api.copernica.com/v2/publisher/emailings?access=token=xxxx`

Je kunt de methode om alle Marketing Suite mailings op te vragen [hier](./rest-get-ms-emailings) vinden.

## Beschikbare parameters

* **type**: Het type mailing. Dit kan een massa ('mass') mailing zijn of 
een individuele ('individual') mailing. De methode zal standaard beide 
opvragen.
* **followups**: Geeft aan of we alleen opvolgactie mailings ("yes") gebruiken, alleen mailings 
die *niet* het resultaat waren van een opvolgactie ("no") of alle mailings ("both"). Standaardwaarde "both".
* **test**: Geeft aan of we alleen test mailings ("yes") gebruiken, alleen mailings 
die *geen* test waren ("no") of alle mailings ("both"). Standaardwaarde "both".
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

* **id**: ID van de mailing.
* **timestamp**: Tijdstempel van de mailing.
* **destinations**: Hoeveelheid (geplande) ontvangers van de mailing.
* **type**: Type van de mailing. Een individuele mailing is 'individual' 
en een massa mailing is 'massa'.
* **document_id**: De ID van het document gebruikt voor de mailing.
* **template_id**: De ID van de template gebruikt voor de mailing.
* **contenttype**: Type content van de mailing.
* **target**: Bevat het type van het doelwit van de mailing en de ID 
en types van de entiteiten hierboven (bijvoorbeeld de database waar een 
collectie onder valt).

## PHP Voorbeeld

Het volgende script demonstreert hoe je deze methode kunt gebruiken. Omdat we de 
CopernicaRestAPI klasse gebruiken hoef je je geen zorgen te maken over het escapen 
van speciale karakters; dit wordt automatisch afgehandeld.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters om aan de call mee te geven
$parameters = array(
    'limit'             => 10,
    'type'              => 'mass',
    'followups'         => 'no',
    'registerclicks'    => 'yes',
);

// voer het verzoek uit en print het resultaat
print_r($api->get("publisher/emailings", $parameters));
```

Het bovenstaande voorbeeld vereist de [CopernicaRestApi klasse](./rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api)
* [Opvragen van Marketing Suite mailings](./rest-get-ms-emailings)
