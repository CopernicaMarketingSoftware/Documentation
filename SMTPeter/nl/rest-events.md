# Vraag gebeurtenissen op met een bepaalde eigenschap

Alle data die door SMTPeter gaat wordt gelogd: afleveringen, bounces, clicks,
opens. Deze log files zijn op  te vragen via de [REST API](rest-logfiles).
Wanneer u echter alleen geïnteresseerd bent in gebeurtenissen die voldoen
aan een bepaalde eigenschap kunt u de onderstaande URLs gebruiken. Dan zoeken
wij voor u de juiste informatie.

```text
https://www.smtpeter.com/v1/events/messageid/MESSAGEID
https://www.smtpeter.com/v1/events/email/EMAILADRES
https://www.smtpeter.com/v1/tags/TAG1/OPTIONEELTAG2/OPTIONEELTAG3
```
Na het verzoek ontvangt u de volgende JSON:

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
Het `type` in de JSON geeft het type record. De types die beschikbaar zijn
staan in de onderstaande tabel. De data die beschikbaar is wordt 
beschreven op de betreffende pagina van het type.

| Type                                        | Description                                      |
| ------------------------------------------- | ------------------------------------------------ |
| [attempt](log-attempts "attempts log file") | Algemene informatie over het bericht             |
| [bounce](log-bounces "bounces log file")    | informatie over een bounce                       |
| [click](log-clicks "clicks log file")       | informatie over een gegenereerde klik            |
| [delivery](log-deliveries)                  | informatie over de aflevering                    |
| [failure](log-failures)                     | informatie over een mislukte aflevering          |
| [open](log-opens "opens log file")          | informatie over wanneer een bericht is geopend   |
| [response](log-responses)                   | informatie over door SMTPeter ontvangen reacties |

## Gebeurtenissen op basis van een messageid

De volgende URL kan gebruikt worden om alle gebeurtenissen die betrekking
hebben op een bepaalde messageid op te vragen.

```text
https://www.smtpeter.com/v1/events/messageid/MESSAGEID
```
Waar `MESSAGEID` het betreffende messageid is.


## Gebeurtenissen op basis van een email adres

De volgende URL kan gebruikt worden om alle informatie met betrekking tot
een bepaald e-mail adres op te vragen.

```text
https://www.smtpeter.com/v1/events/email/EMAILADRES
```
waar `EMAILADRES` het betreffende e-mail adres is


## Gebeurtenissen op basis van tags

De volgende URL kan gebruikt worden om alle informatie met een tag op te
vragen.

```text
https://www.smtpeter.com/v1/tags/TAG
```
waar`TAG` de betreffende tag is. Het is ook mogelijk om op meerdere tags
tegelijkertijd te filteren. Dit kan met de volgende URL:

```text
https://www.smtpeter.com/v1/tags/TAG1;TAG2;TAG3;...
```
De geretourneerde JSON bevat alleen de informatie van berichten die alle
opgegeven tags bevatten.
