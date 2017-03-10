# Feedback loops voor bounces

Normaal gesproken past de Marketing Suite het envelope-adres van mails aan,
zodat alle *bounces* en andere berichten naar de Marketing Suite teruggestuurd worden.
Je kan een feedback loop voor bounces instellen om van deze bounces een notificatie te ontvangen.
Als je alleen maar geïnteresseerd bent in verzendfouten,
kan je ook de [feedback loops voor fouten](feedback-failures) gebruiken.

## Soorten berichten

De feedback loop voor bounces wordt gebruikt voor _alle_ berichten die naar het envelope-adres teruggestuurd worden.
Niet alleen de normale verzendstatusnotificaties, maar ook foutmeldingen
van servers die het officiele format voor bounce-berichten niet respecteren.
Al dit soort berichten worden naar de Marketing Suite verstuurd,
en als je een feedback loop instelt ook naar jou.

## Variabelen

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
        <td>mailfrom</td>
        <td>"MAIL FROM" adres dat gebruikt werd bij het versturen van het bounce-bericht</td>
    </tr>
    <tr>
        <td>rcptto</td>
        <td>"RCPT TO" adres dat gebruikt werd bij het versturen van het bounce-bericht</td>
    </tr>
    <tr>
        <td>mime</td>
        <td>de MIME data die verstuurd werd (dit is het daadwerkelijke bounce-bericht)</td>
    </tr>
    <tr>
        <td>tags</td>
        <td>de tags die je aan de mail koppelde</td>
    </tr>
</table>

De variabelen "id", "recipient" en "tags" stellen je in staat om de
binnenkomende bounce te koppelen aan de oorspronkelijke mail.
De variabelen "mailfrom", "rcptto" en "data" bevatten het bericht dat bij de Marketing Suite binnenkwam.
