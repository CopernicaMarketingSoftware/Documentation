# Feedback loops: opens

Copernica kan links naar afbeeldingen in emails herschrijven om 
opens te registreren. Hierdoor wordt de afbeelding via onze server gedownload, 
in plaats van de server van jouw bedrijf. Hierdoor kan Copernica de 
opens opslaan en naar jou doorsturen via een feedback loop.

Als je een feedback loop voor opens instelt, word je in real-time op de hoogte
gebracht van elke geopende mail. Voor elke open sturen we via HTTP of 
HTTPS een POST bericht naar jouw server met daarin de relevante 
informatie over de open.

## Variabelen

Met elke POST call worden de variabelen in de onderstaande tabel verstuurd. 
De POST data wordt verstuurd met het application/x-www-form-urlencoded content type.

Associatieve arrays zoals "parameters" en "velden" worden verstuurd per sleutel-waarde paar, 
bijvoorbeeld *parameters[sleutel]=waarde*. Arrays zoals "interesses" worden verstuurd per item, 
bijvoorbeeld *interests[]=xyz*.

| Variabele  | Omschrijving                                             |
|------------|----------------------------------------------------------|
| id         | unieke identifier van het geopende bericht               |
| recipient  | email adres van de opener                                |
| ip         | ip adres van de opener                                   |
| time       | tijd van openen                                          |
| useragent  | optionele user agent string (vanuit http request header) |
| referer    | optionele referer (vanuit http request header)           |
| tags       | tags geassocieerd met het bericht                        |

De variabelen "id", "recipient" en "tags" stellen je in staat om de open te koppelen aan de oorspronkelijke mail.

## Meer informatie

* [Feedback loops](./feedback-loops)
