# Webhooks voor failures

Het is mogelijk om live notificaties te ontvangen over *failed deliveries*.
Je kunt dit doen door een *feedack loop* op te zetten voor deze vorm van
meldingen. Je krijgt dan meldingen over fouten die ontstaan bij de
*SMTP handshake* en meldingen over e-mails die vooraf werden goedgekeurd 
en later alsnog een failure rapport ontvingen.

## Synchronous versus asynchronous

Het SMTP protocol stelt ontvangende servers in staat om een e-mail af te 
wijzen of te accepteren. SMTPeter maakt een *call*, naar de door jou 
aangegeven URL als een e-mail wordt afgewezen. Het kan ook voorkomen dat
een e-mail wordt geaccepteerd om vervolgens later alsnog afgewezen te worden.
Deze *asynchronous errors* worden ook door SMTPeter opgepikt en vervolgens
meegegeven aan de Webhook.

De meeste *e-mail servers* gebruiken vaak de officiele *Delivery Status Notification*
om *bounce* meldingen te versturen. Dit formaat stelt SMTPeter in staat om automatisch
bounces te herkennen, te loggen en te rapporteren via Webhooks. Echter,
deze officiele standaard wordt niet door iedere e-mail server gebruikt en
sommige grote spelers sturen zelfs eigen bedachte notificaties. We doen uiteraard
ons uiterste best om alle type bounces te registreren en aan de Webhook 
mee te geven, maar dit lukt niet altijd vanwege de vele verschillende formaten
waarin bounces worden gemeld. 

Het is ook mogelijk alle bounces te ontvangen met een [Webhook voor bounces](webhook-bounces).

## Variabelen

SMTPeter gebruikt HTTP POST calls om data naar je toe te sturen. Dit kan gedaan
worden over HTTP of over HTTPS. De volgende variabelen worden gebruikt in POST 
calls:

| Variabele    | Description                                                                |
|--------------|----------------------------------------------------------------------------|
| id           | Unieke id van het bericht dat de failure triggerde                         |
| type         | Type van de actie die de Webhook triggerde ('failure')                     |
| timestamp    | Tijdstempel van de failure (YYYY-MM-DD HH:MM:SS formaat)                   |
| time         | Unix tijd van de failure                                                   |
| recipient    | E-mailadres van de ontvanger die de failure triggerde                      |
| action       | Actie die voorgekomen is ('failure' of 'failed')                           |
| state        | Staat in het SMTP protocol van de fout ("bounce" voor asynchrone bounces)  |
| code         | Optionele SMTP error code                                                  |
| extended     | Optionele extended SMTP status code                                        |
| description  | Optionele omschrijving van de fout                                         |
| tags         | Tags geassocieerd met het bericht                                          |

De 'id', 'recipient' en 'tags' variabelen stellen je in staat om de klik te linken aan de 
originele verstuurde e-mail.

## Meer informatie

* [Webhooks](./webhooks)
