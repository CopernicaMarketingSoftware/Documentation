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

## DNS record adjustments

To get information on how to adjust your DNS records of your sender domain
you can make a GET call to:

```txt
(1) https://www.smtpeter.com/v1/dns/NAME?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dns/ID?access_token=YOUR_API_TOKEN
```
where "NAME" and "ID" are the name and the id of the sender domain.
Calls to these methods return a JSON of the form:

```json
[
    {
        "name": "_dmarc.example.com",
        "type": "TXT",
        "value": "v=DMARC1;p=none;aspf=s;adkim=s;rua=mailto:dmarc@smtpeter.com;pct=10"
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
The JSON holds a array with JSON objects that have properties "name", "type", and "value.
The "name" property holds the name of the DNS record that needs to be adjusted.
The "type" holds the type of the DNS record (e.g. TXT of MX). The "value"
property holds the suggested value".

## DNS status

If you want to check the status of the DNS records of your sender domain
you can make GET calls to:

```txt
(1) https://www.smtpeter.com/v1/dnsstatus/NAME?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/dnsstatus/ID?access_token=YOUR_API_TOKEN
```
where "NAME" and "ID" are the name and the id of the sender domain for which
you want to check the DNS records. These calls return a JSON object of the
form:

```json
{
    "DMARC":    "ok",
    "DKIM":     "ok",
    "SPF":      "ok",
    "Bounces":  "error",
    "Tracking": "ok",
    "errors":
    {
        "Bounces": "Bounce domain is not pointing to SMTPeter"
    }
}
```
The properties "DMARC", "DKIM", "SPF", "Bounces", and "Tracking" give the
status on the DMARC, DKIM, SPF, Bounces, and Tracking records respectively.
The status can be "ok", or "error". If there are any errors, property "errors"
is set that holds an object with the human readable errors per record.
