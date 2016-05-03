# DKIM signatures

Almost every email message has a "from" address. This is the email
address from which the email _appears_ to come from, and that is displayed
above the message body in the user agent. If you hit the reply button,
this is also the address to which the reply is going to be sent (unless
the mail also contains a "reply-to" header).

We intentionally write that it is the address from which the "_appears_" 
to come from. If you send mail, you can use every possible email address 
as the from address, even addresses that do not even belong to you. This
freedom can be used for harmless practical jokes ("see, you just got an email
from the president"), but can also be abused. As a domain owner, you
do not want others to send emails using your domain name!

DKIM can be used to prevent this. It allows receiving parties to verify 
whether an email was indeed sent by you and that the content of the email 
(including the attachments) was not modified during transport.

This signing technology is based on the mechanism of related private and
public keys. As a domain owner, you are the only one who possesses the 
private key and you are the only one who can sign emails. Your public key 
is published in a DNS record of your domain, so that everyone can _check_ 
whether a signature really came from you. This technology ensures that mails 
can only be signed by you, and that they can be verified by
everyone else (because everyone has access to the public key to check
the signatures). This makes it impossible for spammers, fishers, or anyone
else to use your domain as from address and sign mails out of your name, 
simply because they do not have access to your private key.


## Generating DKIM keys

You can let SMTPeter sign your mails for you. If SMTPeter knows your private
key, it can add a valid DKIM signature to every mail that is sent through 
SMTPeter. It is in general a good idea to leave the signing of your emails
to SMTPeter, because SMTPeter normally also modifies your email (for example
to [track clicks and opens](statistics), or to [inlinize CSS code](inline-css))
and this invalidates signatures that were added before.
 
The SMTPeter dashboard allows you to set up sender domains. A sender domain
is a domain from which you intend to send email. When you set up such
a sender domain, SMTPeter automatically creates a private DKIM key for
this domain too, and a DNS record that you can copy to your DNS server 
configuration, or that you can give to your provider. SMTPeter automatically 
queries your public DKIM record to find out whether you have indeed copied 
the public key to DNS.

Do you already have private and public key pairs, and do you now want
SMTPeter to use these? No problem, you can use the dashboard to install
existing private keys too.


## Signing of messages

SMTPeter will automatically sign sent mails that have a from address that
is identical to one of your set up sender domains. You should of course
not be sending out mails with different from addresses than your sender domains.
However, if you happen to send out mails with a different from address
SMTPeter will see if it can use one of your sender domain keys and still
fulfill the DMARC requirements, this is possible if the from address uses
relaxed DKIM alignment in its DMARC configuration.
It is also possible to let SMTPeter know that it should always add a signature
of a certain key, even if the from address of the sent mail is different.


## Automatic DKIM keys rotation

The private keys are stored on the SMTPeter servers and are never exposed.
The technology behind the public and private keys is very secure, yet, if
someone spends a lot of time on it, keys can be broken. Therefore, you
do want to use new keys every now and then. If you use SMTPeter's standard
suggestions, you will get this behavior automatically. If you want to use
SMTPeter with your own generated keys, updating the keys is left to you.

