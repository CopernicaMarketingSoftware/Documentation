# REST API: POST view copy

Selecties worden meerdere malen per dag opnieuw opgebouwd. In sommige 
gevallen is het echter handig om deze handmatig opnieuw op te bouwen, bijvoorbeeld 
als je net de regels voor deze selectie hebt aangepast en nu een mailing 
naar de selectie wil versturen. Je kunt een nieuwe opbouw aanvragen met een 
HTTP POST call naar de volgende URL:

`https://api.copernica.com/v3/view/$id/rebuild?access_token=xxxx`

Hier moet de `$id` vervangen worden door de ID van de selectie die je 
opnieuw wil opbouwen. Hou hierbij in gedachten dat het even kan duren om 
de selectie opnieuw op te bouwen. Om te checken of de selectie vernieuwd is 
kun je de [selectie opvragen](./rest-get-view), waar de 'last-built' variabele 
aangeeft wanneer de laatste opbouw van deze selectie plaats heeft gevonden.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

```php
// vereiste scripts
require_once('copernica-rest-api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// voer de methode uit
print_r($copyID = $api->post("view/{$viewID}/rebuild", $data));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api)
* [Opvragen van een lijst van selecties](./rest-get-views)
* [Opvragen van een selectie](./rest-get-view)
