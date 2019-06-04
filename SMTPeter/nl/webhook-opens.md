# Webhooks voor opens

SMTPeter kan ook de link van afbeeldingen herschrijven. Dit is handig, omdat
de afbeelding dan niet wordt gedownload van je eigen server. SMTPeter zet de 
afbeelding in de *cache* op onze eigen servers, waardoor je het aantal opens
kunt nagaan om te analyseren. 

Door het opzetten van een webhook voor *opens* krijg je live meldingen
over elke geregistreerde opening (van de afbeelding). Voor elke opening sturen
we een HTTP POST call (HTTPS is ook mogelijk) naar je server met relevante
informatie over het openen.

## Variabelen

Met elke POST call worden de volgende variabelen toegestuurd:

| Variabele  | Omschrijving                                             |
|------------|----------------------------------------------------------|
| id         | unieke identifier van het geopende bericht               |
| recipient  | e-mailadres van de persoon die de e-mail heeft geopend   |
| ip         | ip adres van degene die heeft geopend                    |
| time       | tijd van openen                                          |
| useragent  | optionele user agent string (vanuit http request header) |
| referer    | optionele referer (vanuit http request header)           |
| tags       | tags geassocieerd met het bericht                        |

De "id" en "recipient" variabelen stellen je in staat om het aantal openingen te 
linken aan de originele verstuurde e-mail.

## Meer informatie

* [Webhooks](./webhooks)
* [Webhooks instellen](./webhook-setup)
