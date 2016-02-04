# DKIM signing

Do you know [DKIM](http://www.dkim.org/ "DKIM website"), the technology for signing 
emails so that receiver can know for sure that the mails were sent by you? MailerQ has 
several options to sign your emails. 

To sign your emails using DKIM with MailerQ, you can either store your DKIM keys in
MailerQ's database (with a direct query or by using the management console to store them),
or you can add the keys to the JSON encoded messages. In this article we will explain 
how the management console works, and how you can add the keys to the JSON, if you want 
to find out how you can insert DKIM keys directly into MailerQ's database check our 
[database access documentation](database-access).

## Adding DKIM keys using the management console

To add a new DKIM key in the [management console](management-console), 
simply go the DKIM keys tab in the interface and press add new DKIM key. Here you will see a 
form with the following options: 

* domain
* selector
* privatekey

The domain name and selector define the DNS record where the public key for the DKIM
can be found. If you install a key for domain `example.com` using selector `dkim`,
all receiving parties expect the public key for your domain to be found in the DNS
TXT record with the name `dkim._domainkey.example.com`. Be aware that it is up to you
to make sure that this DNS record exists, and that it holds a public key that
matches the private key that you install in MailerQ.

The `privatekey` field of course holds your actual private key, and is needed by
MailerQ to sign the mails. The keys are called "private" for a very good reason:
you should keep them private to yourself, and never share them with someone else.
If you use the management console for editing private keys, we therefore highly
recommend to use HTTPS for the management console, otherwise man-in-the-middles
could capture your private keys.

## DKIM signing patterns

Normally MailerQ checks the `from` domain of an email and uses the DKIM keys 
that match that domain. However, it is also possible to associate matching patterns 
with the DKIM keys to use them for signing messages that come from different domains.

To install a pattern, simply click on a specific DKIM key in the management console,
and press the button to add a sign pattern. Each pattern can use one of the following
signing patterns:

* **Exact match**: the input must be an exact match;
* **Regular expression**: the input is treated as a ECMA regular expression; 
* **Substring**: the input must be a substring of the answer from the server: `'bar'` will match `'foobar'`; <!-- TODO are quotes around bar and foobar necessary? -->
* **Global**: will be used for all emails sent using MailerQ; 
* **Wildcard**: you can use wildcards just like the shell patterns for file matching.
For example:
    - Asterisk (`*`) matches everything: `*@mailerq.com` will match `foo@mailerq.com`, `bar@mailerq.com`, etc.;
    - Question mark (`?`) matches a single character: `mailerq.??` will match `mailerq.nl` and `mailerq.de` but not `mailerq.com`;
    - Brackets (`[]`) matches any character within the brackets: `[abc]` will match `a`, `b`, or `c` and `[!abc]` will match anything that isn't.

A global pattern will sign ALL emails with the DKIM, meaning that if you have a specific 
DKIM for `mailerq.com` and a global DKIM as well, emails sent from the `mailerq.com` domain will 
be signed with the `mailerq.com` DKIM as well as the `copernica.com` DKIM. Using a global pattern
is basically the same as using the `*` wildcard.

## Adding DKIM keys to the message JSON

It is also possible to add DKIM keys to your email using the message JSON. It works just 
like all other [message properties](http://www.mailerq.io/documentation/delivery-properties). 
A JSON message holding a DKIM key will look something like this: 

````json
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "From: my-sender-address@my-domain.com\r\n
             To: info@example.org\r\n
             Subject:Example subject\r\n\r\n
             This is the example message text"
    "dkim": {
        "selector": "your selector, e.g. 'dkim'",
        "domain"  : "the domain that holds the DKIM key, e.g. example.com",  
        "key"     : "your private key" 

    }
}

````

When adding a DKIM key directly to the email message JSON you need to include the 
`selector`, `domain` and `key` strings to the `dkim` object. MailerQ will then sign 
the message with the key present on the domain. This DKIM key does not have to be 
set in the managemetn console. 

## Sign a single message with multiple keys

Since version 3.0, MailerQ allows you to sign a single message with multiple DKIM keys. 
This can be used for ESP feedback loops, such as [Google.com's FBL](https://support.google.com/mail/answer/6254652?hl=en). 
These feedback loops allow you as sender to detect abuse of your services. 
There are multiple ways to set up 'multi-signed' emails.  

To install multiple DKIM keys in the JSON, you can assign an array of keys
in the JSON data. A JSON message with mulitple DKIM keys will look something like this: 

````json
{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "From: my-sender-address@my-domain.com\r\n
             To: info@example.org\r\n
             Subject:Example subject\r\n\r\n
             This is the example message text"
    "dkim": [ {
        "selector" : "dkim",
        "domain"   : "example.com", 
        "key"      : "key"
    }, {
        "selector" : "dkim",
        "domain"   : "example.com", 
        "key"      : "key"
    } ]
}

````
