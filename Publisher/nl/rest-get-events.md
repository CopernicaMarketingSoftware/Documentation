# REST API: GET events

Copernica houdt alle processen rondom je mailing in de gaten. De events die worden gelogd zijn:
afleveringen, bounces, clicks, opens, etc. Deze events komen terecht in de logfiles. Vervolgens
kun je deze log files opvragen via de REST API. Het kan natuurlijk ook voorkomen dat je op zoek bent 
naar specifieke events. De flexibele API geeft je de mogelijkheid om deze events 
op te vragen. In de onderstaande tabel vindt je de ondersteunde calls en links 
naar de volledige documentatie hiervan:

| Call                                                                                              | Beschrijving                        |
|---------------------------------------------------------------------------------------------------|-------------------------------------|
|[api.copernica.com/v2/tags/$tag1;$optionaltag2;$optionaltag3;.../events](./rest-get-tags-events)   | Events voor tags                    |
|[api.copernica.com/v2/email/$email/events](./rest-get-email-events)                                | Events voor een emailadres          |
|[api.copernica.com/v2/profile/$id/events](./rest-get-profile-events)                               | Events voor een profiel             |
|[api.copernica.com/v2/subprofile/$id/events](./rest-get-subprofile-events)                         | Events voor een subprofiel          |
|[api.copernica.com/v2/ms/message/$id/events](./rest-get-ms-message-events)                         | Events voor een MS bericht          |
|[api.copernica.com/v2/ms/template/$id/events](./rest-get-ms-template-events)                       | Events voor een MS template         |
|[api.copernica.com/v2/publisher/message/$id/events](./rest-get-publisher-message-events)           | Events voor een Publisher bericht   |
|[api.copernica.com/v2/publisher/template/$id/events](./rest-get-publisher-template-events)         | Events voor een Publisher template  |
|[api.copernica.com/v2/publisher/document/$id/events](./rest-get-publisher-document-events)         | Events voor een Publisher document  |

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
types staan beschreven op de [event types pagina](./event-types.md).

## Meer informatie

* [Overzicht van alle REST API calls](./rest-api)
