# REST API: interesses aan een profiel toevoegen

Om interesses aan een profiel toe te voegen, kun je een HTTP POST
request sturen naar de volgende URL:

`https://api.copernica.com/v1/profile/$id/interests?access_token=xxxx`

De code $id moet je vervangen door de numerieke identifier van het profiel 
waarvan je de interesses wilt veranderen. De nieuwe interesses van het profiel
kun je in de body van het bericht plaatsen.


## Body data

Je kunt op twee manieren body data aan dit request meesturen, en de wijze waarop
je dit doet is van invloed op de manier waarop de method werkt.

Als je een array van interessenamen meestuurt, dan worden deze interesses aan
het profiel toegevoegd. De interesses die al geactiveerd waren veranderen niet.

Je kunt ook een object sturen als body data. De keys van het object zijn dan
de interessenamen, en de velden boolean waardes om te bepalen of de interesse
aan of uit wordt geschakeld. Eventuele interesses die je _niet_ in het object
opneemt, worden niet veranderd. Als een profiel zo'n niet vermelde interesse
al had, dan houdt het profiel deze interesse.


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.
In de API call worden de interessen van een profiel met ID 4567 aangepast.
Voor profiel 1234 worden de interesses "tennis" en "hockey" geactiveerd, en
de interesse "football" uitgeschakeld. Alle andere interesses (de interesses 
die niet expliciet zijn vermeld) houden hun bestaande waarde. Daarna wordt aan
profiel 1235 de interesse 'football' toegevoegd:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // data to pass to the call, the new interests
    $data = array(
        'football'  =>  0,
        'tennis'    =>  1,
        'hockey'    =>  1
    );
    
    // do the call
    $api->post("profile/1234/interests", $data);

    // data to pass to a second call
    $data = array('football');
    
    // do the call
    $api->post("profile/1235/interests", $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Interesses van een profiel overschrijven](rest-put-profile-interests)
* [Opvragen van profieldata](rest-get-profile)
* [Alle profiel bijwerken](rest-put-profile)
* [Profiel verwijderen](rest-delete-profile)
