# DKIM

DomainKeys Identified Mail is, to explain it simply, a technology to add digital 
signatures to emails. A program that receives a signed message can use the
signature to check whether the message was indeed sent by the sender, and that it
was not spoofed or modified in transit. Together with [SPF](./spf.md) and 
[DMARC](./dmarc), DKIM is used to prevent email abuse.

To create digitial signatures, DKIM uses a private and public key pair. The 
private key of this pair is required to sign an email and is only known to 
the sender (thus to us if you send with Copernica). The private key is linked 
to a public key that is published in DNS and accessible to everyone (hence the 
word *public*). This public key is needed to verify signatures. Everyone can 
check whether a signature is valid because everyone has access to the public 
key, but only legitimate senders have access to the private key and can create 
valid signatures.

If you use Copernica's [Sender Domain](./sender-domains.md) tools, you 
automatically use DKIM. When you set up a Sender Domain, the Marketing Suite 
dashboard shows you a list of recommended DNS settings. All you have to do is 
follow these recommendations and create the appropriate DKIM aliases (which are 
CNAME records). All emails that you send with Copernica then 
get signed, and Copernica ensures that your public key is correctly
published in DNS. We also refresh your keys once a month, to make it hard 
for outsiders to crack your keys. 


## Multiple signatures

If you inspect the source code of a message that was sent with Copernica, you'll
discover that we did not add one, but two *dkim-signature* headers. The first
signature is a normal signature, based on your own private key and that refers to 
the public key in your DNS. Receivers use this signature to verify that the 
message was indeed sent out of your name. But besides this first signature the
message also contains a second signature that refers to the copernica.com domain.
Why?

Some inbox providers (especially Gmail) use feedback loops to notify senders. 
These providers periodically send a report to professional 
senders, like Copernica, with a brief summary of the number of messages they accepted,
and the number of messages that were rejected and/or qualified as spam or abuse.
To ensure that these reports only contain information about messages 
sent by Copernica, Gmail requires us to add a second signature to each mail, 
using our own private key, referring to the copernica.com domain. Gmail only 
sends us reports about messages with this second signature, so that onbody ever
gets a report about other people's messages. 

The DKIM protocol is normally used to add signatures that match the from domain.
This allows receivers to check if the email was really sent by the claimed sender. 
But DKIM allows signatures from completely different domains too, which is what 
happens here. Gmail uses both signatures: the normal one to check if the message 
did indeed come from the sender, and the second one to check whether it is ok
to send a report back to Copernica. 


## Managing DKIM keys with Copernica Publisher

Before we introduced sender domains, Copernica users had to manage their own
DKIM keys. Users had to manually store (copy-paste) the public keys in DNS, 
and they had to rotate their keys once in a while. The new sender domain
technology makes this manual editing obsolute: it all happens automatically.

However, in the old Publisher environment you can still find some leftover forms
and dialog windows to manage DKIM keys. These forms are still used by users
that have not you set up a sender domain. If you're using sender domains (which
we stronly recommend) you can safely ignore these forms. With sender domains all
your messages are automatically signed, and it is safe to keep the list of DKIM
keys in the DKIM dialog empty.

[Back to sender domains](./sender-domains)
