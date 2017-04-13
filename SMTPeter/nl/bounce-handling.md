# Bounce protocol

Als je een e-mail verstuurt ontvang je allerlei *bounce* berichten. 
Tussen deze berichten vind je de status van ontvangst voor adressen 
die niet meer bestaan, afwezigheidsberichten, bevestigingsberichten en 
andere automatisch gegenereerde berichten.

SMTPeter kan geconfigureerd worden om hier op een goede manier mee om te 
gaan. Er zijn hier verschillende opties voor.

## Het envelope adres

Wanneer je e-mail toevoegd via de [SMTP API](smtp-api) of de 
[REST API](rest-send) kun je een *envelope adres* toevoegen. Dit is het 
adres waarop de bounces worden afgeleverd. Deze hoeft niet hetzelfde te 
zijn als het "from" adres. Het "from" adres wordt gebruikt wanneer iemand 
op "reply" drukt in de *mail client*, het envelope adres wordt gebruikt 
voor geautomatiseerde antwoorden.

Als je helemaal niet geinteresseerd bent in deze berichten kun je ze 
voorkomen door geen envelope adres in te stellen. Je kunt dan helemaal 
geen e-mail van bounces ontvangen. Als je e-mail ontvangt op je verzender 
adres dan is dit gestuurd door iemand persoonlijk. 

Om geen envelope adres mee te geven met de REST API hoef je alleen de 
"envelope" parameter weg te laten in de POST data. Met de SMTP API kun 
je ook e-mail injecteren zonder envelope adress met het volgende voorbeeld:

````
MAIL FROM:<>
250 2.1.0 Sender OK
RCPT TO:<info@smtpeter.com>
250 2.1.5 Recipient OK
DATA
354 End data with <CR><LF>.<CR><LF>
(your full mime body here)
````

Zoals je hierboven kunt zien is "MAIL FROM" ook geldig zonder envelope 
adres.

## Bounce tracking

Als je wel een envelope adres toegevoegd hebt kun je SMTPeter 
instructies geven over het afhandelen van bounce informatie.

In de REST API kun je de "trackbounces" variabele toevoegen aan je 
POST data. Deze staat standaard op waar, maar kun je ook op waar zetten. 
Wanneer je dit doet geef je aan dat SMTPeter de bounces moet onderscheppen, 
verwerken en door moet sturen naar je envelope adres. Het voordeel 
hiervan is dat je SMTPeter verkeerde adressen kan laten rapporteren en 
opslaan.

Om bounces op te vangen past SMTPeter het envelop adres van je berichten. 
Het originele envelope adres wordt veranderd in een speciala bounce adres. 
Hierdoor worden bounces eerst naar SMTPeter gestuurd voor ze bij je eigen 
adres terecht komen.

Je kunt deze variabele ook onwaar maken, maar dit wordt niet aangeraden. 
Als SMTPeter de mails onderschept worden ze afgeleverd op een speciaal 
gevalideerd bounce envelope adres, waardoor ze voor alle SPF tests slagen. 
Als je dit niet wil ben je er zelf voor verantwoordelijk dat je een valide 
envelope adres met een valide SPF optekening in DNS gebruikt.

Deze variabele kan niet aangepast worden in de [SMTP API](smtp-api).
De enige toegang tot de variabele is via het dashboard, waar de variabele 
na aanpassing automatisch wordt toegepast op alle e-mails met deze 
verzender.

## Aankomst Status Notificaties

Een speciaal type bounce bericht is aankomst status notificatie van 
DSN's. Veel bounce berichten zijn moeilijk te herkennen voor computers, 
maar DSN's zijn gestandardizeerd en kunnen daarom verwerkt worden door 
e-mail servers. SMTPeter herkent dit type bounces en slaat de errors op. 
Je kunt er daarom ook voor kiezen om deze niet daarnaast nog door te 
laten sturen.

