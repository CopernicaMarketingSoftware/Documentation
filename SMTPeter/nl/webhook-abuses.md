# Webhooks voor abuses

In veel e-mailclients is het mogelijk om een ontvangen e-mail als spam te markeren.
Indien een ontvanger van een e-mail deze als spam markeert en de e-mailclient dit
ondersteunt, ontvangt SMTPeter hier een zogenaamd *abuse report* over. Hierin wordt
beschreven over welke email de klacht gaat. 

Met een Webhook kun je meldingen over deze *abuse reports* voor jouw e-mails zelf ontvangen.
Voor elke klacht wordt een HTTP/HTTPS POST call naar jouw server
verstuurd met relevante informatie over de klacht.

## Variabelen

Met elke POST call worden de volgende variabelen meegestuurd:

| Variabele | Omschrijving                                              |
|-----------|-----------------------------------------------------------|
| id        | Unieke identifier van het bericht dat een abuse triggerde |
| emailfrom | E-mailaddres van de email client die de klacht indient    |
| mime      | MIME versie van het ontvangen bericht                     |

## Meer informatie

* [Webhooks](./webhooks)
* [Webhooks instellen](./webhook-setup)
