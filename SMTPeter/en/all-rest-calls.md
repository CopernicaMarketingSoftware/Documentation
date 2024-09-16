# All available REST calls

In the table below you find all the available REST calls for the SMTPeter API.
The REST API helps you by retrieving, deleting and creating data in your
SMTPeter environment. This way, you can incorporate SMTPeter in your own
website or application and you're absolutely free to determine which duties 
SMTPeter should perform.

The following methods are accessible via HTTP GET, POST and DELETE:

| Method         | Address                                                          | Description                                            |
|----------------|------------------------------------------------------------------|--------------------------------------------------------|
| GET            | [www.smtpeter.com/v2/attachments](./rest-messages)               | List of all attachments for a specific email           |
| GET            | [www.smtpeter.com/v2/datarequest/$id/status](./rest-datarequest) | Retrieve the status of a datarequest |
| GET            | [www.smtpeter.com/v2/dkimkey](./rest-dkim)                       | Retrieve DKIM with specific ID                         |
| GET            | www.smtpeter.com/v2/dkimkeys                                     | Retrieve DKIM for a *sender domain*                    |
| GET            | [www.smtpeter.com/v2/dmarc](./rest-dmarc)                        | Retrieve all dates with available DMARC reports        |
| GET            | [www.smtpeter.com/v2/dns](./rest-dns)                            | Proposed DNS record for a certain domain               |
| GET            | [www.smtpeter.com/v2/domain](./rest-sender-domains)              | Request specific sender domain                         |
| GET            | [www.smtpeter.com/v2/domains](./rest-sender-domains)             | Request all sender sender domain                       |
| GET            | [www.smtpeter.com/v2/embeds](./rest-messages)                    | List of all embedded files + content id (cid)          |
| GET            | [www.smtpeter.com/v2/envelope](./rest-messages)                  | Request used envelope address for specific message id  |
| GET            | [www.smtpeter.com/v2/events](./rest-events)                      | Request events                                         |
| GET            | www.smtpeter.com/v2/webhooks                                     | Request webhook settings (feedbackloop is deprecated)  |
| GET            | [www.smtpeter.com/v2/headers](./rest-messages)                   | Request headers of sent message                        |
| GET            | [www.smtpeter.com/v2/html](./rest-messages)                      | Request HTML part of sent message                      |
| GET            | [www.smtpeter.com/v2/text](./rest-messages)                      | Request text part of sent message                      |
| GET            | [www.smtpeter.com/v2/logfiles](./rest-logfiles)                  | Request log files information                          |
| GET            | [www.smtpeter.com/v2/recipient](./rest-messages)                 | Request recipient of sent message                      |
| GET            | www.smtpeter.com/v2/spf                                          | Request SPF information                                |
| GET            | [www.smtpeter.com/v2/template](./rest-templates)                 | Request specific template                              |
| GET            | [www.smtpeter.com/v2/templates](./rest-templates)                | Request all template identifiers                       |
| POST           | [www.smtpeter.com/v2/datarequest](./rest-datarequest)            | Create a data request                                  |
| POST           | www.smtpeter.com/v2/dkimkey                                      | Add new DKIM to sender domain                          |
| POST           | www.smtpeter.com/v2/domain                                       | Make or assign a new domain                            |
| POST           | www.smtpeter.com/v2/webhook                                      | Configure a webhook (feedbackloop is deprecated)       |
| POST           | [www.smtpeter.com/v2/resend](./rest-send-advanced)               | Resend a message                                       |
| POST           | [www.smtpeter.com/v2/send](./rest-api)                           | Send data to SMTPeter                                  |
| POST           | www.smtpeter.com/v2/spf                                          | Create a SPF record                                    |
| POST           | [www.smtpeter.com/v2/template](./rest-templates)                 | Create a templates                                     |
| DELETE         | www.smtpeter.com/v2/dkimkey                                      | Delete a DKIM key                                      |
| DELETE         | www.smtpeter.com/v2/domain                                       | Delete a domain                                        |
| DELETE         | www.smtpeter.com/v2/spf                                          | Delete a SPF record                                    |
| DELETE         | www.smtpeter.com/v2/template                                     | Delete a template                                      |

## More information

* [REST API](./rest-api)
