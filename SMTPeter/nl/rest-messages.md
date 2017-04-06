# Gearchiveerde berichten

Alle berichten die je door middel van SMTPeter verstuurt worden automatisch 
[gearchiveerd](). De REST API kan bijna elke 'property' achterhalen van emails
die door SMTPeter zijn gegaan tijdens het versturen. Je kunt bijvoorbeeld met 
de 'text' en 'html' methodes de structuur opvragen van verzonden emails.

De hieropvolgende lijst laat de verschillende methodes zien die kunnen worden
gebruikt om 'properties' te achterhalen van verstuurde emails. Voor het gebruik
van deze methodes heb je wel een unieke 'message ID' nodig. 

```
https://www.smtpeter.com/v1/recipient/MESSAGEID
https://www.smtpeter.com/v1/envelope/MESSAGEID
https://www.smtpeter.com/v1/text/MESSAGEID
https://www.smtpeter.com/v1/html/MESSAGEID
https://www.smtpeter.com/v1/header/MESSAGEID
https://www.smtpeter.com/v1/attachments/MESSAGEID
https://www.smtpeter.com/v1/attachments/MESSAGEID/NAME
https://www.smtpeter.com/v1/attachments/MESSAGEID/NUMBER
https://www.smtpeter.com/v1/embeds/MESSAGEID
https://www.smtpeter.com/v1/embeds/MESSAGEID/NAME
https://www.smtpeter.com/v1/embeds/MESSAGEID/NUMBER
```

## 'Envelope' en ontvanger adres

Het originele 'envelope' en ontvanger adres, dat je door middel van de
API hebt gebruikt voor het versturen van emails, kan worden achterhaald 
met de 'recipient' en 'envelope' methode. Beide methoden geven een email
adres terug in normaal text formaat.

```
https://www.smtpeter.com/v1/envelope/MESSAGEID
https://www.smtpeter.com/v1/recipient/MESSAGEID
```

Het is handig om te vermelden dat SMTPeter, normaal gesproken, zelf
het 'envelope' adres verandert. Dit doet SMTPeter om de events rondom
het versturen van de emails te kunnen detecteren. Denk hierbij aan het
traceren van 'bounces' en 'errors'. Vaak is het 'envelope' adres dat je
terugkrijgt niet hetzelfde als het adres dat je initieel had opgegeven.
Je kunt natuurlijk ook helemaal geen 'envelope' opgeven. In dat geval
krijg je een lege string terug.


## Inhoud van berichten

Je kunt de 'text' of 'html' versie van een verstuurde email gemakkelijk
achterhalen door de 'text' of 'html' methode. De gehele oorspronkelijke 
'headers' kunnen worden uitgelezen met de 'headers' method. Dit kun je 
op de volgende manier doen:

```
https://www.smtpeter.com/v1/text/MESSAGEID
https://www.smtpeter.com/v1/html/MESSAGEID
https://www.smtpeter.com/v1/header/MESSAGEID
```

De 'MESSAGEID' is uiteraard de ID van het bericht en de teruggestuurde 
tekstt is in regulier 'text' formaat.

<!--
## Attachments

To get the attachments of a message you can use the following methods:

```text
(1) https://www.smtpeter.com/v1/attachments/MESSAGEID
(2) https://www.smtpeter.com/v1/attachments/MESSAGEID/NAME
(3) https://www.smtpeter.com/v1/attachments/MESSAGEID/NUMBER
```

MESSAGEID is the message id for which you want to retrieve the attachments,
NAME the name of the attachment and NUMBER the rank of the attachment (starting
from zero). 

With method (1) you can retrieve the names and ranks of the attachments belonging
to a message, with method (2) and (3) you can download the attachment by providing
the name or rank respectively.


## Embedded content

Emails can be sent with embedded images. Such images are embedded into the
full MIME message sort of similar to how attachments are linked to
an email. The REST API has a number of methods to list all embedded content
that was associated with an email, and to extra one embedded item based on
its name or ID.

```text
(1) https://www.smtpeter.com/v1/embeds/MESSAGEID
(2) https://www.smtpeter.com/v1/embeds/MESSAGEID/NAME
(3) https://www.smtpeter.com/v1/embeds/MESSAGEID/NUMBER
```

MESSAGEID stands for the message id for which you want to retrieve the embedded
content, NAME the name of the embedded content, and NUMBER the rank of the
embedded content (starting from zero). 

With method (1) you can retrieve the names and ranks of the embedded content
of the message, with method (2) and (3) you can download the content by providing
the name or rank respectively.
-->