# Property DKIM

The ResponsiveEmail web service can also be used for DKIM signing. If you include 
a private key in the input JSON, it will be used to create a signature that is 
added to the email MIME.

It is even possible to specify multiple keys if you want to add more than a single 
signature to the mail. The private key should be base64 encoded. It is not 
necessary to include the header and footer lines that you normally see in private 
keys, although it is allowed.

## DKIM properties

| Property  | Value    | Description                                      |
|:----------|----------|--------------------------------------------------|
| domain    | _string_ | The signing domain                               |
| selector  | _string_ | The domain selector                              |
| key       | _string_ | Base64 encoded private key                       |
| algorithm | _string_ | The hashing algorithm to use, sha1 or sha256     |
| headers   | _array_  | Custom headers to include in the signature       |
| expire    | _string_ | Expiration timestamp for the signature           |
| priority  | _integer_| The relative priority of this key                |

For a valid signature, you need to specify a domain, selector and private key. 
The hashing algorithm is optional. If it is not set, the "sha256" algorithm is used. 

When a receiving party receives a signed email, it will use the domain and selector 
to do a DNS lookup to retrieve the _public_ key. With this public key it can verify 
whether the email was correctly signed.

By default, all the regular MIME header fields are used to sign the email: "from", 
"to", "message-id", "subject" et cetera. If you have custom fields that you want 
to include in the signature too, you can add an extra "headers" property holding 
an array of the headers that you also want to be signed. This is often used
to sign the "feedback-id" header that is required for Gmail feedback loops.

A DKIM signature can have an expire time. By adding the "expire" property
to your JSON, you can include this expiration time in the signature. The
expire time is optional however.

If you add multiple DKIM keys to your message you can specify the order in
which they are used to sign the MIME. This may be important for certain mail servers
that only use the first few DKIM signatures to check the validity of a message.
The signature of a DKIM key with *low* priority will appear at the *top* of your message.

## Example Code

```javascript
{
    "from" : "info@example.com",
    "subject" : "A signed email",
    "headers" : {
        "feedback-id": "a:b:c:d"
    },
    "dkim": {
        "domain": "example.com",
        "selector": "dkim1",
        "key": "MIIBOwIBAAJ....MbXHLl/QHFg==",
        "headers": [ "feedback-id" ],
        "expire": "2016-10-01 00:00:00",
        "priority": 10
    },
    "content": {
        "blocks": [ {
            "type": "text",
            "content": "This is example text"
        }, {
            "type": "image",
            "src": "http://www.example.com/example.jpeg"
        } ]
    }
}
```

The above example demonstrates how you can add a DKIM signature to your email.
It is an advanced signature, because it will also sign the custom "feedback-id"
header.

If you want to add multiple signatures to an email, you can specify multiple 
DKIM signatures. In the next example two signatures are going to be added
to the mail, one with an expire time, and one without:

```json
{
    "from" : "info@example.com",
    "subject" : "A signed email",
    "dkim": [ {
        "domain": "example.com",
        "selector": "dkim1",
        "key": "MIIBOwIBAAJ....MbXHLl/QHFg==",
        "expire": "2016-10-01 00:00:00",
        "priority": 10
    }, {
        "domain": "example.com",
        "selector": "dkim2",
        "key": "MD8CAQACCQD....2AjNECBB0/WTE"
        "priority": -2
    } ],
    "content": {
        "blocks": [ {
            "type": "text",
            "content": "This is example text"
        }, {
            "type": "image",
            "src": "http://www.example.com/example.jpeg"
        } ]
    }
}
```

To help readability, we have shortened the private key in the two above examples. 
