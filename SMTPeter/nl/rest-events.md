# Opvragen van 'events'

Het loggen van data gebeurt bij SMTPeter volledig automatisch. Zo houdt SMTPeter 
onder meer de volgende 'events' bij: afleveringen, 'bounces', kliks en opens. 
Deze log files zijn op te vragen via de [REST API](rest-logfiles).
Het kan natuurlijk ook voorkomen dat je opzoek bent naar een specifiek 'event'.
De flexibele API geeft je de mogelijkheid om het 'event' naar keuze op te vragen.
Je doet dit middels een van de volgende URls:

```text
https://www.smtpeter.com/v1/events/messageid/MESSAGEID
https://www.smtpeter.com/v1/events/email/EMAILADRES
https://www.smtpeter.com/v1/events/template/TEMPLATEID
https://www.smtpeter.com/v1/tags/TAG1/OPTIONEELTAG2/OPTIONEELTAG3
```

## Beschikbare parameters

Bij het opvragen van events kunnen extra opties worden meegegeven. Dit meegeven
gebeurt door extra GET parameters aan de URL mee te geven. Dit meegeven kan
door achter de access token een `&` te zetten, de naam van de optie op te
geven, gevolgd door een `=` en de waarde van de optie.
De volgende parameters kunnen aan de URL als variabelen worden toegevoegd:

- **start**: de start datum (jjjj-mm-dd) vanaf wanneer de events gedownload worden,
- **end**:   de (exclusieve) eind datum (jjjj-mm-dd) tot wanneer de events gedownload worden,
- **tags**:  optionele tags waarop gefilterd wordt.


### Start en end

Als er geen start en end parameters opgegeven worden, krijg je events voor
de standaard periode van de gebeurtenissen. Als een start parameter opgegeven
wordt, krijg je de events vanaf de startdatum tot een maand na de start
datum. Als je een einddatum opgeeft, krijg je de events van een maand voor
de einddatum tot aan (exclusief) de einddatum. Als de start- en einddatum
verder dan een maand uit elkaar liggen, krijg je de gebeurtenissen van
de start tot een maand na start. De einddatum wordt dus genegeerd. Houd er
rekening mee dat de data als een UTC datum geïnterpreteerd wordt. Deze datum
begint 1 of 2 uur later (afhankelijk van zomer- en wintertijd) dan de
Nederlandse tijd. Houd er ook rekening mee dat de beperking van de periode
tot een maand gewijzigd kan worden als als de performance dit vereist.

### Tags

Als er een tag parameter opgegeven wordt, worden de events ook gefilterd
op de tag. Als je op meerdere tags tegelijkertijd wilt filteren, dan kun
je meerdere tags gescheiden door puntkomma's opgeven.

## Geretourneerde informatie

Na het verzoek ontvang je de volgende JSON:

```json
[
    {
        "type" : "open|click|failure|...",
        "data" : {
            "veldnaam1" : "data1",
            "veldnaam2" : "data2",
            ...
        }
    },
    {
        "type" : "open|click|failure|...",
        "data" : {
            "veldnaam1" : "data1",
            "veldnaam2" : "data2",
            ...
        }
    },
    ...
]
```
Het `type` in de JSON geeft het type record. De beschikbare types
staan in de onderstaande tabel. De beschikbare data wordt 
beschreven op de betreffende pagina van het type.

| Type                                        | Beschrijving                                      |
| ------------------------------------------- | ------------------------------------------------ |
| [attempt](log-attempts "attempts log file") | Algemene informatie over het bericht             |
| [bounce](log-bounces "bounces log file")    | informatie over een bounce                       |
| [click](log-clicks "clicks log file")       | informatie over een gegenereerde klik            |
| [delivery](log-deliveries)                  | informatie over de aflevering                    |
| [failure](log-failures)                     | informatie over een mislukte aflevering          |
| [open](log-opens "opens log file")          | informatie over wanneer een bericht is geopend   |
| [response](log-responses)                   | informatie over door SMTPeter ontvangen reacties |




## 'Events' op basis van een 'MESSAGE ID'

De volgende URL kan gebruikt worden om 'events', die betrekking 
hebben op een bepaalde 'message ID', op te vragen.

```text
https://www.smtpeter.com/v1/events/messageid/MESSAGEID
```
Hierbij is de `MESSAGE ID` het betreffende 'message ID'. Je krijgt vervolgens de
'events' tot een maand na het tijdstip van verzenden van het bericht.
Je kunt latere 'events' downloaden door een `start` en/of `end` parameter
op te geven.


## 'Events' op basis van een e-mailadres

De volgende URL kan gebruikt worden om informatie met betrekking tot
een bepaald e-mailadres op te vragen.

```text
https://www.smtpeter.com/v1/events/email/EMAILADRES
```
Hierbij is `EMAILADRES` het betreffende e-mailadres. Je krijgt de 'events'
tot een maand geleden. De 'events' voor andere periodes kunnen worden gedownload
door de optionele parameters `start` en/of `end` op te geven. Tevens kun
je filteren op tags door de `tags` parameter op te geven.


## 'Events' op basis van een 'template'

De volgende URL kan gebruikt worden om alle informatie met betrekking tot
een bepaalde template adres op te vragen.

```text
https://www.smtpeter.com/v1/events/template/TEMPLATEID
```
Hierbij is `TEMPLATEID` de ID van de betreffende template. Je krijgt vervolgens
alle 'events' tot een maand geleden. De 'events' voor andere periodes
kunnen worden gedownload door de optionele parameters `start` en/of `end`
op te geven. Tevens kun je filteren op tags door de `tags` parameter op
te geven.


## 'Events' op basis van tags

De volgende URL kan gebruikt worden om informatie met een tag op te
vragen.

```text
https://www.smtpeter.com/v1/tags/TAG
```
Hierbij is `TAG` de betreffende tag. Je krijgt vervolgens alle 'events'
tot een maand geleden. De 'events' voor andere periodes
kunnen worden gedownload door de optionele parameters `start` en/of `end`
op te geven.


```text
https://www.smtpeter.com/v1/tags/TAG1;TAG2;TAG3;...
```
De geretourneerde JSON bevat alleen de informatie van berichten die alle
opgegeven tags bevatten. Ook hier kan eventueel gekozen worden voor een
andere periode door een `start` en/of `end` parameter op te geven.
