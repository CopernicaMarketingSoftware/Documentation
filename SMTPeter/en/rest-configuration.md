# Configuration via REST

Most users use the dashboard to manually set up an SMTPeter account.
However, all configuration settings can also be set and queried using
the REST API. There are for example methods to set up sender domains
and to check whether your DNS records are valid.

* [Sender domains configuration](rest-sender-domains)
* [DNS settings](rest-dns)


## Advanced settings

If you use SMTPeter to route all your outgoing email, you just have to 
set up sender domains and follow up the DNS recommendations with the 
methods mentioned above. This fixes all your outgoing messages. However,
if you also send out mail from other IP addresses, you have to set up
extra SPF settings, and you might need the private key that is currently
in use.

* [DKIM settings](rest-dkim)
* [SPF settings](rest-spf)

SMTPeter automatically rotates DKIM keys, so that you never have to worry
about updating your own DKIM keys or DNS records. However, the REST API
supports seting up your own custom DKIM keys.

* [Custom DKIM keys](rest-custom-dkim) (for advanced users only)

