# REST API: PUT database unsubscribe

Bij elke database kun je het afmeldalgoritme instellen. Als er op de servers
van Copernica een afmelding binnenkomt wordt deze instelling gebruikt om te
bepalen hoe we met de afmelding moeten omgaan: moet het profiel worden verwijderd,
of moet het profiel worden aangepast?

Om deze instelling door middel van een API call in te stellen, kun je een
HTTP PUT request sturen naar de volgende URL:

`https://api.copernica.com/v4/database/$id/unsubscribe?access_token=XXX`

De variabele `$id` in de URL moet worden vervangen door de numerieke identifier
of de naam van de database die je wilt bewerken. De nieuwe instelling moet
je in de body van het HTTP request plaatsen.

## Beschikbare parameters

De volgende variabelen moeten in de body van het HTTP PUT commando worden
geplaatst:

* **behavior**: de nieuwe instelling van het afmeldgedrag. Ondersteunde waardes zijn "nothing", "remove" en "update".
* **fields**: optioneel associatief array / object met daarin de nieuwe veldwaardes

De drie values van 'behaviour' zijn 'nothing', 'remove' en 'update'.
Bij 'nothing' wordt het verzoek van de gebruiker genegeerd, bij
'remove' wordt het profiel uit de database verwijderd en bij 'update'
wordt het profiel geüpdate om aan te geven dat deze klant geen email
meer wil ontvangen. Op deze manier blijft de klant wel in de database
staan. De "fields" instelling geeft nieuwe veldwaardes in het geval
dat het profiel geüpdate wordt. In de andere gevallen heeft deze
parameter dus geen nut.

## Voorbeeld in JSON

De volgende JSON demonstreert hoe je de API methode kunt gebruiken:

```json
{
  "behavior": "update",
  "fields": {
      "newsletter": "no"
    }
}
```

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen. In
het voorbeeld wordt ingesteld dat, als iemand zich afmeldt, het veld 'newsletter'
op 'no' wordt gezet. Je kunt dit bijvoorbeeld gebruiken om een
[nieuwsbrief selectie](./create-a-mailing-list) aan te maken.

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data voor de methode
$data = array(
    'behavior'      =>  'update',
    'fields'        =>  array('newsletter' => 'no')
);

// voer het verzoek uit
api->put("database/{$databaseID}", $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van afmeldalgoritme](rest-get-database-unsubscribe)

