# REST API: GET collection unsubscribe

Net als bij databases, kun je ook bij collecties het afmeldalgoritme instellen. 
Als er op de servers van Copernica een afmelding binnenkomt wordt deze instelling 
gebruikt om te bepalen hoe we met de afmelding moeten omgaan: moet het subprofiel
worden verwijderd, of moet het subprofiel worden aangepast?

Het opvragen van het afmeldalgoritme gaat met een HTTP GET request naar het
volgende adres:

`https://api.copernica.com/v2/collection/$id/unsubscribe?access_token=xxxx`

Als `$id` moet je de numerieke identifier van een collectie opgeven.

## Geretourneerde velden

* **behavior**: De daadwerkelijke instelling.
* **fields**: De nieuwe subprofielinstelling (alleen van toepassing indien het veld behavior op 'update' staat)

Het veld **behavior** kan drie mogelijke waardes hebben en bepaalt hoe Copernica
met afmeldingen omgaat. De ondersteunde waardes zijn "nothing", "remove" en "update".
De waarde "nothing" is nogal onbeleefd: als deze instelling wordt gebruikt worden
afmeldingen simpelweg genegeerd. Het subprofiel blijft ongewijzigd in de collectie.
De instelling "remove" is een stuk vriendelijker: bij een afmelding wordt een 
subprofiel automatisch volledig uit de collectie verwijderd.

De instelling "update" geeft aan dat subprofielen weliswaar in de collectie blijven
staan en dus niet worden verwijderd, maar dat ze wel worden aangepast. De 
teruggegeven "fields" setting bevat een object met de nieuwe subprofielwaardes.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// voer de methode uit en print het resultaat
print_r($api->get("collection/{$collectieID}/unsubscribe"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Afmeldalgoritme instellen](rest-put-collection-unsubscribe)

