# Webhooks: fouten

Als je notificaties wil ontvangen over verzendfouten,
kan je een webhook voor fouten instellen.
Je ontvangt dan een notificatie van zowel synchrone fouten (fouten tijdens de SMTP handshake)
als asynchrone fouten (fouten die in eerste instantie geaccepteerd werden,
maar waarvoor vervolgens een foutmelding ontvangen werd).

# Synchroon vs asynchroon

Het SMTP protocol stelt servers in staat om een bericht te accepteren of af te wijzen.
Als een bericht afgewezen wordt stuurt Copernica een POST bericht
naar de URL die je voor de webhook hebt ingesteld.
Het is ook mogelijk dat een bericht geaccepteerd wordt,
maar dat de ontvangende server later een bounce-email terugstuurt
om te melden dat het verzenden toch niet gelukt is.
Deze asynchrone fouten worden ook door Copernica opgevangen als ze herkend 
worden.

Mailservers gebruiken meestal de officiële Delivery Status Notification 
(DNS) standaard om bounce-berichten terug te sturen.
Bounces in dit standaardformaat worden automatisch door Copernica herkend, 
gelogd en naar de webhook doorgestuurd.
Helaas hebben niet alle mailservers deze standaard overgenomen
en sommige grote mailservers sturen notificaties in een format
dat zij zelf ontworpen hebben.
Alhoewel we ons best doen om alle soorten bounce-berichten te herkennen
en door te sturen naar de webhooks, is dit niet altijd mogelijk
voor asynchrone bounce-berichten die niet aan de standaard voldoen.

Als je alle bounces wilt ontvangen kan je naast een webhook voor 
fouten ook een [webhook voor bounces](webhook-bounces) instellen.

## Variabelen

De Marketing Suite stuurt via HTTP of via HTTPS een POST bericht naar jouw server.
Met elk POST bericht worden de volgende variabelen meegestuurd:

| Variabele    | Description                                                                |
|--------------|----------------------------------------------------------------------------|
| id           | unieke id van de fout                                                      |
| recipient    | e-mailadres van de fout                                                    |
| state        | staat in het smtp protocol van de fout ("bounce" voor asynchrone bounces)  |
| code         | optionele smtp error code                                                  |
| extended     | optionele extended smtp status code                                        |
| description  | optionele omschrijving van de fout                                         |
| time         | tijdstempel van de fout                                                    |
| action       | actie die voorgekomen is                                                   |
| tags         | tags geassocieerd met het bericht                                          |

De variabelen "id", "recipient" en "tags" stellen je in staat om de foutmelding te koppelen aan de oorspronkelijke mail.

## Meer informatie

* [Webhooks](./webhooks)
