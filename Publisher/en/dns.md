# DNS

If you configure Copernica, while setting up a [sender domain](./sender-domains), 
you have to make changes to your DNS. DNS is the worldwide system used by 
computers to change domain names into IP addresses used by computers. 

If you want to use Copernica's suggested DNS records you need to know who 
your DNS provider is. This is often the same company that hosts your website. 
It might also be the organization where you registered your domain name or 
handles your incoming email or some other party entirely. You can 
tell your provider to change your DNS settings. There is often even a 
web interface where you can do this yourself, but you might need to 
email them your settings.

If you go back to the configuration screen in the dashboard you can see 
if your current setting are correct. There are several checkmarks that 
should be green. Red crosses indicates errors and orange triangles indicate 
warnings, both indicating your current settings are not entirely correct.

## Background information

DNS is more than changing a domain name to an ID. It is also a way to request 
information about a domain name, some of them pertaining to email. The following 
list contains some of them and links to their respective background articles.

* [MX](mx): The server that processes incoming mail for a domain.
* [SPF](spf): The IP addresses that send email from the domain.
* [DKIM](dkim): Used to determine validity of the digital signature.
* [DMARC](dmarc): Policy on (possibly) incorrect email.

All of this can be configured in your DNS. Every time a server receives 
an email from your domain your DNS is queried for SPF, DKIM and DMARC to 
determine whether this email is correct and actually coming from you. If 
an email is sent to you the MX record is requested to determine where to 
deliver the message.

This explains the large amount of DNS records that should be set when 
sending email with Copernica. This is because Copernica send email coming 
from you and should be treated as such. Copernica is also (in many cases) receiving some of 
the email sent to your domain, namely the bounces.

## Caching

DNS is a distributed system that consists of millions of nameservers worldwide. 
Each of these server has a very small part of the database, as there is no server 
big enough to contain all domain names in the world. This is why a DNS lookup 
might take some time; some DNS lookups can't be answered immediately and are 
sent to another (higher level) server.

Because most of the information in a DNS changes very little DNS servers keep 
a cache. They save the answers to earlier queries so they can answer next time.

If you'd ask, for example, for www.example.com then your device performs 
a DNS lookup at the server of your provider. The DNS server of your provider 
first searches its cache to see if anyone queried the IP of www.example.com 
earlier. If this is the case the answer can immediately be sent to you.

If the address is not in the cache the provider looks the address up in a 
higher DNS server. This server might know the answer, or refer to 
another server that knows more about this type of adresses. If a lookup 
is used very little, for example because it is a little-known domain from 
a country far away, multiple refers and lookups are required before the DNS 
server manages to answer and refer you to the correct page.

Thanks to caching most DNS lookups are extremely fast, because often used 
domain names are nearly always in the cache. The downside to caching is 
that you can't always see your changes immediately. Even if you update the 
settings of your domain name in your own DNS server and everything seems 
to be working well it is still possible that other server still have your 
old settings. These old setting can be used for queries to this server.

You can determine for each DNS record how long it can be kept in a cache. 
This is often called the time-to-live or TTL and is often set to a few hours, 
but a TTL of 24 hours is not exceptional. Therefore it is always smart to 
wait a few hours before using your new settings.

## More information

* [Sender domains](./sender-domains)
* [MX](mx)
* [SPF](spf)
* [DKIM](dkim)
* [DMARC](dmarc)
