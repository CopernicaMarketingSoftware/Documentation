# REST API: GET database unsubscribe

Bij elke database kun je het afmeldalgoritme instellen. Hiermee wordt bepaald
hoe met afmeldingen moet worden omgaan. Er wordt bijvoorbeeld bepaald of een 
profiel moet worden verwijderd of dat het moet worden aangepast.

Het opvragen van het unsubscribe behavior gaat met een HTTP GET request naar het
volgende adres:

`https://api.copernica.com/v1/database/$id/unsubscribe?access_token=xxxx`

Als `$id` kun je de ID of de naam van een database opgeven.

## Geretourneerde velden

* behavior: de daadwerkelijke instelling;
* fields: de nieuwe profielinstelling (alleen van toepassing indien het veld behavior op 'update' staat).

Het veld "behavior" kan drie mogelijke waardes hebben en bepaalt hoe Copernica
met afmeldingen omgaat. De ondersteunde waardes zijn "nothing", "remove" en "update".
De waarde "nothing" is nogal onbeleefd: als deze instelling wordt gebruikt worden
afmeldingen simpelweg genegeerd. Het profiel blijft ongewijzigd in de database.
De instelling "remove" is een stuk vriendelijker: bij een afmelding wordt een 
profiel automatisch volledig uit de database verwijderd.

De "update" instelling geeft aan dat profielen weliswaar in de database blijven
staan en dus niet worden verwijderd, maar dat ze wel worden aangepast. De 
teruggegeven "fields" setting bevat een object met de nieuwe profielwaardes. 
Zo kun je de data bewaren.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// voer de methode uit en print het resultaat
print_r($api->get("database/id/unsubscribe"));
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [PUT database unsubscribe](rest-put-database-unsubscribe)
