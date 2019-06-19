# Webhooks: fouten

Als je notificaties wil ontvangen over verzendfouten,
kan je een Webhook voor fouten instellen.
Je ontvangt dan een notificatie van zowel synchrone fouten (fouten tijdens de SMTP handshake)
als asynchrone fouten (fouten die in eerste instantie geaccepteerd werden,
maar waarvoor vervolgens een foutmelding ontvangen werd).

# Synchroon vs asynchroon

Het SMTP protocol stelt servers in staat om een bericht te accepteren of af te wijzen.
Als een bericht afgewezen wordt stuurt Copernica een POST bericht
naar de URL die je voor de Webhook hebt ingesteld.
Het is ook mogelijk dat een bericht geaccepteerd wordt,
maar dat de ontvangende server later een bounce-email terugstuurt
om te melden dat het verzenden toch niet gelukt is.
Deze asynchrone fouten worden ook door Copernica opgevangen als ze herkend 
worden.

Mailservers gebruiken meestal de officiële Delivery Status Notification 
(DNS) standaard om bounce-berichten terug te sturen.
Bounces in dit standaardformaat worden automatisch door Copernica herkend, 
gelogd en naar de Webhook doorgestuurd.
Helaas hebben niet alle mailservers deze standaard overgenomen
en sommige grote mailservers sturen notificaties in een format
dat zij zelf ontworpen hebben.
Alhoewel we ons best doen om alle soorten bounce-berichten te herkennen
en door te sturen naar de Webhooks, is dit niet altijd mogelijk
voor asynchrone bounce-berichten die niet aan de standaard voldoen.

Als je alle bounces wilt ontvangen kan je naast een Webhook voor 
fouten ook een [Webhook voor bounces](webhook-bounces) instellen.

## Variabelen

De Marketing Suite stuurt via HTTP of via HTTPS een POST bericht naar jouw server.
Met elk POST bericht worden de volgende variabelen meegestuurd:

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

De variabelen 'id', 'recipient' en 'tags' stellen je in staat om de 
foutmelding te koppelen aan de oorspronkelijke mail.

## Meer informatie

* [Webhooks](./webhooks)
