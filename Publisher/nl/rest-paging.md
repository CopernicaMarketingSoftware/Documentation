# REST API: paging

Heel veel REST methodes retourneren een lijst van objecten. De methode om
[databases op te vragen](rest-get-databases) retourneert bijvoorbeeld een lijst
van databases, en de methode om [profielen op te vragen](rest-get-database-profiles)
retourneert een lijst van profielen. Zo zijn er nog veel meer.

Om te voorkomen dat een REST API call te lang duurt, en om te voorkomen dat een 
enkelvoudige call te veel resources van onze API servers vraagt, wordt de output 
van al deze methodes echter standaard beperkt. Er worden niet meer dan 100 objecten 
teruggegeven, zelfs als er wel meer databases of profielen bestaan. Als je meer 
objecten wilt opvragen, zul je meerdere calls achter elkaar moeten doen.

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

De property *total* bevat het totaal aantal beschikbare elementen. In bovenstaand
voorbeeld staat het op 335, wat veel meer is dan de 100 objecten die zijn teruggegeven.
Je weet dus dat je aanvullende calls moet doen om meer gegevens op te vragen.

## Paging parameters

Elke methode die een lijst van objecten retourneert ondersteunt standaard
drie parameters die je aan de URL kan toevoegen: *start*, *limit* en *total*.
De *start* en *limit* parameters zijn numerieke parameters die je kunt gebruiken
om op te geven welke deel je van de beschikbare objecten je wilt opvragen: waar 
de lijst moet starten (hoeveel eerdere elementen worden overgeslagen), en 
hoeveel elementen moeten worden teruggegeven.

De parameter *total* is een boolean parameter die je op false kunt zetten om
aan te geven dat je geen interesse hebt in het totaal aantal beschikbare objecten. 
Het uitrekenen van het totaal aantal beschikbare objecten is een relatief zware
operatie. Als jouw script de property *total* in de geretourneerde JSON negeert, 
dan kun je net zo goed al van te voren aangeven dat deze property niet hoeft
te worden berekend. Dit maakt de API call iets sneller.

## Voorbeeld in PHP

Onderstaand voorbeeld demonstreert hoe je van de complete lijst van databases 
alleen de tweede vijf items kunt opvragen.

    // required code
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("private-access-token")

    // parameters to be passed to the api
    $parameters = array(
        'start'             =>  5,
        'limit'             =>  5,
        'total'             =>  false
    );

    // fetch and print the databases
    print_r($api->get("databases", $parameters));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Introductie tot de REST API](rest-api)
* [Overzicht van alle API calls](rest-api)
