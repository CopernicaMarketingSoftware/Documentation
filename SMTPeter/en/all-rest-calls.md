# Alle available REST calls

In the table below, you find all the available REST calls for the SMTPeter API.
The REST API helps you by retrieving, deleting and creating data in your
SMTPeter environment. This way, you can incorporate SMTPeter in your own
website or application and you're absolutely free to determine which duties 
SMTPeter must do for you.

The following methods are accessible via HTTP GET, POST and DELETE:

| method         | Address                                                | Description                                            |
|----------------|--------------------------------------------------------|--------------------------------------------------------|
| GET            | [www.smtpeter.com/v1/attachments](get-attachments)     | List of all attachments for a specific email           |
| GET            | [www.smtpeter.com/v1/dkimkey](get-dkimkey)             | Retrieve DKIM with specific ID                         |
| GET            | [www.smtpeter.com/v1/dkimkeys](get-dkimkeys)           | Retrieve DKIM for a *sender domain*                    |
| GET            | [www.smtpeter.com/v1/dmarc](get-senderdomain)          | Retrieve all dates with available DMARC reports        |
| GET            | [www.smtpeter.com/v1/dns](get-dns)                     | Proposed DNS record for a certain domain               |
| GET            | [www.smtpeter.com/v1/domain](get-domain)               | Request specific sender domain                         |
| GET            | [www.smtpeter.com/v1/domains](get-domains)             | Request all sender sender domain                       |
| GET            | [www.smtpeter.com/v1/embeds](get-embeds)               | List of all embedded files + content id (cid)          |
| GET            | [www.smtpeter.com/v1/envelope](get-envelope)           | Request used envelope address for specific message id  |
| GET            | [www.smtpeter.com/v1/events](get-events)               | Request events                                         |
| GET            | [www.smtpeter.com/v1/feedbackloops](get-feedbackloops) | Request feedback loop settings                         |
| GET            | [www.smtpeter.com/v1/headers](get-headers)             | Reqeust headers of sent message                        |
| GET            | [www.smtpeter.com/v1/html](get-html)                   | Request HTML part of sent message                      |
| GET            | [www.smtpeter.com/v1/text](get-text)                   | Request text part of sent message                      |
| GET            | [www.smtpeter.com/v1/logfiles](get-logfiles)           | Request log files information                          |
| GET            | [www.smtpeter.com/v1/recipient](get-recipient)         | Request recipient of sent message                      |
| GET            | [www.smtpeter.com/v1/spf](get-spf)                     | Request SPF information                                |
| GET            | [www.smtpeter.com/v1/template](get-template)           | Request specific template                              |
| GET            | [www.smtpeter.com/v1/templates](get-templates)         | Request all template identifiers                       |
| POST           | [www.smtpeter.com/v1/dkimkey](post-dkimkey)            | Add new DKIM to sender domain                          |
| POST           | [www.smtpeter.com/v1/domain](post-domain)              | Make or assign a new domain                            |
| POST           | [www.smtpeter.com/v1/feedbackloop](post-feedbackloop)  | Configure a feedback loop                              |
| POST           | [www.smtpeter.com/v1/send](post-send)                  | Send data to SMTPeter                                  |
| POST           | [www.smtpeter.com/v1/spf](post-spf)                    | Create a SPF record                                    |
| POST           | [www.smtpeter.com/v1/template](post-template)          | Create a templates                                     |
| DELETE         | [www.smtpeter.com/v1/dkimkey](delete-dkimkey)          | Delete a DKIM key                                      |
| DELETE         | [www.smtpeter.com/v1/domain](delete-domain)            | Delete a domain                                        |
| DELETE         | [www.smtpeter.com/v1/spf](delete-spf)                  | Delete a SPF record                                    |
| DELETE         | [www.smtpeter.com/v1/template](delete-template)        | Delete a template                                      |