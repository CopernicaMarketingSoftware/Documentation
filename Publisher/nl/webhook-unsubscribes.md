# Webhooks: uitschrijvingen

Als je een Webhook voor uitschrijvingen instelt, word je in real-time op de hoogte
gebracht van elke geregistreerde uitschrijving. Voor elke uitschrijving sturen we via HTTP of 
HTTPS een POST bericht naar jouw server met daarin de relevante 
informatie over de uitschrijving.

## Variabelen

Met elk POST bericht worden de volgende variabelen meegestuurd:

| Variabele  | Omschrijving                                             |
|------------|----------------------------------------------------------|
| id         | Unieke identifier van de uitschrijving                   |
| type       | Type van de actie die de Webhook triggerde ('unsubscribe')  |
| timestamp  | Tijdstempel van de uitschrijving (YYYY-MM-DD HH:MM:SS formaat)  |
| time       | Unix timestamp van de uitschrijving                      |
| database   | Database waartoe het profiel behoort van de uitschrijving|
| profile    | Profiel ID van de uitschrijving                          |
| mailing    | Mailing ID van de uitschrijving                          |

## Meer informatie

* [Webhooks](./webhooks)
