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
