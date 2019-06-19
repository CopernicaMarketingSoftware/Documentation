# Webhooks for clicks

If you enable click-tracking, SMTPeter rewrites all hyperlinks in your emails.
If someone clicks on one of these rewritten links that user first goes to
the SMTPeter website, where the click is registered, and is then immediately
redirected to the original URL. This all happens automatically and very fast  
and is most of the time unnoticeable for your receiver. This technology
allows SMTPeter to track all clicks on your mails.

If you set up a click Webhook, SMTPeter also notifies you in real-time
about these clicks. For each click we send a HTTP/HTTPS POST call to your 
server with the relevant information about the click.

## Variables

With each POST call the following variables are sent over:

| Variable  | Description                                                     |
|-----------|-----------------------------------------------------------------|
| id        | Unique identifier of the message that was clicked               |
| type      | Type of action that triggered the Webhook ('click')             |
| timestamp | Timestamp for the bounce (in YYYY-MM-DD HH:MM:SS format)        |
| time      | Unix time for the bounce                                        |
| recipient | Email address of the user that clicked                          |
| ip        | IP address of the user that clicked                             |
| original  | The original url                                                |
| useragent | Optional user agent string (extracted from http request header) |
| referer   | Optional referer (extracted from http request header)           |
| tags      | The tags that you associated with the mail                      |

The 'id' and 'recipient' and 'tags' variables allow you to link the incoming clicks 
to the original outgoing message that was sent.

## More information

* [Webhooks](./webhooks)
* [Set up a Webhook](./webhook-setup)
