# Feedback loops: kliks

Als je het click-tracking aan hebt staan herschrijft Copernica 
alle hyperlinks in de emails die je verstuurt. Als iemand op zo'n 
herschreven link klikt gaat deze gebruiker eerst naar onze website waar 
de klik geregistreerd wordt om vervolgens direct doorgestuurd te
worden naar de oorspronkelijke URL. Dit gebeurt automatisch en razendsnel 
en dus meestal zonder dat de ontvanger het doorheeft. Deze functionaliteit  
maakt het mogelijk dat Copernica elke klik op een van je mails registreert.

Als je een feedback loop voor kliks instelt, word je in real-time op de 
hoogte gebracht van deze kliks. Voor elke klik sturen we via HTTP of 
HTTPS een POST bericht naar jouw server met daarin de relevante 
informatie over de klik.

## Variabelen

Met elke POST call worden de variabelen in de onderstaande tabel verstuurd. 
De POST data wordt verstuurd met het application/x-www-form-urlencoded content type.

Associatieve arrays zoals "parameters" en "velden" worden verstuurd per sleutel-waarde paar, 
bijvoorbeeld *parameters[sleutel]=waarde*. Arrays zoals "interesses" worden verstuurd per item, 
bijvoorbeeld *interests[]=xyz*.

| Variabele | Omschrijving                                             |
|-----------|----------------------------------------------------------|
| id        | unieke identifier van het geklikte bericht               |
| recipient | email adres van de klikker                               |
| ip        | ip adres van de klikker                                  |
| time      | tijd van klikken                                         |
| original  | de originele URL                                         |
| useragent | optionele user agent string (vanuit http request header) |
| referer   | optionele referer (vanuit http request header)           |
| tags      | tags geassocieerd met de mail                            |

De variabelen "id", "recipient" en "tags" stellen je in staat om de klik 
te koppelen aan de oorspronkelijke mail.

## Meer informatie

* [Feedback loops](./feedback-loops)
