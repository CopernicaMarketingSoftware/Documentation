# Begrippen binnen Copernica

Als je net nieuw bent in de wereld van e-mailmarketing kom je misschien 
nog veel nieuwe termen tegen in onze documentatie en software. Deze pagina 
legt enkele kernbegrippen uit om je op weg te helpen. Sommige begrippen 
linken naar achtergrondartikelen met meer informatie.

## Begrippenlijst

| Begrip                               | Omschrijving                                                                                                                                                                                         |
|--------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| [API](./apis)                        | Application Programming Interface: Een set standaardprotocollen om toegang te krijgen tot de data van een applicatie. Zie ook REST en SOAP.                                                          |
| CNAME record                         | Canonical Name Record: Wordt gebruikt om een domein een alias domeinnaam te geven. Zo kun je bijvoorbeeld een website laten hosten door Copernica op je eigen domeinnaam.                            |
| [DKIM](./dkim)                       | Domain Keys Identified Mail: Wordt gebruikt om een digitale handtekening in de header van de email te zetten.                                                                                        |
| [DMARC](./dmarc)                     | Domain-based Message Authentication, Reporting and Conformance: Een policy in het DNS record. Deze geeft aan wat er moet gebeuren met mails waarbij DKIM en SPF records ontbreken of incorrect zijn. |
| [DNS](./dns)                         | Domain Name Server: Het systeem dat domeinen omzet naar IP adressen.                                                                                                                                 |
| HTTP                                 | Hypertext Transfer Protocol: Standaard internetprotocol voor het versturen van informatie zonder encryptie.                                                                                                           |
| HTTPS                                | Hypertext Transfer Protocol Secure: Veiligere en nieuwere versie van HTTP. Gebruikt SSL voor encryptie van informatie.                                                                              |
| MTA                                  | Mail Transfer Agent: Verstuurt de mails zelf. Copernica gebruikt eigen software [MailerQ](www.mailerq.com).                                                                                           |
| [MX](./mx)                           | Mail eXchange record: Bevat de naam van de computer die het e-mailverkeerd voor het domein afhandelt. Deze zal bij jou naar Copernica verwijzen om bounces te verwerken.                             |
| [REST](rest-api)                     | Representational State Transfer: Een API voor Copernica data.                                                                                                                                        |
| [Sender domains](./sender-domains)   | Domein om mee te mailen vanuit Copernica. Resulteert in een set DNS records (MX, DKIM, SPF en DMARC) om op jouw server te zetten en mailen makkelijk te maken.                                       |
| SMTP                                 | Simple Mail Transfer Protocol: Standaardprotocol voor het versturen van e-mails.                                                                                                                     |
| [SOAP](soap-api-documentation)       | Simple Object Access Protocol: Een API voor Copernica data. We raden je aan de nieuwere REST API te gebruiken.                                                                                       |
| [SPF](./spf)                         | Sender Policy Framework: Zorgt ervoor dat Copernica mag mailen vanaf jouw emailadres in dit geval.                                                                                                   |
                                                                                                                                                                                                                                              
## Meer informatie                                                                                                                                                                                                                            

* [Snelle start](./quick-start-guide)
* [Zenderdomein instellen](./quick-sender-domain-guide)
* [Database inrichten](./quick-database-guide)
* [Je eerste mailing](./quick-mailing-guide)
