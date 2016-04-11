# REST DKIM API

SMTPeter gives you the possibility to sign your mails using DKIM. To get
information about the keys that are used for signing you emails you can
use the following methods:

```txt
(1) https://www.smtpeter.com/v1/dkimkeys/NAME?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dkimkeys/ID?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/dkimkey/ID?access_token=YOUR_API_TOKEN
(4) https://www.smtpeter.com/v1/dkimkey/SELECTOR/DOMAIN?access_token=YOUR_API_TOKEN
```

## Obtaining DKIM keys for a sender domain

If you want to obtain information about the DKIM keys of one of your sender
domains you do a GET call to:
```txt
(1) https://www.smtpeter.com/v1/dkimkeys/NAME?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dkimkeys/ID?access_token=YOUR_API_TOKEN
```
where "NAME" and "ID" are the name and id of the sender domain for which you want to obtain
the information.

You will receive an array with JSON objects of the following form:
```json
{
    "id":       1,
    "selector": "dkimselector",
    "created":  "2016-01-01 13:55:22",
    "algorithm": "sha256",
    "public":    "-----BEGIN PUBLIC KEY-----\n...\n-----END PUBLIC KEY-----",
    "private":   "-----BEGIN PRIVATE KEY-----\n...\n-----END PRIVATE KEY-----",
}
```
where "id" is the dkim key id. The "selector" property is the selector used
for this key. The "created" property holds the time stamp when the keys were created
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


