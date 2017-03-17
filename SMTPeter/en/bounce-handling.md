# Bounce handling

When you send out email, you receive all sorts of bounce messages too.
Amongst these messages are delivery status notifications for addresses that
no longer exists, out-of-office replies from people who are on holiday,
confirmation messages ("thank you for your email") and all sort of 
other automaticly generated replies.

You can configure SMTPeter to take over the handling of these bounces, so
that you do not have to process these messages yourself. There are a couple
of configuration options that you can use for this.

## The envelope address

When you submit email - either via the [SMTP API](smtp-api) or the 
[REST API](rest-api) - you optionally supply an "envelope" address. This
is the address to which all bounce messages are going to be delivered. 
This envelope address is not the same as the "from" address. The 
from address is the visible sender address of the user, that is used 
when someone hits the reply button. The "envelope" address on the other
hand, is normally not visible, and is used by mail servers for bounces 
and other types of _automated_ replies.

If you're not interested in bounce messages and other automatic replies, 
life is easy: just don't supply an envelope address. If you send your 
messages without an envelope address, there is no way how bounce messages 
could ever end up back in your mailbox. Manual replies (when someone actively 
presses the reply button) are of course still possible, because your mail 
will still have a valid "from" address.

To send mail without an envelope address with the REST API is straight 
forward: just don't add the "envelope" parameter to the POST data. With 
the SMTP API it is simple too. The SMTP protocol allows submitting email 
without an envelope address:

````
MAIL FROM:<>
250 2.1.0 Sender OK
RCPT TO:<info@smtpeter.com>
250 2.1.5 Recipient OK
DATA
354 End data with <CR><LF>.<CR><LF>
(your full mime body here)
````

As you see in the above example, submitting an empty envelope address 
("MAIL FROM: with no address") is valid.


## Bounce tracking

If you _do_ supply an envelope address, you apparently are interested
in getting bounce information. But even then you can instruct SMTPeter how to intercept 
and handle them.

When you submit email through the REST API, you can add a "trackbounces"
variable to your POST data. If you set this to true (which is the default), 
you instruct SMTPeter to _intercept_ all bounces, process them, and 
forward them to your envelope address. This is a nice feature, because it
allows SMTPeter to log and report wrong email addresses.

To intercept bounces, SMTPeter changes the envelope address of your
messages. The original envelope address, the one that you supplied, is
removed and changed into a special bounce address. By doing this, 
bounces are not directly sent to your address, but to SMTPeter first, 
before they are forwarded to your original envelope address.

If you set the variable to false on the other hand, SMTPeter will not 
change the envelope address, and will not intercept bounces. However, we 
strongly advise to always set the "trackbounces" variable to true. All 
emails will then be delivered with a special validated bounce envelope address, 
and will therefore pass all SPF tests. If you set the "trackbounces" 
variable to false, the envelope address is not changed, and it is your 
own responsibility to ensure that you use a valid envelope address with 
a valid SPF record in DNS.

The [SMTP API](smtp-api) does not allow setting a "trackbounces" parameter.
However, you can associate this bounce-tracking feature with SMTP logins.
If you create new SMTP credentials on SMTPeter's dashboard, you can
enable the trackbounces options. All email messages that you submit
with these credentials will then have this feature turned on.


## Delivery Status Notifications

A special type of bounce messages are Delivery Status Notifications,
(in short: DSN's). Unlike many out-of-office replies and other type of
bounces that are difficult to recognize for computers, DSN's are 
standardized automatically generated notifications that can be processed 
by mail servers. SMTPeter recognizes these type of bounces too and logs 
the reported errors. Because SMTPeter already recognizes such messages, 
you may instruct SMTPeter to not forward these DNS's, and only pass on 
the bounces that could not be recognized. 

The SMTP protocol has a special DSN extension that allows just this. When
you submit a mail using the SMTP protocol, you can specify what kind of DSN
messages you like to receive: only error notifications, or also notifications
for successful deliveries? Or no DSN notifications at all?

Thus, if you submit an email to SMTPeter and you're interested in bounces,
and/or DSN messages, you can not only pass the envelope address to which 
the bounces are going to be delivered, but also extra parameters to inform 
what type of notification you want to receive.


## Passing DSN parameters

As explained above, SMTPeter supports the DSN extension, so you can pass
additional parameters to instruct us what type of bounces you like
to receive. With these DSN parameters the following things can be configured:

- When to send a notification (never, or in case of failure and/or success)
- What to return in case of a notification (full message or just the headers)
- An optional unique envelope identifier to be included in the DSN message
- The original recipient address

These parameters can be passed via the SMTP API as well as via the REST
API. For the REST API you need to supply a nested JSON object:

````
{
    "envelope": "bounce@yourdomain.com",
    "recipient": "info@example.com",
    "mime": "...",
    "dsn": {
        "notify": "FAILURE",
        "ret": "HDRS",
        "envid": "unique-identifier",
        "orcpt": "info@example.com"
    }
}
````

If you submit mail via the SMTP API you can pass extra parameters to
the "MAIL FROM" and "RCPT TO" instructions:

````
MAIL FROM:<alice@example.org> RET=HDRS ENVID=yourid
250 sender ok
RCPT TO:<bob@example.com> NOTIFY=SUCCESS ORCPT=rfc822;bob@example.com
250 recipient ok
````

The "notify" parameter can have the following values: "NEVER", "FAILURE",
"DELAY" or "SUCCESS". A comma seperated list of these values is possible 
too. It specifies for what kind of events you want to receive bounce messages.

The "ret" settings can be set to either "FULL" or "HDRS" and controls
whether the bounced message contains the full original submitted email,
or just the email headers. The "envid" and "orcpt" settings are fields 
that are going to be included in the bounces message, and can be used to 
link the received DSN to the original submitted mail.


## Some examples

Imagine that you do want to receive out-of-office replies, and other type
of bounces, but you have no interest in DSN messages because you know that 
SMTPeter already processes these automated replies and logs and reports 
these errors. You can then inject your email with the following JSON REST data.

````
{
    "envelope": "bounce@yourdomain.com",
    "recipient": "info@example.com",
    "mime": "...",
    "trackbounces": true,
    "dsn": {
        "notify": "NEVER"
    }
}
````

In the above example you do supply an envelope address, so you will receive
out-of-office replies and other types of bounces. The "trackbounces"
setting is also set to true, which means that SMTPeter is going to intercept,
process and log all bounces and forward them to you. However, the DSN
"notify" setting is set to "NEVER". This means that you're never going
to receive Delivery Status Notifications. Such DSN's will be intercepted
by SMTPeter, and are not going to be forwarded to your address.

If you're not interested in processing bounces at all, but you do want 
SMTPeter to log all the errors, you can inject your email without an 
envelope address:

````
{
    "recipient": "info@example.com",
    "mime": "...",
    "trackbounces": true
}
````

No envelope address is set in the above example, so you will not receive
any errors. However, the "trackbounces" property is set, so SMTPeter 
will add its own envelope address to the mail, and intercept, process
and log all bounces.

If you want to receive all out-of-office replies, unrecognized errors 
AND error messages when a delivery fails, you can inject email with the
following JSON data:

````
{
    "envelope": "bounce@yourdomain.com",
    "recipient": "info@example.com",
    "mime": "...",
    "trackbounces": true,
    "dsn": {
        "notify": "FAILURE"
    }
}
````

With the above input, SMTPeter is going to forward the mail using its
own envelope address (because "trackbounces" is set to true). All bounces
will be intercepted because of this, but they will all also be forwarded
to you, even the Delivery Status Notifications.

