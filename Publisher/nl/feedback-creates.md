# Feedback loops voor het aanmaken van profielen

Als je in real-time op de hoogte gebracht wil worden wanneer er een nieuw
profiel of subprofiel in een van je database aangemaakt wordt,
kun je hiervoor een feedback loop instellen.
Voor elk nieuw profiel sturen we via HTTP of HTTPS een POST bericht naar jouw
server met daarin alle relevante informatie over het zojuist aangemaakte profiel.

## Variabelen

Met elk POST bericht worden de volgende variabelen meegestuurd:

<table>
    <tr>
        <td>profile / subprofile</td>
        <td>het unieke ID van het profiel/subprofiel dat aangemaakt werd</td>
    </tr>
    <tr>
        <td>action</td>
        <td>welke actie er op het profiel was uitgevoerd ('create', 'update' of 'delete')</td>
    </tr>
    <tr>
        <td>parameter_X</td>
        <td>waarde van de parameter X waarmee de actie uitgevoerd werd</td>
    </tr>
    <tr>
        <td>timestamp</td>
        <td>tijdstip waarop het profiel aangemaakt werd (in YYYY-MM-DD HH:MM:SS formaat)</td>
    </tr>
    <tr>
        <td>field_X</td>
        <td>waarde van het veld X van het profiel nadat het aangemaakt was</td>
    </tr>
    <tr>
        <td>interest_N</td>
        <td>de N-de interesse van het profiel nadat het aangemaakt was</td>
    </tr>
</table>

De variabele "action" heeft altijd de waarde 'create'; dit helpt je om deze
berichten te onderscheiden van de berichten die verstuurd worden als een
profiel [aangepast](feedback-updates) of [verwijderd](feedback-deletes) wordt.
De variabele "profile" danwel "subprofile" stelt je in staat het zojuist
aangemaakte profiel (resp. subprofiel) direct op te zoeken.
