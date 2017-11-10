# WebHooks: aanpassen van profielen

Als je in real-time op de hoogte gebracht wil worden wanneer een
profiel of subprofiel in een van je database aangepast wordt,
kun je hiervoor een webhook instellen.
Voor elk aangepast profiel sturen we via HTTP of HTTPS een POST bericht naar jouw
server met daarin alle relevante informatie over het zojuist aangepaste profiel.

## Variabelen

Met elk POST bericht worden onder andere de volgende variabelen meegestuurd:

| Variables          | Description                                                            |
|--------------------|------------------------------------------------------------------------|
| profile/subprofile | unieke identifier van het profile/subprofiel dat werd aangepast        |
| type               | type actie uitgevoerd op (sub)profiel ('create', 'update' or 'delete') |
| parameters         | parameter voor uitvoeren actie                                         |
| timestamp          | tijd van aanpassing (in YYYY-MM-DD HH:MM:SS format)                    |

De variabele "action" heeft altijd de waarde 'update'; dit helpt je om deze
berichten te onderscheiden van de berichten die verstuurd worden als een
profiel [aangemaakt](webhook-creates) of [verwijderd](webhook-deletes) wordt.
Daarnaast wordt er informatie over het profiel of subprofiel meegestuurd. Voor profielen zijn dit de volgende variabelen:

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

* [WebHooks](./webhooks)
