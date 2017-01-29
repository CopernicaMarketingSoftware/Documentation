# REST API: afmeldalgoritme instellen

Bij elke database kun je het afmeldalgoritme instellen. Als er op de servers
van Copernica een afmelding binnenkomt, wordt deze instelling gebruikt om te
bepalen hoe we met de afmelding moeten omgaan: moet het profiel worden verwijderd,
of moet het profiel worden aangepast.

Om deze instelling door middel van een API call in te stellen, kun je een
HTTP PUT request sturen naar de volgende URL:

`https://api.copernica.com/database/$id/unsubscribe?access_token=XXX`

De variabele $id in de URL moet worden vervangen door de nummerieke identifier
of de naam van de database die je wilt bewerken. De nieuwe instelling moet
je in de body van het HTTP request plaatsen.

## Beschikbare parameters

De volgende variabelen moeten in de body van het HTTP PUT commando worden
geplaatst:

* *behavior*: de nieuwe instelling van het afmeldgedrag. Ondersteunde waardes zijn "nothing", "remove" en "update". 
* *fields*: optioneel associatief array / object met daarin de nieuwe veldwaardes

De "fields" instelling is alleen zinvol indien je het behavor op "update"
hebt staan.


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen. In
het voorbeeld wordt ingesteld dat, als iemand zich afmeldt, het veld 'newsletter'
op 'no' wordt gezet:

    // dependencies
    require_once('copernica-rest-api.php');

    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");
    
    // data to be sent to the api
    $data = array(
        'behavior'      =>  'update',
        'fields'        =>  array('newsletter' => 'no')
    );
    
    // do the call
    api->put("database/1234", $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Overzicht van alle API calls](rest-reference)
* [Opvragen van afmeldalgoritme](rest-get-database-unsubscribe)

