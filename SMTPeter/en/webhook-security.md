# Security of a webhook

To prevent your confidential information from being intercepted and to protect 
your sensitive data, we strongly recommend to use an HTTPS endpoint for 
your webhook. This ensures that all calls from SMTPeter to your server are
secure and cannot be intercepted.

However, this is not the only measurement that you can take to secure your
endpoint. Besides HTTPS, we also add a couple of extra headers to each 
outgoing request. One of these headers contains a digital signature. You can 
check this signature to verify that the call does indeed come from us, and
not from some outsider that happened to find out your endpoint address.


## Extra headers

All our outgoing HTTP requests contain a "Digest", "X-Copernica-ID" and a 
"Signature" header. These headers contain a hashed value of the message
body, the identifier of your SMTPeter account and a digital signature. We
strongly recommend that you check in your endpoint code if these headers
are indeed set, and that the values are correct. Incoming calls without
these headers, or where the values are not correct should be ignored,

The format format of the headers is well-defined:

- The "Digest" header is in line with [RFC 3230](https://tools.ietf.org/html/rfc3230#section-4.3.2).
- The "Signature" header is defined in [an IETF draft](https://tools.ietf.org/html/draft-cavage-http-signatures-10).
- The "X-Copernica-ID" header is set to "environment_XXX" (where XXX is the ID of your account)


## The signature and the public key

The signature is created using a private key that only we have access to, and
can be checked with a public key. We've published our public key in DNS in the
same way as we publish DKIM keys, see [RFC 6367](https://tools.ietf.org/html/rfc6376#section-3.6.1)
for the DKIM specification. Note that the keys rotate once a month, so you
should not use a hardcoded copy of our public key, but dynamically retrieve 
our key with a DNS query. The location of the key is included in our call
and should always be a copernica.com subdomain.

The signature always covers the request target ("/path/to/your/script.php"),
the hostname, date, x-copernica-id and digest headers. If the signature seems
to be valid, but does not at least include these headers, the call did not 
come from us and should be ignored anyway.


## Checklist

To check whether your endpoint was indeed called by us, we recommend to take
the following steps in your code:

- Check if the call came in through HTTPS (not HTTP)
- Check if there is a 'Date' header and if it is recent (to prevent replay attacks)
- Check if there is a 'Host' header, and it contains your hostname
- Check if there is a 'Digest' header, and if it matches the request body
- Check if there is a 'Signature' header, and if it contains the right values:
    - It should at least cover the request-target, host, date, x-copernica-id and digest headers
    - The keyId must be set to a subdomain of copernica.com
- Fetch the public key from DNS (it's published as a TXT record)
- Use the public key to verify the signature

## Example

You can find an example implementation of correct message verification [here](https://github.com/CopernicaMarketingSoftware/webhook-security).

