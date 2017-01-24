# REST API: opvragen databases



## Voorbeeld in PHP

    // change this into your access token
    $access_token = urlencode("your-access-token");
    
    // create a curl resource
    $curl = curl_init("https://api.copernica.com/databases?access_token=$access_token");
    
    // additional curl option
    curl_setopt_array(array(
    
    
    ));
    
    // do the call
    $answer = curl_exec($curl);
    
    // clean up curl resource
    curl_free($curl);
    
    // output result
    print_r(json_decode($answer));
    
    