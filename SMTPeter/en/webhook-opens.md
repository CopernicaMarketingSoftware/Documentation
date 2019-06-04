# Webhooks for opens

SMTPeter can rewrite image links in emails to track opens. When an email
is opened for which this option was set, the image will not be downloaded from your
own server, but from the cache on SMTPeter web servers in stead. This
allows us to track all opens, and to use that for statistics.

If you set up a webhook for opens, SMTPeter notifies you in realtime
about each registered image download. For each open that we monitor we send 
a HTTP POST call (HTTPS is possible too) to your server with the relevant 
information about the open.


## Variables

With each POST call the following variables are passed to your script:

| Variable  | Description                                                     |
|-----------|-----------------------------------------------------------------|
| id        | unique identifier of the message that was opened                |
| recipient | email address of the person that opened the mail                |
| ip        | ip address of the opened                                        |
| time      | time when the url was opened                                    |
| useragent | optional user agent string (extracted from http request header) |
| referer   | optional referer (extracted from http request header)           |
| tags      | the tags that you associated with the mail                      |

The "ID" and "recipient" variables allow you to link the open to the 
originally sent email message.

## More information

* [Webhooks](./webhooks)
* [Set up a webhook](./webhook-setup)
