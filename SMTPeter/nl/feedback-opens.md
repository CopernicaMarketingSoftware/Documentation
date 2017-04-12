# 'Feedback loops' voor 'opens'

SMTPeter kan ook de link van afbeeldingen herschrijven. Dit is handig, omdat
de afbeelding dan niet wordt gedownload van je eigen server. SMTPeter zet de 
afbeelding in de 'cache' op onze eigen servers, waardoor je het aantal opens
kunt nagaan om te analyseren. 

Door het opzetten van een feedback loop voor opens krijg je live meldingen
over elke geregistreerde opening (van de afbeelding). Voor elke opening sturen
we een 'HTTP POST call' (HTTPS is ook mogelijk) naar je server met relevante
informatie over het openen.


## Variabelen

Met elke POST call worden de volgende variabelen toegestuurd:

```html

<table>
    <tr>
        <td>id</td>
        <td>unique identifier of the message that was opened</td>
    </tr>
    <tr>
        <td>recipient</td>
        <td>email address of the person that opened the mail</td>
    </tr>
    <tr>
        <td>ip</td>
        <td>ip address of the opened</td>
    </tr>
    <tr>
        <td>url</td>
        <td>the original image url (the url <i>before</i> it was rewritten)</td>
    </tr>
    <tr>
        <td>useragent</td>
        <td>optional user agent string (extracted from http request header)</td>
    </tr>
    <tr>
        <td>referer</td>
        <td>optional referer (extracted from http request header)</td>
    </tr>
</table>

```

De "ID" en "recipient" variabelen stellen je in staat om het aantal openingen te 
linken aan de originele verstuurde e-mail.