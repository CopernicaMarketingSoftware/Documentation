# Webhooks for deliveries

If you set up a Webhook for deliveries, SMTPeter notifies you in real-time
about each delivery. For each delivery that we monitor we send 
a HTTP POST call (HTTPS is possible too) to your server with the relevant 
information about the delivery.

## Variables

With each POST call the following variables are passed to your script:

| Variable   | Description                                                     |
|------------|-----------------------------------------------------------------|
| id         | Unique identifier of the message that was delivered             |
| recipient  | Email address of the receiver                                   |
| time       | (Unix) time when the message was delivered                      |
| timestamp  | Timestamp when the message was delivered (YYYY-MM-DD HH:MM:SS)  |
| code       | Status code from the receiving mail server                      |
| extended   | Extended status code from the receiving mail server             |
| description| Description from the receiving mail server                      |
| type       | Type of action that triggered the Webhook ('delivery')          |
| tags       | The tags that you associated with the mail                      |

The 'id' and 'recipient' and 'tags' variables allow you to link the incoming bounce
to the original outgoing message that was sent.

## More information

* [Webhooks](./webhooks)
