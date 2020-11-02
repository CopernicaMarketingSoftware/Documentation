# REST API: PUT database profiles

Er is een API methode om meerdere profielen tegelijk te bewerken. Dit kun je
doen met behulp van een HTTP PUT request naar de volgende URL:

`https://api.copernica.com/v2/database/$id/profiles?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier of de naam van de
database waar binnen je profielen wilt veranderen. De veldwaardes van het profiel
kun je in de body van het bericht plaatsen.

Let goed op dat je daadwerkelijk een PUT call naar de server stuurt. Hoewel
de meeste API methodes precies hetzelfde werken of je nou HTTP POST of PUT
gebruikt, geldt dit niet voor deze methode. HTTP PUT is vereist. Als je toch
een POST zou sturen, dan [maak je een nieuw profiel aan](rest-post-database-profiles).

## Beschikbare parameters

Bij deze methodes zijn er twee verplichte manieren om data mee te geven;
via de URL en als body van het HTTP request. Over de body vind je meer onder
het kopje body data. Aan de URL kun je de volgende parameters toevoegen:

* **fields**: verplichte parameter om de profielen te selecteren die worden aangepast
* **create**: boolean parameter om aan te geven dat een nieuw profiel moet worden aangemaakt indien er geen matchende profielen zijn
* **async**: boolean parameter om aan te geven dat de profiel asynchroon moeten worden aangemaakt. De API methode returned dan onmiddellijk, en gaat in de achtergrond verder met het bijwerken van profielen

De **fields** parameter is verplicht, om te voorkomen dat een enkele API call
alle profielen in de database kan bijwerken. Alleen de matchende profielen
worden bijgewerkt. Meer informatie over het gebruik van deze **fields**
parameter kun je vinden in een
[artikel over de fields parameter](rest-fields-parameter).

Met de **create** parameter kun je aangeven dat als er geen matchende profielen
zijn, een nieuw profiel moet worden aangemaakt op basis van de meegegeven
body data.

Het bijwerken van meerdere profielen kan een tijdrovende operatie zijn, met name
als er veel matchende profielen zijn. Als je niet zo lang op een API
call wilt wachten, kun je de parameter *async* op 1 zetten. De API retourneert
dan onmiddellijk, terwijl de operatie in de achtergrond wordt voortgezet.

## Body data

Naast de parameters die je aan de URL meegeeft, moet je ook body data aan het
PUT request toevoegen. In de body van het verzoek kun je twee optionele arrays meegeven:
'fields' bevat de velden voor het profiel en 'interests' de interesses. 
De interesses kunnen als een associatieve array ('voetbal' => 1, 'honkbal' => 0) 
of als een lijst ('voetbal') meegegeven worden. De profielvelden moeten 
meegegeven worden als associatieve array.

Let op! Hier wordt de body data op een andere manier meegegeven dan in 
[versie 1](../restv1/rest-post-database-profiles) van de API.

## Geretourneerde velden

Als deze methode met behulp van onze PHP hulpklasse succesvol een profiel 
heeft aangemaakt wordt de ID van dit profiel teruggegeven. In alle andere 
succesvolle gevallen wordt een 1 teruggegeven. Ook is de nieuwe profiel ID 
altijd terug te vinden in de 'X-Created' header.

## Voorbeeld

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.
In dit geval gebruiken we de profiel selectie parameters om het profiel met ID
4567 te vinden. We passen het profiel aan met de body data.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters voor het selecteren van profielen
$parameters = array(
    'fields'    =>  array("klantID==4567"),
    'async'     =>  1,
    'create'    =>  0
);

// velden die bewerkt moeten worden
$fields = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@voorbeeld.com'
);

// interesses voor het nieuwe profiel
$interests = array(
    'football'  => 1,
    'baseball'  => 0
);

// de velden en interesses vormen samen de data voor het verzoek
$data = array(
    'fields'    =>  $fields,
    'interests' =>  $interests
);

// voer het verzoek uit en print het resultaat
print_r($api->put("database/{$databaseID}/profiles", $data, $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [Opvragen van alle profielen](rest-get-database-profiles)
* [Profiel bijwerken](rest-put-profile-fields)
* [Profiel verwijderen](rest-delete-profile)
