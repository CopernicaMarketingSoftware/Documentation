# Sender domains

SMTPeter uses the concept of "Sender Domains" to simplify email. This
allows you to send your email through our servers without having to worry 
about complicated things like SPF, DKIM and DMARC. You focus 
on your business, while we take care of your messages.

But what exactly do we mean with a sender domain? It works pretty neat: 
you open the SMTPeter dashboard to specify from which domains you 
intend to send email, and we tell you how you should configure your DNS. 

For example, if you want to send out emails using addresses that end with 
"@yourdomain.com" or with "@yourotherdomain.org", you simply use the 
dashboard to set up two sender domains: "yourdomain.com" and 
"yourotherdomain.org". After you've set up these sender domains, SMTPeter 
gives you a list of recommended DNS records. You copy these records 
to your DNS server (or give them to your DNS provider) and that's basically 
all there is to it: after you've followed our recommendations you can use 
SMTPeter to send email.


## A little more details

Lets be honest here. Sending email is getting more and more complicated. 
There are a lot of things to care about: you have to set up SPF records in 
your DNS in which you list all IP addresses from which you send out email, 
you need rotating public/private key pairs for DKIM signatures, and you 
also want to set up DMARC records in your DNS so that the world knows that 
you are the only one who uses your domain to send mail.

With "sender domains" SMTPeter takes all these responsibilities out of your 
hands. We create your SPF, DKIM and DMARC records and store them 
on _our_ DNS servers. All that you have to do is create a couple of records 
in _your_ DNS server (or ask/instruct your DNS provider to do so) that point 
to our records. If we make a change to the DNS (for example, because we rotate 
one of your private DKIM keys), it gets automatically propagated over the 
internet, because your DNS records just point to our records.

In our DNS (using *.smtpeter.com subdomains) we set up the following records:

- [SPF records](spf-validation) that list all IP addresses from which you send email
- [DKIM keys](dkim-signing) with your public keys that we rotate once a month
- [DMARC records](dmarc-deployment) with your DMARC policies

We ask you to set up CNAME records and other aliases in your DNS to refer
to these records. 


## The "from" address

For each sender domain we host the public DKIM keys in our DNS. We also
have a copy of the private key so that we can add a DKIM signature to
each mail that flows through the SMTPeter servers.

To decide which keys to use, we extract the "from" address from all
emails that we process. Only the emails for which you've set up a  
sender domain are signed.

