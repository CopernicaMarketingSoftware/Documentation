# Configuration via REST

Your SMTPeter account configuration can be modified using the REST API.
There are for example methods to create or modify DKIM keys, set up 
sender domains, and query your DMARC settings. The following table
lists all supported methods.

````text
(1) https://www.smtpeter.com/v1/domains?access_token=YOUR_API_TOKEN
(2) https://www.smtpeter.com/v1/domain/NAME?access_token=YOUR_API_TOKEN
(3) https://www.smtpeter.com/v1/domain/ID?access_token=YOUR_API_TOKEN
(4) https://www.smtpeter.com/v1/dkimkeys/NAME?access_token=YOUR_API_TOKEN
(5) https://www.smtpeter.com/v1/dkimkeys/ID?access_token=YOUR_API_TOKEN
(6) https://www.smtpeter.com/v1/dkimkey/ID?access_token=YOUR_API_TOKEN
(7) https://www.smtpeter.com/v1/dkimkey/SELECTOR/DOMAIN?access_token=YOUR_API_TOKEN
(8) https://www.smtpeter.com/v1/dmarc?access_token=YOUR_API_TOKEN
(9) https://www.smtpeter.com/v1/dmarc/DATE/FROM/FOR?access_token=YOUR_API_TOKEN
(10) https://www.smtpeter.com/v1/dmarc/DATE/FROM/FOR/ID?access_token=YOUR_API_TOKEN
(11) https://www.smtpeter.com/v1/dns/NAME?access_token=YOUR_API_TOKEN
(12) https://www.smtpeter.com/v1/dns/ID?access_token=YOUR_API_TOKEN
(13) https://www.smtpeter.com/v1/dnsstatus/NAME?access_token=YOUR_API_TOKEN
(14) https://www.smtpeter.com/v1/dnsstatus/ID?access_token=YOUR_API_TOKEN
````

The following list guides you to the page with specific information about:

* [Creating, updating, deleting, or information about sender domains](rest-sender-domains)
* [Retrieving DKIM keys](rest-dkim)
* [Get DMARC information and reports](rest-dmarc)
* [Information about your DNS settings](rest-dns)
