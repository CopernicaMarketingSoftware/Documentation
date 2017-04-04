# REST API: Opvragen van algemene informatie voor een Publisher message id

Als je algemene informatie van een met Publisher verstuurde mail wilt
hebben, dan kun je een eenvoudige HTTP GET call naar de volgende URL sturen.

`https://api.copernica.com/v1/old/message/$id?access_token=xxxx`

waar `$id` de unieke string van het bericht is.

## Geretourneerde waarde

Een JSON met de algemene informatie.

## PHP Voorbeeld

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen.

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // voer de methode uit en print het resultaat
    print_r($api->get("old/message/AMRJHv989dfds"));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.

## Meer informatie

* [Overzicht van alle API calls](rest-api)
