# REST API: regels opvragen uit een selectie

Om alle regels uit een selectie op te vragen kun je een HTTP GET request sturen naar de volgende URL:

`https://api.copernica.com/v1/view/$id/rules?access_token=xxxx`

De $id moet hier vervangen worden door de ID van de selectie waar je de regels van op wilt vragen.

## Ondersteunde parameters

Je kunt een of meer van de volgende parameters toevoegen aan de URL:

- **start**: de eerste regel om op te vragen
- **limit**: de maximale grootte van opgevraagde regels
- **total**: boolean waarde om wel of niet het totaal matchende regels te laten zien

Je kan meer informatie vinden over de *start*, *limit* en *total* parameters 
in ons [artikel over paging](./rest-paging.md).

## Teruggegeven velden

Deze methode geeft een lijst van regels terug. Elk item in deze lijst is een JSON object met de volgende eigenschappen:

- **id**: ID van een regel
- **name**: naam van een regel
- **description**: omschrijving van een regel
- **view**: ID van de selectie waar de regel toe behoort
- **conditions**: array met condities voor de regel
- **inversed**: boolean waarde om aan te geven of de regel moet worden geinverteerd. Als deze op "True" staat zijn alle resultaten profielen die *niet* aan de condities voldoen
- **disabled**: boolean waarde om aan te geven of de regel uitgeschakeld moet zijn of niet

## Voorbeeld in PHP

Het volgende script kan worden gebruikt om regels op te vragen uit een selectie. Omdat de CopernicaRestAPI zelf speciale tekens vervangt hoef je dit alleen zelf te doen als je zelf code schrijf om de URL op te stellen.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // parameters to pass to the call
    $parameters = array(
        'limit'     =>  100,
    );
    
    // do the call, and print result
    print_r($api->get("view/1234/rules", $parameters));

Dit voorbeeld vereist de [CopernicaRestApi klasse](rest-php).
    
## Meer informatie

- [Overzicht van alle API methodes](rest-api)
- [Selectie regel opvragen met ID](./get-view-rule)
- [Lijst van regels opvragen uit database](./rest-get-rule)


