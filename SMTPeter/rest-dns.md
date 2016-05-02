# Obtaining DNS information

If you use SMTPeter to send out your mails and you use SPF, DKIM, and DMARC
to improve your security, you have to adjust your DNS records. You can use
the following REST API methods to get information on how to adjust these
records and the status of the DNS records:

```txt
(1) https://www.smtpeter.com/v1/dns/NAME?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dns/ID?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/dns/NAME/nocname?access_token=YOUR_API_TOKEN
(4) https://www.smtpeter.com/v1/dns/ID/nocname?access_token=YOUR_API_TOKEN
(5) https://www.smtpeter.com/v1/dnsstatus/NAME?access_token=YOUR_API_TOKEN
(6) https://www.smtpeter.com/v1/dnsstatus/ID?access_token=YOUR_API_TOKEN
```

## DNS recommendations

SMTPeter cannot update your DNS records. This is something that you have
to do yourself. However, we can give you a recommendation. The following
methods are useful.

```txt
(1) https://www.smtpeter.com/v1/dns/NAME?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dns/ID?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/dns/NAME/nocname?access_token=YOUR_API_TOKEN
(4) https://www.smtpeter.com/v1/dns/ID/nocname?access_token=YOUR_API_TOKEN
```

where "NAME" and "ID" are the name and the id of the sender domain.
SMTpeter can only give recommendations for domains that you have
configured first (for example with the [sender domain REST API calls](rest-sender-domains).

The calls to the methods (1) and (2) return a JSON of the following form:

```json
[
    {
        "name": "zero._domainkey.example.com",
        "type": "CNAME",
        "value": "dkimX0.smtpeter.com"
    },
    {
        "name": "one._domainkey.example.com",
        "type": "CNAME",
        "value": "dkimX1.smtpeter.com"
    },
    {
        "name": "two._domainkey.example.com",
        "type": "CNAME",
        "value": "dkimX2.smtpeter.com",
    },
    {
        "name": "example.com",
        "type": "MX",
        "value": "0 mail.smtpeter.com
    },
    {
        "name": "clicks.example.com",
        "type": "CNAME",
        "value": "clicks.smtpeter.com
    },
    {
        "name": "example.com",
        "type": "TXT",
        "value": "v=spf1 include:spfX.smtpeter.com -all
    },
    {
        "name": "_dmarc.example.com",
        "type": "CNAME",
        "value": "dmarcX.smtpeter.com"
    }
]

```
The JSON holds an array with JSON objects that have properties "name", "type", and "value.
The "name" property holds the name of the DNS record that needs to be adjusted.
The "type" holds the type of the DNS record (e.g. TXT, MX, CNAME). The "value"
property holds the suggested value. With the suggestions listed above, you
have to update your DNS records only once. Yet, you still have the benefit of
rotating DKIM keys and slow [DMARC deployment](dmarc-deployment). This
guarantees that your mails are always signed with secure keys and your DMARC
settings will not cause rejected mails. This is possible since with the
suggestions listed above, you redirect lookups to DNS records that we control
for you.

We advise you to use the suggestions listed above. However, if you want
to be in full control of the DKIM and DMARC setting but still want to
have some guidance on how the DNS records should look like you can make
calls (3) and (4). These calls are identical to calls (1) and (2)
but have as extra argument the "nocname" flag. After this call you will
receive a JSON object of the following format:

```json
[
    {
        "name": "zero._domainkey.example.com",
        "type": "TXT",
        "value": "v=DKIM1;p=MIICIj...=="
    },
    {
        "name": "one._domainkey.example.com",
        "type": "TXT",
        "value": "v=DKIM1;p=MIICIj...=="
    },
    {
        "name": "two._domainkey.example.com",
        "type": "TXT",
        "value": "v=DKIM1;p=MIICIj...=="
    },
    {
        "name": "example.com",
        "type": "MX",
        "value": "0 mail.smtpeter.com",
    },
    {
        "name": "clicks.example.com",
        "type": "CNAME",
        "value": "clicks.smtpeter.com",
    },
    {
        "name": "example.com",
        "type": "TXT",
        "value": "v=spf1 include:smtpeter.com -all",
    },
    {
        "name": "_dmarc.example.com",
        "type": "TXT",
        "value": "v=DMARC1;pct=100;p=none;rua=mailto:dmarc@smtpeter.com",
    }
]

```
The content of this JSON object is comparable to the previous JSON object.
Yet, as you can see, the records with the names, zero-, one-, and two._domainkey.example.com
and _dmarc.example.com are now "TXT" records instead of "CNAME" records.
So, you are responsible for the settings in these records. The records with
the names, zero-, one-, and two._domainkey.example.com hold the DKIM settings
and keys. There are always three DKIM keys "active" for a sender domain.
One record holds the public key that is currently used for checking email,
one key that will be used next period (so the DNS servers can already store it) and one that was used the previous
period (so late deliveries can still be checked). At the first of each
month the keys will rotate and the record that held the old previous key
will hold the new next key. It is your responsibility to update the key in
this record.

The record with the name _dmarc.example.com hold the DMARC settings. Again,
if you control this information yourself, it is your responsibility to deploy
the DMARC correctly. 


## DNS status

If you want to check the status of your current DNS records you can make GET
calls to:

```txt
(1) https://www.smtpeter.com/v1/dnsstatus/NAME?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dnsstatus/ID?access_token=YOUR_API_TOKEN
```

where "NAME" and "ID" are once again the name and the id of the sender domain.
When you call these methods, SMTPeter will query your DNS records and compare
the settings in it with the recommended settings. If there is anything wrong
with your DNS records, it is reported. The output for these REST calls
typically looks like this:

```json
{
    "dmarc":    "ok",
    "dkim":     "ok",
    "spf":      "ok",
    "mx":       "error",
    "a":        "ok",
    "errors": {
        "mx": "Bounce domain is not pointing to mail.smtpeter.com"
    }
}
```

The properties "dmarc", "dkim" and "spf" give the status of your DMARC,
DKIM and SPF records in DNS. Possible values are "ok" and "error". The
"mx" and "a" records tell you whether you have correctly set up MX and
A records in your DNS that are needed to process bounces and to track
opens and clicks.

If there are any errors, an extra property "errors" is added that holds
human readable error messages.
