# Feedback loops: aanmaken van profielen

Als je in real-time op de hoogte gebracht wil worden wanneer er een nieuw
profiel of subprofiel in een van je database aangemaakt wordt,
kun je hiervoor een feedback loop instellen.
Voor elk nieuw profiel sturen we via HTTP of HTTPS een POST bericht naar jouw
server met daarin alle relevante informatie over het zojuist aangemaakte profiel.

## Variabelen

Met elke POST call worden de variabelen in de onderstaande tabel verstuurd. 
De POST data wordt verstuurd met het application/x-www-form-urlencoded content type.

Associatieve arrays zoals "parameters" en "velden" worden verstuurd per sleutel-waarde paar, 
bijvoorbeeld *parameters[sleutel]=waarde*. Arrays zoals "interesses" worden verstuurd per item, 
bijvoorbeeld *interests[]=xyz*.

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

## Voorbeeld

Een ontcijferde POST call ziet er bijvoorbeeld zo uit voor een profiel:

    {
        "action":       "create",
        "profile":      123,
        "parameters": {
            "name":     "Johny",
            "mail":     "johny@example.com",
            "blue":     1,
            "red":      0
        },
        "timestamp":    "1979-02-12 12:49:23",
        "id":           123,
        "database":     1,
        "fields": {
            "name":     "Johny",
            "mail":     "johny@example.com"
        },
        "interests": {
            "blue":     1,
            "red":      0
        },
        "created":      "1979-02-12 12:49:23",
        "modified":     "1979-02-12 12:49:23"
    }
    
Een voorbeeld voor een subprofiel:

    {
        "action":       "create",
        "subprofile":   123,
        "parameters": {
            "name":     "Johny",
            "mail":     "johny@example.com",
        },
        "timestamp":    "1979-02-12 12:49:23",
        "id":           12,
        "database":     1,
        "collection":   2,
        "profile":      123,
        "fields": {
            "name":     "Johny",
            "mail":     "johny@example.com"
        },
        "created":      "1979-02-12 12:49:23",
        "modified":     "1979-02-12 12:49:23"
    }

## Meer informatie

* [Feedback loops](./feedback-loops)
