# Management Console: DKIM keys and ARC signing

MailerQ supports DKIM (Domain Key Identified Mail) and ARC (Authenticated Received Chain), methods for email 
authentication. Internally, MailerQ stores a list of private keys that
are used for signing email messages. All messages that flow through
MailerQ are matched with these keys, and get signed.

The list of DKIM keys can be managed via the management console, or you
can access the database directly to insert or update the private keys. 
Each of these keys can be used for DKIM and/or ARC signing.


## Adding DKIM keys using the management console

To add a new DKIM key in the management console, simply go to the DKIM keys 
page and press the link to add a new DKIM key. Here you will see a 
form to enter the domain name, selector and private key.

The domain name and selector define the DNS record where the public key 
for the DKIM should be published. If you install a key for domain "example.com" 
using selector "myselector", all email receivers expect the public key for your 
domain to be found in the DNS record with the name "myselector._domainkey.example.com".
In the "DNS record" section at the bottom of the page you can find an auto-generated
DNS entry for this DKIM key in most common formats.

Be aware that it is your task to make sure that this DNS record exists, and 
that it holds the public key that matches the private key installed in MailerQ.
To prevent MailerQ from signing messages with such a key, you can check the option
"Only use this key if it matches the public key found in DNS".

The "privatekey" field holds your private key, and is needed by MailerQ to 
sign the mails. The keys are called "private" for a very good reason:
you should keep them private to yourself, and never share them with anyone else.
If you use the management console for editing private keys, we therefore highly
recommend to use HTTPS for the management console, otherwise man-in-the-middles
could capture your private keys.

MailerQ will include any headers specified in the "Additional headers" field in the 
DKIM signature. Any changes in one of these headers will invalidate the DKIM signature,
so it is wise to be somewhat conservative in the specification of additional headers.

Finally, it is possible to specify an expiration date and a key priority.
The expiration date is part of the DKIM specification and can be used to indicate
how long you will be using the key. The key priority is a feature of MailerQ which
allows you to specify the order in which DKIM signatures appear in the MIME body of a message.
Some receiving servers only read the first few DKIM signatures in a message if they want to 
determine the validity of a message, which means it can be useful to add your most important keys
first.
Note that a *lower* priority means that the DKIM signature appears *first* in the MIME body
and that the default priority is 0. If you want to make sure that a DKIM key appears on top
you should therefore set it to a large negative number.

## ARC signatures

Although the ARC standard is still in development, MailerQ can already sign messages with broken DKIM signatures with the necessary ARC headers.
Behind the scenes the ARC specification is rather complicated, but borrows a lot of ideas from DKIM.
It is therefore enough to simply set the "Signature type" of a DKIM key to "ARC" (or "Both" if you also want to add a DKIM signature)
and MailerQ will decide when and how to add an ARC signature to your message.
If you want to test the ARC algorithm first, you can visit our [ARC test page](http://arc.copernica.com).

## Failure reporting

Although MailerQ has a powerful DKIM backend, the DKIM standards are quite complicated and signature
verification may fail on a remote server for a variety of reasons.
To get notified about these sorts of failures you may ask the target server to send failure reports for DKIM signatures that are not verifying properly. For DKIM keys specified in the management console this is done by ticking the corresponding box.

Note that checking this box will only indicate to the remote server that you want to receive the reports.
To specify on which address and how often you want to receive the reports, you should update your DNS records with the appropriate properties defined in [RFC 6651](https://tools.ietf.org/html/rfc6651).

## DKIM signing patterns

Storing private keys in MailerQ is not enough to have your emails signed.
You must also install signing patterns to tell MailerQ what emails must 
be signed with your key. If a "from" address matches one of these patterns, 
the associated private key is used to sign the mail.

To install a pattern, simply open a DKIM key in the management console,
and press the button to add a sign pattern. Each pattern can use one of 
the following patterns:

* Exact match
* Regular expression
* Wildcard
* Substring
* Global

You just have to enter the domain name for a match. Most patterns speak
for themselves: for an "exact match" the entered domain name must be
identical to the domain of the "from" address, and for a substring match,
the entered pattern only has to appear somewhere in the domain of that
"from address".

Regular expressions and wildcards can be used for a little more flexibility.
A wildcard match uses regular shell-style wildcards like "?" and "*" to
match (sequence of) characters, while a regular expression is, well, a 
regular expression.

A global pattern will sign ALL emails with the DKIM, no matter what from 
address is used. A global pattern is basically the same as using the "*" wildcard.


## Adding DKIM keys to the message JSON

It is also possible to add DKIM keys to your email using the message JSON. 
It works just like all other [message properties](json-messages). 
A JSON message holding a DKIM key will look something like this: 

````json
{
    "recipient": "info@example.org",
    "mime": "...",
    "dkim": {
        "selector": "your selector, e.g. 'dkim'",
        "domain"  : "the domain that holds the DKIM key, e.g. example.com",
        "key"     : "your private key",
        "expire"  : "2017-01-01 00:00:00",
        "priority": 5
        "protocols" : ["dkim", "arc"]
    }
}

````

When adding a DKIM key directly to the email message JSON you need to include the 
"selector", "domain" and "key" settings. MailerQ will sign the message with 
the key. 


## Sign a single message with multiple keys

MailerQ allows you to sign a single message with multiple DKIM keys. 
This can be used for ESP feedback loops, such as [Google.com's FBL](https://support.google.com/mail/answer/6254652?hl=en). 
These feedback loops allow you as sender to detect abuse of your services. 

To install multiple DKIM keys in the JSON, you can assign an array of keys
in the JSON data. A JSON message with mulitple DKIM keys will look something like this: 

````json
{
    "recipient": "info@example.org",
    "mime": "...",
    "dkim": [ 
        {
            "selector" : "dkim",
            "domain"   : "example.com", 
            "key"      : "key",
            "expire"   : "2017-01-01 00:00:00"
            "priority" : -2
        }, {
            "selector" : "dkim",
            "domain"   : "example.com", 
            "key"      : "other_key"
            "priority" : 10
        } 
    ]
}
````
