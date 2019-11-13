# Failure logfiles

Log files met de prefix "failures" bevatten informatie over berichten waarvan
de aflevering faalde. Je kunt de inhoud van deze bestanden downloaden in
CSV, JSON en XML formaat via de [REST logfiles API](rest-logfiles) of via
het dashboard. Voor elke failure wordt de volgende informatie opgeslagen:

| Name        | Description                                                                                                                                |
| ----------- | ------------------------------------------------------------------------------------------------------------------------------------------ |
| id          | De unieke ID van het bericht dat niet afgeleverd kon worden                                                                                |
| time        | Het tijdstip waarop bekend werd dat het bericht niet afgeleverd kon worden (in JJJJ-MM-DD uu:mm:ss formaat)                                |
| envelope    | The envelope van het bericht waarvan de aflevering faalde                                                                                  |
| recipient   | The recipient of het bericht waarvan de aflevering faalde                                                                                  |
| attempt     | Het aantal pogingen voordat we opgaven (startend vanaf nul)                                                                                |
| from        | Het IP adres waarvan verstuurd werd                                                                                                        |
| to          | Het IP adres waarnaartoe verstuurd werd                                                                                                    |
| type        | Het resultaat type                                                                                                                         |
| code        | De SMTP error code                                                                                                                         |
| status      | SMTP status code (bijvoorbeeld "5.0.0")                                                                                                    |
| description | Leesbare beschrijving die ontvangen is over SMTP                                                                                           |
| state       | De staat van het SMTP protocol op het tijdstip wanneer de fout plaatsvond                                                                  |
| tags        | De tags van het bericht (puntkomma gescheiden)                                                                                             |
| templateid  | De ID van de template die gebruikt is voor het afgeleverde bericht (0 als er geen template gebruikt is of wanneer dit niet beschikbaar is) |

## Meer informatie

* [REST calls niet gerelateerd aan verzending](./rest-other-calls)
* [REST events opvragen](./rest-events)
