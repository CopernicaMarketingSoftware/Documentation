# Webhooks for opens

SMTPeter can rewrite image links in emails to track opens. When an email
is opened for which this option was set, the image will not be downloaded from your
own server, but from the cache on SMTPeter web servers in stead. This
allows us to track all opens, and to use that for statistics.

If you set up a Webhook for opens, SMTPeter notifies you in real-time
about each registered image download. For each open that we monitor we send 
a HTTP POST call (HTTPS is possible too) to your server with the relevant 
information about the open.

## Variables

With each POST call the following variables are passed to your script:

| Variable  | Description                                                     |
|-----------|-----------------------------------------------------------------|
| id        | Unique identifier of the message that was opened                |
| type      | Type of action that triggered the Webhook ('open')              |
| recipient | Email address of the person that opened the mail                |
| ip        | IP address from which the message was opened                    |
| time      | Time when the message was opened                                |
| useragent | Optional user agent string (extracted from HTTP request header) |
| referer   | Optional referer (extracted from HTTP request header)           |
| tags      | The tags that you associated with the mail                      |

The 'id' and 'recipient' and 'tags' variables allow you to link the incoming bounce
to the original outgoing message that was sent.

## More information

* [Webhooks](./webhooks)
* [Set up a Webhook](./webhook-setup)
