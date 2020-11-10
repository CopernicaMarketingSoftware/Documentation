# REST API: GET view profiles

De methode om profielen uit een selectie op te vragen is een HTTP GET methode
beschikbaar op het volgende adres:

`https://api.copernica.com/v2/view/$id/profiles?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van de 
selectie waar je de profielen van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: Eerste ID om op te vragen
* **limit**: Aantal profielen om op te vragen
* **total**: Boolean. Geeft aan of het totale aantal profielen getoond moet worden. 
De methode is sneller wanneer dit op 'false' staat.
* **fields**: Optionele parameter om condities voor profielen mee in te stellen.
* **dataonly**: Boolean. Wanneer deze de waarde 'true' heeft worden alleen de ID, velden, 
interesses en datum van laatste aanpassing opgevraagd om de methode sneller te maken.

### Paging

Meer over de **start**, **limit** en **total** parameters vind je in het [artikel over paging](rest-paging).  

### Fields 

De **fields** parameter kun je gebruiken om subprofielen te selecteren. Als je bijvoorbeeld
alleen subprofielen wil opvragen waarbij de waarde van het veld "land" gelijk is aan
"Nederland", kun je dat opgeven in deze parameter. Meer informatie over het
gebruik van de **fields** parameter kun je vinden in een 
[artikel over de fields parameter](rest-fields-parameter).

## Geretourneerde velden

De methode retourneert een JSON object met de profielen onder het **data** 
veld. Elk profiel bevat de volgende velden:

* **ID**: ID van het profiel
* **fields**: Associatieve array van veldnamen en veldwaardes
* **interests**: Array van de interesses van het profiel
* **database**: ID van de database waarin het profiel is opgeslagen
* **secret**: De "geheime" code die aan een profiel is gekoppeld
* **created**: Tijdstip waarop het profiel in aangemaakt, in YYYY-MM-DD hh:mm:ss formaat
* **modified**: Tijdstip waarop het profiel voor het laatst is bijgewerkt, in YYYY-MM-DD hh:mm:ss formaat
* **removed**: Geeft aan of het profiel verwijderd is of niet

Sommige van deze velden worden niet teruggegeven als de **dataonly** parameter 
op 'false' staat.

### JSON example

De JSON voor een profiel ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"18381",
   "fields":{  
      "name":"Test",
      "email":"test@example.com",
   },
   "interests":[  
      "baseball",
      "soccer"
   ],
   "database":"7616",
   "secret":"e5903b43c08g011f7a1e1f2644f618be",
   "created":"2013-01-06 14:19:51",
   "modified":"2019-02-21 13:26:21",
   "removed":false
}
```

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen. Omdat
we in het voorbeeld de CopernicaRestApi klasse gebruiken, hoef je je niet heel
druk te maken over het vervangen van speciale tekens in de URL. Dat doet de
klasse automatisch.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters voor de methode
$parameters = array(
    'limit'     =>  100,
    'orderby'   =>  'country',
    'fields'    =>  array("age>16", "age<=65")
);

// voer de methode uit en print resultaat
print_r($api->get("view/{$view}/profiles", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van profiel ID's](rest-get-view-profileids)
* [Profiel toevoegen aan een database](rest-post-database-profiles)
* [Profiel bijwerken](rest-put-profile-fields)
* [Profiel verwijderen](rest-delete-profile)
