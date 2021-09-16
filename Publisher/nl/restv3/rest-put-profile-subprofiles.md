# REST API: PUT profiel subprofielen

Je kunt een subprofiel bewerken door een HTTP PUT request sturen naar de volgende 
URL:

`https://api.copernica.com/v3/profile/$id/subprofiles/$id?access_token=xxxx`

De eerste `$id` moet vervangen worden door de numerieke identifier van het
profiel waaraan de subprofielen gekoppeld zijn. De tweede `$id` moet vervangen
worden door de identifier of naam van de collectie die de subprofieldn bevat.
De inhoud van het subprofiel kun je in de message body plaatsen.

Let goed op dat je daadwerkelijk een PUT call naar de server stuurt. Hoewel
de meeste API methodes precies hetzelfde werken of je nou HTTP POST of PUT
gebruikt, geldt dit niet voor deze methode. HTTP PUT is vereist. Als je toch
een POST zou sturen, dan [maak je een nieuw subprofiel aan](rest-post-profile-subprofiles).

## Beschikbare parameters

Bij deze methodes zijn er twee verplichte manieren om data mee te geven;
via de URL en als body van het HTTP request. Over de body vind je meer onder
het kopje body data. Aan de URL kun je de volgende parameters toevoegen:

* **fields**: verplichte parameter om de subprofielen te selecteren die worden aangepast
* **create**: boolean parameter om aan te geven dat een nieuw subprofiel moet worden aangemaakt indien er geen matchende profielen zijn

De **fields** parameter is verplicht, om te voorkomen dat een enkele API call
alle profielen met de combinatie van profiel/collectie kan bijwerken.
Alleen de matchende profielen worden bijgewerkt. Meer informatie over het
gebruik van deze **fields** parameter kun je vinden in een
[artikel over de fields parameter](rest-fields-parameter).

Met de **create** parameter kun je aangeven dat als er geen matchende profielen
zijn, een nieuw subprofiel moet worden aangemaakt op basis van de meegegeven
body data.

## Body data

De veldnamen en nieuwe waarden van de te bewerken subprofielvelden moeten
worden meegegeven in de body. 


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe de API methode aan kan worden geroepen.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters voor het selecteren van subprofielen
$parameters = array(
    'fields'    =>  array("klantID==4567"),
    'async'     =>  1,
    'create'    =>  0
);

// velden die bewerkt moeten worden
$data = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@example.com'
);

// voer het verzoek uit
$api->put("profile/{$profielID}/subprofiles/{$collectieID}", $data);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Meerdere profielen bewerken in een database](rest-put-database-profiles)
* [Subprofielvelden bijwerken](rest-put-subprofile-fields)
* [Subprofiel toevoegen aan een profiel/collectie](rest-post-profile-subprofiles)
