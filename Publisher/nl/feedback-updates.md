# Feedback loops voor het aanpassen van profielen

Als je in real-time op de hoogte gebracht wil worden wanneer een
profiel of subprofiel in een van je database aangepast wordt,
kun je hiervoor een feedback loop instellen.
Voor elk aangepast profiel sturen we via HTTP of HTTPS een POST bericht naar jouw
server met daarin alle relevante informatie over het zojuist aangepaste profiel.

## Variabelen

Met elk POST bericht worden onder andere de volgende variabelen meegestuurd:

<table>
    <tr>
        <td>profile / subprofile</td>
        <td>het unieke ID van het profiel/subprofiel dat aangepast werd</td>
    </tr>
    <tr>
        <td>type</td>
        <td>welk type actie er op het (sub)profiel was uitgevoerd ('create', 'update' of 'delete')</td>
    </tr>
    <tr>
        <td>parameters</td>
        <td>de parameters waarmee de actie uitgevoerd werd</td>
    </tr>
    <tr>
        <td>timestamp</td>
        <td>het tijdstip waarop het (sub)profiel aangepast werd (in YYYY-MM-DD HH:MM:SS formaat)</td>
    </tr>
</table>

De variabele "action" heeft altijd de waarde 'update'; dit helpt je om deze
berichten te onderscheiden van de berichten die verstuurd worden als een
profiel [aangemaakt](feedback-creates) of [verwijderd](feedback-deletes) wordt.
Daarnaast wordt er informatie over het profiel of subprofiel meegestuurd. Voor profielen zijn dit de volgende variabelen:

<table>
    <tr>
        <td>ID</td>
        <td>het unieke ID van het profiel</td>
    </tr>
    <tr>
        <td>database</td>
        <td>het unieke ID van de database waarin het profiel zich bevindt</td>
    </tr>
    <tr>
        <td>fields</td>
        <td>de huidige velden van het profiel</td>
    </tr>
    <tr>
        <td>interests</td>
        <td>de huidige interesses van het profiel</td>
    </tr>
    <tr>
        <td>created</td>
        <td>het tijdstip waarop het profiel aangemaakt werd (in YYYY-MM-DD HH:MM:SS formaat)</td>
    </tr>
    <tr>
        <td>modified</td>
        <td>het tijdstip waarop het profiel gewijzigd werd (in YYYY-MM-DD HH:MM:SS formaat)</td>
    </tr>
</table>

Voor subprofielen zijn dit de volgende variabelen:

<table>
    <tr>
        <td>ID</td>
        <td>het unieke ID van het subprofiel</td>
    </tr>
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
    <tr>
        <td>fields</td>
        <td>de huidige velden van het subprofiel</td>
    </tr>
    <tr>
        <td>created</td>
        <td>het tijdstip waarop het subprofiel aangemaakt werd (in YYYY-MM-DD HH:MM:SS formaat)</td>
    </tr>
    <tr>
        <td>modified</td>
        <td>het tijdstip waarop het subprofiel gewijzigd werd (in YYYY-MM-DD HH:MM:SS formaat)</td>
    </tr>
</table>

Associative arrays zoals "parameters" en "fields" worden per key-valuepaar verstuurd,
bijvoorbeeld als *parameters[key]=value*.
Arrays zoals "interests" worden worden per item verstuurd als *interests[]=xyz*.
