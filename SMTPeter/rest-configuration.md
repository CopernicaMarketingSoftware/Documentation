# Configuration via REST

Most users use the dashboard to manually set up an SMTPeter account.
However, all configuration settings can also be set and queried using
the REST API. There are for example methods to set up sender domains,
query your DMARC settings ot to check whether your DNS records are valid.

* [Sender domains configuration](rest-sender-domains)
* [DNS settings](rest-dns)


## Advanced settings

Normally, you just have to set up sender domains and follow up the DNS 
recommendations with the methods mentioned above. However, advanced users
can also manually configure DKIM and SPF.

* [DKIM settings](rest-dkim)
* [SPF settings](rest-spf)
* [Custom DKIM keys](rest-custom-dkim)


## Cheat sheet

The following API calls are available to retrieve and update the
configuration:

````text
https://www.smtpeter.com/v1/domains?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/domain/yourdomain.com?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dns/yourdomain.com/recommended?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dns/yourdomain.com/selfhosted?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dns/yourdomain.com/status?access_token=YOUR_API_TOKEN

https://www.smtpeter.com/v1/dkimkeys?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dkimkeys/yourdomain.com?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dkimkeys/yourdomain.com/selector?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dkimkey/yourdomain.com/selector?access_token=YOUR_API_TOKEN
````

