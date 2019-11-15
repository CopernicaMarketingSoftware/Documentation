# Clicks logfiles

Logfiles met prefix "clicks" bevatten informatie over de clicks die gegenereerd
zijn bij jouw berichten. Je kunt de inhoud van deze bestanden downloaden in CSV, JSON
en XML formaat via de [REST logfiles API](rest-logfiles) of via het dashboard.
Voor elke click wordt de volgende informatie opgeslagen:

| Naam        | Beschrijving                                                                                                                                                 |
| ----------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| id          | De unieke id van het bericht dat de klik gegeneerd heeft                                                                                                     |
| time        | Het tijdstip waarop geklikt is in het formaat JJJJ-MM-DD uu:mm:ss                                                                                            |
| headers     | De headers die gebruikt zijn bij het klikken, elk gedeelte van de header staat op een nieuwe regel                                                           |
| ip          | Het IP adres waar de klik vandaan komt                                                                                                                       |
| url         | De URL in het bericht waarop geklikt is                                                                                                                      |
| destination | De URL waar naar verwezen werd vanuit de klik                                                                                                                |
| tags        | De tags van het bericht dat de klik genereerde gescheiden door puntkomma's                                                                                   |
| recipient   | De recipient van het bericht dat de klik genereerde                                                                                                          |
| city        | De stad waar de klik plaats vond                                                                                                                             |
| countryname | De naam van het land waar de klik plaats vond                                                                                                                |
| countrycode | De landencode (alpha-2) van het land waar de klik plaats vond                                                                                                |
| regioncode  | De regiocode waar de klik plaats vond                                                                                                                        |
| templateid  | De ID van de template die gebruikt is voor het bericht dat de klik gegenereerd heeft (0 als er geen template gebruikt is of wanneer dit niet beschikbaar is) |


## Meer informatie

* [REST calls niet gerelateerd aan verzending](./rest-other-calls)
* [REST events opvragen](./rest-events)
