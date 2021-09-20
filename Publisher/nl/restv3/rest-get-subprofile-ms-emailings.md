# REST API: GET subprofile emailings (Marketing Suite)

Deze methode vraagt een lijst op van alle mailings verstuurd met Marketing Suite 
naar een specifiek subprofiel. 
De methode maakt een HTTP call naar het volgende adres:

`https://api.copernica.com/v3/subprofile/{$subprofileID}/ms/emailings?access_token=xxxx`

Vergeet niet hier `{$subprofileID}` te vervangen door de ID van het subrofiel 
waarvoor je de mailings op wilt vragen.

## Teruggegeven velden

Deze methode geeft een JSON array terug met een start index, limiet en 
het totale aantal resultaten. Deze array bevat ook een data array met 
de mailings die de parameters matchen. Elke mailing is een array die 
de volgende informatie bevat:

* **id**: De ID van de mailing.
* **timestamp**: Tijdstempel van de mailing.
* **template**: De ID van de template die gebruikt is voor deze mailing.
* **subject**: Het onderwerp van de mailing.
* **from_address**: Een array met de naam ('name') en het e-mailadres ('email') 
van de afzender.
* **destinations**: Hoeveelheid (geplande) ontvangers van de mailing.
* **type**: Type van de mailing. Een individuele mailing is 'individual' 
en een massa mailing is 'massa'.
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
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters om aan de call mee te geven
$parameters = array(
    'limit'                 => 10,
    'include_subprofiles'   => 'yes',
    'type'                  => 'mass',
    'followups'             => 'no',
    'registerclicks'        => 'yes',
);

// voer het verzoek uit en print het resultaat
print_r($api->get("subprofile/{$subprofileID}/ms/emailings", $parameters));
```

Het bovenstaande voorbeeld vereist de [CopernicaRestApi klasse](./rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api)
* [Opvragen van Marketing Suite mailings](./rest-get-ms-emailings)
