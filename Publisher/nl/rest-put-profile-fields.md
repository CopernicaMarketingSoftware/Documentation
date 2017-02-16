# REST API: profielvelden overschrijven

Om de velden van een profiel bij te werken, moet je een HTTP PUT request
sturen naar de volgende URL:

`https://api.copernica.com/profile/$id/fields?access_token=xxxx`

De code $id moet je vervangen door de numerieke identifier van het profiel 
waarvan je de velden wilt veranderen. De nieuwe veldwaardes van het profiel
kun je in de body van het bericht plaatsen.


## Body data

De nieuwe veldwaardes moet je als body data aan je requets meegeven. Deze
data bestaat simpelweg uit de veldnamen die je wilt veranderen, en hun nieuwe
waardes. Als je de data als JSON data verstuurt, moet je dus een object met
als *keys* de veldnamen en als *values* de veldwaardes versturen.

Als je gebruik maakt van een traditioneel x-www-form-urlencoded formaat, dan
moeten de variabelen de namen van de te wijzigen velden bevatten, en de 
waardes van die variabelen zijn de nieuwe waardes van de profielvelden.


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.
In de API call wordt een profiel met ID 4567 aangepast.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // this method takes no parameters
    $parameters = array()

    // data to pass to the call
    $data = array(
        'firstname' =>  'John',
        'lastname'  =>  'Doe',
        'email'     =>  'johndoe@example.com'
    );
    
    // do the call
    $api->put("profile/1234/fields", $parameters, $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van profieldata](rest-get-profile)
* [Alle profiel bijwerken](rest-put-profile)
* [Profiel verwijderen](rest-delete-profile)
