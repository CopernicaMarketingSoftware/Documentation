# Inline CSS

Sommige email programma's (vooral op het web) kunnen je mail er anders 
uit laten zien dan de bedoeling was. De CSS style sheet in de HTML header 
van je zorgvuldig samengestelde bericht kan hierdoor vervangen of verwijderd 
worden waardoor de layout in je mails verpest wordt.

![Inlinize CSS](Images/inlinecss.png "Inlinize CSS")

Veel email programmeurs voorkomen dit door inline style attributen te 
gebruiken in hun HTML code in plaats van een style block bovenaan het bericht.
SMTPeter kan dit automatisch doen om je layout te preserveren.
 
Kijk bijvoorbeeld naar de volgende HTML code met een style block bovenaan.

```html
<head>
    <style>
     td {
        font-family: helvetica, sans-serif;   
     }
    </style>
</head>
```

Door dit te versturen met SMTPeter en de "inline-css" kenmerk 
ingeschakeld kun je het bovenstaande bericht omzetten. De relevante 
CSS van het style block wordt zo gekopieerd naar de elementen.

```html
<td style="font-family: helvetica; sans-serif;"></td>
```

Er zijn meerdere manieren om dit kenmerk in te schakelen, afhankelijk van 
welke API je gebruikt.

## Inline CSS inschakelen met de SMTP API

Er zijn twee manieren om inline CSS in te schakelen in SMTPeter. De eerste 
is om een [nieuwe login](dashboard/smtp-credentials) aan te maken met dit 
kenmerk ingeschakeld.

Omdat het STMP protocol ervoor zorgt dat parameters niet makkelijk 
doorgegeven kunnen worden mogen er veel SMTP logins aangemaakt worden 
zodat je verschillende instellingen in kan schakelen.

Daarnaast kun je in de MIME header van de email messages de CSS inlinizer 
toevoegen met een MIME header variable. Als de header line in deze mail 
gebruikt wordt zal de CSS ook worden omgezet.

```
x-smtpeter-inlinecss:   true
```

Deze MIME header zal uit de mail verwijderd worden wanneer deze uiteindelijk 
wordt verstuurd naar de ontvanger.

## Inline CSS inschakelen met de REST API

De REST API heeft de `inlinecss` parameter die je toe kunt voegen aan de 
POST variabelen van je JSON input. 

```txt
POST /send HTTP/1.1
Content-Type: application/json
Content-Length: 302

{
    "envelope": "example@example.org",
    "recipient": "john@doe.com",
    "subject": "example subject",
    "to": "john@doe.com",
    "from": "example@example.org",
    "html": "<html><head><style>body { font-weight: 10pt; }</style></head><body>Hello there!</body></html>",
    "inlinecss": true
}
```

Bovenstaand bericht gebruikt JSON om de hele mail te formatteren. Je kunt 
natuurlijk ook standaard POST data toevoegen via de REST API.
