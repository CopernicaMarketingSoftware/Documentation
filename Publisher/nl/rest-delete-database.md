# REST API: verwijderen van een database

Methode om een database (en alle bijbehorende profielen!) te verwijderen

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // change this into your access token
    $access_token = "private-access-token";
    
    // the database name or id that is being removed
    $id = urlencode(1234);
    
    // parameters to be passed to the url
    $parameters = array(
        'access_token'      =>  $access_token
    );
    
    // create a curl resource
    $curl = curl_init("https://api.copernica.com/database/$id?".http_build_query($parameters));
    
    // additional curl option
    curl_setopt_array($curl, array(
        CURLOPT_CUSTOMREQUEST   =>  'DELETE',
        CURLOPT_RETURNTRANSFER  =>  true
    ));
    
    // do the call
    curl_exec($curl);
    
    // clean up curl resource
    curl_close($curl);

