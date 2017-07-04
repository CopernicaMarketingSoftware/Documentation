# Feedback loops: fouten

Als je notificaties wil ontvangen over verzendfouten,
kan je een feedback loop voor fouten instellen.
Je ontvangt dan een notificatie van zowel synchrone fouten (fouten tijdens de SMTP handshake)
als asynchrone fouten (fouten die in eerste instantie geaccepteerd werden,
maar waarvoor vervolgens een foutmelding ontvangen werd).

# Synchroon vs asynchroon

Het SMTP protocol stelt servers in staat om een bericht te accepteren of af te wijzen.
Als een bericht afgewezen wordt stuurt Copernica een POST bericht
naar de URL die je voor de feedback loop hebt ingesteld.
Het is ook mogelijk dat een bericht geaccepteerd wordt,
maar dat de ontvangende server later een bounce-email terugstuurt
om te melden dat het verzenden toch niet gelukt is.
Deze asynchrone fouten worden ook door Copernica opgevangen als ze herkend 
worden.

Mailservers gebruiken meestal de officiële Delivery Status Notification 
(DNS) standaard om bounce-berichten terug te sturen.
Bounces in dit standaardformat worden automatisch door Copernica herkend, 
gelogd en naar de feedback loop doorgestuurd.
Helaas hebben niet alle mailservers deze standaard overgenomen
en sommige grote mailservers sturen notificaties in een format
dat zij zelf ontworpen hebben.
Alhoewel we ons best doen om alle soorten bounce-berichten te herkennen
en door te sturen naar de feedback loops, is dit niet altijd mogelijk
voor asynchrone bounce-berichten die niet aan de standaard voldoen.

Als je alle bounces wilt ontvangen kan je naast een feedback loop voor 
fouten ook een [feedback loop voor bounces](feedback-bounces) instellen.

## Variabelen

Met elke POST call worden de variabelen in de onderstaande tabel verstuurd. 
De POST data wordt verstuurd met het application/x-www-form-urlencoded content type.

Associatieve arrays zoals "parameters" en "velden" worden verstuurd per sleutel-waarde paar, 
bijvoorbeeld *parameters[sleutel]=waarde*. Arrays zoals "interesses" worden verstuurd per item, 
bijvoorbeeld *interests[]=xyz*.

| Variable     | Description                                                                |
|--------------|----------------------------------------------------------------------------|
| id           | unieke id van de fout                                                      |
| recipient    | emailadres van de fout                                                     |
| state        | staat in het smtp protocol van de fout ("bounce" for asynchronous bounces) |
| code         | optinele smtp error code                                                   |
| extended     | optionele extended smtp status code                                        |
| description  | optionele omschrijving van de fout                                         |
| tags         | tags geassocieerd met het bericht                                          |

De variabelen "id", "recipient" en "tags" stellen je in staat om de foutmelding te koppelen aan de oorspronkelijke mail.

## Meer informatie

* [Feedback loops](./feedback-loops)
