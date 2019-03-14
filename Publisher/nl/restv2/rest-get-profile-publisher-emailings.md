# REST API: GET emailings (Publisher)

Deze methode vraagt een lijst op van alle mailings verstuurd met Publisher 
naar een specifiek profiel. 
De methode maakt een HTTP call naar het volgende adres:

`https://api.copernica.com/v2/profile/{$profileID}/publisher/emailings?access_token=xxxx`

Je kunt de methode om alle Marketing Suite mailings op te vragen [hier](./rest-get-ms-emailings) vinden.

## Beschikbare parameters

* **include_subprofiles**: Boolean die aangeeft of mailings naar subprofiles 
meegeteld moeten worden ('yes', 'no'). De standaardwaarde is 'yes'. 
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

* **id**: De ID van de mailing. 
* **timestamp**: De tijdstempel van de mailing.
* **destinations**: Het aantal destinations van de mailing.
* **document**: ID van het emailing document
* **template**: ID van de emailing template
* **subject**: Het onderwerp van de mailing
* **from_address**: Een array met de naam ('name') en het e-mailadres ('email') van de afzender.
* **type**: Het type van de mailing: 'mass' (massa mailing) of 'individual' (individuele mailing). Vraagt 
standaard beide op.
* **embedded**: Boolean die aangeeft of de afbeeldingen in de mailing ingebed zijn of niet.
* **contenttype**: Het type content in de mailing: 'html', 'text' of 'both' (beide).
* **target**: Array die het target type en de ID en het type van zijn sources bevat (een source is bijvoorbeeld de database waartoe een collectie behoort).

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
    'limit'                 => 10,
    'include_subprofiles'   => 'yes',
    'type'                  => 'mass',
    'followups'             => 'no',
    'registerclicks'        => 'yes',
);

// voer het verzoek uit en print het resultaat
print_r($api->get("profile/{$profileID}/publisher/emailings", $parameters));
```

Het bovenstaande voorbeeld vereist de [CopernicaRestApi klasse](./rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api)
* [Opvragen van Publisher mailings](./rest-get-publisher-emailings)
