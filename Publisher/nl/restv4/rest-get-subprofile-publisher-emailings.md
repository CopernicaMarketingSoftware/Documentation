# REST API: GET subprofile emailings (Publisher)

Deze methode vraagt een lijst op van alle mailings verstuurd met Publisher 
naar een specifiek subprofiel. 
De methode maakt een HTTP call naar het volgende adres:

`https://api.copernica.com/v4/subprofile/{$subprofileID}/publisher/emailings?access_token=xxxx`

Vergeet niet hier `{$subprofileID}` te vervangen door de ID van het subrofiel 
waarvoor je de mailings op wilt vragen.

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
* **fromdate**: Vraag alleen mailings na deze datum op (YYYY-MM-DD HH:MM:SS formaat).
* **todate**: Vraag alleen mailings voor deze datum op (YYYY-MM-DD HH:MM:SS formaat).

Deze methode ondersteunt ook [paging parameters](./rest-paging).

## Beschikbare parameters

* **type**: Het type mailings om op te vragen: Massa ('mass') mailings, individuele ('individual') mailings 
of alle mailings ('both').
* **followups**: Geeft aan of we alleen emailings van opvolgacties ('yes') opvragen, 
alleen emailings die geen gevolg zijn van een opvolgactie ('no') of alle emailings ('both').
* **test**: Geeft aan of we alleen test emailings ('yes') opvragen, alleen 
mailings die geen test waren ('no') of alle mailings ('both').

De standaardwaarde van al deze parameters is 'both'. Als je geen parameters 
meegeeft krijg je dus alle emailings zonder dat er een filter wordt toegepast.

## Teruggegeven velden

Deze methode geeft een JSON object met meerdere emailings onder het **data** 
veld. Elke mailing bevat de volgende informatie:

* **id**: De ID van de mailing. 
* **timestamp**: De tijdstempel van de mailing.
* **document**: ID van het document gebruikt voor de mailing.
* **template**: ID van de template gebruikt voor de mailing.
* **subject**: Onderwerp van de mailing.
* **from_address**: Afzenderadres van de mailing als een array (met 'name' en 'email' als waarden)
* **destinations**: Het aantal destinations van de mailing.
* **testgroups**: Het aantal testgroepen (alleen bij AB test of splitrun)
* **finalgroup**: ID van de finalgroup (alleen relevant voor een splitrun mailing)
* **type**: Het type van de mailing: 'mass' (massa mailing) of 'individual' (individuele mailing).
* **clicks**: Aantal kliks voor deze mailing.
* **impressions**: Aantal opens voor deze mailing.
* **contenttype**: Het type content in de mailing: 'html', 'text' of 'both' (beide).
* **target**: Array die het target type en de ID en het type van zijn sources bevat (een source is bijvoorbeeld de database waartoe een collectie behoort).

## JSON Voorbeeld

De JSON ziet er bijvoorbeeld zo uit:

```json
Array
(
    [id] => 1181
    [timestamp] => 2010-04-14 15:02:14
    [document] => 104
    [template] => 61
    [subject] => "Hello!"
    [from_address] => Array
        (
            [name] => Copernica BV
            [email] => support@copernica.com
        )

    [destinations] => 1
    [testgroups] => 0
    [finalgroup] => 1409
    [type] => individual
    [clicks] => 5
    [impressions] => 2
    [contenttype] => html
    [target] => Array
            (
            [type] => database
            [sources] => Array
                (
                    [0] => Array
                        (
                            [id] => 478
                            [type] => database
                        )

                )

        )

)
```

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
print_r($api->get("subprofile/{$subprofileID}/publisher/emailings", $parameters));
```

Het bovenstaande voorbeeld vereist de [CopernicaRestApi klasse](./rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api)
* [Opvragen van Publisher mailings](./rest-get-publisher-emailings)
