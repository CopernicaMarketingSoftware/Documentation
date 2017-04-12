# 'Feedback loops' voor 'clicks'

SMTPeter kan alle 'hyperlinks' in je e-mails herschrijven als je 'click-tracking'
toestaat. Op deze manier worden alle kliks van je gebruikers geregistreerd. Dit 
gebeurt automatisch, snel en eigenlijk onbewust voor de gebruiker. 

Met een feedback loop kun je meldingen over kliks zelf live ontvangen. Voor elke 
klik wordt een 'HTTP POST call' (HTTPS is ook mogelijk) naar je server verstuurd
met relevante informatie over de klik.

## Variabelen

Met elke POST call worden de volgende vaiabelen toegestuurd:

```html 

<table>
    <tr>
        <td>id</td>
        <td>unique identifier of the message that was clicked</td>
    </tr>
    <tr>
        <td>recipient</td>
        <td>email address of the person that clicked</td>
    </tr>
    <tr>
        <td>ip</td>
        <td>ip address of the clicker</td>
    </tr>
    <tr>
        <td>url</td>
        <td>the clicked url (this is the link to the SMTPeter server)</td>
    </tr>
    <tr>
        <td>original</td>
        <td>the original url (this is the link to which the user was redirected)</td>
    </tr>
    <tr>
        <td>useragent</td>
        <td>optional user agent string (extracted from http request header)</td>
    </tr>
    <tr>
        <td>referer</td>
        <td>optional referer (extracted from http request header)</td>
    </tr>
    <tr>
        <td>tags</td>
        <td>the tags that you associated with the mail</td>
    </tr>
</table>

```

De "ID", "recipient" en "tags" variabelen stellen je in staat om de klik te linken aan de 
originele verstuurde e-mail.