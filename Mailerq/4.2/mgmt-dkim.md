# Management Console: DKIM keys

MailerQ supports DKIM (Domain Key Identified Mail) and ARC (Authenticated Received Chain), methods for email 
authentication. Internally, MailerQ stores a list of private keys that
are used for signing email messages. All messages that flow through
MailerQ are matched with these keys, and get signed.

The list of DKIM keys can be managed via the management console, or you
can access the database directly to insert or update these private keys. 
Each of these keys can be used for DKIM and/or ARC signing.


## Adding DKIM keys using the management console

To add a new DKIM key in the management console, simply go the DKIM keys 
page and press the link to add a new DKIM key. Here you will see a 
form to enter the domain name, selector and private key.

The domain name and selector define the DNS record where the public key 
for the DKIM should be published. If you install a key for domain "example.com" 
using selector "myselector", all email receivers expect the public key for your 
domain to be found in the DNS TXT record with the name "myselector._domainkey.example.com". 
Be aware that it is your task to make sure that this DNS record exists, and 
that it holds the public key that matches the private key installed in MailerQ.
To prevent that you accidentally send out signed emails while you do not have
published the public key in DNS, MailerQ checks your DNS records and refuses
to sign messages without a valid DNS configuration.

The "privatekey" field holds your private key, and is needed by MailerQ to 
sign the mails. The keys are called "private" for a very good reason:
you should keep them private to yourself, and never share them with anyone else.
If you use the management console for editing private keys, we therefore highly
recommend to use HTTPS for the management console, otherwise man-in-the-middles
could capture your private keys.


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
        }, {
            "selector" : "dkim",
            "domain"   : "example.com", 
            "key"      : "key"
        } 
    ]
}
````
