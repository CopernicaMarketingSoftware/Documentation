# Feedback loops voor kliks

SMTPeter kan alle *hyperlinks* in je e-mails herschrijven als je *click-tracking*
toestaat. Op deze manier worden alle kliks van je gebruikers geregistreerd. Dit 
gebeurt automatisch, snel en eigenlijk onbewust voor de gebruiker. 

Met een feedback loop kun je meldingen over kliks zelf live ontvangen. Voor elke 
klik wordt een HTTP POST call (HTTPS is ook mogelijk) naar je server verstuurd
met relevante informatie over de klik.

## Variabelen

Met elke POST call worden de volgende vaiabelen toegestuurd:

<table>
    <tr>
        <td>id</td>
        <td>unieke <em>identifier</em> van de e-mail waarop werd geklikt</td>
    </tr>
    <tr>
        <td><em>recipient</em></td>
        <td>e-mailadres van de gebruiker die heeft geklikt</td>
    </tr>
    <tr>
        <td>ip</td>
        <td>ip adres van de gebruiker die heeft geklikt</td>
    </tr>
    <tr>
        <td>url</td>
        <td>de url waarop is geklikt (dit is de link naar de SMTPeter server)</td>
    </tr>
    <tr>
        <td>original</td>
        <td>de originele url (dit is de link waarnaar de gebruiker werd doorverbonden)</td>
    </tr>
    <tr>
        <td>useragent</td>
        <td>optionele *user agent* string (uit de http header gehaald)</td>
    </tr>
    <tr>
        <td>referer</td>
        <td>optionele referer (uit de http header gehaald)</td>
    </tr>
    <tr>
        <td>tags</td>
        <td>de <em>tags</em> die je associërt met een e-mail</td>
    </tr>
</table>

De "ID", "recipient" en "tags" variabelen stellen je in staat om de klik te linken aan de 
originele verstuurde e-mail.
