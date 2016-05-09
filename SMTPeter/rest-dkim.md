# REST API for custom DKIM keys

**Important!** In normal circumstances, you do not have to install custom DKIM
keys. If you just [set up a sender domain](rest-sender-domains) and implement 
the [recommended DNS settings](rest-dns), all your email messages will
automatically be sent with valid DKIM signatures.

However, if you want to add additional custom DKIM signatures to your email, 
you can upload your own custom private keys to SMTPeter. The following POST 
API calls is available to install a custom DKIM key.

````txt
https://www.smtpeter.com/v1/dkimkey/yourdomain.com/selector?access_token=YOUR_API_TOKEN
````

To retrieve all available custom DKIM keys, use one of the following methods:

````txt
https://www.smtpeter.com/v1/dkimkeys?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dkimkeys/yourdomain.com?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dkimkeys/yourdomain.com/selector?access_token=YOUR_API_TOKEN
````


## Installing custom DKIM keys

To install a new custom DKIM key, you can use the following POST call. This
call can also be used to update an existing key.

```txt
POST /v1/dkimkey/yourdomain.com/selector?access_token=YOUR_API_TOKEN HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length:

{
    "privatekey":   "KDJ2I5EUjm5hnsd...KdiekID8",
    "always":       true,
    "start":        "2016-05-01 00:00:00",
    "end":          "2016-06-01 00:00:00"
}
```

The domain name and selector are listed in the URL. It is your responsibility
to set up a matching "selector._domainkey.yourdomain.com" DNS record for
the added key.

The "privatekey" property provides a private SHA256 base64 encoded
key. This property is optional, if you do not specify a private key, 
SMTPeter will generate one for you.

All other properties are optional too. The "always" property can be used
to specify whether you want this key to be used for _all_ mails that flow
through SMTPeter, or just for the emails that have a matching "from" domain.
The "start" and "end" properties hold the timestamps when the key should
be used.


## Retrieving custom keys

To retrieve the list of custom DKIM keys, you can use one of the following
HTTP GET methods:

````txt
https://www.smtpeter.com/v1/dkimkeys?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dkimkeys/yourdomain.com?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dkimkeys/yourdomain.com/selector?access_token=YOUR_API_TOKEN
````

These methods return respectively _all_ keys, or just the keys for a specific
domain and selector. The output of all these methods is the same: a JSON
array holding DKIM keys:

```json
[
    {
        "domain":       "example.com",
        "selector":     "zero",
        "hostname":     "zero._domainkey.example.com",
        "always":       false,
        "created":      "2016-01-01 13:55:22",
        "start":        "2016-05-01 00:00:00"
        "end":          "2016-06-01 00:00:00"
        "algorithm":    "sha256"
        "public":       "-----BEGIN PUBLIC KEY-----\n...\n-----END PUBLIC KEY-----",
        "private":      "-----BEGIN PRIVATE KEY-----\n...\n-----END PRIVATE KEY-----",
    },
    {
        "domain":       "example.com",
        "selector":     "myselector",
        "hostname":     "myselector._domainkey.example.com",
        "always":       true,
        "created":      "2016-01-01 13:55:22",
        "start":        "2016-01-01 13:55:22",
        "end":          "2016-04-01 00:00:00",
        "algorithm":    "sha256",
        "public":       "-----BEGIN PUBLIC KEY-----\n...\n-----END PUBLIC KEY-----",
        "private":      "-----BEGIN PRIVATE KEY-----\n...\n-----END PRIVATE KEY-----",
    }
]
```


## Deleting a specific DKIM key

If you want to delete a specific DKIM key you can make a DELETE call.

```txt
https://www.smtpeter.com/v1/dkimkey/yourdomain.com/selector?access_token=YOUR_API_TOKEN
```

A DELETE call removes the key from our servers. After the call the key can
no longer be used for signing emails.


