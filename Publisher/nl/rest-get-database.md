# REST API: opvragen gegevens van een database

Methode om alle meta gegevens van een database op te vragen.

## Geretourneerde velden

* **ID**: Unieke nummerieke identifier
* **name**: Naam van de database
* **description**: Omschrijving van de database
* **archived**: Is de database gearchiveerd of niet?
* **created**: Tijdstip waarop de database is aangemaakt
* **fields**: Array met de velden in de database
* **interests**: Array met de interesses in de database
* **collections**: Array met de collecties in de database

De velden, interesses en collecties worden teruggegeven als arrays van
objecten.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen:

    // change this into your access token
    $access_token = "private-access-token";
    
    // id or name of the database
    $id = urlencode(1234);
    
    // parameters to be passed to the url
    $parameters = array(
        'access_token'      =>  $access_token
    );
    
    // create a curl resource
    $curl = curl_init("https://api.copernica.com/database/$id?".http_build_query($parameters));
    
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
* [Bewerken van een database](rest-put-database)
