# Webhooks: verwijderen van profielen

Als je in real-time op de hoogte gebracht wil worden wanneer een
profiel of subprofiel uit een van je database verwijderd wordt,
kun je hiervoor een webhook instellen.
Voor elk verwijderd profiel sturen we via HTTP of HTTPS een POST bericht naar jouw
server met daarin alle relevante informatie over het zojuist verwijderde profiel.

## Variabelen

Het POST verzoek voor verwijderde profielen bevat de volgende variabelen:

| Variabele  | Omschrijving                                                                      |
|------------|-----------------------------------------------------------------------------------|
| profile    | het unieke ID van het profiel dat verwijderd werd                                 |
| type       | welk type actie er op het profiel was uitgevoerd ('create', 'update' of 'delete') |
| timestamp  | het tijdstip waarop het profiel verwijderd werd (in YYYY-MM-DD HH:MM:SS formaat)  |
| database   | unieke identifier van de database waar het profiel bij hoort                      |

Voor subprofielen zijn dit de volgende variabelen:

| Variabele  | Omschrijving                                                                         |
|------------|--------------------------------------------------------------------------------------|
| subprofile | het unieke ID van het subprofiel dat verwijderd werd                                 |
| type       | welk type actie er op het subprofiel was uitgevoerd ('create', 'update' of 'delete') |
| timestamp  | het tijdstip waarop het subprofiel verwijderd werd (in YYYY-MM-DD HH:MM:SS formaat)  |
| profile    | unieke identifier van het profiel van het subprofiel                                 |
| database   | unieke identifier van de database van het subprofiel                                 |
| collection | unieke identifier van de collectie van het subprofiel                                |

De variabele "action" heeft altijd de waarde 'delete'; dit helpt je om deze
berichten te onderscheiden van de berichten die verstuurd worden als een
profiel [aangemaakt](webhook-creates) of [aangepast](webhook-updates) wordt.
Daarnaast wordt er informatie over het profiel of subprofiel meegestuurd. 

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
