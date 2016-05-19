# Sender domains

Techniques like [SPF](spf-validation), [DKIM](dkim-signing), and 
[DMARC](dmarc-deployment) that are used to increase the security of your
mails, all depend the domain of the "from" address of a sent email. We call
this domain of the "from" address a sender domain. Since SMTPeter helps you to use SPF,
DKIM, and DMARC, it needs to know what sender domains you want to use and
what settings you want to apply for them. When you send a mail, SMTPeter
extracts the sender domain and looks up your sender domain settings.
Based on these settings it processes the mail.

You can use the dashboard to configure your sender domains but you can use
the [REST API](rest-sender-domains) too.
