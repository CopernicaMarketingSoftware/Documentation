# Opvragen van berichten

Alle berichten worden automatisch [gearchiveerd](), zodra ze via SMTPeter worden 
verstuurd. De REST API kan bijna elke 'property' achterhalen van e-mails
die door SMTPeter zijn gegaan tijdens het versturen. Je kunt bijvoorbeeld met 
de 'text' en 'html' methodes de structuur opvragen van verzonden e-mails.

De hieropvolgende lijst laat de verschillende methodes zien die kunnen worden
gebruikt om 'properties' te achterhalen van verstuurde e-mails. Voor het gebruik
van deze methodes heb je wel een unieke 'message ID' nodig. 

```text
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
API hebt gebruikt voor het versturen van e-mails, kan worden achterhaald 
met de 'recipient' en 'envelope' methode. Beide methoden geven een e-mail
adres terug in normaal text formaat.

```text
https://www.smtpeter.com/v1/envelope/MESSAGEID
https://www.smtpeter.com/v1/recipient/MESSAGEID
```

Het is handig om te vermelden dat SMTPeter, normaal gesproken, zelf
het 'envelope' adres verandert. Dit doet SMTPeter om de events rondom
het versturen van de e-mails te kunnen detecteren. Denk hierbij aan het
traceren van 'bounces' en 'errors'. Vaak is het 'envelope' adres dat je
terugkrijgt niet hetzelfde als het adres dat je initieel had opgegeven.
Je kunt natuurlijk ook helemaal geen 'envelope' opgeven. In dat geval
krijg je een lege string terug.


## Inhoud van berichten

Je kunt de 'text' of 'html' versie van een verstuurde e-mail gemakkelijk
achterhalen door de 'text' of 'html' methode. De gehele oorspronkelijke 
'headers' kunnen worden uitgelezen met de 'headers' method. Dit kun je 
op de volgende manier doen:

```text
https://www.smtpeter.com/v1/text/MESSAGEID
https://www.smtpeter.com/v1/html/MESSAGEID
https://www.smtpeter.com/v1/header/MESSAGEID
```

De 'MESSAGEID' is uiteraard de ID van het bericht en de teruggestuurde 
tekstt is in regulier 'text' formaat.


## Bijlages

Je kunt de bijlages van een e-mail opvragen via de volgende methode:

```text
(1) https://www.smtpeter.com/v1/attachments/MESSAGEID
(2) https://www.smtpeter.com/v1/attachments/MESSAGEID/NAME
(3) https://www.smtpeter.com/v1/attachments/MESSAGEID/NUMBER
```

Hierbij is MESSAGEID de 'message ID' waar je de bijlages van wilt hebben, 
NAME de naam van de bijlage en NUMBER de rang van je bijlage 
(startend vanaf 0).

Met methode (1) kun je de naam en rang opvragen van bijlages van een 'message ID'.
Met methode (2) en (3) kun je de bijlages downloaden door de naam of rang op
te geven.


## 'Embedded' content

e-mails kunnen worden verstuurd met 'embedded' afbeeldingen. De afbeeldingen worden
'embed' in het MIME bericht. Bijlages worden op min of meer dezelfde wijze aan een
e-mail gelinkt. De REST API heeft een aantal methodes om alle 'embedded' content, 
wat bij een e-mail hoort, te weergeven.

```text
(1) https://www.smtpeter.com/v1/embeds/MESSAGEID
(2) https://www.smtpeter.com/v1/embeds/MESSAGEID/NAME
(3) https://www.smtpeter.com/v1/embeds/MESSAGEID/NUMBER
```

Hierbij is MESSAFEID de 'message ID' waar je de 'embedded' content van wilt hebben,
NAME de naam van de 'embedded' content en NUMBER de rang van de 'embedded' content
(startend vanaf 0).

Met methode (1) kun je de naam en rang opvragen van de 'embedded' content. 
Met methode (2) en (3) kun je de 'embedded' content downloaden door de naam en rang
op te geven. 