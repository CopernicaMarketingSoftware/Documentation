# REST API: GET data request

Met deze methode kan je de de data opvragen van een eerder gepost data verzoek.
Het geeft een JSON terug met de data wanneer deze reeds beschikbaar zijn, of
het geeft aan dat de data nog niet beschikbaar is.

Voor dit verzoek kun je een HTTP GET request sturen naar de volgende URL:

`https://api.copernica.com/v1/datarequest/$id?access_token=xxxx`

waar **$id** de ID van van het betreffende dataverzoek is.

## Resultaat

Een JSON met alle beschikbare informatie. Als de data beschikbaar zijn heeft
de JSON twee members **info** en **data**. De info member heeft ook twee members:
**type** en **id**. Het type geeft aan van wat voor type verzoek de data afkomstig
zijn. Dit kan zijn **email**, **profile** of **subprofile**. ID geeft het e-mailadres,
of (sub)profiel ID.. De data member in de JSON bestaat uit een array van
arrays met daarin alle informatie die wij gevonden hebben. Voorbeelden
van deze data zijn:

- Complete MIMEs die verstuurd zijn
- Informatie over opens en clicks,
- Ingevulde enquêtes
- etc.

Als de data nog niet beschikbaar zijn heeft de data member de string:
"no data available (yet).".

## PHP example

```php
// required scripts
require_once('copernica_rest_api.php');

// insert your access token here
$api = new CopernicaRestApi("your-access-token");

// process the request (don't forget to add the id!)
$api->get("datarequest/$id", $data)
```
Dit voorbeeld vereist de [REST API klasse](./rest-php).

## Meer informatie

* [Alle REST calls](./rest-api)
* [Een dataverzoek voor een profiel indienen ](./rest-post-profile-datarequest)
* [Een dataverzoek voor een subprofiel indienen ](./rest-post-subprofile-datarequest)
* [Een dataverzoek voor een e-mail adres indienen](./rest-post-email-datarequest)
* [Privacy](./privacy)
