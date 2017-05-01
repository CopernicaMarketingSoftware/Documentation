# Feedback loops voor het verwijderen van profielen

Als je in real-time op de hoogte gebracht wil worden wanneer een
profiel of subprofiel uit een van je database verwijderd wordt,
kun je hiervoor een feedback loop instellen.
Voor elk verwijderd profiel sturen we via HTTP of HTTPS een POST bericht naar jouw
server met daarin alle relevante informatie over het zojuist verwijderde profiel.

## Variabelen

Met elk POST bericht worden onder andere de volgende variabelen meegestuurd:

<table>
    <tr>
        <td>profile / subprofile</td>
        <td>het unieke ID van het profiel/subprofiel dat verwijderd werd</td>
    </tr>
    <tr>
        <td>type</td>
        <td>welk type actie er op het (sub)profiel was uitgevoerd ('create', 'update' of 'delete')</td>
    </tr>
    <tr>
        <td>timestamp</td>
        <td>het tijdstip waarop het (sub)profiel verwijderd werd (in YYYY-MM-DD HH:MM:SS formaat)</td>
    </tr>
</table>

De variabele "action" heeft altijd de waarde 'delete'; dit helpt je om deze
berichten te onderscheiden van de berichten die verstuurd worden als een
profiel [aangemaakt](feedback-creates) of [aangepast](feedback-updates) wordt.
Daarnaast wordt er informatie over het profiel of subprofiel meegestuurd. Voor profielen zijn dit de volgende variabelen:

<table>
    <tr>
        <td>database</td>
        <td>het unieke ID van de database waarin het profiel zich bevindt</td>
    </tr>
</table>

Voor subprofielen zijn dit de volgende variabelen:

<table>
    <tr>
        <td>profile</td>
        <td>het unieke ID van het profiel dat bij dit subprofiel hoort</td>
    </tr>
    <tr>
        <td>database</td>
        <td>het unieke ID van de database waarin het subprofiel zich bevindt</td>
    </tr>
    <tr>
        <td>collection</td>
        <td>het unieke ID van de collection waarin het subprofiel zich bevindt</td>
    </tr>
</table>
