# Webhooks: deliveries

Als je een Webhook voor afgeleverde berichten instelt, word je in real-time op de hoogte
gebracht van elke verzonden e-mail. Voor elke verzonden e-mail sturen we via HTTP of 
HTTPS een POST bericht naar jouw server met daarin de relevante 
informatie over de aflevering.

## Variabelen

Met elk POST bericht worden de volgende variabelen meegestuurd:

| Variabele  | Omschrijving                                             |
|------------|----------------------------------------------------------|
| id         | Unieke identifier van het afgeleverde bericht            |
| type       | Type van de actie die de Webhook triggerde ('delivery')  |
| timestamp  | Tijdstempel van de aflevering (YYYY-MM-DD HH:MM:SS formaat)  |
| time       | Unix tijd van de aflevering                              |
| recipient  | E-mailadres van de aflevering                            |
| tags       | Tags geassocieerd met het bericht                        |

De variabelen 'id', 'recipient' en 'tags' stellen je in staat om de
binnenkomende aflevering te koppelen aan de oorspronkelijke mail.

## Meer informatie

* [Webhooks](./webhooks)
