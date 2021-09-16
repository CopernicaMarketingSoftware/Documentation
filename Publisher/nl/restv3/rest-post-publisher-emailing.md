# REST API: POST emailing (Publisher)

Je kunt ook een mailing voor de Publisher versturen met onze 
REST API als je al een template en database voorbereid hebt. Door een HTTP 
POST verzoek te sturen naar het volgende adres kun je een mailing versturen:

`https://api.copernica.com/v3/publisher/emailing?access_token=xxxx`

## Beschikbare parameters

De volgende parameters zijn beschikbaar, waarvan alleen 'settings' optioneel is:

* **target**: De ID van de target van de mailing.
* **targettype**: Het type van de target (database, collectie, selectie, miniselectie, profiel of subprofiel)
* **document**: De ID van het document om te gebruiken.
* **settings**: Array die de instellingen van de mailing bevat. Deze kun je 
bijvoorbeeld gebruiken om een mailing op een ander moment te versturen in plaats 
van deze onmiddelijk te verzenden.

De settings array kan de volgende opties bevatten:

* **start**: De datum om de mailing te starten in tekstformaat, of 'false' 
om aan te geven dat de mailing direct verstuurd moet worden.
* **interval**: Het interval waarmee de mailing verstuurd moet worden als 
een array met de parameters 'count' voor de hoeveelheid en 'unit' voor de 
eenheid. Voor een mailing elke twee weken is 'count' bijvoorbeeld 2 en de 
'unit' is 'week'.
* **iterations**: Het aantal keren dat de mailing verstuurd moet worden. 
Een negatief getal geeft een mailing voor onbepaalde tijd aan.
* **description**: Beschrijving voor de mailing.
* **nodoubles**: Geeft aan of dubbele adressen overgeslagen moeten worden ('true') 
of niet ('false').
* **personalized**: Geeft aan of de mails gepersonalizeerd moeten worden ('true') 
of niet ('false').
* **test**: Geeft aan of dit een test mailing is ('true') of niet ('false').
* **contenttype**: Geeft het type content voor de mailing aan. Hier staat 'html' 
voor HTML, 'text' voor een tekstversie en 'both' voor een mailing die beide bevat.
* **embeddedimages**: Geeft aan of de afbeeldingen toegevoegd worden aan de mailing ('true') 
of gehost worden op een aparte webserver ('false').
* **cacheimages**: Geeft aan of externe afbeeldingen in de cache opgeslagen moeten worden ('true') 
of niet ('false').

Zorg ervoor dat je document volledig is voor je de mailing verstuurd. 
De mailing kan namelijk niet verstuurd worden zonder een onderwerp of 
afstuurder. Zorg er ook voor dat je [sender domain](../sender-domains) 
correct geconfigureerd is.

## PHP voorbeeld

Het onderstaande script laat zien hoe je deze API methode kunt gebruiken. 
Vergeet niet de parameters te vervangen door je eigen target en template.

```php
<?php

// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// emailing instellingen
$settings = array(
    'start'         => '2019-01-01'
    'interval'      => array(   
                                'count'    =>  6,
                                'unit'     => 'month'
                    ),
    'iterations'    => -1
);

// parameters om mee te geven aan de call
$parameters = array(
    'target'        => $targetID,
    'targettype'    => $targetType,
    'document'      => $documentID,
    'settings'      => $settings
);

// voer het verzoek uit
print_r($api->post("publisher/emailing", $parameters));

// het ID van het aangemaakte verzoek wordt teruggegeven bij een succesvol verzoek
```

Het bovenstaande voorbeeld vereist onze [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
* [Opvragen van alle Publisher mailings](./rest-get-publisher-emailings)
* [Aanmaken van een Marketing Suite mailing](./rest-post-ms-emailing)
