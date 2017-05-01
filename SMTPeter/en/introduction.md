# Getting started 

SMTPeter is a *cloud based email gateway* which takes care of sending emails, the easy way.
You can choose to send email via the REST API or the SMTP API.
After registering, you only need a few things to do in order to start with SMTPeter, 
which we will discuss now.

## Setting up a Sender Domain and DNS settings

SMTPeter uses the concept of "Sender Domains" to simplify email. This allows 
you to send your email through our servers without having to worry about 
complicated things like SPF, DKIM and DMARC. The Sender Domain confirms 
that we are sending email in your name. First you [configure your sender domain](./introduction-sender-domains).
Don't worry about click- and tracking domains or DMARC deployment for now. 
Then you [incorporate your DNS settings](./rest-dns) and use your verification code. 
After these steps you are ready to send mail with SMTPeter.

## REST vs SMTP

SMTPeter lets you send email via the [REST](./rest-api)- and [SMTP](./smtp-api) API. We highly suggest that, if you have the 
option to choose, you use the REST API. This API gives you more options, freedom and is more 
user-friendly overall. On top of that, the REST API is much quicker, because no complex and timeconsuming
*SMTP handshake* is required. You can [configure the REST API](./introduction-rest-api) 
by obtaining an access token. You can [configure the SMTP API](./introduction-smtp-api) 
by creating login credentials.

That's everything! SMTPeter is now ready to be utilized. 
Read more about what SMTPeter has to offer:

## More information

- [REST API](rest-api)
- [SMTP API](smtp-api)
- [Sender Domains](sender-domains)
- [DNS settings](rest-dns)
