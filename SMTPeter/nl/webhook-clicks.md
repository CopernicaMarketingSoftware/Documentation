# Webhooks voor kliks

SMTPeter kan alle *hyperlinks* in je e-mails herschrijven als je *click-tracking*
toestaat. Op deze manier worden alle kliks van je gebruikers geregistreerd. Dit 
gebeurt automatisch, snel en eigenlijk onbewust voor de gebruiker. 

Met een webhook kun je meldingen over kliks zelf live ontvangen. Voor elke 
klik wordt een HTTP POST call (HTTPS is ook mogelijk) naar je server verstuurd
met relevante informatie over de klik.

## Variabelen

Met elke POST call worden de volgende vaiabelen toegestuurd:

| Variabele | Omschrijving                                             |
|-----------|----------------------------------------------------------|
| id        | unieke identifier van de e-mail waarop werd geklikt      |
| recipient | e-mailadres van de gebruiker die heeft geklikt           |
| ip        | ip adres van de gebruiker die heeft geklikt              |
| time      | tijd van klikken                                         |
| original  | de originele url                                         |
| useragent | optionele user agent string (vanuit http request header) |
| referer   | optionele referer (vanuit http request header)           |
| tags      | tags geassocieerd met de mail                            |


De "id", "recipient" en "tags" variabelen stellen je in staat om de klik te linken aan de 
originele verstuurde e-mail.

## Meer informatie

* [Webhooks](./webhooks)
* [Webhooks instellen](./webhook-setup)
