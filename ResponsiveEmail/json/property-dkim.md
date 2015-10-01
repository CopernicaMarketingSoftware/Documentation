# Property DKIM

The ResponsiveEmail web service can also be used for DKIM signing. If you include 
a private key in the input JSON, it will be used to create a signature that is 
added to the email MIME.

It is even possible to specify multiple keys if you want to add more than a single 
signature to the mail. The private key should be base64 encoded. It is not 
necessary to include the header and footer lines that you normally see in private 
keys, although it is allowed.

## DKIM properties

| Property | Value | Description                                      |
|:---------|-------|--------------------------------------------------|
| domain | _string_ | The signing domain                              |
| selector | _string_ | The domain selector                           |
| key | _string_ | Base64 encoded private key                         |
| algorithm | _string_ | The hashing algorithm to use, sha1 or sha256 |

For a valid signature, you need to specify a domain, selector and private key. 
The hashing algorithm is optional. If it is not set, the "sha256" algorithm is used. 

When a receiving party receives a signed email, it will use the domain and selector 
to do a DNS lookup to retrieve the _public_ key. With this public key it can verify 
whether the email was correctly signed.

## Example Code

```javascript
{
    "from" : "info@example.com",
    "subject" : "A signed email",
    "dkim": {
        "domain": "example.com",
        "selector": "dkim1",
        "key": "MIIBOwIBAAJ....MbXHLl/QHFg=="
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

If you want to add multiple signatures to an email, you can specify multiple 
DKIM signatures:

```json
{
    "from" : "info@example.com",
    "subject" : "A signed email",
    "dkim": [ {
        "domain": "example.com",
        "selector": "dkim1",
        "key": "MIIBOwIBAAJ....MbXHLl/QHFg=="
    }, {
        "domain": "example.com",
        "selector": "dkim2",
        "key": "MD8CAQACCQD....2AjNECBB0/WTE"
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
