# REST API: bijwerken gegevens van een database

Methode om de properties van een database bij te werken

## Beschikbare parameters

* *name*: de optionele nieuwe naam van de database
* *description*: de optionele nieuwe omschrijving van de database
* *archived*: optionele boolean waarde om de database te archiveren

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // change this into your access token
    $access_token = "private-access-token";
    
    // the name or id of the database that is being modified
    $id = urlencode(1234);
    
    // parameters to be passed to the url
    $parameters = array(
        'access_token'      =>  $access_token
    );
    
    // data to be sent to the api
    $data = json_encode(array(
        'name'          =>  'mijn-test-database',
        'description'   =>  'omschrijving van de database'
    ));
    
    // create a curl resource
    $curl = curl_init("https://api.copernica.com/database/$id?".http_build_query($parameters));
    
    // additional curl option
    curl_setopt_array($curl, array(
        CURLOPT_CUSTOMREQUEST   =>  'PUT',
        CURLOPT_HTTPHEADER      =>  array('content-type: application/json', 'content-length: '.strlen($data)),
        CURLOPT_POSTFIELDS      =>  $data,
        CURLOPT_RETURNTRANSFER  =>  true
    ));
    
    // do the call
    curl_exec($curl);
    
    // clean up curl resource
    curl_close($curl);

