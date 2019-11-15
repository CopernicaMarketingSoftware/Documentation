# Opens logfiles

Log files met de prefix "opens" bevatten informatie over wanneer een verzonden
bericht geopend is. Je kunt de inhoud van deze bestanden downloaden in
CSV, JSON en XML formaat via de [REST logfiles API](rest-logfiles) of via
het dashboard. Voor elke open wordt de volgende informatie opgeslagen:

| Naam        | Beschrijving                                                                                                                            |
| ----------- | --------------------------------------------------------------------------------------------------------------------------------------- |
| id          | De unieke ID van het geopende bericht                                                                                                   |
| time        | Het tijdstip waarop het bericht geopend werd  (in JJJJ-MM-DD uu:mm:ss formaat)                                                          |
| headers     | De ontvangen headers die bij het openen gebruikt zijn (elk onderdeel op een nieuwe regel)                                               |
| ip          | Het IP adres waar het bericht geopend werd                                                                                              |
| protocol    | Het gebruikte protocol bij het openen (bijv. http or https)                                                                             |
| tags        | De tags van het geopende bericht, puntkomma gescheiden                                                                                  |
| recipient   | De recipient van het geopende bericht                                                                                                   |
| city        | De stad waar het bericht geopend is                                                                                                     |
| countryname | De naam van het land waar het bericht geopend is                                                                                        |
| countrycode | De landendcode (alpha-2) van het land waar het bericht geopend is                                                                       |
| regioncode  | De regiocode waar het bericht geopend is                                                                                                |
| templateid  | De ID van de template die gebruikt is voor het geopende bericht (0 als er geen template gebruikt is of wanneer dit niet beschikbaar is) |


## Meer informatie

* [REST calls niet gerelateerd aan verzending](./rest-other-calls)
* [REST events opvragen](./rest-events)
