# REST API: GET database profiles

De methode om profielen uit een database op te vragen is een HTTP GET methode
en beschikbaar via het volgende adres:

`https://api.copernica.com/v2/database/$id/profiles?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier of de naam van de 
database waar je de profielen van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: Eerste profiel dat wordt opgevraagd.
* **limit**: Lengte van de batch die wordt opgevraagd.
* **total**: Toon wel/niet het totaal aantal beschikbare/matchende profielen.
* **fields**: Optionele parameter om alleen profielen op te halen die matchen met de opgegeven velden.
* **orderby**: Naam of ID van het veld waarop je de profielen wilt sorteren (standaard is dit het ID van elk profiel).
* **order**: Moeten de profielen oplopen of aflopend (asc of desc) worden gesorteerd?

Meer informatie over de betekenis van de **start**, **limit** en **total** parameters 
vind je in het [artikel over paging](rest-paging). 

De parameter **fields** kun je gebruiken om profielen te selecteren. Als je bijvoorbeeld
alleen profielen wil opvragen waarbij de waarde van het veld "land" gelijk is aan
"Nederland", kun je dat opgeven in het veld "fields". Meer informatie over het
gebruik van deze *fields* parameter kun je vinden in een 
[artikel over de fields parameter](rest-fields-parameter).

De variabele **order** kun je de naam of het ID van een veld geven. De profielen
worden dan gesorteerd aan de hand van dit veld. In plaats van de naam of ID van het
veld waarop je wilt sorteren, kun je ook een aantal speciale waardes aan de 
parameter **order** geven:

* **id**: dit is de standaardwaarde, profielen worden gesorteerd aan de hand van het ID.
* **random**: de profielen worden in willekeurige volgorde teruggegeven.
* **modified**: de profielen worden gesorteerd op basis het *modified* timestamp.

## Geretourneerde velden

De methode retourneert een JSON object met de profielen onder het **data** 
veld. Elk profiel bevat de volgende velden:

* **ID**: ID van het profiel
* **fields**: Associative array van veldnamen en veldwaardes
* **interests**: Array van de interesses van het profiel
* **database**: ID van de database waarin het profiel is opgeslagen
* **secret**: De "geheime" code die aan een profiel is gekoppeld
* **created**: Tijdstip waarop het profiel in aangemaakt, in YYYY-MM-DD hh:mm:ss formaat
* **modified**: Tijdstip waarop het profiel voor het laatst is bijgewerkt, in YYYY-MM-DD hh:mm:ss formaat
* **removed**: Geeft aan of het profiel verwijderd is of niet

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

// verander dit naar je acces token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters voor de methode
$parameters = array(
    'limit'     =>  100,
    'orderby'   =>  'country',
    'fields'    =>  array("age>16", "age<=65")
);

// voer de methode uit en print het resultaat
print_r($api->get("database/{$databaseID}/profiles", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van profiel ID's](rest-get-database-profileids)
* [Profiel toevoegen aan een database](rest-post-database-profiles)
* [Profiel bijwerken](rest-put-profile-fields)
* [Profiel verwijderen](rest-delete-profile)
