# Webhook security

To protect your data, we strongly recommend to use an HTTPS endpoint for 
your webhook. This ensures that all calls from SMTPeter to your network are
secure and cannot be intercepted by third parties. However, even if you use 
HTTPS, that does not prevent others from trying to send fake HTTP requests 
to your endpoint too. To overcome this, all our HTTP calls contain a couple of 
extra headers with your account ID and a digital signature.


## Extra headers

All our outgoing HTTP requests contain a "Digest", "X-Copernica-ID" and a 
"Signature" header. These headers contain a hashed value of the message
body, the identifier of your SMTPeter account and a digital signature. We
strongly recommend that you check in your endpoint code if these headers
are indeed set, and that the values are correct. Incoming calls without
these headers, or where the values are not correct should be ignored.

The format of the headers is well-defined:

- The "Digest" header is in line with [RFC 3230](https://tools.ietf.org/html/rfc3230#section-4.3.2) and [RFC 5843](https://tools.ietf.org/html/rfc5843).
- The "Signature" header is defined in [an IETF draft](https://tools.ietf.org/html/draft-cavage-http-signatures-11).
- The "X-Copernica-ID" header is set to "environment_XXX" (where XXX is the ID of your account)

An example HTTP header could look like this:

```
POST /path/to/your/script HTTP/1.1
Host: yourserver.yourdomain.com
Date: Sun, 05 Jan 2014 21:31:40 GMT
X-Copernica-ID: environment_1234
Digest: SHA-256=X48E9qOokqqrvdts8nOJRJN3OWDUoyWxBf7kbu9DBPE=
Content-Type: application/json
Content-Length: 328746
X-Nonce: fsd9f2
Signature: keyId="one._domainkey.copernica.com",algorithm="rsa-sha256",
     headers="(request-target) Host Date Content-length Content-type
       X-Copernica-ID Digest X-nonce"
     signature="vSdrb+dS3EceC9bcwHSo4MlyKS59iFIrhgYkz8+oVLEEzmYZZvRs
       8rgOp+63LEM3v+MFHB32NfpB2bEKBIvB1q52LaEUHFv120V01IL+TAD48XaERZF
       ukWgHoBTLMhYS2Gb51gWxpeIq8knRmPnYePbF5MOkR0Zkly4zKH7s1dE="
```

## The signature and the public key

The signature is created using a private key that only we have access to, and
can be verified with a public key. We've published our public key in DNS in the
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

