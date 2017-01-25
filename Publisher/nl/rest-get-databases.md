# REST API: opvragen databases

Methode om een overzicht op te vragen van alle beschikbare databases. Op deze
methode zijn de [paging parameters](rest-paging) van toepassing.

## Geretourneerde velden

De methode retourneert een lijst van databases. Van elke database in de lijst
wordt een aantal velden teruggegeven. Meer informatie over de betekenis
van deze velden kun je vinden in het artikel over het 
[opvragen van een enkele database](rest-get-database).

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // change this into your access token
    $access_token = "private-access-token";
    
    // parameters to be passed to the url
    $parameters = array(
        'access_token'      =>  $access_token
    );
    
    // create a curl resource
    $curl = curl_init("https://api.copernica.com/databases?".http_build_query($parameters));
    
    // additional curl option
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER      =>  true
    ));
    
    // do the call
    $answer = curl_exec($curl);
    
    // clean up curl resource
    curl_close($curl);
    
    // output result
    print_r(json_decode($answer));
    

## Meer informatie

* [Overzicht van alle API calls](rest-reference)
* [Opvragen van een enkele database](rest-get-database)
* [Aanmaken van een database](rest-post-databases)
