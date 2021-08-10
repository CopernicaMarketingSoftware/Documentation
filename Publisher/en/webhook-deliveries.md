# Webhooks: deliveries

If you set up a WebHook for deliveries, the Marketing Suite notifies you in realtime
about every email sent. For each email sent we send 
a HTTP POST call (HTTPS is possible too) to your server with the relevant 
information about the open. 

Note: this might generate a lot of traffic, so be sure that your server is capable
of handling this.

## Variables

With each POST call the variables in the table below are sent over. The 
POST data is sent with the application/x-www-form-urlencoded content type.


| Variable  | Description                                                     |
|-----------|-----------------------------------------------------------------|
| id        | Unique identifier of the message that was opened                |
| type      | Type of action that triggered the Webhook ('open')              |
| timestamp | Timestamp for the failure (in YYYY-MM-DD HH:MM:SS format)       |
| time      | Unix time for the failure                                       |
| recipient | Email address of the person that opened the mail                |
| tags      | The tags that you associated with the mail                      |

The 'id", 'recipient' and 'tags' variables allow you to link to the originally sent email message.

## More information

* [Webhooks](./webhooks)
