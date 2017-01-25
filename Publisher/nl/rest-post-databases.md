# REST API: aanmaken nieuwe database

Methode om een nieuwe database aan te maken.

## Beschikbare parameters

* *name*: naam van de nieuw aan te maken database
* *description*: optionele omschrijving van de database
* *archived*: optionele boolean waarde om de database direct te archiveren

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // change this into your access token
    $access_token = "private-access-token";
    
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
    $curl = curl_init("https://api.copernica.com/databases?".http_build_query($parameters));
    
    // additional curl option
    curl_setopt_array($curl, array(
        CURLOPT_CUSTOMREQUEST   =>  'PUT',
        CURLOPT_HTTPHEADER      =>  array('content-type: application/json', 'content-length: '.strlen($data)),
        CURLOPT_POSTFIELDS      =>  $data,
        CURLOPT_RETURNTRANSFER  =>  true
    ));
    
    // do the call
    $answer = curl_exec($curl);
    
    // clean up curl resource
    curl_close($curl);
    
    // output result
    print_r(json_decode($answer));
    

