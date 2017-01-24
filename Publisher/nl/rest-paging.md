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
en dat er meer entries beschikbaar zijn.

    {
        "start":    0,
        "limit":    100,
        "count":    100,
        "total":    335,
        "data":     [ .... ]
    }

Het belangrijkst is de property *data*. Hierin zit een array met de opgevraagde 
gegevens. Bijvoorbeeld een array van databases of een array van profielen. De
andere properties bevatten nummerieke waardes waar je aan kunt zien hoeveel
objecten er zijn teruggegeven en hoeveel objecten beschikbaar zijn.

De property *count* bevat het totaal aantal geretourneerde objecten. *Start*
en *limit* zijn interessant als niet alle objecten konden worden teruggegeven.
De property *start* bevat het aantal overgeslagen objecten, en *limit* het
aantal tot waar de output is beperkt. De property *total* tenslotte, bevat
het totaal aantal beschikbare properties. Als de property *start* groter is
dan 0, of als *count* kleiner is dan *total*, dan weet je dat de API niet
alle beschikbare objecten heeft teruggegeven, en zul je een nieuwe call moeten
doen om de volgende batch op te vragen.


## Paging parameters

Elke methode die een lijst van objecten retourneert ondersteunt standaard
drie parameters die je aan de URL kan toevoegen: *start*, *limit* en *total*.
De *start* en *limit* parameters zijn nummerieke parameters die je kunt gebruiken
om op te geven welke deel je van de beschikbare objecten je wilt opvragen: waar 
de lijst moet starten (hoeveel eerdere elementen worden overgeslagen), en hoe 
hoeveel elementen moeten worden teruggegeven.

De parameter *total* is een boolean parameter die je op false kunt zetten om
aan te geven dat je geen interesse hebt in het totaal aantal beschikbare objecten. 
Het uitrekenen van het totaal aantal beschikbare objecten is een relatief zware
operatie. Als jouw script de property *total* in de geretourneerde JSON negeert, 
dan kun je net zo goed al van te voren aangeven dat deze property niet hoeft
te worden geretourneerd. Dit maakt de API call iets sneller.


## Voorbeeld in PHP

Onderstaand voorbeeld demonstreert hoe je van de complete lijst van databases 
alleen de tweede vijf items kunt opvragen.

    // change this into your access token
    $access_token = "private-access-token";
    
    // parameters to be passed to the url
    $parameters = array(
        'access_token'      =>  $access_token,
        'start'             =>  5,
        'limit'             =>  5
    );
    
    // create a curl resource
    $curl = curl_init("https://api.copernica.com/databases?".http_build_query($parameters));
    
    // additional curl option
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER      =>  true
    ));
    
    // do the call
    $answer = curl_exec($curl);
    
    // clean up curl resource
    curl_close($curl);
    
    // output result
    print_r(json_decode($answer));
