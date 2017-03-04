# REST API: opvragen instelling voor het afmeldalgoritme

Bij elke database kun je het afmeldalgoritme instellen. Als er op de servers
van Copernica een afmelding binnenkomt wordt deze instelling gebruikt om te
bepalen hoe we met de afmelding moeten omgaan: moet het profiel worden verwijderd,
of moet het profiel worden aangepast?

Het opvragen van het afmeldalgoritme gaat met een HTTP GET request naar het
volgende adres:

`GET https://api.copernica.com/v1/database/$id/unsubscribe?access_token=xxxx`

Als $id kun je de numerieke identifier van een database opgeven, of de naam
van een database.

## Geretourneerde velden

* **behavior**: De daadwerkelijke instelling.
* **fields**: De nieuwe profielinsteling (alleen van toepassing indien het veld behavior op 'update' staat)

Het veld "behavior" kan drie mogelijke waardes hebben en bepaalt hoe Copernica
met afmeldingen omgaat. De ondersteunde waardes zijn "nothing", "remove" en "update".
De waarde "nothing" is nogal onbeleefd: als deze instelling wordt gebruikt worden
afmeldingen simpelweg genegeerd. Het profiel blijft ongewijzigd in de database.
De instelling "remove" is een stuk vriendelijker: bij een afmelding wordt een 
profiel automatisch volledig uit de database verwijderd.

De instelling 'update' geeft aan dat profielen weliswaar in de database blijven
staan en dus niet worden verwijderd, maar dat ze wel worden aangepast. De 
teruggegeven "fields" setting bevat een object met de nieuwe profielwaardes.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("database/1234/unsubscribe"));

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Afmeldalgoritme instellen](rest-put-database-unsubscribe)

