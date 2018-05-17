# REST API: GET email data

Deze methode vraagt alle data beschikbaar voor e-mailadres op en geeft een 
JSON file terug. Om de data op te vragen kun je een HTTP GET verzoek sturen 
naar de volgende URL:

`https://api.copernica.com/v1/email/$email/data?access_token=xxxx`

De code *email* kun je hier vervangen door het e-mailadres waarvoor je 
de data op wilt vragen.

## Beschikbare parameters

De volgende parameters kunnen toegevoegd worden aan de URL:

* *report*: Het doel om het resultaat aan af te leveren; Dit kan een 
e-mailadres of webadres zijn. Als je kiest om deze te e-mailen wordt de bijlage 
toegevoegd als bijlage of als link als de bijlage te groot is. Als je ervoor 
kiest een webadres te gebruiken wordt er een HTTP POST verzoek verstuurd met 
de data naar het opgegeven adres.

## Resultaat

Het resultaat van deze GET call is een JSON bestand dat alle informatie 
bevat die bekend is over dit e-mail adres. Dit bestand bevat twee JSON 
objecten. De eerste hiervan is een info component dat je informatie toont 
over het verzoek, wat bijvoorbeeld nuttig is als je meerdere verzoeken achter 
elkaar uitvoert of de bestanden langer bewaart. 

Het tweede object bevat de data zelf. Er zit hier veel informatie in: 
Profiel data, geschiedenis, de MIME van elke e-mail die verstuurd is naar hen, 
enquête data, gepersonalizeerde PDF's verstuurd naar hen, kliks, opens, etc...

## PHP example

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// data om aan de methode mee te geven
$data = array(
    'report'    =>  'example@example.com'
);

// voer de methode uit (vergeet de email niet)
$api->get("email/email/data", $data)
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Alle REST calls](./rest-api)
* [Privacy](./privacy)
* [Data opvragen met profiel ID](./rest-get-profile-data)
* [Data opvragen met subprofiel ID](./rest-get-subprofile-data)
