# REST API: opvragen van subprofielen in een collectie

De methode om subprofielen uit een collectie op te vragen is een HTTP GET methode
en beschikbaar via het volgende adres:

`https://api.copernica.com/collection/$id/subprofiles?access_token=xxxx`

De code $id moet je vervangen door de nummerieke identifier van de 
collectie waar je de subprofielen van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: eerste profiel dat wordt opgevraagd
* **limit**: lengte van de batch die wordt opgevraagd
* **total**: toon wel/niet het totaal aantal beschikbare/matchende profielen
* **fields**: optionele parameter om alleen subprofielen op te halen die matchen met de opgegeven velden
* **orderby**: naam of id van het veld waarop je de subprofielen wilt sorteren (standaard is dit het ID van elk subprofiel)
* **order**: moeten de profielen oplopen of aflopend (asc of desc) worden gesorteerd?

Meer informatie over de betekenis van de *start*, *limit* en *total* parameters 
vind je in het [artikel over paging](rest-paging). 

De parameter *fields* kun je gebruiken om subprofielen te selecteren. Als je bijvoorbeeld
alleen subprofielen wil opvragen waarbij de waarde van het veld "land" gelijk is aan
"Nederland", kun je dat opgeven in het veld "fields". Meer informatie over het
gebruik van deze *fields* parameter kun je vinden in een 
[artikel over de fields parameter](rest-fields-parameter).

De variabele *order* kun je de naam of het ID van een veld geven. De profielen
worden dan gesorteerd aan de hand van dit veld. In plaats van de naam of ID van het
veld waarop je wilt sorteren, kun je ook een aantal speciale waardes aan de 
parameter *order* geven:

* **id**: dit is de standaardwaarde, subprofielen worden gesorteerd aan de hand van het ID
* **random**: de subprofielen worden in willekeurige volgorde teruggegeven
* **modified**: de subprofielen worden gesorteerd op basis het *modified* timestamp.


## Geretourneerde velden

De methode retourneert een lijst van subprofielen. Voor elk subprofiel worden de 
volgende eigenschappen teruggegeven:

* **ID**: nummeriek ID van het subprofiel
* **collection**: ID van de collectie waarin het subprofiel is opgeslagen
* **profile**: ID van het profiel waar het subprofiel bij hoort
* **secret**: de "geheime" code die aan een subprofiel is gekoppeld
* **fields**: associative array / object van veldnamen en veldwaardes


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen. Omdat
we in het voorbeeld de CopernicaRestApi klasse gebruiken, hoef je je niet heel
druk te maken over het vervangen van speciale tekens in de URL. Dat doet de
klasse automatisch.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // parameters to pass to the call
    $parameters = array(
        'limit'     =>  100,
        'orderby'   =>  'country',
        'fields'    =>  array("age>16", "age<=65")
    );
    
    // do the call, and print result
    print_r($api->get("collection/1234/subprofiles", $parameters));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van profiel ID's](rest-get-collection-profileids)
* [Subrofiel toevoegen aan een collectie](rest-post-collection-subprofiles)
* [Subrofiel bijwerken](rest-put-subprofile-fields)
* [Subrofiel verwijderen](rest-delete-subprofile)
