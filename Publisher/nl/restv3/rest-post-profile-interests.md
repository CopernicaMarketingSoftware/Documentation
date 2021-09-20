# REST API: POST profile interests

Om interesses aan een profiel toe te voegen, kun je een HTTP POST
request sturen naar de volgende URL:

`https://api.copernica.com/v3/profile/$id/subprofiles?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier van het profiel 
waaraan je interesses wil toevoegen. De inhoud van de interesses kun je in de message body plaatsen.

## Body data

Er zijn twee manieren om de body data te definiëren en beide manieren hebben een andere functie.
Deze methode is bedoeld om interesses toe te voegen en bestaande interesses uit te schakelen. 
Om alle interesses van een profiel te overschrijven kun je de documentatie over 
het [overschrijven van profiel interesses](./rest-put-profile-interests) bekijken.

De eerste manier om interesses toe te voegen is door een array van interesses te sturen. 
Deze zullen dan toegevoegd worden aan het profiel, terwijl de oude interesses behouden worden.

De tweede manier is om een object te sturen als body data dat als keys interesses heeft en 
als waardes booleans om aan te geven of een interesse geactiveerd moet worden. Zo kunnen bestaande 
interesses ook uitgeschakeld worden. Elke interesse die hierin niet genoemd wordt blijft hetzelfde.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen. 
Voor het eerste profiel worden de interessses 'tennis' en 'hockey' aangezet, 
terwijl 'voetbal' wordt uitgeschakeld. In de tweede API call wordt de interessse 
'voetbal' geactiveerd. 

```php
    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestAPI("your-access-token", 3);

    // data voor de methode
    $data = array(
        'voetbal'   =>  0,
        'tennis'    =>  1,
        'hockey'    =>  1
    );
    
    // voer het eerste verzoek uit
    $api->post("profile/{$profielID1}/interests", $data);

    // data voor het tweede verzoek
    $data2 = array('voetbal')

    // voer het tweede verzoek uit
    $api->post("profile/{$profielID2}/interests", $data2);
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](./rest-api)
* [Opvragen van profieldata](./rest-get-subprofile)
* [Alle profiel bijwerken](./rest-put-subprofile)
* [Profiel verwijderen](./rest-delete-subprofile)
