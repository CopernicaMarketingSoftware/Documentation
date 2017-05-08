# Attempts log files

Elk bericht dat via SMTPeter is verstuurd is gelogd in bestanden met prefix
"attempts". Je kunt de inhoud van deze bestanden downloaden in CSV, JSON
en XML formaat via de [REST logfiles API](rest-logfiles) of via het dashboard.
Deze bestanden bevatten de volgende informatie:

| Naam       | Beschrijving                                                                                                                  |
|------------|-------------------------------------------------------------------------------------------------------------------------------|
| id         | De unieke ID van het verzonden bericht                                                                                        |
| time       | Het tijdstip wanneer het bericht bij ons ontvangen was in het formaat JJJJ-MM-DD uu:mm:ss                                     |
| envelope   | Het envelope adres van het bericht                                                                                            |
| recipient  | De recipient van het bericht                                                                                                  |
| properties | De eigenschappen (preventscam, inlinecss, trackbounces, trackopens, and trackclicks) van het bericht (puntkomma's gescheiden) |
| tags       | De tags van het bericht (puntkomma's gescheiden)                                                                              |

## Meer informatie

* [REST niet-zend calls](./rest-other-calls)
* [REST events opvragen](./rest-events)
