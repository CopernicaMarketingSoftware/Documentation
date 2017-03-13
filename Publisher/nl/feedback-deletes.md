# Feedback loops voor het verwijderen van een profiel

Als je in real-time op de hoogte gebracht wil worden wanneer een
profiel of subprofiel uit een van je database verwijderd wordt,
kun je hiervoor een feedback loop instellen.
Voor elk verwijderd profiel sturen we via HTTP of HTTPS een POST bericht naar jouw
server met daarin alle relevante informatie over het zojuist verwijderde profiel.

## Variabelen

Met elk POST bericht worden de volgende variabelen meegestuurd:

<table>
    <tr>
        <td>profile / subprofile</td>
        <td>het unieke ID van het profiel/subprofiel dat verwijderd werd</td>
    </tr>
    <tr>
        <td>action</td>
        <td>welke actie er op het profiel was uitgevoerd ('create', 'update' of 'delete')</td>
    </tr>
    <tr>
        <td>timestamp</td>
        <td>tijdstip waarop het profiel verwijderd werd (in YYYY-MM-DD HH:MM:SS formaat)</td>
    </tr>
    <tr>
        <td>field_X</td>
        <td>waarde van het veld X van het profiel voordat het verwijderd werd</td>
    </tr>
    <tr>
        <td>interest_N</td>
        <td>de N-de interesse van het profiel voordat het verwijderd werd</td>
    </tr>
</table>

Als je het profiel terug zou willen brengen, vertellen de "field" en "interest" variabelen
je hoe het profiel eruitzag net voordat het verwijderd werd.