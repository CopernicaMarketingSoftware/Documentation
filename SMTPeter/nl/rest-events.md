# Opvragen van 'events'

Het loggen van data gebeurt bij SMTPeter volledig automatisch. Zo houdt SMTPeter 
onder meer de volgende 'events' bij: afleveringen, 'bounces', kliks en opens. 
Deze log files zijn op te vragen via de [REST API](rest-logfiles).
Het kan natuurlijk ook voorkomen dat je opzoek bent naar een specifiek 'event'.
De flexibele API geeft je de mogelijkheid om het 'event' naar keuze op te vragen.
Je doet dit middels een van de volgende URls:

```text
https://www.smtpeter.com/v1/events/messageid/MESSAGEID
https://www.smtpeter.com/v1/events/messageid/MESSAGEID/DATUM
https://www.smtpeter.com/v1/events/email/EMAILADRES
https://www.smtpeter.com/v1/events/email/EMAILADRES/DATUM
https://www.smtpeter.com/v1/events/template/TEMPLATEID
https://www.smtpeter.com/v1/events/template/TEMPLATEID/DATUM
https://www.smtpeter.com/v1/tags/TAG1/OPTIONEELTAG2/OPTIONEELTAG3
https://www.smtpeter.com/v1/tags/TAG1/OPTIONEELTAG2/OPTIONEELTAG3/DATUM
```
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
Je kunt latere 'events' downloaden door de URL uit te breiden
met een startdatum:

```text
https://www.smtpeter.com/v1/events/messageid/MESSAGEID/DATUM
```
Hierbij wordt de datum aangegeven door middel van `jjjj-mm-dd`. Je krijgt dan de 'events'
vanaf de start datum tot een maand na de start datum.


## 'Events' op basis van een e-mailadres

De volgende URL kan gebruikt worden om informatie met betrekking tot
een bepaald e-mailadres op te vragen.

```text
https://www.smtpeter.com/v1/events/email/EMAILADRES
```
Hierbij is `EMAILADRES` het betreffende e-mailadres. Je krijgt de 'events'
van de laatste maandelijkse periode. De 'events' van een eerdere
maandelijkse periode kunnen ook worden gedownload. In dat geval 
kun je een startdatum aan de URL toevoegen:

```text
https://www.smtpeter.com/v1/events/email/EMAILADRES/DATUM
```
Hierbij wordt de `DATUM` aangegeven met `jjjj-mm-dd`. Je krijgt vervolgens de
'events' vanaf de start datum tot en met een maand na de startdatum 
teruggestuurd.

## 'Events' op basis van een 'template'

De volgende URL kan gebruikt worden om alle informatie met betrekking tot
een bepaalde template adres op te vragen.

```text
https://www.smtpeter.com/v1/events/template/TEMPLATEID
```
Hierbij is `TEMPLATEID` de ID van de betreffende template. Je krijgt vervolgens
alle 'events' van de laatste maandelijkse periode. De 'events' van een eerdere 
maandelijkse periode kunnen ook worden gedownload. In dat geval kun je een 
startdatum aan de URL toevoegen:

```text
https://www.smtpeter.com/v1/events/template/TEMPLATEID/DATUM
```
Hierbij wordt de `DATUM` aangegeven met `jjjj-mm-dd`. Je krijgt vervolgens de
'events' vanaf de startdatum tot en met een maand na de startdatum.


## 'Events' op basis van tags

De volgende URL kan gebruikt worden om informatie met een tag op te
vragen.

```text
https://www.smtpeter.com/v1/tags/TAG
```
Hierbij is `TAG` de betreffende tag. Je krijgt vervolgens alle 'events'
van de laatste maandelijkse periode. De 'events' van een eerdere
maandelijkse periode kunnen ook worden gedownlaod. In dat geval kun 
je een startdatum aan de URL toevoegen:

```text
https://www.smtpeter.com/v1/tags/TAG/DATUM
```
Hierbij wordt de `DATUM` aangegeven met `jjjj-mm-dd`. Je krijgt vervolgens de
'events' vanaf de startdatum tot en met een maand na de startdatum. 
Het is ook mogelijk om op meerdere tags tegelijkertijd te filteren. Dit
kan met de volgende URL:

```text
https://www.smtpeter.com/v1/tags/TAG1;TAG2;TAG3;...
```
De geretourneerde JSON bevat alleen de informatie van berichten die alle
opgegeven tags bevatten. Ook hier kan eventueel gekozen worden voor een
andere maandelijkse periode, door een datum aan de URL toe te voegen.
