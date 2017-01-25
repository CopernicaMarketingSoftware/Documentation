# REST API: opvragen velden in een database

Methode om een overzicht op te vragen van alle beschikbare velden in een database. Op deze
methode zijn de [paging parameters](rest-paging) van toepassing.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // change this into your access token
    $access_token = "private-access-token";
    
    // name or id of the database from which the fields are fetched
    $id = urlencode(1234);
    
    // parameters to be passed to the url
    $parameters = array(
        'access_token'      =>  $access_token
    );
    
    // create a curl resource
    $curl = curl_init("https://api.copernica.com/database/$id/fields?".http_build_query($parameters));
    
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
    

## Ondersteunde parameters

Naast de standaard [paging parameters](rest-paging) worden geen aanvullende
parameters ondersteund.
