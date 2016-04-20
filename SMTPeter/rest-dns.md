# Obtaining DNS information

If you use SMTPeter to send out your mails and you use SPF, DKIM, and DMARC
to improve your security, you have to adjust your DNS records. You can use
the following REST API methods to get information on how to adjust these
records and the status of the DNS records:

```txt
(1) https://www.smtpeter.com/v1/dns/NAME?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dns/ID?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/dnsstatus/NAME?access_token=YOUR_API_TOKEN
(4) https://www.smtpeter.com/v1/dnsstatus/ID?access_token=YOUR_API_TOKEN
```

## DNS recommendations

SMTPeter cannot update your DNS records. This is something that you have
to do yourself. However, we can give you a recommendation. The following
methods are useful.

```txt
(1) https://www.smtpeter.com/v1/dns/NAME?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dns/ID?access_token=YOUR_API_TOKEN
```

where "NAME" and "ID" are the name and the id of the sender domain.
SMTpeter can only give recommendations for domains that you have
configured first (for example with the [sender domain REST API calls](rest-sender-domains).

The calls to the above methods return a JSON of the following form:

```json
[
    {
        "name": "_dmarc.example.com",
        "type": "TXT",
        "value": "v=DMARC1;p=reject;aspf=s;adkim=s;rua=mailto:dmarc@smtpeter.com;pct=100"
    },
    {
        "name": "example.com",
        "type": "MX",
        "value: "0 mail.smtpeter.com"
    },
    {
        "name": "clicks.example.com",
        "type": "CNAME",
        "value": "clicks.smtpeter.com"
    },
    {
        "name": "selector._domainkey.example.com",
        "type": "TXT",
        "value": "v=DKIM1;k=rsa;s=email;h=sha256;p=MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDEeQ7qHsot4s6hGP2/XGsefp+eOD9lXALADT1NaQbWzVCibtHln/tfp+fSeS6rAtSyOC5qbRnDlxIpS45fMSH8W/tjb+fBhr7/PKw50bRI7XPFWe1MP+mJ4fY73B02Mz5ZnLk59fTTzgSY/DxohPO7zlz4xyDNjZ4RjPIiO2kbIQIDAQAB"
    }
]
```
The JSON holds an array with JSON objects that have properties "name", "type", and "value.
The "name" property holds the name of the DNS record that needs to be adjusted.
The "type" holds the type of the DNS record (e.g. TXT or MX). The "value"
property holds the suggested value".

Keep in mind that SMTPeter's recommendation for DMARC is to use p=reject and a
percentage of 100%. If you want to rollout DMARC slowly, you could adjust
the record and use a smaller percentage, and/or a more permissive policy,


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
