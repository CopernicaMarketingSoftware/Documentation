# REST API: opvragen van profielen in een database

De methode om profielen uit een database op te vragen is een HTTP GET methode
en beschikbaar via het volgende adres:

`https://api.copernica.com/v1/database/$id/profiles?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier of de naam van de 
database waar je de profielen van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: eerste profiel dat wordt opgevraagd
* **limit**: lengte van de batch die wordt opgevraagd
* **total**: toon wel/niet het totaal aantal beschikbare/matchende profielen
* **fields**: optionele parameter om alleen profielen op te halen die matchen met de opgegeven velden
* **orderby**: naam of id van het veld waarop je de profielen wilt sorteren (standaard is dit het ID van elk profiel)
* **order**: moeten de profielen oplopen of aflopend (asc of desc) worden gesorteerd?

Meer informatie over de betekenis van de *start*, *limit* en *total* parameters 
vind je in het [artikel over paging](rest-paging). 

De parameter *fields* kun je gebruiken om profielen te selecteren. Als je bijvoorbeeld
alleen profielen wil opvragen waarbij de waarde van het veld "land" gelijk is aan
"Nederland", kun je dat opgeven in het veld "fields". Meer informatie over het
gebruik van deze *fields* parameter kun je vinden in een 
[artikel over de fields parameter](rest-fields-parameter).

De variabele *order* kun je de naam of het ID van een veld geven. De profielen
worden dan gesorteerd aan de hand van dit veld. In plaats van de naam of ID van het
veld waarop je wilt sorteren, kun je ook een aantal speciale waardes aan de 
parameter *order* geven:

* **id**: dit is de standaardwaarde, profielen worden gesorteerd aan de hand van het ID
* **random**: de profielen worden in willekeurige volgorde teruggegeven
* **modified**: de profielen worden gesorteerd op basis het *modified* timestamp.

## Geretourneerde velden

De methode retourneert een lijst van profielen. Voor elk profiel worden de 
volgende eigenschappen teruggegeven:

* **ID**: numeriek ID van het profiel
* **database**: ID van de database waarin het profiel is opgeslagen
* **secret**: de "geheime" code die aan een profiel is gekoppeld
* **created**: tijdstip waarop het profiel in aangemaakt, in YYYY-MM-DD hh:mm:ss formaat
* **modified**: tijdstip waarop het profiel voor het laatst is bijgewerkt, in YYYY-MM-DD hh:mm:ss formaat
* **fields**: associative array / object van veldnamen en veldwaardes
* **interests**: array van de interesses van het profiel

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen. Omdat
we in het voorbeeld de CopernicaRestApi klasse gebruiken, hoef je je niet heel
druk te maken over het vervangen van speciale tekens in de URL. Dat doet de
klasse automatisch.

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je acces token
    $api = new CopernicaRestApi("your-access-token");

    // parameters voor de methode
    $parameters = array(
        'limit'     =>  100,
        'orderby'   =>  'country',
        'fields'    =>  array("age>16", "age<=65")
    );
    
    // voer de methode uit en print het resultaat
    print_r($api->get("database/1234/profiles", $parameters));

Dit voorbeeld vereist de [REST API class](rest-php).
    

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van profiel ID's](rest-get-database-profileids)
* [Profiel toevoegen aan een database](rest-post-database-profiles)
* [Profiel bijwerken](rest-put-profile-fields)
* [Profiel verwijderen](rest-delete-profile)
