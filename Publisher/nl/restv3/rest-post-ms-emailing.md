# REST API: POST emailing (Marketing Suite)

Je kunt ook een mailing voor de Marketing Suite versturen met onze
REST API als je al een template en database voorbereid hebt. Door een HTTP
POST-verzoek te sturen naar het volgende adres kun je een mailing versturen:

`https://api.copernica.com/v3/ms/emailing?access_token=xxxx`

## Beschikbare parameters

Er zijn drie (verplichte) parameters beschikbaar:

* **target**: De ID van de target van de mailing.
* **targettype**: Het type van de target (database, collection, view, miniview, profile of subprofile)
* **template**: De ID van de template om te gebruiken.

Zorg ervoor dat je template volledig is voor je de mailing verstuurd.
De mailing kan namelijk niet verstuurd worden zonder een onderwerp of
afstuurder. Zorg er ook voor dat je [sender domain](./sender-domains)
correct geconfigureerd is.

## Voorbeeld in JSON
De volgende JSON demonstreert hoe je de API methode kunt gebruiken:

```json
{
    "target": 1234,
    "targettype":"view",
    "template":12
}
```

## Voorbeeld in PHP

Het onderstaande script laat zien hoe je deze API-methode kunt gebruiken.
Vergeet niet de parameters te vervangen door je eigen target en template.

```php
<?php

// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters om mee te geven aan de call
$parameters = array(
    'target'                  => 1234,
    'targettype'              => 'view',
    'template'                => 12,
);

// voer het verzoek uit
print_r($api->post("ms/emailing", $parameters));

// het ID van het aangemaakte verzoek wordt teruggegeven bij een succesvol verzoek
```

Het bovenstaande voorbeeld vereist onze [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle REST API-calls](./rest-api)
* [Opvragen van alle Marketing Suite mailings](./rest-get-ms-emailings)
* [Aanmaken van een ingeroosterde Marketing Suite mailing](./rest-post-ms-scheduledemailing)
* [Aanmaken van een Publisher mailing](./rest-post-publisher-emailing)
