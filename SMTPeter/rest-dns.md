# Obtaining DNS information

After you've set up one or more sender domains, you must update your DNS records 
to ensure that the public keys for the DKIM signatures, and your SPF and DMARC 
settings can all be queried by email receivers.

SMTPeter hosts all required DNS records under its DNS domain, so that you
only have to create a number of CNAME records that refer to SMTPeter's
DNS records. The "/dns" API call can be used to get a list of all 
recommended DNS records that you should copy to your own DNS server.

```txt
(1) https://www.smtpeter.com/v1/dns/yourdomain.com/recommended?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dns/yourdomain.com/selfhosted?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/dns/yourdomain.com/status?access_token=YOUR_API_TOKEN
```

We support three API calls: one to get the recommended DNS configuration
that you should copy to the DNS servers, one to get the DNS configuration
if you do not want to make use of CNAME records, and one API call to check 
whether you've correctly set up your DNS records.

## DNS recommendations

SMTPeter cannot update your DNS records because we do not have access to your
DNS server. However, we can give you a recommendation on how to set up your
domain. The calls to the above mentioned methods (1) and (2) return these
recommendations in the following format:

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
        "value": "0 mail.smtpeter.com"
    },
    {
        "name": "clicks.example.com",
        "type": "CNAME",
        "value": "clicks.smtpeter.com"
    },
    {
        "name": "example.com",
        "type": "TXT",
        "value": "v=spf1 include:spfX.smtpeter.com -all"
    },
    {
        "name": "_dmarc.example.com",
        "type": "CNAME",
        "value": "dmarcX.smtpeter.com"
    }
]

```

The JSON holds an array with the DNS records that you should copy to your
DNS server. You can see that most of the recommended records are CNAME's
records that point to the smtpeter.com domain. This means that if you
follow our recommendation, your DNS records just refer to our records.
The advantage of this approach is that we can periodically rotate your 
DKIM keys and slowly deploy your DMARC policy without you ever having to 
change your DNS again.

However, if you do want to stay in full control yourself, you can also
use API call (2) to get the records without using CNAME's.


## DNS status

Once you've installed the recommended DNS records, you can let us check
whether you've done this correctly with the following API call:

```txt
https://www.smtpeter.com/v1/dns/yourdomain.com/status?access_token=YOUR_API_TOKEN
```

When you call this method, SMTPeter will query your DNS records and compare
your settings with the recommended settings. If there is anything wrong
with your DNS records, it is reported. The output for these REST calls
typically looks like this:

```json
{
    "dmarc":    "ok",
    "dkim":     "perfect",
    "spf":      "perfect",
    "mx":       "error",
    "a":        "perfect",
    "remarks": {
        "dmarc": "DMARC record not redirected to ours",
        "mx":    "Bounce domain is not pointing to mail.smtpeter.com"
    }
}
```

The properties "dmarc", "dkim" and "spf" give the status of your DMARC,
DKIM and SPF records in DNS. The "mx" and "a" records tell you whether
you have correctly set up MX and A records.

The possible status values for the records are "perfect", "ok" and 
"error". The status is perfect if you exactly followed our suggestions. 
In general, records that score a perfect will never have to be adjusted 
again. The "ok" status is set if you did not follow our recommended setting,
but you did set up valid DNS records (for example, if you did not use
CNAME records for the clicks domain, but you did install the right IP
address).

If things are not perfect, an extra property "remarks" is added that holds
human readable messages with improvement suggestions per record.
