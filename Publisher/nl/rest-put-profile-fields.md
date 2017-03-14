# REST API: profielvelden overschrijven

Om de velden van een profiel bij te werken, moet je een HTTP PUT request
sturen naar de volgende URL:

`https://api.copernica.com/v1/profile/$id/fields?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van het profiel 
waarvan je de velden wilt veranderen. De nieuwe veldwaardes van het profiel
kun je in de body van het bericht plaatsen.

## Body data

De nieuwe veldwaardes moet je als body data aan je request meegeven. Deze
data bestaat simpelweg uit de veldnamen die je wilt veranderen, en hun nieuwe
waardes. Als je de data als JSON data verstuurt, moet je dus een object met
als *keys* de veldnamen en als *values* de veldwaardes versturen.

Als je gebruik maakt van een traditioneel x-www-form-urlencoded formaat, dan
moeten de variabelen de namen van de te wijzigen velden bevatten, en de 
waardes van die variabelen zijn de nieuwe waardes van de profielvelden.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.
In de API call wordt een profiel met ID 4567 aangepast.

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // data voor de methode
    $data = array(
        'firstname' =>  'John',
        'lastname'  =>  'Doe',
        'email'     =>  'johndoe@example.com'
    );
    
    // voer het verzoek uit
    $api->put("profile/1234/fields", $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    
## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van profieldata](rest-get-profile)
* [Alle profiel bijwerken](rest-put-profile)
* [Profiel verwijderen](rest-delete-profile)
