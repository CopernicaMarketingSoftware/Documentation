# Webhook security
Webhooks are usually open to the world, which means that everyone has access to the URL. An HTTPS endpoint alone is unfortunately not sufficient, the connection may be secured but the origin of a message is still unclear. For this reason, Copernica uses signatures. Signature can be used to verify a messages and determine whether a request comes from one of our services.

## headers

### Digest
The `Digest` header is added on the basis of the [RFC 3230](https://tools.ietf.org/html/rfc3230#section-4.3.2). This can be used to check the integrity of messages.

### X-Copernica ID
The `X-Copernica ID` header is the id of your Copernica account. The header contains the data in the form of `X-Copernica-ID: account_ <id>`.

### Signature
The headers are signed using a standardized method, look [here]("https://tools.ietf.org/html/draft-cavage-http-signatures-10") for more information about this method.

The `keyId` header contains a URL that refers to a valid [DKIM](./dkim) record. To guarantee safety, these keys are automatically generated every month.

As an extra security measure, the headers in the signature must contain at least the following fields:
* (request-target): The URL which this request refers to (eg /path/to/your/script.php)
* Host: The host name of your server
* Date: The date this request was made
* X-Copernica ID: Your Copernica account id
* Digest: The message summary

## Checklist
The headers themselves are not sufficient to check the message security. To make the connection completely safe, you check the following steps.

* Date: Is it recent?
* Host: Does it refer to the right host?
* Digest: Does the content match?
* Signature: Is it correct?
* Signature: Does it contain at least the recommended headers?
* Signature: The header `keyId` refers to a `copernica.com` subdomain?

## Example
Copernica has developed a PHP library that can be used to verify a signature. Check out our [Github](https://github.com/CopernicaMarketingSoftware/http-signatures-php) for an example implementation.

## More information
* [Callbacks](./callbacks)
