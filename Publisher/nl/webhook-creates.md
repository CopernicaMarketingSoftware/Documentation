# Webhooks: aanmaken van profielen

Als je in real-time op de hoogte gebracht wil worden wanneer er een nieuw
profiel of subprofiel in een van je database aangemaakt wordt,
kun je hiervoor een webhook instellen.
Voor elk nieuw profiel sturen we via HTTP of HTTPS een POST bericht naar jouw
server met daarin alle relevante informatie over het zojuist aangemaakte profiel.

## Variabelen

Associative arrays zoals "parameters" en "fields" worden per key-valuepaar verstuurd,
bijvoorbeeld als *parameters[key]=value*.
Arrays zoals "interests" worden worden per item verstuurd als *interests[]=xyz*.

Voor elk profiel worden de volgende waarden meegegeven:

| Variabelen  | Omschrijving                                                                    |
|-------------|---------------------------------------------------------------------------------|
| type        | Type actie dat de Webhook heeft getriggerd ('create')                           |
| parameters  | Parameters voor het uitvoeren van de actie                                      |
| timestamp   | Tijdstempel van het aanmaken van het profiel (in YYYY-MM-DD HH:MM:SS format)    |
| time        | Unix tijd van het updaten van het profiel                                       |
| profile     | Unieke identifier van het profiel dat werd aangemaakt                           |
| database    | Unieke identifier van de database van het profiel                               |
| created     | Tijd van aanmaken (in YYYY-MM-DD HH:MM:SS format)                               |
| modified    | Tijd van laatste aanpassing (in YYYY-MM-DD HH:MM:SS format)                     |
| fields      | Huidige velden van het profiel                                                  |
| interests   | Huidige interesses van het profiel                                              |

Voor subprofielen zijn dit de volgende variabelen:

| Variabele   | Omschrijving                                                                    |
|-------------|---------------------------------------------------------------------------------|
| type        | Type actie dat de Webhook heeft getriggerd ('create')                           |
| parameters  | Parameters voor het uitvoeren van de actie                                      |
| timestamp   | Tijdstempel van het aanmaken van het profiel (in YYYY-MM-DD HH:MM:SS format)    |
| time        | Unix tijd van het updaten van het profiel                                       |
| profile     | Unieke identifier van het profiel van het subprofiel                            |
| subprofile  | Unieke identifier van het subprofiel dat werd aangemaakt                        |
| database    | Unieke identifier van de database van het subprofiel                            |
| collection  | Unieke identifier van de collectie van het subprofiel                           |
| created     | Tijdstempel van aanmaken (in YYYY-MM-DD HH:MM:SS format)                        |
| modified    | Tijdstempel van laatste aanpassing (in YYYY-MM-DD HH:MM:SS format)              |
| fields      | Huidige velden van het subprofiel                                               |

## Voorbeeld

Een gedecodeerde JSON response voor een profiel ziet er bijvoorbeeld zo uit:

```json
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
```
    
Een voorbeeld van een subprofiel ziet er zo uit:

```json
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
```

## Meer informatie

* [Webhooks](./webhooks)
