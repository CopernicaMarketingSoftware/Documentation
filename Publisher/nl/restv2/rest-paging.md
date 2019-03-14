# REST API: paging

Heel veel REST methodes retourneren een lijst van objecten. De methode om
[databases op te vragen](rest-get-databases) retourneert bijvoorbeeld een lijst
van databases, en de methode om [profielen op te vragen](rest-get-database-profiles)
retourneert een lijst van profielen. Zo zijn er nog veel meer.

Om te voorkomen dat een REST API call te lang duurt, en om te voorkomen dat een 
enkelvoudige call te veel resources van onze API servers vraagt, wordt de output 
van al deze methodes echter beperkt. Er worden niet meer dan 1000 objecten 
teruggegeven, zelfs als er wel meer databases of profielen bestaan. Als je meer 
objecten wilt opvragen kun je daarvoor meerdere calls uitvoeren.

## Teruggegeven data

Als een methode een lijst teruggeeft is dat altijd verpakt in een JSON object.
Dat JSON object heeft standaard een aantal *properties* waarmee je kunt
achterhalen of de gehele lijst is teruggegeven, of dat de output is gelimiteerd
en er meer entries beschikbaar zijn.

    {
        "start":    50,
        "limit":    100,
        "count":    100,
        "total":    335,
        "data":     [ .... ]
    }

Het belangrijkst is de property *data*. Hierin zit een array met de opgevraagde 
gegevens. Bijvoorbeeld een array van databases of een array van profielen. De
andere properties bevatten numerieke waardes waar je aan kunt zien hoeveel
objecten er zijn teruggegeven en hoeveel objecten beschikbaar zijn.

De property *count* bevat het totaal aantal geretourneerde objecten. *Start*
en *limit* zijn interessant als niet alle objecten konden worden teruggegeven.
De property *start* bevat het aantal overgeslagen objecten, en *limit* het
aantal tot waar de output is beperkt. In bovenstaand voorbeeld wordt dus een
lijst van 100 objecten geretourneerd, waarbij de eerste 50 zijn overgeslagen.
Als je geen limiet mee geeft zal het aantal objecten automatisch tot 100 worden beperkt.

De property *total* bevat het totaal aantal beschikbare elementen. In bovenstaand
voorbeeld staat het op 335. Aangezien er maar 100 elementen op zijn gevraagd zouden 
er dus extra calls uitgevoerd moeten worden om de overige 235 element op te vragen. 
Daarnaast is het belangrijk om te onthouden dat de *total* berekenen een zware operatie 
kan zijn als je een uitgebreide collectie aan elementen hebt. Je kunt *total* op 
'false' zetten om je API calls sneller te maken.

## Voorbeeld in PHP

Onderstaand voorbeeld demonstreert hoe je van de complete lijst van databases 
alleen de tweede vijf items kunt opvragen.

```php
    // required code
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestAPI("your-access-token", 2);

    // parameters to be passed to the api
    $parameters = array(
        'start'             =>  5,
        'limit'             =>  5,
        'total'             =>  false
    );

    // fetch and print the databases
    print_r($api->get("databases", $parameters));
```

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Introductie tot de REST API](rest-api)
* [Overzicht van alle API calls](rest-api)
