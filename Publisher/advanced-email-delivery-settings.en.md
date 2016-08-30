In the Admin section, under *Account***\> Delivery settings**, you’ll
find the settings for sending messages from the selected account. These
can be edited partially.

Envelope domain
---------------

The envelope domain is used as a 'sender' of email (the address you
write at the back of the envelope). The administrator of a license can
change the domain through which the e-mail is routed. This is used for
deliverability or whitelabel reasons for example.

This must be a valid domain, and has an **MX record** which directs to
the mail servers with the **IP address** displayed in the dialog text.
The domain name cannot be a CNAME.

**Warning:** changing the envelope domain affects all accounts under the
given license.

![Envelope settings](emaildeliverysettings.png)

Picserver domain
----------------

The pic server domain is used to route images in all sent emails and to
register impressions and clicks on emails. The administrator of a
license can change the domain through which the email is routed. This
can be used for deliverability or whitelabel reasons for example.

This must always be a valid domain name has to redirect through a
**CNAME** to vicinity.picsrv.net.

IP address
----------

Specifies the IP address from which the emailing will be sent. This
cannot be modified by a user.

Queue
-----

The queue displays the number of emails that is currently queued for
immediate sending from your account.

Delivery limit
--------------

The delivery limit determines the maximum number of emails per minute
that will be sent to a single mail server (Hotmail, Gmail ...
@example.org). The delivery setting is not intended to limit the overall
transmission speed limit, but to prevent server overload on the
receiving server. If the delivery limit is set to 1000, no more than
1000 messages on a specific server (i.e. IP address) will be delivered
in a minute. This number of 1000 messages is a very high ceiling: most
servers are not capable of accepting this number of messages per minute,
so this limit is actually never achieved.

Send limit
----------

This can be set in the Send mass mailing dialog in the tab Options. If
you leave this option as it is, the delivery limit (see paragraph above)
is used. The send limit specifies how many messages can be sent in its
entirety, on a per minute base. If the send limit is set to 500, it may
be that 300 messages will be delivered to Hotmail, 100 messages to Gmail
and the remaining 100 messages to Yahoo in the first minute. In the
subsequent minute another 500 messages will be picked randomly by the
system. This functionally is used to spread the deliverability, for
instance if a mailing has a large amount or recipients. If you refer to
a website in your mailing, this setting can prevent server overloading
on your website. You can leave this setting as it is if your website is
not affected by a large number of page requests at once.

New connections
---------------

The number of new connections determines the maximum number of
connections simultaneously made with a receiving mail server. The
default setting provides the safest margin to prevent overloading on the
receiving server, reducing the risk to be labelled as spam to a minimum.
This is also affected by the connection limit. The default two
connections provides the safest margin.

Attempts
--------

Indicates how many attempts per one hour interval must be done to
deliver an email successfully. If an error occurs during the first
attempt (for example, the receiving server is overloaded or offline),
the mail will be offered again one hour later. By default, a mail is
offered 20 times.

Secure
------

TLS provides encrypted communication security. Using TLS to encrypt
communications between two e-mail gateways has some security benefits.
First, each mail server authenticates to the other, making it harder to
send spoofed e-mail. Second, the contents of the e-mails sent between
the two servers are encrypted, protecting them from prying eyes. TLS is
however not widely supported and can slow down email delivery a little
bit. It does not harm deliverability to ESP's that do not support TLS.

![](emaildeliverysettings2.png)
