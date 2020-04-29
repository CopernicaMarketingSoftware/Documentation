# REST API: GET content (Publisher destination)

Voor een destination kan je de volledige gepersonaliseerde inhoud van de mailing die naar de bestemming is verstuurd opvragen. Je kan deze opvragen met een HTTP GET-call naar de volgende URL:

`https://api.copernica.com/v2/publisher/destination/$id/content/$type?access_token=xxx`

Hier moet `$id` vervangen worden door de ID van de mailing destination. Als optionele 
parameter ondersteunt deze URL ook het type-veld dat de waarde `html, amp, text of subject` kan bevatten. Als je meerdere types tegelijk op wilt vragen, kan je deze combineren met een plus-teken (bijvoorbeeld `html+text`). Als je geen type meegeeft, worden alle types teruggegeven.

## Teruggegeven velden

Deze methode geeft een JSON object terug met de volgende waardes:

* **html**: de HTML-inhoud van de mailing, indien opgevraagd;
* **text**: de text-inhoud van de mailing, indien opgevraagd;
* **amp**: de AMP-inhoud van de mailing, indien opgevraagd;
* **subject**: de onderwerpsregel van de mailing, indien opgevraagd;

### JSON voorbeeld

De JSON van een content call ziet er bijvoorbeeld zo uit:

```json
{  
    "html": "<b>HTML content</b>",
    "text": "Text content",
    "subject": "This is a test mailing"
}
```

## PHP voorbeeld

Dit script demonstreert hoe je de API methode kunt gebruiken:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token 
$api = new CopernicaRestAPI("your-access-token", 2);

// stel de periode in
$parameters = array(
    'type'    =>  ‘html+test+subject’
);

// voer het verzoek uit
print_r($api->get("publisher/destination/{$destinationID}/content/", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van een Publisher destination](./rest-get-publisher-destination)
* [Opvragen van abuses voor een Publisher destination](./rest-get-publisher-destination-abuses)
* [Opvragen van deliveries voor een Publisher destination](./rest-get-publisher-destination-deliveries)
* [Opvragen van errors voor een Publisher destination](./rest-get-publisher-destination-errors)
* [Opvragen van impressions voor een Publisher destination](./rest-get-publisher-destination-impressions)
* [Opvragen van unsubscribes voor een Publisher destination](./rest-get-publisher-destination-unsubscribes)
