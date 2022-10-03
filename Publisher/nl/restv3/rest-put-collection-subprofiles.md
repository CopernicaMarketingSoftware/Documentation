# REST API: PUT collection subprofiles

Er is een API-methode om meerdere subprofielen tegelijk te bewerken. Dit kun je
doen met behulp van een HTTP PUT-request naar de volgende URL:

`https://api.copernica.com/v3/collection/$id/subprofiles?access_token=xxxx`

De code `$id` moet je vervangen door de numerieke identifier of de naam van de
collectie waar binnen je subprofielen wilt veranderen. De veldwaardes van het subprofiel
kun je in de body van het bericht plaatsen.

Let goed op dat je daadwerkelijk een PUT-call naar de server stuurt. Hoewel
de meeste API-methodes precies hetzelfde werken of je nou HTTP POST of PUT
gebruikt, geldt dit niet voor deze methode. HTTP PUT is vereist. Als je toch
een POST zou sturen, dan [maak je een nieuw subprofiel aan](rest-post-collection-subprofiles).

## Beschikbare parameters

Bij deze methodes zijn er twee verplichte manieren om data mee te geven;
via de URL en als body van het HTTP-request. Over de body vind je meer onder
het kopje body data. Aan de URL kun je de volgende parameters toevoegen:

De **fields** parameter is verplicht, om te voorkomen dat een enkele API-call
alle subprofielen in de collectie kan bijwerken. Alleen de matchende subprofielen
worden bijgewerkt. Meer informatie over het gebruik van deze **fields**
parameter kun je vinden in een
[artikel over de fields parameter](rest-fields-parameter).

## Voorbeeld

Het volgende PHP-script demonstreert hoe je de API-methode kunt aanroepen.
In dit geval gebruiken we het in de fields parameter het veld 'KlantID' om alle subprofielen met de waarde 
4567 te vinden. We passen de gevonden subprofielen aan met de gegevens uit de body data.

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 3);

// parameters
$parameters = array(
    'fields'    =>  array("klantID==4567"),
);

// velden die bewerkt moeten worden
$fields = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@voorbeeld.com'
);

// de data voor het verzoek
$data = array(
    'fields'    =>  $fields
);

// voer het verzoek uit en print het resultaat
print_r($api->put("collection/{$collectionID}/subprofiles", $data, $parameters));
```

Dit voorbeeld vereist de [REST API-klasse](rest-php).

## Meer informatie

* [Overzicht van alle API-calls](rest-api)
