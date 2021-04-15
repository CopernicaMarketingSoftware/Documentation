# Alle beschikbare REST calls

In onderstaande tabel kun je alle beschikbare REST *calls* vinden voor de 
SMTPeter API. De REST API helpt je bij het ophalen, verwijderen en creëren 
van data in jouw SMTPeter omgeving. Op deze manier kun je SMTPeter incorporeren
binnen je eigen website of applicatie en ben je volledig vrij om te bepalen
welke taken je door SMTPeter wilt laten doen. 

De volgende methodes zijn toegankelijk via HTTP GET, POST en DELETE:     

| Method         | Address                                                          | Omschrijving                                                            |
|----------------|------------------------------------------------------------------|-------------------------------------------------------------------------|
| GET            | [www.smtpeter.com/v1/attachments](./rest-messages)               | Lijst van alle bijlages voor specifieke email                           |
| GET            | [www.smtpeter.com/v1/datarequest/$id/status](./rest-datarequest) | Opvragen van de status van een data verzoek                             |
| GET            | [www.smtpeter.com/v1/dkimkey](./rest-dkim)                       | DKIM opvragen met specifiek ID                                          |
| GET            | www.smtpeter.com/v1/dkimkeys                                     | Alle DKIM opvragen voor een *sender domain*                             |
| GET            | [www.smtpeter.com/v1/dmarc](./rest-dmarc)                        | Opvragen van alle datums waar mogelijk een *dmarc rapport* voor is      |
| GET            | [www.smtpeter.com/v1/dns](./rest-dns)                            | Voorgestelde *DNS record* voor een bepaald domein                       |
| GET            | [www.smtpeter.com/v1/domain](./rest-sender-domains)              | Opvragen van specifiek sender domain                                    |
| GET            | [www.smtpeter.com/v1/domains](./rest-sender-domains)             | Opvragen van alle sender domains                                        |
| GET            | [www.smtpeter.com/v1/embeds](./rest-messages)                    | Lijst van alle *embedded* bestanden + content id (cid)                  |
| GET            | [www.smtpeter.com/v1/envelope](./rest-messages)                  | Opvragen van gebruikte envelope adres voor specifiek message id         |
| GET            | [www.smtpeter.com/v1/events](./rest-events)                      | Opvragen van events                                                     |
| GET            | www.smtpeter.com/v1/webhooks                                     | Opvragen van feedback loop instellingen                                 |
| GET            | [www.smtpeter.com/v1/headers](./rest-messages)                   | Opvragen van headers van een verstuurd bericht                          |
| GET            | [www.smtpeter.com/v1/html](./rest-messages)                      | Opvragen van het HTML gedeelte van een verstuurd bericht                |
| GET            | [www.smtpeter.com/v1/text](./rest-messages)                      | Opvragen van het text gedeelte van een verstuurd bericht                |
| GET            | [www.smtpeter.com/v1/logfiles](./rest-logfiles)                  | Opvragen van logfilesinformatie                                         |
| GET            | [www.smtpeter.com/v1/recipient](./rest-messages)                 | Opvragen van de recipient van een verstuurd bericht                     |
| GET            | www.smtpeter.com/v1/spf                                          | Opvragen van SPF informatie                                             |
| GET            | [www.smtpeter.com/v1/template](./rest-templates)                 | Opvragen van een specifieke template                                    |
| GET            | [www.smtpeter.com/v1/templates](./rest-templates)                | Opvragen van alle template identifiers                                  |
| POST           | [www.smtpeter.com/v1/datarequest](./rest-datarequest)            | Aanmaken van een data verzoek                                           |
| POST           | www.smtpeter.com/v1/dkimkey                                      | Voeg een nieuwe DKIM toe aan het 'sender domain'                        |
| POST           | www.smtpeter.com/v1/domain                                       | Maak een nieuw domein aan of wijs een domein toe                        |
| POST           | www.smtpeter.com/v1/webhook                                      | Configureren van een webhook (voorheen feedbackloop)                    |
| POST           | [www.smtpeter.com/v1/resend](./rest-send-advanced)               | Een bericht opnieuw versturen                                           |
| POST           | [www.smtpeter.com/v1/send](./rest-api)                           | Versturen van data naar SMTP                                            |
| POST           | www.smtpeter.com/v1/spf                                          | Het aanmaken van een spf record                                         |
| POST           | [www.smtpeter.com/v1/template](./rest-templates)                 | Het aanmaken van een template                                           |
| DELETE         | www.smtpeter.com/v1/dkimkey                                      | Verwijder een DKIM sleutel                                              |
| DELETE         | www.smtpeter.com/v1/domain                                       | Verwijder een domein                                                    |
| DELETE         | www.smtpeter.com/v1/spf                                          | Verwijder een SPF record                                                |
| DELETE         | www.smtpeter.com/v1/template                                     | Verwijder een template                                                  |

## Meer informatie

* [REST API](./rest-api)
