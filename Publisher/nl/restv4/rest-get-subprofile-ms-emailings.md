# REST API: GET subprofile emailings (Marketing Suite)

Deze methode vraagt een lijst op van alle mailings verstuurd met Marketing Suite 
naar een specifiek subprofiel. 
De methode maakt een HTTP call naar het volgende adres:

`https://api.copernica.com/v4/subprofile/{$subprofileID}/ms/emailings`

Vergeet niet hier `{$subprofileID}` te vervangen door de ID van het subrofiel 
waarvoor je de mailings op wilt vragen.

## Beschikbare parameters

* **type**: Het type mailing. Dit kan een massa ("mass") mailing zijn, 
een individuele ("individual") mailing, een AB-test ("abtest") of split-run ("splitrun"). 
* **followups**: Geeft aan of we alleen opvolgactie mailings ("yes") gebruiken, alleen mailings 
die *niet* het resultaat waren van een opvolgactie ("no") of alle mailings ("both"). De standaardwaarde is "both".
* **mindestinations**: Vraag alleen mailings met dit minimum aantal ontvangers op.
* **maxdestinations**: Vraag alleen mailings met dit maximum aantal ontvangers op.
* **fromdate**: Vraag alleen mailings na deze datum op (YYYY-MM-DD HH:MM:SS formaat).
* **todate**: Vraag alleen mailings voor deze datum op (YYYY-MM-DD HH:MM:SS formaat).

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
$api = new CopernicaRestAPI("your-access-token", 4);

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
