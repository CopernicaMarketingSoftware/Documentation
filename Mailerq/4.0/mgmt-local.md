# Management Console: Local email addresses

MailerQ features an SMTP server; [read more about injecting via SMTP here](smtp-server).

By default, all emails received by a MailerQ instance need to be authenticated,
and without authentication, these emails are immediately rejected.  You might
however want to allow emails to certain _local_ email addresses: `info@yourdomain.com`
is a prime example of this.  The Local email addresses view allows you to manage
these.
