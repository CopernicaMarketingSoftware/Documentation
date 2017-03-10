# Feedback loops voor opens

De Marketing Suite kan links naar plaatjes in emails herschrijven om opens de registreren.
Als een email waarvoor dit aanstaat geopend wordt, wordt het plaatje niet
van jouw server gedownload, maar van de cache op onze servers.
Dit stelt ons in staat om alle opens te registreren en zo statistieken bij te houden.

Als je een feedback loop voor opens instelt, word je in real-time op de hoogte
gebracht van elke geopende mail.
Voor elke open sturen we via HTTP of HTTPS een POST bericht naar jouw server
met daarin de relevante informatie over de open.

## Variabelen

Met elk POST bericht worden de volgende variabelen meegestuurd:

<table>
    <tr>
        <td>id</td>
        <td>het unieke ID van het bericht dat geopend werd</td>
    </tr>
    <tr>
        <td>recipient</td>
        <td>het email address van de ontvanger</td>
    </tr>
    <tr>
        <td>ip</td>
        <td>het ip address van de ontvanger</td>
    </tr>
    <tr>
        <td>time</td>
        <td>het tijdstip waarop er op de email geopend werd</td>
    </tr>
    <tr>
        <td>useragent</td>
        <td>optionele informatie over de user-agent van de ontvanger (uit de HTTP request header)</td>
    </tr>
    <tr>
        <td>referer</td>
        <td>optionele informatie over de referer van de ontvanger (uit de HTTP request header)</td>
    </tr>
    <tr>
        <td>tags</td>
        <td>de tags die je aan de mail koppelde</td>
    </tr>
</table>

De variabelen "id", "recipient" en "tags" stellen je in staat om de open te koppelen aan de oorspronkelijke mail.
