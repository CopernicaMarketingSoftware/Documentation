# All available REST calls

In the table below you find all the available REST calls for the SMTPeter API.
The REST API helps you by retrieving, deleting and creating data in your
SMTPeter environment. This way, you can incorporate SMTPeter in your own
website or application and you're absolutely free to determine which duties 
SMTPeter should perform.

The following methods are accessible via HTTP GET, POST and DELETE:

| method         | Address                              | Description                                            |
|----------------|--------------------------------------|--------------------------------------------------------|
| GET            | www.smtpeter.com/v1/attachments      | List of all attachments for a specific email           |
| GET            | www.smtpeter.com/v1/dkimkey          | Retrieve DKIM with specific ID                         |
| GET            | www.smtpeter.com/v1/dkimkeys         | Retrieve DKIM for a *sender domain*                    |
| GET            | www.smtpeter.com/v1/dmarc            | Retrieve all dates with available DMARC reports        |
| GET            | www.smtpeter.com/v1/dns              | Proposed DNS record for a certain domain               |
| GET            | www.smtpeter.com/v1/domain           | Request specific sender domain                         |
| GET            | www.smtpeter.com/v1/domains          | Request all sender sender domain                       |
| GET            | www.smtpeter.com/v1/embeds           | List of all embedded files + content id (cid)          |
| GET            | www.smtpeter.com/v1/envelope         | Request used envelope address for specific message id  |
| GET            | www.smtpeter.com/v1/events           | Request events                                         |
| GET            | www.smtpeter.com/v1/webhooks         | Request webhook settings (feedbackloop is deprecated)  |
| GET            | www.smtpeter.com/v1/headers          | Reqeust headers of sent message                        |
| GET            | www.smtpeter.com/v1/html             | Request HTML part of sent message                      |
| GET            | www.smtpeter.com/v1/text             | Request text part of sent message                      |
| GET            | www.smtpeter.com/v1/logfiles         | Request log files information                          |
| GET            | www.smtpeter.com/v1/recipient        | Request recipient of sent message                      |
| GET            | www.smtpeter.com/v1/spf              | Request SPF information                                |
| GET            | www.smtpeter.com/v1/template         | Request specific template                              |
| GET            | www.smtpeter.com/v1/templates        | Request all template identifiers                       |
| POST           | www.smtpeter.com/v1/dkimkey          | Add new DKIM to sender domain                          |
| POST           | www.smtpeter.com/v1/domain           | Make or assign a new domain                            |
| POST           | www.smtpeter.com/v1/webhook          | Configure a webhook (feedbackloop is deprecated)       |
| POST           | www.smtpeter.com/v1/send             | Send data to SMTPeter                                  |
| POST           | www.smtpeter.com/v1/spf              | Create a SPF record                                    |
| POST           | www.smtpeter.com/v1/template         | Create a templates                                     |
| DELETE         | www.smtpeter.com/v1/dkimkey          | Delete a DKIM key                                      |
| DELETE         | www.smtpeter.com/v1/domain           | Delete a domain                                        |
| DELETE         | www.smtpeter.com/v1/spf              | Delete a SPF record                                    |
| DELETE         | www.smtpeter.com/v1/template         | Delete a template                                      |

## More information

* [REST API](./rest-api)
