# Webhooks for abuses

In email clients, it is possible to mark a received email as spam. If a 
receiver of you email does so, and his/hers client supports this, SMTPeter will
receive an *abuse report* of this. In this report, it is described about which
email the receiver is complaining.

With a Webhook, you can receive notifications about the *abuse reports* for your
emails. For every complaint, a HTTP POST call (HTTPS is also possible) is sent to
your server with information about the complaint.

## Variables

With each POST call the following variables are sent over:

| Variable  | Description                                                          |
|-----------|----------------------------------------------------------------------|
| id        | Unique identifier of the message that was complained about           |
| type      | Type of action that triggered the Webhook ('abuse')                  |
| emailfrom | Email address of complaining email client                            |
| mime      | MIME version of the received report                                  |

The 'id' variable allows you to link the incoming abuse to the original outgoing message that was sent.

## More information

* [Webhooks](./webhooks)
* [Set up a webhook](./webhook-setup)
