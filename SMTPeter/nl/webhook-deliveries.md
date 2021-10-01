# Webhooks voor deliveries

Door het opzetten van een Webhook voor *deliveries* krijg je live meldingen
over elk afgeleverd bericht. Voor elk afgeleverd bericht sturen
we een HTTP/HTTPS POST call naar je server met relevante
informatie over de aflevering.

## Variabelen

Met elke POST call worden de volgende variabelen toegestuurd:

| Variabele  | Omschrijving                                             |
|------------|----------------------------------------------------------|
| id         | Unieke identifier van het geopende bericht               |
| recipient  | E-mailadres van de opener                                |
| time       | Unix tijd van de bounce                                  |
| timestamp  | Tijdstempel van de bounce (YYYY-MM-DD HH:MM:SS formaat)  |
| code       | Statuscode vanuit de ontvangen mailserver                |
| extended   | Uitgebreide statuscode vanuit de ontvangen mailserver    |
| description| Beschrijving vanuit de ontvangen mailserver              |
| type       | Type van de actie die de Webhook triggerde ('delivery')  |
| tags       | Tags geassocieerd met het bericht                        |

De 'id', 'recipient' en 'tags' variabelen stellen je in staat om de klik te linken aan de 
originele verstuurde e-mail.

## Meer informatie

* [Webhooks](./Webhook)
