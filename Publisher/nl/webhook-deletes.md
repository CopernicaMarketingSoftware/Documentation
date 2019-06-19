# Webhooks: verwijderen van profielen

Als je in real-time op de hoogte gebracht wil worden wanneer een
profiel of subprofiel uit een van je database verwijderd wordt,
kun je hiervoor een Webhook instellen.
Voor elk verwijderd profiel sturen we via HTTP of HTTPS een POST bericht naar jouw
server met daarin alle relevante informatie over het zojuist verwijderde profiel.

## Variabelen

Het POST verzoek voor verwijderde profielen bevat de volgende variabelen:

| Variabele  | Omschrijving                                                     |
|------------|------------------------------------------------------------------|
| type       | Type actie dat de Webhook triggerde ('type')                     |
| timestamp  | Tijdstempel van de verwijdering (YYYY-MM-DD HH:MM:SS formaat)    |
| time       | Unix tijd van de failure                                         |
| profile    | Unieke ID van het profiel dat verwijderd werd                    |
| database   | Unieke identifier van de database van het profiel                |
| fields     | Velden van het verwijderde profiel                               |

Voor subprofielen zijn dit de volgende variabelen:

| Variabele  | Omschrijving                                                     |
|------------|------------------------------------------------------------------|
| type       | Type actie dat de Webhook triggerde ('type')                     |
| timestamp  | Tijdstempel van de verwijdering (YYYY-MM-DD HH:MM:SS formaat)    |
| time       | Unix tijd van de failure                                         |
| profile    | Unieke identifier van het profiel van het subprofiel             |
| subprofile | Unieke ID van het subprofiel dat verwijderd werd                 |
| database   | Unieke identifier van de database van het subprofiel             |
| collection | Unieke identifier van de collectie van het subprofiel            |

## Example

Een gedecodeerd POST verzoek voor een profiel ziet er bijvoorbeeld zo uit:

```json
    {
        "action":       "delete",
        "profile":      123,
        "timestamp":    "1979-02-12 12:49:23",
        "database":     1,
    }
```
    
Het verzoek voor een subprofiel ziet er bijvoorbeeld zo uit:

```json
    {
        "action":       "delete",
        "subprofile":   456,
        "timestamp":    "1979-02-12 12:49:23",
        "profile":      123
        "collection":   2,
    }
```

## Meer informatie

* [Webhooks](./webhooks)
