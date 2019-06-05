# REST API: GET emailing (Publisher)

Je kunt de REST API gebruiken om een overzicht van een mailing op te vragen 
door een HTTP GET verzoek te versturen naar de volgende URL:

`https://api.copernica.com/v2/publisher/emailing/$id?access_token=xxxx`

Hier moet `$id` vervangen worden door de ID van de mailing.

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

Deze methode geeft een JSON object om de mailing te representeren onder het **data** 
veld. De mailing bevat de volgende informatie:

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

### Voorbeeld

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

## PHP voorbeeld

Het onderstaande script demonstreert hoe je deze API methode gebruikt. 
Vergeet niet de ID in de URL te vervangen voor je het verzoek uitvoert.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer het verzoek uit
print_r($api->get("publisher/emailing/{$emailingID}"));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php)

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Vraag alle Publisher mailings op](./rest-get-publisher-emailings)
