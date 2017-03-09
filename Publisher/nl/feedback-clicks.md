# Feedback loops voor kliks

Als je het click-tracking aan hebt staan,
herschrijft de Marketing Suite alle hyperlinks in de emails die je verstuurt.
Als iemand op zo'n herschreven link klikt, gaat deze gebruiker eerst naar onze
website waar de klik geregistreerd wordt, om vervolgens direct doorgestuurd te
worden naar de oorspronkelijke URL.
Dit gebeurt automatisch en razendsnel, en dus meestal zonder dat de ontvanger het doorheeft.
Deze technologie maakt het mogelijk dat de Marketing Suite elke klik op een van je mails registreert.

Als je een feedback loop voor kliks instelt, wordt je in real-time op de hoogte gebracht van deze kliks.
Voor elke klik sturen we via HTTP of HTTPS een POST bericht naar jouw server
met daarin de relevante informatie over de klik.

## Variabelen

Met elk POST bericht worden de volgende variabelen meegestuurd:

<table>
    <tr>
        <td>id</td>
        <td>het unieke ID van het bericht waarin de link stond</td>
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
        <td>het tijdstip waarop er op de link geklikt werd</td>
    </tr>
    <tr>
        <td>original</td>
        <td>de originele URL (dit is de link waarnaar de ontvanger werd doorgestuurd)</td>
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

De variabelen "id", "recipient" en "tags" stellen je in staat om de klik te koppelen aan de oorspronkelijke mail.
