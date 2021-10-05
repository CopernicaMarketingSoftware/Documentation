# Webhooks voor deliveries

Door het opzetten van een Webhook voor *deliveries* (afleveringen) krijg je live meldingen
over elk afgeleverd bericht. We sturen een HTTP/HTTPS POST call naar je server met relevante
informatie over de aflevering.

## Variabelen

Met elke POST call worden de volgende variabelen toegestuurd:

| Variabele  | Omschrijving                                             |
|------------|----------------------------------------------------------|
| id         | Unieke identifier van het afgeleverde bericht            |
| recipient  | E-mailadres van de ontvan                                |
| time       | Unix tijd van de delivery                                |
| timestamp  | Tijdstempel van de bounce (YYYY-MM-DD HH:MM:SS formaat)  |
| code       | Statuscode vanuit de ontvangende mailserver              |
| extended   | Uitgebreide statuscode vanuit de ontvangende mailserver  |
| description| Beschrijving vanuit de ontvangen mailserver              |
| type       | Type van de actie die de Webhook triggerde ('delivery')  |
| tags       | Tags geassocieerd met het bericht                        |

De 'id', 'recipient' en 'tags' variabelen stellen je in staat om de aflevering te linken aan de 
originele verstuurde e-mail.

## Waarschuwing
Zoals hierboven beschreven wordt deze Webhook uitgevoerd na ieder afgeleverd bericht. Hierdoor kan dit zorgen voor een enorme load richting je server. 

## Meer informatie

* [Webhooks](./Webhook)
