# REST API: opvragen logilfes

Copernica houdt allerlei logfiles bij van kliks, opens, foutmeldingen, 
geaccepteerde berichten, enzovoort. Deze logfiles kun je met de API downloaden.
Door een GET request naar de volgende URL te sturen krijg je een overzicht
van alle datums waarvan we logfiles hebben bewaard:

`https://api.copernica.com/logfiles?access_token=xxxx`

## Geretourneerde velden

De methode retourneert een JSON array van datum strings.


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen 
vanuit een PHP script:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // do the call, and print result
    print_r($api->get("logfiles"=));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](./rest-php.md) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](./rest-api.md)
* [Downloaden van logfile in JSON formaat](./rest-get-logfiles-json.md)
* [Downloaden van logfile in CSV formaat](./rest-get-logfiles-csv.md)
* [Downloaden van logfile in XML formaat](./rest-get-logfiles-xml.md)
