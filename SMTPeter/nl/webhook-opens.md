# Webhooks voor opens

SMTPeter kan ook de link van afbeeldingen herschrijven. Dit is handig, omdat
de afbeelding dan niet wordt gedownload van je eigen server. SMTPeter zet de 
afbeelding in de *cache* op onze eigen servers, waardoor je het aantal opens
kunt nagaan om te analyseren. 

Door het opzetten van een Webhook voor *opens* krijg je live meldingen
over elke geregistreerde opening (van de afbeelding). Voor elke opening sturen
we een HTTP/HTTPS POST call naar je server met relevante
informatie over het openen.

## Variabelen

Met elke POST call worden de volgende variabelen toegestuurd:

| Variabele  | Omschrijving                                             |
|------------|----------------------------------------------------------|
| id         | Unieke identifier van het geopende bericht               |
| type       | Type van de actie die de Webhook triggerde ('open')      |
| timestamp  | Tijdstempel van de bounce (YYYY-MM-DD HH:MM:SS formaat)  |
| time       | Unix tijd van de bounce                                  |
| recipient  | E-mailadres van de opener                                |
| ip         | IP adres van de opener                                   |
| useragent  | Optionele user agent string (vanuit HTTP request header) |
| referer    | Optionele referer (vanuit HTTP request header)           |
| tags       | Tags geassocieerd met het bericht                        |

De 'id', 'recipient' en 'tags' variabelen stellen je in staat om de klik te linken aan de 
originele verstuurde e-mail.

## Meer informatie

* [Webhooks](./Webhook)
