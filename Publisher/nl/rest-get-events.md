# REST API: GET events

Copernica houdt alle processen rondom je mailing in de gaten. De events die worden gelogd zijn:
afleveringen, bounces, clicks, opens, etc. Deze events komen terecht in de log files. Vervolgens
kun je deze log files opvragen via de REST API. Het kan natuurlijk ook voorkomen dat je opzoek bent 
naar specifieke events. De flexibele API geeft je de mogelijkheid om deze events 
op te vragen. Je doet dit middels een van de volgende URLs:

```text
https://api.copernica.com/v1/message/$id/events?access_token=xxxx
https://api.copernica.com/v1/old/message/$id/events?access_token=xxxx
https://api.copernica.com/v1/email/$email/events?access_token=xxxx
https://api.copernica.com/v1/tags/$tag1;$optionaltag2;$optionaltag3;.../events?access_token=xxxx
https://api.copernica.com/v1/profile/$id/events?access_token=xxxx
https://api.copernica.com/v1/subprofile/$id/events?access_token=xxxx
https://api.copernica.com/v1/template/$id/events?access_token=xxxx
https://api.copernica.com/v1/old/template/$id/events?access_token=xxxx
https://api.copernica.com/v1/old/document/$id/events?access_token=xxxx
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

De standaard periode van een event wordt getoond als er geen specifieke start- en einddatum wordt 
gespecificeerd. Deze periode is afhankelijk van het type event.

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

Het is ook mogelijk om een tag mee te geven waarop de events gefilterd moeten
worden. Het kan natuurlijk voorkomen dat je op meerdere tags tegelijkertijd
wilt filteren. In dat geval kun je tags achter elkaar zetten en ze scheiden
door middel van puntkomma's.


## Geretourneerde informatie

Na het verzoek ontvang je de volgende JSON:

```json
[
    {
        "event" : "open|click|failure|...",
        "data" : {
            "fieldname1" : "data1",
            "fieldname2" : "data2"
        }
    },
    {
        "event" : "open|click|failure|...",
        "data" : {
            "fieldname1" : "data1",
            "fieldname2" : "data2"
        }
    }
]
```
De **event** property in de JSON geeft het type event weer. De mogelijke
types staan beschreven op de [event types pagnina](./event-types.md).


## Events bij een bericht

Events bij een met Marketing Suite verstuurd bericht kun je opvragen
door een request te doen naar:

```text
https://api.copernica.com/v1/message/$id/events?access_token=xxxx
```

Je krijgt vervolgens de informatie over dit bericht vanaf
het moment van verzenden tot één maand na verzenden. Als je deze informatie
voor een met Publisher verstuurd bericht wilt hebben kun je een request te
sturen naar:

```text
https://api.copernica.com/v1/old/message/$id/events?access_token=xxxx
```

Je kunt de gegevens over een andere periode opvragen door een **start**
en/of **end** parameter meegeven.


## Events bij een e-mailadres

Events bij een specifiek e-mailadres kun je opvragen door een request
te sturen naar:

```text
https://api.copernica.com/v1/email/$email/events?access_token=xxxx
```
Je krijgt alle events die bij dit e-mailadres horen tot een maand geleden.
Als je de informatie voor een andere periode wilt kun je een **start** en/of
**end** parameter meegeven.

Je kunt de **tag** parameter gebruiken als je wilt filteren op tags.

## Events bij tags

Events bij een tag kun je opvragen door een request te sturen naar:

```text
https://api.copernica.com/v1/tags/$tag1/events?access_token=xxxx
```

Je krijgt alle events die bij deze tag horen tot een maand geleden. 
Je kunt ook op meerdere tags tegelijkertijd filteren door de tags te scheiden
met puntkomma's:

```text
https://www.smtpeter.com/v1/tags/TAG1/TAG2/TAG3/.../events?acces_token=xxx
```

De geretourneerde JSON bevat alleen events voor berichten die alle tags
bevatten.


## Events bij een profiel

Events bij een profiel kun je opvragen door een request te sturen naar:

```text
https://api.copernica.com/v1/profile/$id/events?access_token=xxxx
```
waar **$id** vervangen moet worden door de numerieke identifier van het profiel.
Je krijgt vervolgens de events tot een maand terug voor dit profiel. Als
je de events voor een andere periode wilt dan kun je een **start** en/of
**end** parameter gebruiken.
Optioneel kun je ook filteren op tags door een **tags** parameter mee te geven.


## Events bij een subprofiel

Events bij een subprofiel kun je opvragen door een request te sturen naar:

```text
https://api.copernica.com/v1/subprofile/$id/events?access_token=xxxx
```
waar **$id** vervangen moet worden door de numerieke identifier van het subprofiel.
Je krijgt vervolgens de events tot een maand terug. Als je events voor een
andere periode wilt dan kun jee een **start** en/of **end** parameter gebruiken.
Optioneel kun je ook filteren op tags door een **tags** parameter mee te geven.


## Events bij een template

Events bij een Marketing Suite template kun je opvragen door een request
te sturen naar:

```text
https://api.copernica.com/v1/template/$id/events?access_token=xxxx
```
**$id** is hier de numerieke identifier van de Marketing Suite template
waarvoor je de events wilt hebben. Als je de events voor een Publisher
template wilt hebben kun je een request sturen naar:

```text
https://api.copernica.com/v1/old/template/$id/events?access_token=xxxx
```

Je krijgt vervolgens de events tot een maand terug voor de betreffende
template. Als je de events voor een andere periode wilt hebben kun je
optioneel een **start** en/of **end** parameter meegeven. Optioneel kun je ook
filteren op tags door een **tags** parameter mee te geven.


## Events bij een document

Events bij een document kun je opvragen door een request te sturen naar:

```text
https://api.copernica.com/v1/old/document/$id/events?access_token=xxxx
```

Je krijgt vervolgens de events tot een maand terug van dit document. Als 
je events voor een andere periode wilt hebben dan kun je een **start** 
en/of **end** parameter meegeven. Optioneel kun je ook filter op tags 
door een **tags** parameter mee te geven.


## Meer informatie

* [REST API](./rest-api)
