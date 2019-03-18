# REST API: GET logfiles names

Copernica houdt logfiles bij over bijvoorbeeld clicks, opens, errors, 
ontvangen berichten, etc. Deze logfiles kunnen gedownload worden met de API 
of via het dashboard. Door een HTTP GET verzoek te sturen naar de volgende 
URL krijg je een lijst van alle bestaande logfiles voor een datum.

`https://api.copernica.com/v2/logfiles?access_token=xxxx&date=$date&type=$type`

In deze URL kun je twee parameters meegeven: `$date` kan gebruikt worden 
om een specifieke datum mee te geven waarvoor je de namen van de logfiles wilt zien. 
Hetzelfde doet `$type` voor het type logfile. Een overzicht daarvan 
vindt je in de tabel onder het kopje "Teruggegeven velden". Beide parameters 
zijn optioneel. Als je beide gebruikt worden de files gefilterd op zowel 
datum als type. Als je geen van beide gebruikt krijg je de 
[datums waarvoor logfiles bestaan](./rest-get-logfiles) terug.

## Teruggegeven velden

Deze methode geeft een JSON array terug met de namen van logfiles. De 
types van de logfiles staan hieronder in de tabel.

| prefix                                            | type informatie                                                                     |
| --------------------------------------------------|-------------------------------------------------------------------------------------|
| [cdm-attempts](rest-cdm-attempts-logfile)         | Algemene info over mails verstuurd met Marketing Suite (MS)                         |
| [cdm-abuse](rest-cdm-abuse-logfile)               | Info over mails verstuurd met MS die een 'misbruik' notificatie veroorzaakten       |
| [cdm-click](rest-cdm-click-logfile)               | Info over clicks in mails verstuurd via MS                                          |
| [cdm-delivery](rest-cdm-delivery-logfile)         | Info over aangekomen mails verstuurd via MS                                         |
| [cdm-error](rest-cdm-error-logfile)               | Info over errors in mails verstuurd via MS                                          |
| [cdm-impression](rest-cdm-impression-logfile)     | Info over impressies uit mails verstuurd via MS                                     |
| [cdm-retry](rest-cdm-retry-logfile)               | Info over herzonden mails verstuurd via MS                                          |
| [cdm-unsubscribe](rest-cdm-unsubscribe-logfile)   | Info over uitschrijvingen als gevolg van een mail verstuurd via MS                  |
| [pom-attempts](rest-pom-attempts-logfile)         | Algemene info over mails verstuurd met Publisher                                    |
| [pom-abuses](rest-pom-abuses-logfile)             | Info over mails verstuurd met Publisher die een misbruik' notificatie veroorzaakten |
| [pom-clicks](rest-pom-clicks-logfile)             | Info over clicks in mails verstuurd via Publisher                                   |
| [pom-deliveries](rest-pom-delivery-logfile)       | Info over aangekomen mails verstuurd via Publisher                                  |
| [pom-errors](rest-pom-errors-logfile)             | Info over errors in mails verstuurd via Publisher                                   |
| [pom-impressions](rest-pom-impression-logfile)    | Info over impressies uit mails verstuurd via Publisher                              |
| [pom-retries](rest-pom-retry-logfile)             | Info over herzonden mails verstuurd via Publisher                                   |
| [pom-unsubscribes](rest-pom-unsubscribe-logfile)  | Info over uitschrijvingen als gevolg van een mail verstuurd via Publisher           |
| feedback-loop-errors                              | Info over errors in je feedback loops                                               |

Voor meer informatie over het downloaden van deze files in het gewenste formaat 
kun je de documentatie onder het kopje "Meer informatie" bekijken.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode gebruikt. 
Vergeet niet de datum in te voegen in de URL (YYYY-MM-DD formaat).

```php
// vereiste scripts
require_once('copernica_rest_api.php');

// verander dit naar je access token
$api = new CopernicaRestAPI("your-access-token", 2);

// de array voor de gewenste datum en/of het gewenste type van de logfiles
$parameters = array(
    'type' =>     "cdm-attempts",
    'date' =>     "2019-01-01",
);

// voer het verzoek uit en print het resultaat
print_r($api->get("logfiles", $parameters));
```

Dit voorbeeld vereist de [REST API klasse](rest-php).

## Meer informatie

* [Overzicht van API calls](./rest-api.md)
* [Downloaden van een logfile in JSON formaat](./rest-get-logfiles-json.md)
* [Downloaden van een logfile in CSV formaat](./rest-get-logfiles-csv.md)
* [Downloaden van een logfile in XML formaat](./rest-get-logfiles-xml.md)
