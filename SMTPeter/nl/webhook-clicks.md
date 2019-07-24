# Webhooks voor kliks

SMTPeter kan alle *hyperlinks* in je e-mails herschrijven als je *click-tracking*
toestaat. Op deze manier worden alle kliks van je gebruikers geregistreerd. Dit 
gebeurt automatisch, snel en eigenlijk onbewust voor de gebruiker. 

Met een Webhook kun je meldingen over kliks zelf live ontvangen. Voor elke 
klik wordt een HTTP/HTTPS POST call naar je server verstuurd
met relevante informatie over de klik.

## Variabelen

Met elke POST call worden de volgende vaiabelen toegestuurd:

| Variabele | Omschrijving                                             |
|-----------|----------------------------------------------------------|
| id        | Unieke identifier van de e-mail waarop werd geklikt      |
| type      | Type actie die de Webhook triggerde ('click')            |
| timestamp | Tijdstempel van de klik (YYYY-MM-DD HH:MM:SS formaat)    |
| time      | Unix tijd van de klik                                    |
| recipient | E-mailadres van de gebruiker die heeft geklikt           |
| ip        | IP adres van de gebruiker die heeft geklikt              |
| original  | De originele url                                         |
| useragent | Optionele user agent string (vanuit http request header) |
| referer   | Optionele referer (vanuit http request header)           |
| tags      | Tags geassocieerd met de mail                            |

De 'id', 'recipient' en 'tags' variabelen stellen je in staat om de klik te linken aan de 
originele verstuurde e-mail.

## Meer informatie

* [Webhooks](./webhooks)
