# REST API: opvragen van subprofielen van een miniview

Subprofielen zijn voor collecties wat reguliere profielen zijn in een database. Om een lijst van subprofielen van een profiel uit een miniview op te vragen kun je een HTTP GET verzoek sturen naar de volgende URL:

`https://api.copernica.com/v1/miniview/$id/subprofile?access_token=xxxx`

De `$id` moet vervangen worden met de ID van het profiel waar je de subprofielen van opvraagt.

## Teruggeven velden

Deze methode geeft een array van subprofielen terug. Deze subprofielen zijn JSON objecten met de volgende eigenschappen:

- **id**: unieke numerieke identifier van het subprofiel
- **secret**: geheime code geassocieerd met het subprofiel
- **fields**: velden die bij het subprofiel horen
- **profile**: ID van het profiel waar het subprofiel bij hoort
- **collection**: ID van de collectie waar het subprofiel bij hoort
- **created**: tijdstip van aanmaken van het subprofiel in YYYY-MM-DD hh:mm:ss formaat
- **modified**: tijdstip van laatste aanpassing van het subprofiel in YYYY-MM-DD hh:mm:ss formaat

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe de API method te gebruiken is.

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // voer het verzoek uit en print het resultaat
    print_r($api->get("miniview/1234/subprofiles"));

Dit voorbeeld vereist de [CopernicaRestApi klasse](rest-php).

## Meer informatie

- [Overzicht van alle API methodes](rest-api)
- [Alle selectie metadata opvragen](rest-get-miniview)
