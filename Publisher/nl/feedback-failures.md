# Feedback loops voor fouten

Als je notificaties wil ontvangen over verzendfouten,
kan je een feedback loop voor fouten instellen.
Je ontvangt dan een notificatie van zowel synchrone fouten (fouten tijdens de SMTP handshake)
als asynchrone fouten (fouten die in eerste instantie geaccepteerd werden,
maar waarvoor vervolgens een foutmelding ontvangen werd).

# Synchroon vs asynchroon

Het SMTP protocol stelt servers in staat om een bericht te accepteren of af te wijzen.
Als een bericht afgewezen wordt, stuurt de Marketing Suite een POST bericht
naar de URL die je voor de feedback loop hebt ingesteld.
Het is ook mogelijk dat een bericht geaccepteerd wordt,
maar dat de ontvangende server later een bounce-email terugstuurt
om te melden dat het verzenden toch niet gelukt is.
Deze asynchrone fouten worden ook door de Marketing Suite opgevangen,
en herkenbare fouten worden doorgestuurd naar de feedback loop.

Mailservers gebruiken meestal de officiële Delivery Status Notification standaard om bounce-berichten terug te sturen.
Bounces in dit standaardformat worden automatisch door de Marketing Suite
herkend, gelogd en naar de feedback loop doorgestuurd.
Helaas hebben niet alle mailservers deze standaard overgenomen
en sommige grote mailservers sturen notificaties in een format
dat zij zelf ontworpen hebben.
Alhoewel we ons best doen om alle soorten bounce-berichten te herkennen
en door te sturen naar de feedback loops, is dit niet altijd mogelijk
voor asynchrone bounce-berichten die niet aan de standaard voldoen.

Als je alle bounces wilt ontvangen, zelfs degene die de Marketing Suite niet herkende,
kan je naast een feedback loop voor fouten ook een [feedback loop voor bounces](feedback-bounces) instellen.

## Variabelen

De Marketing Suite stuurt via HTTP of via HTTPS een POST bericht naar jouw server.
Met elk POST bericht worden de volgende variabelen meegestuurd:

<table>
    <tr>
        <td>id</td>
        <td>het unieke ID van het bericht dat geopend werd</td>
    </tr>
    <tr>
        <td>recipient</td>
        <td>het email address van de ontvanger</td>
    </tr>
    <tr>
        <td>state</td>
        <td>het stadium van het SMTP protocol waarin de fout optrad ("bounce" voor asynchrone fouten)</td>
    </tr>
    <tr>
        <td>code</td>
        <td>optionele SMTP foutcode</td>
    </tr>
    <tr>
        <td>extended</td>
        <td>optionele Extended SMTP statuscode</td>
    </tr>
    <tr>
        <td>description</td>
        <td>optionele beschrijving van de fout</td>
    </tr>
    <tr>
        <td>tags</td>
        <td>de tags die je aan de mail koppelde</td>
    </tr>
</table>

De variabelen "id", "recipient" en "tags" stellen je in staat om de foutmelding te koppelen aan de oorspronkelijke mail.