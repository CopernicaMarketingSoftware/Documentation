# Using SMTPeter

Using SMTPeter is very simple, it works exactly like any
normal mailserver would do - e.g. that of an I.S.P.

Because of this, SMTPeter could be used through standard
desktop email programs like Thunderbird, Evolution or
Apple Mail.

To send mail through SMTPeter, configure your chosen
e-mail client with the following settings:

    Host: mail.smtpeter.com
    Port: 25
    Encryption: STARTTLS

To prevent spam from being sent, we require authentication
before being allowed to send out messages. To authenticate
with SMTPeter, configure your client to authenticate either
using AUTH PLAIN or AUTH LOGIN.

## Using SMTPeter as a smart host

If you are already using an MTA and want to avoid changing
the way that different applications send out mail, the MTA
could likely be configured to use SMTPeter as a smart host.

In a smart host setup, your application still connects to
the already existing MTA. The MTA will then - instead of
directly delivering the mail itself - deliver it to
SMTPeter.

This way, you get the best of both worlds. Connect times
are very low (because the MTA is likely local), which is
ideal when making many connections for single mail delivery,
while SMTPeter takes care of the actual email delivery,
throttling according to the speed of the receiving mail
server.

## Using the REST API

You can also send out mails by using our REST API. To send
a mail this way, simply execute a POST request to
[https://www.smtpeter.com/v1/send](https://www.smtpeter.com/v1/send).

The request should contain the following the fields:

    Envelope: The address the e-mail originated from

    Body: The mime data for the message

    Recipient: The email address that will receive the email

The following fields are optional, and control the way that
SMTPeter processes the messages:

    inlinizecss: When set to true, all CSS will be inlined inside the HTML

    clicktracking: When set to true, links will be redirected and logged

    bouncetracking: When set to true, bounces will be monitored

    openstracking: When set to true, impressions will be monitored

The fields can be either provided as regular POST data, or
they can be encoded in JSON. For JSON the Content-Type should
be set to application/json.

## Setup SENDER ID

If you utilise SPF for a domain you would like to send mail
from through SMTPeter, you should include the SMTPeter
IP-addresses to make sure the mail is not regarded as spam.

To make this easier (and since the IP-addresses that SMTPeter
sends from can change), we have set up a SPF record that can
be included, so you automatically keep the latest - and correct -
version.

To include all the SMTPeter IP-addresses, add the following
TXT - and if possible SPF - record on your domain.

` "v=spf1 include:_senderspf.smtpeter.com a mx ~all" `

Of course, you can also allow your own IP addresses. For more
information, view the [OpenSPF website](http://www.openspf.org/).
