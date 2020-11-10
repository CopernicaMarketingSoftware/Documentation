# REST API: GET collection subprofiles

De methode om subprofielen uit een selectie op te vragen is een HTTP GET methode
beschikbaar op het volgende adres:

`https://api.copernica.com/v2/collection/$id/subprofiles?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van de 
collectie waar je de subprofielen van wilt opvragen. Deze methode kan traag zijn 
als de database veel profielen bevat. Om deze methode sneller te maken kan 
er gebruik gemaakt worden van de 'dataonly' parameter.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: Eerste ID om op te vragen
* **limit**: Aantal subprofielen om op te vragen
* **total**: Boolean. Geeft aan of het totale aantal subprofielen getoond moet worden. 
De methode is sneller wanneer dit op 'false' staat.
* **fields**: Optionele parameter om condities voor subprofielen mee in te stellen.
* **orderby**: Naam of id van het veld om op te sorteren (standaard is dit de ID).
* **order**: Geeft de volgorde aan; oplopend ('asc') of aflopend ('desc').
* **dataonly**: Boolean. Wanneer deze de waarde 'true' heeft worden alleen de ID, velden, 
collectie ID, profiel ID en datum van laatste aanpassing opgevraagd om de methode sneller te maken.

Als je de subprofielen per profiel wil opvragen kun je dit doen 
door middel van de methode voor het [opvragen van subprofielen voor een profiel](./rest-get-profile-subprofiles).

### Paging

Meer over de **start**, **limit** en **total** parameters vind je in het [artikel over paging](rest-paging). 

### Fields 

De **fields** parameter kun je gebruiken om subprofielen te selecteren. Als je bijvoorbeeld
alleen subprofielen wil opvragen waarbij de waarde van het veld "land" gelijk is aan
"Nederland", kun je dat opgeven in deze parameter. Meer informatie over het
gebruik van de **fields** parameter kun je vinden in een 
[artikel over de fields parameter](rest-fields-parameter).

### Sorteren

De parameter **orderby** geeft het veld aan waarop gesorteerd moet worden. 
In plaats van de naam of ID van het veld waarop je wilt sorteren, kun 
je ook een aantal speciale waardes aan de parameter **orderby** geven:

* **id**: Subprofielen worden gesorteerd aan de hand van de ID (standaard).
* **random**: Subprofielen worden willekeurig gesorteerd.
* **modified**: Subprofielen worden gesorteerd op volgorde van de laatste aanpassing.

## Teruggegeven velden

De methode retourneert een JSON object met de subprofielen onder het **data**
veld. Elk subprofiel bevat de volgende velden:

* **ID**: ID van het subprofiel.
* **secret**: De "geheime" code die aan een subprofiel is gekoppeld.
* **fields**: Associatieve array / object van veldnamen en veldwaardes.
* **profile**: ID van het profiel waar het subprofiel onder hoort.
* **collection**: ID van de collectie waarin het subprofiel is opgeslagen.
* **created**: Tijdstip waarop het subprofiel in aangemaakt, in YYYY-MM-DD hh:mm:ss formaat.
* **modified**: Tijdstip waarop het subprofiel voor het laatst is bijgewerkt, in YYYY-MM-DD hh:mm:ss formaat.
* **removed**: Geeft aan of het subprofiel verwijderd is ('true') of niet ('false').

Sommige van deze velden worden niet teruggegeven als de **dataonly** parameter 
op 'false' staat.

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

* [Overzicht van alle API calls](./rest-api)
* [Opvragen van profiel ID's](./rest-get-collection-profileids)
* [Subprofielen voor een profiel opvragen](./rest-get-profile-subprofiles)
* [Subprofiel toevoegen aan een collectie](./rest-post-collection-subprofiles)
* [Subprofiel bijwerken](./rest-put-subprofile-fields)
* [Subprofiel verwijderen](./rest-delete-subprofile)
