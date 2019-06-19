# Webhooks: bounces

Normaal gesproken past Copernica het envelope-adres van mails aan,
zodat alle [*bounces*](./bounces) en andere berichten naar de Marketing Suite 
teruggestuurd worden. Je kan een webhook voor bounces instellen 
om van deze bounces een notificatie te ontvangen. Als je alleen maar 
geïnteresseerd bent in verzendfouten kan je ook de 
[webhooks voor fouten](webhook-failures) gebruiken.

## Soorten berichten

De webhook voor bounces wordt gebruikt voor **alle** berichten die 
naar het envelope-adres teruggestuurd worden.
Niet alleen de normale verzendstatusnotificaties, maar ook foutmeldingen
van servers die het officiële format voor bounce-berichten niet respecteren.
Al dit soort berichten worden naar Copernica verstuurd, die 
via de webhook loop jou weer kunnen informeren.

## Variabelen

Met elk POST bericht worden de volgende variabelen meegestuurd:

| Variabele  | Omschrijving                                             |  
|------------|----------------------------------------------------------|
| id         | Unieke ID voor het bericht dat de bounce triggerde       |
| type       | Type actie dat de Webhook triggerde ('bounce')           |
| timestamp  | Tijdstempel van de bounce (YYYY-MM-DD HH:MM:SS formaat)  |
| time       | Unix tijd van de bounce                                  |
| recipient  | E-mailadres waarnaar de originele mail werd verstuurd    |
| envelope   | Adres om bounces aan te retourneren                      |
| mime       | De verstuurde MIME data (het bericht zelf)               |
| tags       | De tags gelinkt aan de mail                              |

De variabelen 'id', 'recipient' en 'tags' stellen je in staat om de
binnenkomende bounce te koppelen aan de oorspronkelijke mail.

## Meer informatie

* [Webhooks](./webhooks)
