# Feedback loops voor opens

SMTPeter kan ook de link van afbeeldingen herschrijven. Dit is handig, omdat
de afbeelding dan niet wordt gedownload van je eigen server. SMTPeter zet de 
afbeelding in de *cache* op onze eigen servers, waardoor je het aantal opens
kunt nagaan om te analyseren. 

Door het opzetten van een feedback loop voor *opens* krijg je live meldingen
over elke geregistreerde opening (van de afbeelding). Voor elke opening sturen
we een HTTP POST call (HTTPS is ook mogelijk) naar je server met relevante
informatie over het openen.


## Variabelen

Met elke POST call worden de volgende variabelen toegestuurd:

<table>
    <tr>
        <td>id</td>
        <td>unieke *identifier* van het bericht dat werd geopeopend</td>
    </tr>
    <tr>
        <td>*recipient*</td>
        <td>e-mailadres van de persoon die de e-mail heeft geopend</td>
    </tr>
    <tr>
        <td>ip</td>
        <td>ip adres van degene die heeft geopend</td>
    </tr>
    <tr>
        <td>url</td>
        <td>de originele afbeelding url (de url <i>voor</i> het herschreven werd)</td>
    </tr>
    <tr>
        <td>useragent</td>
        <td>optionele *user agent* string (uit de http header gehaald)</td>
    </tr>
    <tr>
        <td>referer</td>
        <td>optionele *referer* (uit de http header gehaald)</td>
    </tr>
</table>

De "ID" en "recipient" variabelen stellen je in staat om het aantal openingen te 
linken aan de originele verstuurde e-mail.
