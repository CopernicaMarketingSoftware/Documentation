# REST DKIM API

SMTPeter gives you the possibility to sign your mails using DKIM. To get
information about the keys that are used for signing you emails, adding,
or deleting keys you can use the following methods:

```txt
(1) https://www.smtpeter.com/v1/dkimkeys?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dkimkeys/NAME?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/dkimkeys/ID?access_token=YOUR_API_TOKEN
(4) https://www.smtpeter.com/v1/dkimkey/ID?access_token=YOUR_API_TOKEN
(5) https://www.smtpeter.com/v1/dkimkey/SELECTOR/DOMAIN?access_token=YOUR_API_TOKEN
```


## Obtaining DKIM keys

If you want to obtain information about the DKIM keys that match one of
your sender domains you do a GET call to:
```txt
(1) https://www.smtpeter.com/v1/dkimkeys?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dkimkeys/NAME?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/dkimkeys/ID?access_token=YOUR_API_TOKEN
```
where "NAME" and "ID" are the name and id of the sender domain for which you want to obtain
the information. If you don't specify a name or ID you will receive
all know DKIM keys for your account.

From those calls you receive an array with JSON objects of the following form:
```json
[
    {
        "domain":   "example.com",
        "id":       1,
        "selector": "dkimselector",
        "always":   "true|false",
        "created":  "2016-01-01 13:55:22",
        "algorithm": "sha256",
        "public":    "-----BEGIN PUBLIC KEY-----\n...\n-----END PUBLIC KEY-----",
        "private":   "-----BEGIN PRIVATE KEY-----\n...\n-----END PRIVATE KEY-----",
    },
    ...
]
```
where "domain is the domain that is used by the the dkim key and "id" is
the dkim key id. The "selector" property is the selector used for this key.
The "always" property indicates that all sent mails via SMTPeter will be
signed with this key, regardless if the domain matches with the sender domain.
The "created" property holds the time stamp when the keys were created
(formatted in YYYY-MM-DD hh:mm:ss). Property "algorithm" holds the encryption
algorithm used (sha1 or sha256). Properties "public" and "private" hold the
public and private keys respectively.


## Obtaining a specific DKIM key

If you want to obtain a specific DKIM key you can make a GET call to:

```txt
(1) https://www.smtpeter.com/v1/dkimkey/ID?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dkimkey/SELECTOR/DOMAIN?access_token=YOUR_API_TOKEN
```
where "ID" is the dkim key id and "SELECTOR" and "DOMAIN" are the selector
and domain name respectively. You will receive the JSON object, identical
to the one discussed above, with the information about the requested DKIM
key.


## Deleting a specific DKIM key

If you want to delete a specific DKIM key you can make a DELETE call to:

```txt 
(1) https://www.smtpeter.com/v1/dkimkey/ID?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dkimkey/SELECTOR/DOMAIN?access_token=YOUR_API_TOKEN
```

where "ID" is the dkim key id and "SELECTOR" and "DOMAIN" are the selector
and domain name respectively. A DELETE call will delete the keys from our
servers. Emails that have sender domains that would have matched with a deleted
key will no longer be signed.


## Adding a DKIM key

When you create a [sender domain](rest-sender-domains) a DKIM key will be
automatically generated for you. Yet, you can also add DKIM keys to your
account manually. You can do this by a POST call of the form:

```txt
POST /v1/dkimkey?access_token=YOUR_API_TOKEN HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length:

{
    "domain":       "example.com",
    "selector":     "selector",
    "privatekey":   "KDJ2I5EUjm5hnsd...KdiekID8",
    "always":       "true|false"
}
```
where: "domain" holds the domain name for which you want to use the key
-generally this is identical to one of your sender domains- and "selector" holds
the selector of the key. The "domain and "selector" properties are mandatory.
With "privatekye" you can optionally provide a private SHA256 base64 encoded
key with which you want to sign the mails. If you do not specify a privatekey,
SMTPeter will generate one for you. With the "always" property you can optionally indicate
that the key should always be used to sign emails, even if the sender
domain from the from-address does not match the "domain" property of the
key. Note that if you set the always option to "true" your emails are also still signed
with a matching sender domain key. Moreover, it is possible to have multiple
keys with the always option set.
