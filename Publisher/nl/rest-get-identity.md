# REST API: GET identity

Je kunt makkelijk nagaan welke accountgegevens bij een bepaalde 
access token hoort. De onderstaande methode retourneert de 
gegevens van een specifieke access token. 

`https://api.copernica.com/v2/identity?access_token=xxxx`

Deze methode is vooral handig als je een applicatie hebt gemaakt 
die is gekoppeld aan veel verschillende accounts (bijvoorbeeld 
door middel van een OAuth2 koppeling). 

## Geretourneerde velden

De methode retourneert accountgegevens:

* id:           unieke numerieke identifier van het account;
* name:         naam van het account;
* description:  omschrijving van het account;
* company:      naam van het bedrijf dat betaalt voor het account.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen 
vanuit een PHP script:

```php
// vereiste scripts
require_once("copernica_rest_api.php");

// verander dit in je access code access token
$api = new CopernicaRestApi("your-access-token");

// voer de opdracht uit en print het resultaat
print_r($api->get("identity"));
```

Dit voorbeeld vereist de [REST API class](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [OAuth2 koppelingen maken](rest-oauth)
