# Security of a webhook

To protect your confidential information from being intercepted, you can specify
a https endpoint and all data will be encrypted. However, security doesn't stop there.

Usually, endpoints are open to the world. This means that anybody with the url can connect 
to it. To make sure that SMTPeter is making the call, we sign the request headers, 
so that you can make sure it is really us.

## Headers

### Digest

The `Digest` header is added in accordance to [RFC 3230](https://tools.ietf.org/html/rfc3230#section-4.3.2).
This can be used to verify message integrity.

### X-Copernica-ID

An identifier for your SMTPeter environment is added. The header will contain the data in the 
form of `X-Copernica-ID: environment_<number>`. 

### Signature

The headers are signed using a draft for a standard of signing HTTP messages, which you can
find [here](https://tools.ietf.org/html/draft-cavage-http-signatures-10).

As a `keyId`, an url is given where a key can be found in the TXT record. Currently, DKIM is used. 
To improve security, the headers in the signature should at least contain the following fields:
- (request-target)
- Host
- Date
- X-Copernica-ID
- Digest

Verifying all these headers will ensure that the full message is from SMTPeter.

### Example

You can find an example implementation of correct message verification [here](Images/Security.php).

## More information

* [Webhooks](./webhooks)


