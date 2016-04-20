# REST DKIM API

SMTPeter gives you the possibility to sign your mails using DKIM. For
this to work, SMTPeter needs access to your private DKIM keys. The
REST API can be used to query and update the list of DKIM keys that
SMTPeter has.

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

"NAME" and "ID" are the name and id of the sender domain for which you want
to obtain the DKIM keys. If you don't specify a name or ID you will receive
all know DKIM keys for your account.

From those calls you receive an array with JSON objects of the following form:
```json
[
    {
        "id":           1,
        "domain":       "example.com",
        "selector":     "myselector",
        "hostname":     "myselector._domainkey.example.com",
        "always":       true|false,
        "created":      "2016-01-01 13:55:22",
        "start":        "2016-01-01 13:55:22",
        "end":          "2016-04-01 00:00:00",
        "algorithm":    "sha256",
        "public":       "-----BEGIN PUBLIC KEY-----\n...\n-----END PUBLIC KEY-----",
        "private":      "-----BEGIN PRIVATE KEY-----\n...\n-----END PRIVATE KEY-----",
    },
    ...
]
```

The property "id" holds the unique identifier for the DKIM key, and
"domain" and "selector" the selector and hostname for the DKIM record.
The "hostname" property is available too, and holds the DNS name under
which the record must be published.

By default, DKIM keys are only used to sign emails that have a matching
"from" address: the domain name of the from address must be identical to
the domain name of the DKIM key. However, if the "always" property is
set to true, the DKIM key will be used to sign all your messages, even
when the domains do not match.

To allow key rotation, all DKIM keys have a start and end date. Emails
are only signed using active keys. The "start" and "end" date hold the
timestamps in between which the key is active. The "created" property
holds the time stamp when the keys were created in the database.

Property "algorithm" holds the encryption algorithm used (sha1 or sha256),
and the properties "public" and "private" hold the public and private keys.


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

You can add DKIM keys to your account by a POST call of the form:

```txt
POST /v1/dkimkey?access_token=YOUR_API_TOKEN HTTP/1.0
Host: www.smtpeter.com
Content-Type: application/json
Content-Length:

{
    "domain":       "example.com",
    "selector":     "selector",
    "privatekey":   "KDJ2I5EUjm5hnsd...KdiekID8",
    "always":       true|false,
    "start":        "2016-05-01 00:00:00",
    "end":          "2016-06-01 00:00:00"
}
```

"domain" holds the domain name for which you want to create a key (this is
generally identical to one of your sender domains) and "selector" holds
the selector of the key. The "domain and "selector" properties are mandatory.

With "privatekey" you can optionally provide a private SHA256 base64 encoded
key with which you want to sign the mails. If you do not specify a privatekey,
SMTPeter will generate one for you. With the "always" property you can optionally indicate
that the key should always be used to sign emails, even if the sender
domain from the from-address does not match the "domain" property of the
key. Note that if you set the always option to "true" your emails are also still signed
with a matching sender domain key. Moreover, it is possible to have multiple
keys with the always option set.


## Updating DKIM keys

The above method can also be used to update existing records. If there already
is a DKIM key with the same domain and selector, the settings of that key
are updated.
