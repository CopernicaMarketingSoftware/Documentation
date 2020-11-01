# REST API: GET collection subprofiles

Alle subprofielen uit een collectie kunnen opgevraagd worden met een HTTP GET 
call naar de volgende URL:

`https://api.copernica.com/v2/collection/$id/subprofiles?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van de 
collectie waar je de subprofielen van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: Eerste subprofiel dat wordt opgevraagd.
* **limit**: Lengte van de batch die wordt opgevraagd.
* **total**: Boolean. Wanneer deze waarde 'false' heeft wordt het totaal aantal beschikbare/matchende subprofielen niet berekend/getoond; dit kan API calls sneller maken.
* **fields**: Vraag alleen subprofielen op die matchen met de opgegeven velden.
* **orderby**: Naam of ID van het veld waarop je de subprofielen wilt sorteren (standaard is dit het ID van elk subprofiel).
* **order**: Moeten de subprofielen oplopend of aflopend (asc of desc) worden gesorteerd?

Meer informatie over de betekenis van de **start**, **limit** en **total** parameters
vind je in het [artikel over paging](rest-paging). 

De parameter **fields** kun je gebruiken om subprofielen te selecteren. Als je bijvoorbeeld
alleen subprofielen wil opvragen waarbij de waarde van het veld "land" gelijk is aan
"Nederland", kun je dat opgeven in het veld "fields". Meer informatie over het
gebruik van deze **fields** parameter kun je vinden in een 
[artikel over de fields parameter](rest-fields-parameter).

De variabele **order** kun je de naam of het id van een veld geven. De profielen
worden dan gesorteerd aan de hand van dit veld. In plaats van de naam of id van het
veld waarop je wilt sorteren, kun je ook een aantal speciale waardes aan de 
parameter *order* geven:

* **id**: dit is de standaardwaarde, subprofielen worden gesorteerd aan de hand van het id
* **random**: de subprofielen worden in willekeurige volgorde teruggegeven
* **modified**: de subprofielen worden gesorteerd op basis het *modified* timestamp.

## Teruggegeven velden

De methode retourneert een JSON object met de subprofielen onder het **data**
veld. Elk subprofiel bevat de volgende velden:

* **ID**: ID van het subprofiel.
* **secret**: De "geheime" code die aan een subprofiel is gekoppeld.
* **fields**: Associative array / object van veldnamen en veldwaardes.
* **profile**: ID van het profiel waar het subprofiel onder hoort.
* **collection**: ID van de collectie waarin het subprofiel is opgeslagen.
* **created**: Tijdstip waarop het subprofiel in aangemaakt, in YYYY-MM-DD hh:mm:ss formaat.
* **modified**: Tijdstip waarop het subprofiel voor het laatst is bijgewerkt, in YYYY-MM-DD hh:mm:ss formaat.
* **removed**: Geeft aan of het subprofiel verwijderd is ('true') of niet ('false').

### JSON voorbeeld

De JSON voor een enkel subprofiel ziet er bijvoorbeeld zo uit:

```json
{  
   "ID":"20285",
   "secret":"132879300b4731870080b1cd301fd43d",
   "fields":{  
   },
   "profile":"2139358",
   "collection":"6312",
   "created":"2008-08-25 16:14:56",
   "modified":"2010-08-25 16:15:56",
   "removed":false
}
```

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

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

// voer de methode uit en print het resultaat
print_r($api->get("collection/{$collectieID}/subprofiles", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van profiel ID's](rest-get-collection-profileids)
* [Subprofiel toevoegen aan een collectie](rest-post-collection-subprofiles)
* [Subprofiel bijwerken](rest-put-subprofile-fields)
* [Subprofiel verwijderen](rest-delete-subprofile)
