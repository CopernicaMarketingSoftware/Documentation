# REST API: opvragen van bestandsnamen van logfiles

Copernica houdt logfiles bij over bijvoorbeeld clicks, opens, errors, 
ontvangen berichten, etc. Deze logfiles kunnen gedownload worden met de API 
of via het dashboard. Door een HTTP GET verzoek te sturen naar de volgende 
URL krijg je een lijst van alle bestaande logfiles voor een datum.

`https://api.copernica.com/v1/logfiles/$date?access_token=xxxx`

Je moet hier `$date` vervangen door de datum waarvoor je logfiles wilt zien.

## Teruggegeven velden

Deze methode geeft een JSON array terug met de namen van logfiles. De 
types van de logfiles staan hieronder in de tabel. De naam van een logfile 
bevat het type als prefix en ook de datum.

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

Voor meer informatie over het downloaden van deze files kun je de documentatie 
onder het kopje "Meer informatie" bekijken.

## Voorbeeld in PHP

Het volgende PHP script demonstreert hoe je de API methode gebruikt:

    // vereiste scripts
    require_once('copernica_rest_api.php');
    
    // verander dit naar je access token
    $api = new CopernicaRestApi("your-access-token");

    // voer het verzoek uit en print het resultaat
    print_r($api->get("logfiles/2017-02-12"));

Dit voorbeeld vereist de [CopernicaRestApi klasse](./rest-php.md).

## Meer informatie

* [Overzicht van API calls](./rest-api.md)
* [Downloaden van een logfile in JSON formaat](./rest-get-logfiles-json.md)
* [Downloaden van een logfile in CSV formaat](./rest-get-logfiles-csv.md)
* [Downloaden van een logfile in XML formaat](./rest-get-logfiles-xml.md)
