# Alle beschikbare REST calls

In onderstaande tabel kun je alle beschikbare REST 'calls' vinden voor de 
SMTPeter API. De REST API helpt je bij het ophalen, verwijderen en creëren 
van data in jouw SMTPeter omgeving. Op deze manier kun je SMTPeter incorperen
binnen je eigen website of applicatie en ben je volledig vrij om te bepalen
welke taken je door SMTPeter wilt laten doen. 

De volgende methodes zijn toegankelijk via HTTP GET, POST en DELETE:

| Methode        | Adres                                                                                                    | Omschrijving                                                            |
|--------------- |----------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------|
| GET            | [api.smtpeter.com/v1/attachments](get-attachments)                                                | Lijst van alle bijlages voor specifieke email                       |
| GET            | [https://www.smtpeter.com/v1/dkimkey](get-dkimkey)                                                       | DKIM opvragen met specifiek ID               |
| GET            | [https://www.smtpeter.com/v1/dkimkeys](get-dkimkeys)                                                     | Alle DKIM opvragen voor een 'sender domain'  |
| GET            | [https://www.smtpeter.com/v1/dmarc](get-senderdomain)                                                    | Opvragen van alle datums waar mogelijk een dmarc raport voor is      |
| GET            | [https://www.smtpeter.com/v1/dns](get-dns)                                                               | Voorgestelde 'DNS record' voor een bepaald domein                     |
| GET            | [https://www.smtpeter.com/v1/domain](get-domain)                                                         | Opvragen van specifiek 'sender domain'  |
| GET            | [https://www.smtpeter.com/v1/domains](get-domains)                                                       | Opvragen van alle 'sender domains'         |
| GET            | [https://www.smtpeter.com/v1/embeds](get-embeds)                                                         | Lijst van alle 'embedded' bestanden + content id (cid)                |
| GET            | [https://www.smtpeter.com/v1/envelope](get-envelope)                                                     | Opvragen van gebruikte envelope adres voor specifiek message id    |
| GET            | [https://www.smtpeter.com/v1/events](get-events)                                                         | Opvragen van events           |
| GET            | [https://www.smtpeter.com/v1/feedbackloops](get-feedbackloops)                                           | Opvragen van feedback loop instellingen     |
| GET            | [https://www.smtpeter.com/v1/headers](get-headers)                                                       | Opvragen van headers van een verstuurd bericht                       |
| GET            | [https://www.smtpeter.com/v1/html](get-html)                                                             | Opvragen van het HTML gedeelte van een verstuurd bericht          |
| GET            | [https://www.smtpeter.com/v1/text](get-text)                                                             | Opvragen van het text gedeelte van een verstuurd bericht          |
| GET            | [https://www.smtpeter.com/v1/logfiles](get-logfiles)                                                     | Opvragen van logfilesinformatie                          |
| GET            | [https://www.smtpeter.com/v1/recipient](get-recipient)                                                   | Opvragen van de recipient van een verstuurd bericht                   |
| GET            | [https://www.smtpeter.com/v1/spf](get-spf)                                                               | Opvragen van SPF informatie       |
| GET            | [https://www.smtpeter.com/v1/template](get-template)                                                     | Opvragen van een specifieke template         |
| GET            | [https://www.smtpeter.com/v1/templates](get-templates)                                                   | Opvragen van alle template identifiers      |
| POST           | [https://www.smtpeter.com/v1/dkimkey](post-dkimkey)                                                      | Voeg een nieuwe DKIM toe aan het 'sender domain'                     |
| POST           | [https://www.smtpeter.com/v1/domain](post-domain)                                                        | Maak een nieuw domein aan of wijs een domein toe                      |
| POST           | [https://www.smtpeter.com/v1/feedbackloop](post-feedbackloop)                                            | Configureren van een feedback loop    |
| POST           | [https://www.smtpeter.com/v1/send](post-send)                                                            | Versturen van data naar SMTP             |
| POST           | [https://www.smtpeter.com/v1/spf](post-spf)                                                              | Het aanmaken van een spf record           |
| POST           | [https://www.smtpeter.com/v1/template](post-template)                                                    | Het aanmaken van een template         |
| DELETE         | [https://www.smtpeter.com/v1/dkimkey](delete-dkimkey)                                                    | Verwijder een DKIM sleutel          |
| DELETE         | [https://www.smtpeter.com/v1/domain](delete-domain)                                                      | Verwijder een domein           | 
| DELETE         | [https://www.smtpeter.com/v1/spf](delete-spf)                                                            | Verwijder een SPF record           |
| DELETE         | [https://www.smtpeter.com/v1/template](delete-template)                                                  | Verwijder een template         |