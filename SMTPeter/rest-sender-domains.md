# Sender domains

All email that flows through SMTPeter is processed based on the sender
domain settings stored in SMTPeter. When SMTPeter processes an email 
message, it extracts the hostname from the "from" address, and looks
up the domain settings to decide how to handle the message.

You can create a different configuration for each domain that you use in 
the "from" header of your mail. Besides the dashboard to do this manually,
you can use the REST API for this too. The following methods
are available:

````text
(1) https://www.smtpeter.com/v1/domains?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/domain/NAME?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/domain/ID?access_token=YOUR_API_TOKEN
````

## Obtain sender domain information

If you want to get a list of all domains for which SMTPeter has configuration
settings, use the following API GET call:

```txt
https://www.smtpeter.com/v1/domains?access_token=YOUR_API_TOKEN
```

You will receive an array with JSON objects holding the following information:

```JSON
[
    {
        'name':        "yoursenderdomain.com",
        'id':          123,
        'bounces':     "bounces.yoursenderdomain.com",
        'tracking':    "tracking.yoursenderdomain.com",
        'ips':         ["1.2.3.4", "2.3.4.5"]
    }, 
    {
        'name':        "example.com",
        'id':          124,
        'bounces':     "bounces.example.com",
        'tracking':    "tracking.example.com",
        'ips':         ["1.2.3.4", "2.3.4.5"]
    
    }
]
```

In this JSON, the "name" property holds the name of your sender domain and the
"id" holds the id of the domain. The "bounces" and  "tracking"
properties hold the names of the bounces and tracking domains for the
sender domain. The "ips" property holds a vector with the ip addresses
used for the sender domain. Where the ip addresses are listed as strings.

If you want to have the information for one domain only you can make a GET
call to:

```txt
(1) https://www.smtpeter.com/v1/domain/NAME?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/domain/ID?access_token=YOUR_API_TOKEN
```
where "NAME" and "ID are the name and the "ID" of the account you for
which you want the information. The information you receive is identical
to the JSON discussed above.


## Creating or updating a sender domain

To create or update a sender domain via the REST API you do a POST call
of the form:

```text
POST /v1/domain?access_token={YOUR_API_TOKEN} HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length: 

{
    "name":         "example.com",
    "bounces":      "bounces.example.com",
    "tracking":     "clicks.example.com"
    "selector":     "dkim_selector",
    "privatekey":   "KJLDIVWEkjsadfjlie...KDIFEIji=="
}
```
The "name" property is mandatory and should contain the sender domain name
that you want to create or update. The "bounces" and "tracking" properties are optional.
With these properties you can set the domain that handles the bounces that
your mails generate or that domain that handles your tracking. If you do
not set these properties while creating the sender domain, the domains
are set to the name of the sender domain and "clicks.smtpeter.com" respectively.
If the sender domain already exists and you do not specify the "bounces", 
or "tracking" property, they will be untouched and preserve the old value.

The "selector" and "privatekey" properties are also optional. With these
properties you can control the [DKIM signing](dkim-signing) of the domain.
With the property "selector" you can set your own selector that is used
for the DKIM key. If you do not specify this property SMTPeter will use
"dkim". With the "privatekey" property you can set the key with which
SMTPeter has to sign the mails for the sender domain. This private key
has to be SHA256 base64 encoded key. If you don't set this property SMTPeter
will generate a key for you. Note that you can only set a private key if
you also provide a selector.


## Deleting a sender domain

To delete a sender domain you do a DELETE call to
```txt
https://www.smtpeter.com/v1/domain/NAME?access_token=YOUR_API_TOKEN
```
where NAME is the name of the sender domain you want to delete. If you delete
a sender domain, the DKIM keys that share the same name will **not** be deleted.
So, these keys can still be used if you use relaxed DKIM alignment in your
DMARC settings. If you want to delete the DKIM keys for the domain as well
you can use the DELETE call on the [dkim key method](rest-dkim).
