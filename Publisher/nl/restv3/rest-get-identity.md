# REST API: GET identity

Je kunt makkelijk nagaan welke accountgegevens bij een bepaalde 
access token hoort. De onderstaande methode retourneert de 
gegevens van een specifieke access token. 

`https://api.copernica.com/v3/identity?access_token=xxxx`

Deze methode is vooral handig als je een applicatie hebt gemaakt 
die is gekoppeld aan veel verschillende accounts (bijvoorbeeld 
door middel van een OAuth2 koppeling). 

## Geretourneerde velden

De methode retourneert een JSON object met een 'data' property die de 
gegevens van de account bevat. De volgende velden zijn beschikbaar:

* id:           unieke numerieke identifier van het account;
* name:         naam van het account;
* description:  omschrijving van het account;
* company:      naam van het bedrijf dat betaalt voor het account;
* customer:     array met informatie over het bedrijf dat betaalt voor het account;
* usedBy:       array met informatie over het bedrijf die het account gebruikt (bij accounts onder een partnerlicentie);
* license:      array met informatie over de licentie.

### JSON voorbeeld

De output van een call ziet er bijvoorbeeld zo uit:

```json
{  
   "id":"34",
   "name":"Development",
   "description":"This is an account to test with",
   "company":"Copernica BV",
   "customer": {
      "id": "3871",
      "name": "Copernica BV",
      "isPartner": false
  },
  "usedBy": [],
  "license": {
      "id": "5679",
      "isTrial": false
  }
}
```

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode kunt aanroepen 
vanuit een PHP script:

```php
// vereiste scripts
require_once("copernica_rest_api.php");

// verander dit in je access code access token
$api = new CopernicaRestAPI("your-access-token", 3);

// voer de opdracht uit en print het resultaat
print_r($api->get("identity"));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van alle API calls](rest-api)
* [OAuth2 koppelingen maken](rest-oauth)
