# Configuration via REST

Most users use the dashboard to manually set up an SMTPeter environment.
However, all configuration settings can also be set and queries using
the REST API. There are for example methods to create or modify DKIM keys, 
set up sender domains, and query your DMARC settings.

* [Sender domains configuration](rest-sender-domains)
* [DKIM settings](rest-dkim)
* [DNS settings](rest-dns)


## Cheat sheet

The following API calls are available to retrieve and update the
configuration:

````text
https://www.smtpeter.com/v1/domains?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/domain/NAME?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/domain/ID?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dkimkeys/NAME?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dkimkeys/ID?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dkimkey/ID?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dkimkey/SELECTOR/DOMAIN?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dns/NAME?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dns/ID?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dnsstatus/NAME?access_token=YOUR_API_TOKEN
https://www.smtpeter.com/v1/dnsstatus/ID?access_token=YOUR_API_TOKEN
````

