# Feedback loops: aanmaken van profielen

Als je in real-time op de hoogte gebracht wil worden wanneer er een nieuw
profiel of subprofiel in een van je database aangemaakt wordt,
kun je hiervoor een feedback loop instellen.
Voor elk nieuw profiel sturen we via HTTP of HTTPS een POST bericht naar jouw
server met daarin alle relevante informatie over het zojuist aangemaakte profiel.

## Variabelen

Met elk POST bericht worden onder andere de volgende variabelen meegestuurd:

| Variabelen         | Omschrijving 
|--------------------|-----------------------------------------------------------------------------------------|
| profile/subprofile | unieke identifier van het (sub)profiel dat werd aangemaakt                              |
| type               | welke actie werd uitgevoerd op het betreffende profiel ('create', 'update' or 'delete') |
| parameters         | parameters voor het uitvoeren van de actie                                              |
| timestamp          | tijd voor het uitvoeren van de actie (in YYYY-MM-DD HH:MM:SS format)                    |

De variabele "action" heeft altijd de waarde 'create'; dit helpt je om deze
berichten te onderscheiden van de berichten die verstuurd worden als een
profiel [aangepast](feedback-updates) of [verwijderd](feedback-deletes) wordt.
Daarnaast wordt er informatie over het profiel of subprofiel meegestuurd. 
Voor profielen zijn dit de volgende variabelen:

| Variabelen  | Omschrijving                                                  |
|-------------|---------------------------------------------------------------|
| id          | unieke identifier van het profiel                             |
| database    | unieke identifier van de database van het profiel             |
| fields      | huidige velden van het profiel                                |
| interests   | huidige interesses van het profiel                            |
| created     | tijd van aanmaken (in YYYY-MM-DD HH:MM:SS format)             |
| modified    | tijd van laatste aanpassing (in YYYY-MM-DD HH:MM:SS format)   |

Voor subprofielen zijn dit de volgende variabelen:

| Variabele   | Omschrijving                                                |
|-------------|-------------------------------------------------------------|
| id          | unieke identifier van het subprofiel                        |
| profile     | unieke identifier van het profiel van het subprofiel        |
| database    | unieke identifier van de database van het subprofiel        |
| collection  | unieke identifier van de collectie van het subprofiel       |
| fields      | huidige velden van het subprofiel                           |
| created     | tijd van aanmaken (in YYYY-MM-DD HH:MM:SS format)           |
| modified    | tijd van laatste aanpassing (in YYYY-MM-DD HH:MM:SS format) |

Associative arrays zoals "parameters" en "fields" worden per key-valuepaar verstuurd,
bijvoorbeeld als *parameters[key]=value*.
Arrays zoals "interests" worden worden per item verstuurd als *interests[]=xyz*.

## Meer informatie

* [Feedback loops](./feedback-loops)
