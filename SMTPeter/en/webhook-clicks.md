# Webhooks for clicks

If you enable click-tracking, SMTPeter rewrites all hyperlinks in your emails.
If someone clicks on one of these rewritten links that user first goes to
the SMTPeter website, where the click is registered, and is then immediately
redirected to the original URL. This all happens automatically and very fast  
and is most of the time unnoticeable for your receiver. This technology
allows SMTPeter to track all clicks on your mails.

If you set up a click webhook, SMTPeter also notifies you in realtime
about these clicks. For each click we send a HTTP POST call (HTTPS is possible 
too) to your server with the relevant information about the click.

## Variables

With each POST call the following variables are sent over:

| Variable  | Description                                                          |
|-----------|----------------------------------------------------------------------|
| id        | Unique identifier of the message that was clicked                    |
| recipient | Email address of the person that clicked                             |
| ip        | IP address of the clicker                                            |
| url       | The clicked url (this is the link to the SMTPeter server)            |
| original  | The original url (this is the link to which the user was redirected) |
| useragent | Optional user agent string (extracted from http request header)      |
| referer   | Optional referer (extracted from http request header)                |
| tags      | The tags that you associated with the mail                           |

The "id", "recipient" and "tags" variables allow you to link the click to the 
originally sent email message.

## More information

* [Webhooks](./webhooks)
* [Set up a webhook](./webhook-setup)
