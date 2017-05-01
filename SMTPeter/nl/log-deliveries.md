# Aflever log files

Elk afgeleverde mail is gelogd in log files met de prefix "deliveries".
Je kunt de inhoud van deze bestanden downloaden in CSV, JSON en XML formaat
via de [REST logfiles API](rest-logfiles) of via het dashboard. Deze
bestanden bevatten de volgende informatie: 

| Naam      | Beschrijving                                                    |
| --------- | --------------------------------------------------------------- |
| id        | De unieke ID van het verstuurde bericht                         |
| time      | Het tijdstip van aflevering (in JJJJ-MM-DD uu:mm:ss formaat)    |
| envelope  | The envelope van het bericht                                    |
| recipient | The recipient van het bericht                                   |
| from      | Het IP adres waarvan verstuurd is                               |
| to        | Het IP adres waar het bericht ontvangen is                      |
| attempt   | Het nummer van het totaal aantal afleverpogingen (telt vanaf 0) |
| tags      | De tags van het afgeleverde bericht (puntkomma gescheiden)      |
