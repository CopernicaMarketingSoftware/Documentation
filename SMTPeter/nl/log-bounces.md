# Bounce logfiles

Log files met de prefix "bounces" bevatten informatie over berichten die
gebounced zijn. Je kunt de inhoud van deze bestanden downloaden in CSV, JSON
en XML formaat via de [REST logfiles API](rest-logfiles) of via het dashboard.
Deze bestanden bevatten de volgende informatie:


| Naam        | Beschrijving                                                             |
| ----------- | ------------------------------------------------------------------------ |
| id          | De unieke id van het bericht dat gebounced is                            |
| time        | Het tijdstip waarop de bounce ontvangen is (JJJJ-MM-DD uu:mm:ss formaat) |
| envelope    | De envelope van het bericht                                              |
| recipient   | De recipient van het bericht                                             |
| mime        | De mime inhoud van de ontvangen bounce                                   |
| tags        | De tags van het bericht dat gebounced is, puntkomma gescheiden           |
