# Rest events

Het loggen van data gebeurt bij SMTPeter volledig automatisch. Zo houdt SMTPeter onder 
meer de volgende events bij: afleveringen, bounces, clicks en opens. Deze log files 
zijn op te vragen via de REST API. Het kan natuurlijk ook voorkomen dat je opzoek bent 
naar een specifiek event. De flexibele API geeft je de mogelijkheid om het event naar 
keuze op te vragen. Je doet dit middels een van de volgende URLs:

```text
https://api.copernica.com/v1/events/destinationid/$id?access_token=xxxx
https://api.copernica.com/v1/events/email/$email?access_token=xxxx
https://api.copernica.com/v1/events/tags/$tag1/$optionaltag2/$optionaltag3/...?access_token=xxxx
https://api.copernica.com/v1/events/profile/$id?access_token=xxxx
https://api.copernica.com/v1/events/subprofile/$id?access_token=xxxx
https://api.copernica.com/v1/events/template/$id?access_token=xxxx
https://api.copernica.com/v1/events/document/$id?access_token=xxxx
```

## Beschikbare parameters

Bij het opvragen van events kunnen extra opties worden meegegeven. Dit meegeven gebeurt 
door extra GET parameters aan de URL mee te geven. Dit meegeven kan door achter de 
access token een  & te zetten, de naam van de optie op te geven, gevolgd door een  
`=`  en de waarde van de optie. De volgende parameters kunnen aan de URLs als 
variabelen worden toegevoegd:

- **start**: de startdatum (jjjj-mm-dd) vanaf wanneer de events gedownload worden;
- **end**:   de (exclusieve) eind datum (jjjj-mm-dd) tot wanneer de events gedownload moeten worden;
- **tags**:  optionele tags waarop gefilterd kan worden.


## Start en end parameters

De *default* instelling voor het tonen van calls is afhankelijk van het type event. 
Er wordt uitgegaan van een maand als er geen specifieke start en eind datum worden gespecificeerd.

Bij het opgeven van een startdatum (zonder einddatum), wordt vanaf de startdatum een maand 
weergegeven.

Bij het opgeven van een einddatum (zonder startdatum), wordt tot de einddatum de voorgaande 
maand weergegeven.

Bij het opgeven van een start- en einddatum (die verder dan een maand uit elkaar liggen), 
wordt vanaf de startdatum een maand weergegeven. De einddatum wordt dus genegeerd.

Houd er rekening mee dat de opgegeven data als UTC datum wordt geïnterpreteerd. 
Deze datum begint 1 of 2 uur later (afhankelijk van zomer- en wintertijd) dan de Nederlandse tijd. 
Houd er ook rekening mee dat de beperking van de periode tot een maand gewijzigd kan worden als 
de performance dit vereist.


## Tags

Het is ook mogelijk om een tag mee te geven. Vanaf dat moment kunnen de events 
ook worden gefilterd op de tags. Het kan natuurlijk voorkomen dat je op meerdere 
tags tegelijkertijd wil filteren. In dat geval kun je tags achter elkaar zetten 
en ze scheiden door middel van puntkomma's.


## Geretourneerde informatie

Na het verzoek ontvang je de volgende JSON:

```json
[
    {
        "type" : "open|click|failure|...",
        "data" : {
            "fieldname1" : "data1",
            "fieldname2" : "data2",
            ...
        }
    },
    {
        "type" : "open|click|failure|...",
        "data" : {
            "fieldname1" : "data1",
            "fieldname2" : "data2",
            ...
        }
    },
    ...
]
```

Het `type` in de JSON geeft het type record. De beschikbare types staan in de 
onderstaande tabel. De beschikbare data wordt beschreven op de betreffende 
pagina van het type.

| Marketing Suite Event Type            | Description                                                                                   |
| ------------------------------------- | --------------------------------------------------------------------------------------------- |
| [attempt](./cdm-attempts-logfile.md)  | Generieke informatie over e-mails, verstuurd met de Marketing Suite                           |
| [abuse](./cdm-abuse-logfile.md)       | Informatie over e-mails verstuurd met Marketing Suite die een notificatie hebben getriggerd   | 
| [click](./cdm-click-logfile.md)       | Informatie over clicks, gegenereerd uit e-mails, verstuurd met Marketing Suite                |
| [delivery](./cdm-delivery-logfile.md) | Informatie over afgeleverde e-mails, verstuurd met Marketing Suite                            |
| [error](./cdm-error-logfile.md)       | Informatie over e-mails, verstuurd met Marketing Suite die een error hebben getriggerd        |
| [open](./cdm-impression-logfile.md)   | Informatie over het aantal opens van een e-mail, verstuurd met Marketing Suite                |
| [retry](./cdm-retry-logfile.md)       | Informatie over e-mails, verstuurd met Marketing Suite waar nog een poging is geprobeerd      |
| [unsubscribe](./cdm-unsubscribe.md)   | Informatie over e-mails, verstuurd met Marketing Suite die tot een unsubscribe hebben geleid  |


| Publisher Event Type                         | Beschrijving                                                                                   |
| -------------------------------------------- | ------------------------------------------------------------------------------------------     |
| [attempt](./pom-attempts-logfile.md)         | Generieke informatie over e-mails, verstuurd met de Publisher                                  |
| [abuse](./pom-abuses-logfile.md)             | Informatie over e-mails, verstuurd met de Publisher die een notificatie hebben getriggerd      |
| [click](./pom-clicks-logfile.md)             | Informatie over clicks, gegenereerd uit e-mails, verstuurd met de Publisher                    |
| [delivery](./pom-deliveries-logfile.md)      | Informatie over  afgeleverde e-mails, verstuurd met de Publisher                               |
| [error](./pom-errors-logfile.md)             | Informatie over e-mails, verstuurd met de Publisher die een error hebben getriggerd            |
| [open](./pom-impressions-logfile.md)         | Informatie over het aantal impressies van een e-mail, verstuurd met Marketing Suite            |
| [retry](./pom-retries-logfile.md)            | Informatie over e-mails, verstuurd met de Publisher waar nog een poging is geprobeerd          |
| [unsubscribe](./pom-unsubscribes-logfile.md) | Informatie over e-mails, verstuurd met Marketing Suite die tot een unsubscribe hebben geleid   |


## Events gebasseerd op de destinationid

Alle informatie over een specifiek bericht kun je opvragen door een request te doen
naar:

```text
https://api.copernica.com/v1/events/destinationid/$id?access_token=xxxx
```
waar `$id` de destinationid is van de *interest*.

## Events gebasseerd op het e-mailadres

Alle informatie over een specifiek e-mailadres kun je opvragen door een request
te doen naar:

```text
https://api.copernica.com/v1/events/email/$email?access_token=xxxx
```
waar `$email` het e-mailadres is waar je geintresseerd in bent.

## Events gebasseerd op tags

Alle informatie over een tag kun je opvragen door een request te doen naar:

```text
https://api.copernica.com/v1/events/tags/$tag1?access_token=xxxx
```
waar `TAG` de tag is waarin je bent geintresseerd.
Optioneel kun je ook filteren op meerdere tags. Dit kun je doen door de call als volgt uit te breiden:

```text
https://www.smtpeter.com/v1/events/tags/TAG1/TAG2/TAG3/...
```

De geretourneerde JSON bevat alleen informatie voor berichten die alle tags hebben opgegeven.

## Meer information

* [REST API](./rest-api)
