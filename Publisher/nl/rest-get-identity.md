# REST API: opvragen identiteit

Als je wilt weten welk account er eigenlijk bij een access token hoort, dan
kun je deze methode gebruiken. De methode retourneert de gegevens van de
account die hoort bij een access key. 

`https://api.copernica.com/v1/identity?access_token=xxxx`

Deze methode is vooral handig als je een applicatie hebt gemaakt die is gekoppeld
aan veel verschillende accounts (bijvoorbeeld door middel van een 
[OAuth koppeling](./rest-oath.md). Als je de actuele gegevens van het bij de
access key horende account wilt opvragen kan dat met deze methode. Als je 
een applicatie hebt die alleen met je eigen account is gekoppeld, heeft het
aanroepen van deze methode niet zo veel toegevoegde waarde.


## Geretourneerde velden

De methode retourneert een accountgegevens. De volgende eigenschappen worden
teruggegeven:

* **ID**: Unieke numerieke identifier van het account
* **name**: Naam van het account
* **description**: Omschrijving van het account
* **company**: Naam van het bedrijf dat betaalt voor het account


## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen 
vanuit een PHP script:

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit in je access code access token
    $api = new CopernicaRestApi("your-access-token");

    // voer de opdracht uit en print het resultaat
    print_r($api->get("account"));

Voor bovenstaand voorbeeld heb je de [CopernicaRestApi klasse](rest-php) nodig.
    

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [OAuth2 koppelingen maken](rest-oauth)
