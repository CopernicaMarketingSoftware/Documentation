# REST API: opvragen van profielen in een database

De methode om profielen uit een database op te vragen is een HTTP GET methode
en beschikbaar via het volgende adres:

`https://api.copernica.com/database/$id/profiles?access_token=xxxx`

De code $id moet je vervangen door de nummerieke identifier of de naam van de 
database waar je de profielen van wilt opvragen.

## Beschikbare parameters

De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

* **start**: eerste profiel dat wordt opgevraagd
* **limit**: lengte van de batch die wordt opgevraagd
* **total**: toon wel/niet het totaal aantal beschikbare/matchende profielen
* **orderby**: naam of id van het veld waarop je de profielen wilt sorteren (standaard is dit het ID van elk profiel)
* **order**: moeten de profielen oplopen of aflopend (asc of desc) worden gesorteerd?
* **fields**: optionele parameter om alleen profielen op te halen die matchen met de opgegeven velden

Meer informatie over de betekenis van de *start*, *limit* en *total* parameters 
vind je in het [artikel over paging](rest-paging).

De variabele *order* kun je de naam of het ID van een veld geven. De profielen
worden dan geretourneerd gesorteerd aan de hand van dit veld. Daarnaast kun je
een aantal speciale waardes opgeven:

* **id**: dit is de standaardwaarde, profielen worden gesorteerd aan de hand van het ID
* **random**: de profielen worden in willekeurige volgorde teruggegeven
* **modified**: de profielen worden gesorteerd op basis het *modified* timestamp.

Het veld *fields* kun je gebruiken om profielen te selecteren. Als je bijvoorbeeld
alleen profielen wil opvragen waarbij de waarde van het veld "land" gelijk is aan
"Nederland", kun je dat opgeven in het veld "fields". De parameter *fields* is
een array-parameter. Dit wil zeggen dat je in de URL de variabele als *fields[]* (dus
met blokhaken!) moet opnemen, en dat de parameter meerdere keren in de URL mag 
voorkomen:

`https://api.copernica.com/database/$id/profiles?fields[]=land%3D%3Dnederland&fields[]=leeftijd%3E16&access_token=xxxx`

Je kunt de *fields* parameters gebruiken voor verschillende soorten vergelijkingen.
In bovenstaand voorbeeld staat bijvoorbeeld "land==nederland" en "leeftijd&gt;16" om
profielen uit Nederland ouder dan 16 jaar te selecteren. In de URL zijn, zoals
je kunt zien, het is-gelijk-teken en het groter-dan-teken vervangen door de
hexadecimale codes %3D en %4E. Dit is nodig omdat deze tekens voor conflicten
kunnen zorgen als je ze letterlijk in een URL opneemt.

De waardes in het *fields* array hebben altijd de vorm "veld operator waarde", zoals
"land==nederland". De volgende operators worden hierbij herkend:

* **==**: gelijk aan
* **!=** en **&lt;&gt;**: ongelijk aan
* **&lt;**, **&gt;**, **&lt;=**, **&gt;=**: kleiner/groter en kleiner-of-gelijk/groter-of-gelijk
* **=~** en **!~**: de `like` en `not like` operator

De laatstgenoemde `like` en `not like` operators kun je gebruiken om profielen te 
matchen. In de waarde waarmee je vergelijkt kun je gebruik maken van de % en _ wildcards.
Het teken % matcht met een willekeurige reeks tekens, en _ met precies één teken.
Als je bijvoorbeeld alle profielen wilt opvragen waarvan de voornaam begint met de
letter 'M', dan kun je in de *fields* parameter de waarde "voornaam=~M%" plaatsen.


## Geretourneerde velden

De methode retourneert een lijst van profielen. Voor elk profiel worden de 
volgende eigenschappen teruggegeven:

* **ID**: nummeriek ID van het profiel
* **database**: ID van de database waarin het profiel is opgeslagen
* **secret**: de "geheime" code die aan een profiel is gekoppeld
* **created**: datum waarop het profiel is aangemaakt
* **fields**: associative array / object van veldnamen en veldwaardes
* **interests**: array van de interesses van het profiel


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
    print_r($api->get("database/1234/profiles", $parameters));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-reference)
* [Profiel toevoegen aan een database](rest-post-database-profiles)
* [Profiel bijwerken](rest-put-profile-fields)
* [Profiel verwijderen](rest-delete-profile)
