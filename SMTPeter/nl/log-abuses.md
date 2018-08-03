# Abuses log files

SMTPeter kan misbruikrapportages (abuse reports) ontvangen. Als een raport
ontvangen wordt, slaan we de informatie op in een logfile met als prefix
"abuse". Je kunt de inhoud van deze bestanden downloaden in CSV, JSON
en XML formaat via de [REST logfiles API](rest-logfiles) of via het dashboard.
Deze bestanden bevatten de volgende informatie:

| Naam       | Beschrijving                                                                                                                               |
|------------|------------------------------------------------------------------------------------------------------------------------------------------- |
| id         | De unieke ID van het verzonden bericht                                                                                                     |
| time       | Het tijdstip wanneer het rapport bij ons ontvangen was in het formaat JJJJ-MM-DD uu:mm:ss                                                  |
| envelope   | Het envelope adres van het bericht                                                                                                         |
| recipient  | De recipient van het bericht                                                                                                               |
| tags       | De tags van het originel bericht (puntkomma's gescheiden)                                                                                  |
| templateid | De ID van de template die gebruikt is voor het verstruurde bericht (0 als er geen template gebruikt is of wanneer dit niet beschikbaar is) |

## Meer informatie

* [REST niet-zend calls](./rest-other-calls)
* [REST events opvragen](./rest-events)
