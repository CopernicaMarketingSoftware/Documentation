# Callback variabelen
Callbacks kunnen gebruikt worden om real-time gegevens te ontvangen over een (sub)profiel dat aangemaakt, bewerkt of verwijderd wordt. Bij elke actie sturen we via een HTTP POST request een bericht door naar jouw server met daarin alle relevante informatie over het (sub)profiel. De variabelen die meegestuurd worden bij een wijziging zijn bij alle drie de acties (create, update, en delete) hetzelfde.

## Pofiel Variabelen:
| Variabelen  | Omschrijving                                                                    |     Type        |
|-------------|---------------------------------------------------------------------------------|-----------------|
| id          | unieke identifier van het profiel                                               |     id          |
| action      | de actie die deze callback heeft aangeroepen ('create', 'update' or 'delete')   |     id          |
| fields      | huidige velden van het profiel                                                  |     object      |
| interests   | huidige interesses van het profiel                                              |     array       |

## Subprofiel Variabelen:
| Variabelen  | Omschrijving                                                                    |     Type        |
|-------------|---------------------------------------------------------------------------------|-----------------|
| id          | unieke identifier van het subprofiel                                            |     id          |
| action      | de actie die deze callback heeft aangeroepen ('create', 'update' or 'delete')   |     id          |
| fields      | huidige velden van het subprofiel                                               |     array       |

# Meer informatie
*   [Callbacks](./callbacks)
