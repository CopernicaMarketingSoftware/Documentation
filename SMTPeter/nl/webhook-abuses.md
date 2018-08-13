# Webhooks voor abuses

In veel e-mailclients is het mogelijk om een ontvangen e-mail als spam te markeren.
Indien een ontvanger van een e-mail deze als spam markeert en de e-mailclient dit
ondersteunt, ontvangt SMTPeter hier een zogenaamd *abuse report* over. Hierin wordt
beschreven over welke email de klacht gaat. 

Met een webhook kun je meldingen over deze *abuse reports* voor jouw e-mails zelf ontvangen.
Voor elke klacht wordt een HTTP POST call (HTTPS is ook mogelijk) naar jouw server
verstuurd met relevante informatie over de klacht.

## Variabelen

Met elke POST call worden de volgende variabelen meegestuurd:

<table>
    <tr>
        <td>id</td>
        <td>unieke <em>identifier</em> van de e-mail waarop waar de klacht over gaat</td>
    </tr>
    <tr>
        <td>mailfrom</td>
        <td>e-mail adres van de partij waar de klacht vandaan komt</td>
    </tr>
    <tr>
        <td>mime</td>
        <td>de mime van het ontvangen rapport</td>
    </tr>
</table>

## Meer informatie

* [Webhooks](./webhooks)
* [Webhooks instellen](./webhook-setup)
