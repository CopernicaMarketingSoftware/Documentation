# Alle beschikbare REST calls

In onderstaande tabel kun je alle beschikbare REST 'calls' vinden voor de 
SMTPeter API. De REST API helpt je bij het ophalen, verwijderen en creëren 
van data in jouw SMTPeter omgeving. Op deze manier kun je SMTPeter incorperen
binnen je eigen website of applicatie en ben je volledig vrij om te bepalen
welke taken je door SMTPeter wilt laten doen. 

De volgende methodes zijn toegankelijk via HTTP GET, POST en DELETE:

| Methode        | Adres                                                                                                    | Omschrijving                                                            |
|--------------- |----------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------|
| GET            | [https://www.smtpeter.com/v1/attachments]()                                                              | Lijst van alle bijlages voor specifieke email                           |
| GET            | [https://www.smtpeter.com/v1/dkimkey]()                                                                  | DKIM opvragen met specifiek ID                                          |
| GET            | [https://www.smtpeter.com/v1/dkimkeys]()                                                                 | Alle DKIM opvragen voor een 'sender domain'                             |
| GET            | [https://www.smtpeter.com/v1/dmarc]()                                                                    | Opvragen van alle datums waar mogelijk een dmarc raport voor is         |
| GET            | [https://www.smtpeter.com/v1/dns]()                                                                      | Voorgestelde 'DNS record' voor een bepaald domein                       |
| GET            | [https://www.smtpeter.com/v1/domain]()                                                                   | Opvragen van specifiek 'sender domain'                                  |
| GET            | [https://www.smtpeter.com/v1/domains]()                                                                  | Opvragen van alle 'sender domains'                                      |
| GET            | [https://www.smtpeter.com/v1/embeds]()                                                                   | Lijst van alle 'embedded' bestanden + content id (cid)                  |
| GET            | [https://www.smtpeter.com/v1/envelope]()                                                                 | Opvragen van gebruikte envelope adres voor specifiek message id         |
| GET            | [https://www.smtpeter.com/v1/events]()                                                                   | Opvragen van                                      |
| GET            | [https://www.smtpeter.com/v1/feedbackloops]()                                                            | Veld uit database bijwerken                       |
| GET            | [https://www.smtpeter.com/v1/headers]()                                                                  | Veld uit database verwijderen                     |
| GET            | [https://www.smtpeter.com/v1/html]()                                                                     | Opvragen interesses                               |
| GET            | [https://www.smtpeter.com/v1/logfiles]()                                                                 | Aanmaken interesse                                |
| GET            | [https://www.smtpeter.com/v1/recent-tags]()                                                              | Opvragen collecties                               |
| GET            | [https://www.smtpeter.com/v1/recipient]()                                                                | Aanmaken collectie                                |
| GET            | [https://www.smtpeter.com/v1/spf]()                                                                      | Opvragen profielen                                |
| GET            | [https://www.smtpeter.com/v1/tag]()                                                                      | Aanmaken nieuw profiel                            |
| GET            | [https://www.smtpeter.com/v1/template]()                                                                 | Meerdere profielen tegelijk bewerken              |
| GET            | [https://www.smtpeter.com/v1/templates]()                                                                | Opvragen profiel identifiers                      |
| GET            | [https://www.smtpeter.com/v1/text]()                                                                     | Opvragen selecties                                |
| POST           | [https://www.smtpeter.com/v1/dkimkey]()                                                                  | Voeg een nieuwe DKIM toe aan het 'sender domain'                |
| POST           | [https://www.smtpeter.com/v1/domain]()                                                                   | Maak een nieuw domein aan of wijs een domein toe                |
| POST           | [https://www.smtpeter.com/v1/feedbackloop]()                                                             | d                                                                |
| POST           | [https://www.smtpeter.com/v1/send]()                                                                     | Versturen van data naar SMTP                                    |
| POST           | [https://www.smtpeter.com/v1/spf]()                                                                      |   d                                                              |
| POST           | [https://www.smtpeter.com/v1/template]()                                                                 |    d                                                             |
| DELETE         | [https://www.smtpeter.com/v1/dkimkey]()                                                                  | Verwijder een DKIM sleutel                                      |
| DELETE         | [https://www.smtpeter.com/v1/domain]()                                                                   | Verwijder een domein                                            | 
| DELETE         | [https://www.smtpeter.com/v1/spf]()                                                                      | Verwijder een SPF record                                        |
| DELETE         | [https://www.smtpeter.com/v1/template]()                                                                 | Verwijder een template                                          |
