# Feedback loops voor het aanpassen van profielen

Als je in real-time op de hoogte gebracht wil worden wanneer een
profiel of subprofiel in een van je database aangepast wordt,
kun je hiervoor een feedback loop instellen.
Voor elk aangepast profiel sturen we via HTTP of HTTPS een POST bericht naar jouw
server met daarin alle relevante informatie over het zojuist aangepaste profiel.

## Variabelen

Met elk POST bericht worden de volgende variabelen meegestuurd:

<table>
    <tr>
        <td>profile / subprofile</td>
        <td>het unieke ID van het profiel/subprofiel dat aangepast werd</td>
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
        <td>tijdstip waarop het profiel aangepast werd (in YYYY-MM-DD HH:MM:SS formaat)</td>
    </tr>
    <tr>
        <td>field_X</td>
        <td>waarde van het veld X van het profiel nadat het aangepast was</td>
    </tr>
    <tr>
        <td>interest_N</td>
        <td>de N-de interesse van het profiel nadat het aangepast was</td>
    </tr>
</table>

De variabele "action" heeft altijd de waarde 'update'; dit helpt je om deze
berichten te onderscheiden van de berichten die verstuurd worden als een
profiel [aangemaakt](feedback-creates) of [verwijderd](feedback-deletes) wordt.
De variabele "profile" danwel "subprofile" stelt je in staat het profiel (resp.
subprofiel) dat aangepast was direct op te zoeken.
