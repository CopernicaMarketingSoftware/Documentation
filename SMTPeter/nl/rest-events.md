# Opvragen van events

Het loggen van data gebeurt bij SMTPeter volledig automatisch. Zo houdt SMTPeter 
onder meer de volgende *events* bij: afleveringen, *bounces*, *clicks* en *opens*. 
Deze log files zijn op te vragen via de [REST API](rest-logfiles "Opvragen van log files").
Het kan natuurlijk ook voorkomen dat je opzoek bent naar een specifiek event.
De flexibele API geeft je de mogelijkheid om het event naar keuze op te vragen.
Je doet dit middels een van de volgende URls:

```text
https://www.smtpeter.com/v1/events/messageid/MESSAGEID
https://www.smtpeter.com/v1/events/email/EMAILADRES
https://www.smtpeter.com/v1/events/template/TEMPLATEID
https://www.smtpeter.com/v1/tags/TAG1/OPTIONEELTAG2/OPTIONEELTAG3
```

## Beschikbare parameters

Bij het opvragen van events kunnen extra opties worden meegegeven. Dit meegeven
gebeurt door extra *GET parameters* aan de URL mee te geven. Dit meegeven kan
door achter de access token een `&` te zetten, de naam van de optie op te
geven, gevolgd door een `=` en de waarde van de optie.
De volgende parameters kunnen aan de URLs als variabelen worden toegevoegd:

```text
- **start**: de startdatum (jjjj-mm-dd) vanaf wanneer de events gedownload worden;
- **end**:   de (exclusieve) eind datum (jjjj-mm-dd) tot wanneer de events gedownload moeten worden;
- **tags**:  optionele tags waarop gefilterd kan worden.
```


### Start en end parameters

De *default* instelling voor het tonen van *calls* is afhankelijk van het type event.
Er wordt uitgegaan van een maand als er geen specifieke start en eind datum worden
gespecificeerd. 

Bij het opgeven van een startdatum (zonder einddatum), wordt vanaf de startdatum
een maand weergegeven.

Bij het opgeven van een einddatum (zonder startdatum), wordt tot de einddatum
de voorgaande maand weergegeven. 

Bij het opgeven van een start- en einddatum (die verder dan een maand uit elkaar 
liggen), wordt vanaf de startdatum een maand weergegeven. De einddatum wordt 
dus genegeerd.

Houd er rekening mee dat de opgegeven data als UTC datum wordt geïnterpreteerd. Deze 
datum begint 1 of 2 uur later (afhankelijk van zomer- en wintertijd) dan de Nederlandse 
tijd. Houd er ook rekening mee dat de beperking van de periode tot een maand gewijzigd 
kan worden als de performance dit vereist.


### Tags

Het is ook mogelijk om een *tag* mee te geven. Vanaf dat moment kunnen de events ook 
worden gefilterd op de tags. Het kan natuurlijk voorkomen dat je op meerdere tags 
tegelijkertijd wil filteren. In dat geval kun je tags achter elkaar zetten en ze scheiden
door middel van puntkomma's.

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

| Type                                        | Beschrijving                                     |
| ------------------------------------------- | ------------------------------------------------ |
| [attempt](get-logfiles "attempts log file") | Algemene informatie over het bericht             |
| [bounce](get-logfiles "bounces log file")   | informatie over een bounce                       |
| [click](get-logfiles"clicks log file")      | informatie over een gegenereerde klik            |
| [delivery](get-logfiles "log-deliveries")   | informatie over de aflevering                    |
| [failure](get-logfiles "log-failures")      | informatie over een mislukte aflevering          |
| [open](get-logfiles "opens log file")       | informatie over wanneer een bericht is geopend   |
| [response](get-logfiles "log-responses")    | informatie over door SMTPeter ontvangen reacties |


## Events op basis van een MESSAGE ID

De volgende URL kan gebruikt worden om events, die betrekking 
hebben op een bepaalde message ID, op te vragen.

```text
https://www.smtpeter.com/v1/events/messageid/MESSAGEID
```

Hierbij is de `MESSAGE ID` het betreffende message ID. Je krijgt vervolgens de
events tot een maand na het tijdstip van verzenden van het bericht.
Je kunt latere events downloaden door een `start` en/of `end` parameter
op te geven.


## Events op basis van een e-mailadres

De volgende URL kan gebruikt worden om informatie met betrekking tot
een bepaald e-mailadres op te vragen.

```text
https://www.smtpeter.com/v1/events/email/EMAILADRES
```

Hierbij is `EMAILADRES` het betreffende e-mailadres. Je krijgt de events
tot een maand geleden. De events voor andere periodes kunnen worden gedownload
door de optionele parameters `start` en/of `end` op te geven. Tevens kun
je filteren op tags door de `tags` parameter op te geven.


## Events op basis van een template

De volgende URL kan gebruikt worden om alle informatie met betrekking tot
een bepaalde template adres op te vragen.

```text
https://www.smtpeter.com/v1/events/template/TEMPLATEID
```

Hierbij is `TEMPLATEID` de ID van de betreffende template. Je krijgt vervolgens
alle events tot een maand geleden. De events voor andere periodes
kunnen worden gedownload door de optionele parameters `start` en/of `end`
op te geven. Tevens kun je filteren op tags door de `tags` parameter op
te geven.


## Events op basis van tags

De volgende URL kan gebruikt worden om informatie met een tag op te
vragen.

```text
https://www.smtpeter.com/v1/tags/TAG
```

Hierbij is `TAG` de betreffende tag. Je krijgt vervolgens alle events
tot een maand geleden. De events voor andere periodes kunnen worden 
gedownload door de optionele parameters `start` en/of `end` op te geven.

```text
https://www.smtpeter.com/v1/tags/TAG1;TAG2;TAG3;...
```

De geretourneerde JSON bevat alleen de informatie van berichten die alle
opgegeven tags bevatten. Ook hier kan eventueel gekozen worden voor een
andere periode door een `start` en/of `end` parameter op te geven.