Het SMTP protocol heeft een DSN extensie die dit toelaat. Wanneer je 
e-mail bevestigt met dit protocol kun je specificeren welke e-mails je 
wilt ontvangen. Je kunt dan zelf besluiten of je deze notificaties wil 
ontvangen, alleen errors of alle notificaties, etc.

Daarom kun je bij het bevestigen van een mail extra parameters toevoegen 
om aan te geven welke notificaties je wilt ontvangen.

## DSN parameters doorgeven

SMTPeter ondersteunt de DSN extensie waardoor je extra parameters mee kunt 
geven welke bounces je wilt ontvangen. De volgende dingen kunnen ingesteld 
worden met deze parameters:

- Welke notificaties verstuurt moeten worden
- Formaat van de notificatie (volledig bericht/alleen headers)
- Optioneel een envelope identifier voor het DSN bericht
- Het originele ontvanger adres.

Deze parameters kunnen zowel met de SMTP API als met de REST API worden 
doorgegeven. De REST API gebruikt een nested JSON object.

```json
{
    "envelope": "bounce@yourdomain.com",
    "recipient": "info@example.com",
    "mime": "...",
    "dsn": {
        "notify": "FAILURE",
        "ret": "HDRS",
        "envid": "unique-identifier",
        "orcpt": "info@example.com"
    }
}
```

In de SMTP API kun je ze doorgeven aan de "MAIL FROM" en "RCPT TO" 
instructies.

```json
MAIL FROM:<alice@example.org> RET=HDRS ENVID=yourid
250 sender ok
RCPT TO:<bob@example.com> NOTIFY=SUCCESS ORCPT=rfc822;bob@example.com
250 recipient ok
```

De "notify" parameter heeft de volgende waarden:

* NEVER: Nooit een notificatie sturen;
* FAILURE: Alleen een notificatie sturen voor niet aangekomen mails;
* SUCCESS: Alleen een notificatie sturen voor wel aangekomen mails;
* DELAY: Alleen een notificatie sturen voor vertraagde berichten.

De "ret" parameter kan "FULL" zijn om het hele bericht door te sturen 
of "HDRS" voor alleen headers.

De "envid" en "orcpt" instellingen zijn velden die toegevoegd worden in 
de bounce messages en kunnen gebruikt worden om de verstuurde DSN te koppelen 
aan de originele mail.
he "envid" and "orcpt" settings are fields 

## Voorbeelden 

Stel je voor dat je afwezigheidsberichten wilt ontvangen en andere bounces, 
maar geen DSN berichten omdat je weet dat deze al in SMTPeter error 
logs worden opgeslagen. Je kunt dan de volgende JSON REST data gebruiken in 
je e-mail.

```json
{
    "envelope": "bounce@yourdomain.com",
    "recipient": "info@example.com",
    "mime": "...",
    "trackbounces": true,
    "dsn": {
        "notify": "NEVER"
    }
}
```

In het voorbeeld geef je wel een envelope adres mee om bounces te ontvangen. 
De "trackbounces" variabele staat op waar zodat SMTPeter de DSN's kan loggen.
De "notify" parameter binnen de DSN extensie staat op "NEVER" waardoor je 
nooit DSN's ontvangt in je inbox.

Als je zelf geen bounces wilt maar wel dat de errors worden opgeslagen 
kun je het envelope adres weglaten en "trackbounces" op true zetten.

```json
{
    "recipient": "info@example.com",
    "mime": "...",
    "trackbounces": true
}
```

Als je afwezigheidsberichten, niet herkende errors en error berichten 
wilt ontvangen kun je de volgende JSON data gebruiken.

```json
{
    "envelope": "bounce@yourdomain.com",
    "recipient": "info@example.com",
    "mime": "...",
    "trackbounces": true,
    "dsn": {
        "notify": "FAILURE"
    }
}
```

Met de bovenstaande data stuurt SMTPeter alle e-mails door naar je 
envelope adres.
