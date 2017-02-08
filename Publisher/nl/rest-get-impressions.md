# REST API: opvragen geregistreerde impressies

Er is een API methode waarmee je alle impressies die door Copernica zijn
geregistreerd kunt opvragen. Dit is een HTTP GET methode die je kunt aanroepen
via het volgende adres:

`https://api.copernica.com/impressions?access_token=xxxx`

## Beschikbare parameters

Als je de methode zonder parameters aanroept, dan worden alle impressies
van het hele account geretourneerd, ongeacht de mailing of het profiel waar
de impressie voor is geregistreerd. Door parameters toe te voegen kun je 
echter een *subset* van deze impressies opvragen. De volgende parameters
worden ondersteund:

* **start**: beginposition van de batch van impressies die wordt opgevraagd (standaard 0)
* **limit**: lengte van de batch die wordt opgevraagd (standaard 100)
* **total**: toon wel/niet het totaal aantal beschikbare impressies in de output
* **emailing**: nummerieke identifier van een emailing als alleen de impressies behorende bij een emailing moeten worden opgevraagd
* **destination**: nummerieke identifier van een geadresseerde als alleen de impressies behorende bij die geadresseerde moeten worden opgevraagd
* **profile**: nummerieke identifier van een profiel om alleen impressie van dat profiel op te halen
* **subprofile**: nummerieke identifier van een subprofiel om alleen impressie van dat subprofiel op te halen

Meer informatie over de betekenis van deze parameters *start*, *limit* en *total*
vind je in het [artikel over paging](rest-paging).

## Geretourneerde velden

De methode retourneert een lijst van impressies. Van elke impressie in de lijst
wordt een aantal velden teruggegeven:

* **ID**: Unieke nummerieke identifier
* **timestamp**: Tijdstip waarop de impressie is geregistreerd
* **ip**: IP adres van de impressie
* **user-agent**: De user-agent string
* **referer**: De waarde van de referer http header
* **emailing**: Nummerieke identifier van de emailing waartoe de impressie behoort 
* **destination**: Nummerieke identifier van de geadresseerde
* **profile**: Optionele nummerieke identifier van het profiel
* **subprofile**: Optionele nummerieke identifier van het subprofiel


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen 
vanuit een PHP script:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // parameters to pass to the call
    $parameters = array(
        'limit'     =>  100
    );
    
    // do the call, and print result
    print_r($api->get("impressions", $parameters));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van abuse meldingen](rest-get-abuses)
* [Opvragen van kliks](rest-get-clicks)
* [Opvragen van geaccepteerde berichten](rest-get-deliveries)
* [Opvragen van geregistreere fouten](rest-get-errors)
* [Opvragen van afmeldingen](rest-get-unsubscribes)

