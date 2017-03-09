# REST API: vraag de regels van een miniview op

Een miniview is voor een collectie wat een view/selectie is voor een database. Om de regels van zo'n miniview op te vragen kun je een HTTP GET verzoek versturen naar de volgende URL:

'https://api.copernica.com/v1/miniview/$id/rules?access_token=xxxx'

De $id moet vervangen worden door de ID van de selectie van een collectie waarvoor je de regels op wilt vragen.

## Ondersteunde parameters

Je kunt een of meerdere van de volgende parameters aan de URL toevoegen:

- **start**: eerste regel om op te vragen
- **limit**: maximale grootte van de opgevraagde hoeveelheid regels
- **total**: laat wel of niet het totaal aantal matchende regels zien

Je kunt meer informatie vinden over de *start*, *limit* en *total* parameters 
in ons [artikel over paging](./rest-paging.md). 

## Teruggegeven eigenschappen

Deze methode geeft een lijst van regels terug. Elk item in deze lijst is een JSON object met de volgende eigenschappen:

- **ID**: numerieke identifier van de regel
- **name**: naam van de regel
- **view**: ID van de selectie waar de regel bij hoort
- **disabled**: waarde om aan te geven of de regel niet (1) /wel (0) geactiveerd is
- **inversed**: waarde die aangeeft of de regel een inverse is. Als deze variabele waar is worden profielen teruggegeven als ze de regel niet *matchen*
- **conditions**: array van voorwaarden voor de regel

## Voorbeeld in PHP

Het volgende script kan gebruikt worden om de regels van een selectie op te vragen. De CopernicaRestApi klasse die we gebruiken zorgt ervoor dat je niet op speciale karakters hoeft te letten, maar als je zelf code schrijft om de URL op te stellen moet dit wel.

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // parameters voor de methode
    $parameters = array(
        'limit'     =>  100,
    );
    
    // voer het verzoek uit en print het resultaat
    print_r($api->get("view/1234/rules", $parameters));

Dit voorbeeld vereist de [CopernicaRestApi klasse](rest-php).

## Meer informatie

* [Overzicht van alle API methodes](rest-api)
* [Vraag regel op met ID](./get-view-rule)
* [Vraagt lijst van regels uit database op](./rest-get-rule)


