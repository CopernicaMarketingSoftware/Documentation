# Feedback loops: verwijderen van profielen

Als je in real-time op de hoogte gebracht wil worden wanneer een
profiel of subprofiel uit een van je database verwijderd wordt,
kun je hiervoor een feedback loop instellen.
Voor elk verwijderd profiel sturen we via HTTP of HTTPS een POST bericht naar jouw
server met daarin alle relevante informatie over het zojuist verwijderde profiel.

## Variabelen

Met elke POST call worden de variabelen in de onderstaande tabel verstuurd. 
De POST data wordt verstuurd met het application/x-www-form-urlencoded content type.

Associatieve arrays zoals "parameters" en "velden" worden verstuurd per sleutel-waarde paar, 
bijvoorbeeld *parameters[sleutel]=waarde*. Arrays zoals "interesses" worden verstuurd per item, 
bijvoorbeeld *interests[]=xyz*.

| Variabele          | Omschrijving
|--------------------|----------------------------------------------------------------------------------------|
| profile/subprofile | het unieke ID van het profiel/subprofiel dat verwijderd werd                           |
| type               | welk type actie er op het (sub)profiel was uitgevoerd ('create', 'update' of 'delete') |
| timestamp          | het tijdstip waarop het (sub)profiel verwijderd werd (in YYYY-MM-DD HH:MM:SS formaat)  |

De variabele "action" heeft altijd de waarde 'delete'; dit helpt je om deze
berichten te onderscheiden van de berichten die verstuurd worden als een
profiel [aangemaakt](feedback-creates) of [aangepast](feedback-updates) wordt.
Daarnaast wordt er informatie over het profiel of subprofiel meegestuurd. 
Voor profielen zijn dit de volgende variabelen:

| Variabele  | Omschrijving                                                   |
|------------|----------------------------------------------------------------|
| database   | unieke identifier van de database waar het profiel bij hoort   |

Voor subprofielen zijn dit de volgende variabelen:

| Variabele  | Omschrijving                                                |
|------------|-------------------------------------------------------------|
| profile    | unieke identifier van het profiel van het subprofiel        |
| database   | unieke identifier van de database van het subprofiel        |
| collection | unieke identifier van de collectie van het subprofiel       |

## Voorbeeld

Een ontcijferde POST call ziet er bijvoorbeeld zo uit voor een profiel:

    {
        "action":       "delete",
        "profile":      123,
        "timestamp":    "1979-02-12 12:49:23",
        "database":     1,
    }
    
Een voorbeeld voor een subprofiel:

    {
        "action":       "delete",
        "subprofile":   456,
        "timestamp":    "1979-02-12 12:49:23",
        "profile":      123
        "collection":   2,
    }

## Meer informatie

* [Feedback loops](./feedback-loops)
