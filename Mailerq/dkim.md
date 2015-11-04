# DKIM signing

MailerQ has several options to sign your emails with [DKIM](http://www.dkim.org/ "DKIM website"). 
DKIM is a form of email authentication, which validates the domain name associated with 
an email message. 

To sign your emails using DKIM with MailerQ you can either set DKIM 
keys in the management console, add them to the message JSON or directly insert them 
into the database. In this article we will explain the first two options, adding 
dkim keys directly into MailerQ's database is explained in our [database access documentation](copernica-docs:Mailerq/database-access)


## Adding DKIM keys in the management console

To add a new DKIM key in the [management console](copernica-docs:Mailerq/management-console), 
simply go the DKIM keys tab in the interface and press add new DKIM key. Here you will see a menu with the 
following options: 

```
domain
```
The domain that holds the DKIM key. By default MailerQ checks the hostname to sign 
its e-mails with DKIM. All e-mails sent from this domain will automatically be signed 
by MailerQ. 


```
selector
```
The subdomain where you store your DKIM key, for example: **selector** should 
match **selector**.\_domainkey.yourdomain.com in the TXT record in your DNS. 


```
Private key
```
The private key of your DKIM signature. 


### DKIM signing patterns

Normally MailerQ checks the 'from' domain of an email and use the DKIM key 
set in MailerQ for that domain. However, it is also possible to set a 
specific pattern to use the DKIM for different domains. These patterns can be set 
using the MailerQ management console. 

After adding the DKIM key to MailerQ you can go to the DKIM you want to add 
a pattern to. At the bottom of the page you will finde the 'add new pattern' option, 
here you can specify the pattern you want to use. It has the following options: 

**Exact match**: The input must be an exact match  
**Regular expression**: The input is treated as a ECMA regular expression  
**Wildcard**: In the input wildcards can be used similar to the ones used for file matching in the shell:

For example:
* Asterisk (*) matches everything: *.mailerq.com will match mail.mailerq.com, response.mailerq.com, but not mailerq.com
* Question mark (?) matches a single character: mailerq.?? will match mailerq.nl, mailerq.de but not mailerq.com.
* Brackets ([]) matches any character within the brackets: [abc] will match a, b, or c and [!abc] won't.

**Substring**: The input must be a substring of the answer from the server: 'bar' will match 'foobar'

**Global**: Will be used for all emails sent using MailerQ. 


A global pattern will sign ALL emails with the DKIM, meaning that if you have a specific 
DKIM for mailerq.com and a global DKIM as well, emails sent from the mailerq.com domain will 
be signed with the mailerq.com DKIM as well as the copernica.com DKIM. 



## Adding DKIM keys to the message JSON

It is also possible to add DKIM keys to your email using the message JSON. It works just 
like all other [message properties](http://www.mailerq.io/documentation/delivery-properties). 
A JSON message holding a DKIM key will look something like this: 


````
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

Since version 3.0 MailerQ allows you to sign a single message with multiple DKIM keys. 
This can be used for ESP feedback loops, such as [Google.com's FBL](https://support.google.com/mail/answer/6254652?hl=en). 
These feedback loops allow you as sender to detect abuse of your services. 
There are multiple ways to set up 'multi-signed' emails.  


### In the message JSON

The first way is to set multiple keys in the message JSON. By setting up an array 
of your keys, MailerQ will sign the email with all the keys within this array. A 
JSON message with mulitple DKIM keys will look something like this: 


````
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

        },
        {
            "selector" : "dkim",
            "domain"   : "example.com", 
            "key"      : "key"

        } ]
}

````

The `dkim` array holds each key you want MailerQ to sign the email with. 


### In the management console/database

There are several ways sign an email with multiple DKIM keys using the management console. 
The first one is to set a DKIM for the sender domain as well as a different DKIM with a 
pattern that checks on the same sender domain (see 'DKIM signing patterns' in this article 
on how that works). 

You can also set two patterns that check on the sending domain or set a global DKIM that 
signs all outgoing emails. As long as the email matches multiple DKIM patterns it will be 
signed using those keys. 

**Note that there is no limit on the amount of keys MailerQ signs with, so be careful when 
setting up your patterns**. 




