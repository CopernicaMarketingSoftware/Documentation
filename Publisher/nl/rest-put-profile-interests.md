# REST API: interesses van profiel overschrijven

Om de interesses van een profiel te overschrijven, kun je een HTTP PUT
request sturen naar de volgende URL:

`https://api.copernica.com/profile/$id/interests?access_token=xxxx`

De code $id moet je vervangen door de numerieke identifier van het profiel 
waarvan je de interesses wilt veranderen. De nieuwe interesses van het profiel
kun je in de body van het bericht plaatsen.


## Body data

Je kunt op twee manieren body data aan dit request meesturen, en de wijze waarop
je dit doet is van invloed op de manier waarop de method werkt.

Als je een array van interessenamen meestuurt, dan worden _alle_ interesses
van het profiel overschreven. Alle huidige interesses worden uitgeschakeld,
en alleen de interesses die in het array zijn opgenomen worden geactiveerd.

Je kunt ook een object sturen als body data. De keys van het object zijn dan
de interessenamen, en de velden boolean waardes om te bepalen of de interesse
aan of uit wordt geschakeld. Eventuele interesses die je _niet_ in het object
opneemt, worden automatisch uitgeschakeld.


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.
In de API call worden de interessen van een profiel met ID 4567 aangepast.
Voor profiel 1234 worden de interesses "tennis" en "hockey" geactiveerd, en
alle andere interesses (zelfs de interesses die niet expliciet zijn vermeld) 
uitgeschakeld. Daarna wordt voor profiel 1235 de interesse 'football' geactiveerd,
en alle andere interesses uitgeschakeld.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // this method takes no parameters
    $parameters = array()

    // data to pass to the call, the new interests
    $data = array(
        'football'  =>  0,
        'tennis'    =>  1,
        'hockey'    =>  1
    );
    
    // do the call
    $api->put("profile/1234/interests", $parameters, $data);

    // data to pass to a second call
    $data = array('football');
    
    // do the call
    $api->put("profile/1235/interests", $parameters, $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Interesses toevoegen aan een profiel](rest-post-profile-interests)
* [Opvragen van profieldata](rest-get-profile)
* [Alle profiel bijwerken](rest-put-profile)
* [Profiel verwijderen](rest-delete-profile)
