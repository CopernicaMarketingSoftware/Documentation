# Webhooks: bounces

Normaal gesproken past Copernica het envelope-adres van mails aan,
zodat alle [*bounces*](./bounces) en andere berichten naar de Marketing Suite 
teruggestuurd worden. Je kan een webhook voor bounces instellen 
om van deze bounces een notificatie te ontvangen. Als je alleen maar 
geïnteresseerd bent in verzendfouten kan je ook de 
[webhooks voor fouten](webhook-failures) gebruiken.

## Soorten berichten

De webhook voor bounces wordt gebruikt voor _alle_ berichten die 
naar het envelope-adres teruggestuurd worden.
Niet alleen de normale verzendstatusnotificaties, maar ook foutmeldingen
van servers die het officiële format voor bounce-berichten niet respecteren.
Al dit soort berichten worden naar Copernica verstuurd, die 
via de webhook loop jou weer kunnen informeren.

## Variabelen

Met elk POST bericht worden de volgende variabelen meegestuurd:

| Variabele  | Omschrijving                                                       |  
|------------|--------------------------------------------------------------------|
| id         | originele bericht ID voor de bounce                                |
| recipient  | email adres waarnaar de originele mail werd verstuurd              |
| mailfrom   | "MAIL FROM" adres dat is gebruikt voor het afleveren van de bounce |
| rcptto     | "RCPT TO" adres dat is gebruikt voor het afleveren van de bounce   |
| mime       | de verstuurde MIME data (het bericht zelf)                         |
| tags       | de tags gelinkt aan de mail                                        |

De variabelen "id", "recipient" en "tags" stellen je in staat om de
binnenkomende bounce te koppelen aan de oorspronkelijke mail.
De variabelen "mailfrom", "rcptto" en "data" bevatten het bericht dat bij de Marketing Suite binnenkwam.

## Meer informatie

* [Webhooks](./webhooks)
