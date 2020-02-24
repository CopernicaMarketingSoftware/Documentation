# Logfiles in MarketingSuite

Copernica houdt een log bij van alle verzonden e-mails. We houden
informatie bij over *events*: deliveries, bounces, clicks, pogingen
om af te leveren, et cetera. Deze *logfiles* kunnen worden opgehaald
door middel van een [REST API call](./rest-get-logfiles),
maar de Marketing Suite heeft er ook een interface voor. Deze is te vinden
onder het tabblad _'Operations Log'_ in het linker menu.

In de Operations Log kun je de logfiles van verzonden berichten inzien
van een specifieke dag. De bestanden zijn opgedeeld per applicatie
(Marketing Suite of Publisher) en per soort logfile (click, delivery,
etc.). Wanneer je klikt op een categorie, zie je de mailings van die dag
aangegeven met hun *destination ID* en andere informatie.

## Message information
Klik op de destination ID voor gedetailleerde informatie over de e-mail.
In dit scherm, 'Message information', vind je alle details van de mailing.
Zo kun je de content zien, de ontvanger, het onderwerp en de bijlagen.

![message information](../images/message-information.png "Message information interface")

Daarnaast vind je twee tabbladen genaamd 'Events' en 'Template'. 'Events'
bevat informatie over pogingen, afleveringen, clicks, opens, en meer. Je
kunt hier bijvoorbeeld precies zien wanneer de ontvanger jouw bericht
heeft geopend, op wat voor device en op welk besturingssysteem.

Onder 'Template' staan gegevens over het template, zoals de ID en in
hoeveel mailings het template gebruikt is.

## Downloaden van logfiles

Je kunt logfiles downloaden door middel van de knop 'Download' in het
overzicht van logfiles, maar je kunt ze ook ophalen door middel van de
[REST API](./rest-get-logfiles),
of je kunt notificaties krijgen van events door middel van
[WebHooks](./webhooks). De volgende soorten logfiles zijn beschikbaar voor 
Marketing Suite:

| Prefix                                            | Type informatie                                                                     |
| --------------------------------------------------|-------------------------------------------------------------------------------------|
| [cdm-attempts](rest-cdm-attempts-logfile)         | Algemene info over mails verstuurd met Marketing Suite (MS)                         |
| [cdm-abuse](rest-cdm-abuse-logfile)               | Info over mails verstuurd met MS die een 'misbruik' notificatie veroorzaakten       |
| [cdm-click](rest-cdm-click-logfile)               | Info over clicks in mails verstuurd via MS                                          |
| [cdm-delivery](rest-cdm-delivery-logfile)         | Info over aangekomen mails verstuurd via MS                                         |
| [cdm-error](rest-cdm-error-logfile)               | Info over errors in mails verstuurd via MS                                          |
| [cdm-impression](rest-cdm-impression-logfile)     | Info over impressies uit mails verstuurd via MS                                     |
| [cdm-retry](rest-cdm-retry-logfile)               | Info over herzonden mails verstuurd via MS                                          |
| [cdm-unsubscribe](rest-cdm-unsubscribe-logfile)   | Info over uitschrijvingen als gevolg van een mail verstuurd via MS                  |
| [feedback-loop-errors](rest-feedback-loop-errors) | Info over errors in je feedback loops                                               |

## Meer informatie

* [REST API](./rest-get-logfiles)
* [Statistieken](./statistics)
* [WebHooks](./webhooks)
