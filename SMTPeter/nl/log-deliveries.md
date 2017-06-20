# Aflever log files

Elk afgeleverde mail is gelogd in logfiles met de prefix "deliveries".
Je kunt de inhoud van deze bestanden downloaden in CSV, JSON en XML formaat
via de [REST logfiles API](rest-logfiles) of via het dashboard. Deze
bestanden bevatten de volgende informatie: 

| Naam       | Beschrijving                                                                                                                               |
| ---------- | ------------------------------------------------------------------------------------------------------------------------------------------ |
| id         | De unieke ID van het verstuurde bericht                                                                                                    |
| time       | Het tijdstip van aflevering (in JJJJ-MM-DD uu:mm:ss formaat)                                                                               |
| envelope   | The envelope van het bericht                                                                                                               |
| recipient  | The recipient van het bericht                                                                                                              |
| from       | Het IP adres waarvan verstuurd is                                                                                                          |
| to         | Het IP adres waar het bericht ontvangen is                                                                                                 |
| attempt    | Het nummer van het totaal aantal afleverpogingen (telt vanaf 0)                                                                            |
| tags       | De tags van het afgeleverde bericht (puntkomma gescheiden)                                                                                 |
| templateid | De ID van de template die gebruikt is voor het afgeleverde bericht (0 als er geen template gebruikt is of wanneer dit niet beschikbaar is) |

## Meer informatie

* [REST niet-zend calls](./rest-other-calls)
* [REST events opvragen](./rest-events)
