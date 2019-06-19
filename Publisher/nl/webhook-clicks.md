# Webhooks: kliks

Als je het click-tracking aan hebt staan herschrijft Copernica 
alle hyperlinks in de emails die je verstuurt. Als iemand op zo'n 
herschreven link klikt gaat deze gebruiker eerst naar onze website waar 
de klik geregistreerd wordt om vervolgens direct doorgestuurd te
worden naar de oorspronkelijke URL. Dit gebeurt automatisch en razendsnel 
en dus meestal zonder dat de ontvanger het doorheeft. Deze functionaliteit  
maakt het mogelijk dat Copernica elke klik op een van je mails registreert.

Als je een webhook voor kliks instelt, word je in real-time op de 
hoogte gebracht van deze kliks. Voor elke klik sturen we via HTTP of 
HTTPS een POST bericht naar jouw server met daarin de relevante 
informatie over de klik.

## Variabelen

Met elk POST bericht worden de volgende variabelen meegestuurd:

| Variabele | Omschrijving                                             |
|-----------|----------------------------------------------------------|
| id        | Unieke identifier van de e-mail waarop werd geklikt      |
| type      | Type actie die de webhook triggerde ('click')            |
| timestamp | Tijdstempel van de klik (YYYY-MM-DD HH:MM:SS formaat)    |
| time      | Unix tijd van de klik                                    |
| recipient | E-mailadres van de gebruiker die heeft geklikt           |
| ip        | IP adres van de gebruiker die heeft geklikt              |
| original  | De originele url                                         |
| useragent | Optionele user agent string (vanuit http request header) |
| referer   | Optionele referer (vanuit http request header)           |
| tags      | Tags geassocieerd met de mail                            |

De variabelen 'id', 'recipient' en 'tags' stellen je in staat om de
binnenkomende bounce te koppelen aan de oorspronkelijke mail.

## Meer informatie

* [Webhooks](./webhooks)
