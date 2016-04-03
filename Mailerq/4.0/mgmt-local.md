# Management console: local email addresses

MailerQ features a [built in SMTP server](smtp-server).
This SMTP server allows you to use SMTP to inject email into MailerQ. 
The emails that you submit to the SMTP server, will be published to one of the 
following queues:

* The inbox queue (config variable "rabbitmq-inbox")
* The local queue (config variable "rabbitmq-local")
* The reports queue (config variable "rabbitmq-reports")
* The refused queue (config variable "rabbitmq-refused")

To decide whether an incoming message should be sent to the normal
inbox queue, or to one of the other queues, you can use the management
console the edit the list of local email addresses.

All email addresses that are specified in the "RCPT TO" command sent to
MailerQ are compared with this list of local addresses. If there is a
match, the message will be published to local queue instead of the inbox
queue.


## Authentication

The local email addresses are also used to decide whether authentication
is required. If you've set an SMTP login and password in the config file 
(or when a plugin handles authentication), MailerQ only accepts messages
over secure and authenticated connections. Email messages that are sent
without using STARTTLS and without authentication, are normally rejected.

However, emails sent to local addresses are always accepted, even when
the client was not authenticated and/or when the connection was not secure.
Clients that send a "RCPT TO" instruction with a local email address will
always succeed in injecting their mail.


## Report messages

If you've assigned a special "reports" queue, MailerQ will preprocess all
local deliveries to detect whether the message contains some sort of
delivery or disposition report. DMARC reports and non-standardized reports
are also automatically recognized and placed in this reports queue.


## Refused messages

Incoming messages that are not accepted (because they were not local,
and did not come from an authenticated client) are normally blocked and
not placed in any queue. However, if you've set up a "refused" queue too,
these messages will be saved in this queue. This can be used for debugging
purposes.
