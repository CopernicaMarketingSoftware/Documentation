# REST API: meerdere profielen bewerken

Er is een API methode om meerdere profielen tegelijk te bewerken. Dit kun je
doen met behulp van een HTTP PUT request naar de volgende URL:

`https://api.copernica.com/v1/database/$id/profiles?access_token=xxxx`

De code $id moet je vervangen door de numerieke identifier of de naam van de 
database waar binnen je profielen wilt veranderen. De veldwaardes van het profiel
kun je in de body van het bericht plaatsen.

Let goed op dat je daadwerkelijk een PUT call naar de server stuurt. Hoewel
de meeste API methodes precies hetzelfde werken of je nou HTTP POST of PUT
gebruikt, geldt dit niet voor deze methode. HTTP PUT is vereist. Als je toch
een POST zou sturen, dan [maak je een nieuw profiel aan](rest-post-database-profiles). 


## Beschikbare parameters

Bij deze methodes kun je (en moet je!) op twee verschillende manieren data
meegeven: via de URL en als body van het HTTP request. Aan de URL kun je de
volgende parameters toevoegen:

* **fields**: verplichte parameter om de profielen te selecten die worden aangepast
* **create**: boolean parameter om aan te geven dat een nieuw profiel moet worden aangemaakt indien er geen matchende profielen zijn
* **async**: boolean parameter om aan te geven dat de profiel asynchroon moeten worden aangemaakt. De API methode returnt dan onmiddellijk, en gaat in de achtergrond verder met het bijwerken van profielen

De *fields* parameter is verplicht. Deze parameter voorkomt dat je met een
enkele API call alle profielen in de database bijwerkt. Alleen de matchende
profielen worden bijgewerkt. Meer informatie over het gebruik van deze *fields* 
parameter kun je vinden in een 
[artikel over de fields parameter](rest-fields-parameter).

Als er geen matchende profielen zijn, dat kun je met de *create* parameter 
aangeven dat een nieuw profiel moet worden aangemaakt op basis van de meegegeven
request data.

Het bijwerken van meerdere profielen kan een tijdrovende operatie zijn, met name
als er veel matchende profielen zijn. Als je niet zo lang op een API
call wilt wachten, kun je de parameter *async* op 1 zetten. De API retourneert
dan onmiddellijk, terwijl de operatie in de achtergrond wordt voortgezet.


## Body data

Naast de parameters die je aan de URL meegeeft, moet je ook body data aan het
PUT request toevoegen. In de body van het request plaats je de velden die je 
wilt bijwerken, met de bijbehorende data. Deze body data wordt ook gebruikt
als de *create* parameter op true staat en een profiel wordt aangemaakt.


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.
In de API call wordt een profiel met ID 4567 aangepast.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // parameters to select profiles
    $parameters = array(
        'fields'    =>  array("customerid==4567"),
        'async'     =>  1,
        'create'    =>  0
    );

    // data to pass to the call
    $data = array(
        'firstname' =>  'John',
        'lastname'  =>  'Doe',
        'email'     =>  'johndoe@example.com'
    );
    
    // do the call
    $api->put("database/1234/profiles", $parameters, $data);

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van alle profielen](rest-get-database-profiles)
* [Profiel bijwerken](rest-put-profile-fields)
* [Profiel verwijderen](rest-delete-profile)
