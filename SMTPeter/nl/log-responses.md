# Responses log files

Log files met de prefix "responses" bevatten informatie over reacties
die je verstuurde e-mail gegeneerd heeft, met uitzondering van bounces.
Een voorbeeld van zo'n antwoord is een "out-of-office-reply". Je kunt de
inhoud van deze bestanden downloaden in CSV, JSON en XML formaat via de
[REST logfiles API](rest-logfiles) of via het dashboard. 
Voor elke reponse wordt de volgende informatie opgeslagen:

| Naam        | Beschrijving                                                                                                                                        |
| ----------- | --------------------------------------------------------------------------------------------------------------------------------------------------- |
| id          | De unieke ID van het bericht waarop gereageerd werd                                                                                                 |
| time        | Het tijdstip van de reactie (in JJJJ-MM-DD uu:mm:ss formaat)                                                                                        |
| envelope    | De envelope van het bericht waarop gereageerd werd                                                                                                  |
| recipient   | De recipient van het bericht waarop gereageerd werdt                                                                                                |
| mime        | De MIME van de reactie                                                                                                                              |
| tags        | De tags van het bericht waarop geregeerd werd (puntkomma gescheiden)                                                                                |
| templateid  | De ID van de template die gebruikt is voor het bericht waarop gereageerd is (0 als er geen template gebruikt is of wanneer dit niet beschikbaar is) |

## Meer informatie

* [REST calls niet gerelateerd aan verzending](./rest-other-calls)
* [REST events opvragen](./rest-events)
