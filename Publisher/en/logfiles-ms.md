# Logfiles in Marketing Suite

Copernica keeps a log of all sent messages. We keep data on *events*: 
deliveries, clicks, opens, retries, etc. These log files can be 
retrieved through the [REST API](./rest-get-logfiles), but the 
Marketing Suite also has an interface for it. You'll find it under the 
'Operations Log' tab in the left menu.

The 'Operations Log' tab allows you to see the log files of all messages 
on a specific day. The files are sorted by application (MarketingSuite
 or Publisher) and type (click, delivery, etc.). Clicking on one of the 
 categories will show the mailings of that day, specified by their 
 destination ID, and some other information.

## Message information

The destination IDs of messages are clickable. Click one, and you'll 
get to the Message Information screen. Here, you'll find all the details 
on the message, such as the full content of the message, recipient, 
subject, attachments, and more.

![message information](../images/message-information.png "Message information interface")

Next to the mailing itself are two tabs: 'Events' and 'Template'. 
'Events' shows the full details on every event that occurred with the 
email, like the exact time it was opened, on what device and which 
operating system was used.

'Template' holds information on the template that was used, like its ID 
and how many times it has been used.

## Downloading log files

It is possible to download log files to your computer using the 
'Download' button in the Operations Log. Another way of retrieving log 
files is through the [REST API](./rest-get-logfiles), or to get notified 
of events using [WebHooks](./webhooks). The following logfiles are available 
for Marketing Suite:

| Prefix                                            | Type of information                                                |
| --------------------------------------------------|--------------------------------------------------------------------|
| [cdm-attempts](rest-cdm-attempts-logfile)         | General info about mails sent with Marketing Suite (MS)            |
| [cdm-abuse](rest-cdm-abuse-logfile)               | Info about mails sent via MS that triggered a notification         |
| [cdm-click](rest-cdm-click-logfile)               | Info about clicks generated from mails sent with MS                |
| [cdm-delivery](rest-cdm-delivery-logfile)         | Info about delivered mails sent with MS                            |
| [cdm-error](rest-cdm-error-logfile)               | Info about mails sent with MS that triggered an error              |
| [cdm-impression](rest-cdm-impression-logfile)     | Info about impressions from mails sent with MS                     |
| [cdm-retry](rest-cdm-retry-logfile)               | Info about mails sent via MS for which we retry a delivery         |
| [cdm-unsubscribe](rest-cdm-unsubscribe-logfile)   | Info about mails sent via MS that triggered an unsubscribe         |
| [feedback-loop-errors](rest-feedback-loop-errors) | Info about errors in your feedback loops                           |

## More information

* [REST API](./rest-get-logfiles)
* [Statistics](./statistics)
* [WebHooks](./webhooks)
