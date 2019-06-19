# Webhooks: opens

Copernica kan links naar afbeeldingen in emails herschrijven om 
opens te registreren. Hierdoor wordt de afbeelding via onze server gedownload, 
in plaats van de server van jouw bedrijf. Hierdoor kan Copernica de 
opens opslaan en naar jou doorsturen via een Webhook.

Als je een Webhook voor opens instelt, word je in real-time op de hoogte
gebracht van elke geopende mail. Voor elke open sturen we via HTTP of 
HTTPS een POST bericht naar jouw server met daarin de relevante 
informatie over de open.

## Variabelen

Met elk POST bericht worden de volgende variabelen meegestuurd:

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

De variabelen 'id', 'recipient' en 'tags' stellen je in staat om de
binnenkomende bounce te koppelen aan de oorspronkelijke mail.

## Meer informatie

* [Webhooks](./webhooks)
