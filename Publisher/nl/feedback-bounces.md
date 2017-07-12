# Feedback loops: bounces

Normaal gesproken past Copernica het envelope-adres van mails aan,
zodat alle *bounces* en andere berichten naar de Marketing Suite 
teruggestuurd worden. Je kan een feedback loop voor bounces instellen 
om van deze bounces een notificatie te ontvangen. Als je alleen maar 
geïnteresseerd bent in verzendfouten kan je ook de 
[feedback loops voor fouten](feedback-failures) gebruiken.

## Soorten berichten

De feedback loop voor bounces wordt gebruikt voor _alle_ berichten die 
naar het envelope-adres teruggestuurd worden.
Niet alleen de normale verzendstatusnotificaties, maar ook foutmeldingen
van servers die het officiele format voor bounce-berichten niet respecteren.
Al dit soort berichten worden naar Copernica verstuurd, die 
via de feedback loop jou weer kan informeren.

## Variabelen

Met elke POST call worden de variabelen in de onderstaande tabel verstuurd. 
De POST data wordt verstuurd met het application/x-www-form-urlencoded content type.

Associatieve arrays zoals "parameters" en "velden" worden verstuurd per sleutel-waarde paar, 
bijvoorbeeld *parameters[sleutel]=waarde*. Arrays zoals "interesses" worden verstuurd per item, 
bijvoorbeeld *interests[]=xyz*.

| Variabele  | Omschrijving                                                       |  
|------------|--------------------------------------------------------------------|
| id         | orignele bericht ID voor de bounce                                 |
| recipient  | email adres waarnaar de origenele mail werd verstuurd              |
| mailfrom   | "MAIL FROM" adres dat is gebruikt voor het afleveren van de bounce |
| rcptto     | "RCPT TO" adres dat is gebruikt voor het afleveren van de bounce   |
| mime       | de verstuurde MIME data (het bericht zelf)                         |
| tags       | de tags gelinkt aan de mail                                        |

De variabelen "id", "recipient" en "tags" stellen je in staat om de
binnenkomende bounce te koppelen aan de oorspronkelijke mail.
De variabelen "mailfrom", "rcptto" en "data" bevatten het bericht dat bij de Marketing Suite binnenkwam.

## Meer informatie

* [Feedback loops](./feedback-loops)
