# Webhooks: aanpassen van profielen

Als je in real-time op de hoogte gebracht wil worden wanneer een
profiel of subprofiel in een van je database aangepast wordt,
kun je hiervoor een webhook instellen.
Voor elk aangepast profiel sturen we via HTTP of HTTPS een POST bericht naar jouw
server met daarin alle relevante informatie over het zojuist aangepaste profiel.

## Variabelen

Associative arrays zoals "parameters" en "fields" worden per key-valuepaar verstuurd,
bijvoorbeeld als *parameters[key]=value*.
Arrays zoals "interests" worden worden per item verstuurd als *interests[]=xyz*.

Voor profielen zijn dit de volgende variabelen:

| Variabelen    | Omschrijving                                                      |
|---------------|-------------------------------------------------------------------|
| type          | Type actie dat de Webhook triggerde ('update')                    |
| parameters    | Parameters voor uitvoeren van de actie                            |
| timestamp     | Tijdstempel van de failure (YYYY-MM-DD HH:MM:SS formaat)          |
| time          | Unix tijd van de failure                                          |
| profile       | unieke identifier van het profiel dat werd aangepast              |
| database      | unieke identifier van de database van het profiel                 |
| created       | tijd van aanmaken (in YYYY-MM-DD HH:MM:SS format)                 |
| modified      | tijd van laatste aanpassing (in YYYY-MM-DD HH:MM:SS format)       |
| fields        | huidige velden van het profiel                                    |
| interests     | huidige interesses van het profiel                                |

Voor subprofielen zijn dit de volgende variabelen:

| Variabele     | Omschrijving                                                      |
|---------------|-------------------------------------------------------------------|
| type          | Type actie dat de Webhook triggerde ('update')                    |
| parameters    | Parameters voor uitvoeren van de actie                            |
| timestamp     | Tijdstempel van de update (YYYY-MM-DD HH:MM:SS formaat)           |
| time          | Unix tijd van de update                                           |
| profile       | Unieke identifier van het profiel van het subprofiel              |
| subprofile    | Unieke identifier van het subprofiel dat werd aangepast           |
| database      | Unieke identifier van de database van het subprofiel              |
| collection    | Unieke identifier van de collectie van het subprofiel             |
| created       | Tijd van aanmaken (in YYYY-MM-DD HH:MM:SS format)                 |
| modified      | Tijd van laatste aanpassing (in YYYY-MM-DD HH:MM:SS format)       |
| fields        | Huidige velden van het subprofiel                                 |

## Voorbeeld

Een gedecodeerd POST verzoek voor een profiel ziet er bijvoorbeeld zo uit:

```json
{
    "action":       "update",
    "profile":      123,
    "parameters": {
        "mail":     "johny+newemail@example.com",
    },
    "timestamp":    "1979-02-12 12:49:23",
    "id":           123,
    "database":     1,
    "fields": {
        "name":     "Johny",
        "mail":     "johny+newemail@example.com",
    },
    "interests": {
        "blue":     1,
        "red":      0
    },
    "created":      "1979-02-12 12:49:23",
    "modified":     "1979-02-12 12:49:23"
}
```

Een voorbeeld voor een subprofiel ziet er als volgt uit:

```json
{
    "action":       "update",
    "subprofile":   123,
    "parameters": {
        "mail":     "johny+newemail@example.com",
    },
    "timestamp":    "1979-02-12 12:49:23",
    "id":           12,
    "database":     1,
    "collection":   2,
    "profile":      123,
    "fields": {
        "name":     "Johny",
        "mail":     "johny+newemail@example.com",
    },
    "created":    "1979-02-12 12:49:23",
    "modified":   "1979-02-12 12:49:23"
}
```

## Meer informatie

* [Webhooks](./webhooks)
