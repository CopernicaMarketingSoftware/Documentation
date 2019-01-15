# REST API: POST profile data

Waarschuwing: Je bekijkt nu het overzicht voor de oude versie van onze 
API. Wij raden aan om [versie 2](../restv2/rest-api.md) van de API te gebruiken.

Deze methode stuurt een verzoek om alle data die beschikbaar zijn voor een
profiel bij elkaar te zoeken en hier een JSON bestand van te maken. Je kan er voor 
kiezen om een e-mail te krijgen wanneer dit proces is afgerond. Dit mailtje bevat
het dan het bestand, of wanneer het bestand te groot is een linkje naar
de locatie waar je het kan downloaden. Je kan er ook voor kiezen om
ons het bestaand naar je toe te sturen via een POST verzoek. 
Het is ook mogelijk om te kijken of de data beschikbaar zijn via een GET
verzoek en de unieke ID die deze methode retourneert. 

Voor het indienen van een data verzoek kun je een HTTP POST verzoek sturen 
naar de volgende URL:

`https://api.copernica.com/v1/profile/$id/datarequest?access_token=xxx`

De code **$id** kun je hier vervangen door het ID van het profiel waarvoor je 
het verzoek wil indienen.

## Beschikbare parameters

De volgende parameters kunnen toegevoegd worden aan de URL:

* *report*: Het doel om het resultaat aan af te leveren; Dit kan een 
e-mailadres of webadres zijn. Als je kiest om deze te e-mailen wordt de bijlage 
toegevoegd als bijlage of als link als de bijlage te groot is. Als je ervoor 
kiest een webadres te gebruiken wordt er een HTTP POST verzoek verstuurd met 
de data naar het opgegeven adres.

Als je ervoor kiest de report parameter niet te gebruiken kun je nog steeds 
de data opvragen met een GET request. Dit wordt hieronder uitgelegd.

## Resultaat

Het resultaat van deze POST call is een uniek ID. Met dit ID kan je controleren
of de data beschikbaar is en indien dit het geval is ook opvragen. Dit
kan je doen door een HTTP GET verzoek te sturen naar de volgende URL

`https://api.copernica.com/v1/datarequest/$id?access_token=xxxx`

The code **$id** moet je vervangen door de unieke ID die je via het POST verzoek
hebt gekregen. Let erop dat dit bestand uiteindelijk verloopt.

Als de data nog niet beschikbaar is zal de data member in de JSON de tekst 
"Data not available (yet)" bevatten.

## PHP voorbeeld

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestApi("your-access-token");

// data om aan de methode mee te geven
$data = array(
    'report'    =>  'example@example.com'
);

// voer de methode uit (vergeet de id niet)
$api->get("profile/$id/datarequest", $data);
```

Dit voorbeeld vereist de [REST API klasse](./rest-php).

## JSON Bestand

De JSON in de geleverde file bevat twee members, **info** en **data**. De info
member heeft ook twee members, **type** en **id**. Het type geeft aan wat voor
type informatie de JSON bevat. Dit kan de waarde **email**, **profile** of **subprofile**
hebben. De **id** is het e-mailadres of ID van het profiel of subprofiel.
De data member in de JSON bevat een array van arrays met daarin alle informatie
die wij gevonden hebben. Voorbeelden van deze informatie zijn:

- Volledige MIMEs die verstuurd zijn
- Informatie over opens en clicks
- Ingevulde enquête's
- etc.

## Meer informatie

* [Alle REST calls](./rest-api)
* [Privacy](./privacy)
* [Een dataverzoek voor een subprofiel indienen ](./rest-post-subprofile-datarequest)
* [Een dataverzoek voor een e-mailadres indienen](./rest-post-email-datarequest)
* [Data van een dataverzoek opvragen](./rest-get-datarequest-data)
* [Status van een dataverzoek opvragen](./rest-get-datarequest-status)
