# Property DKIM

The ResponsiveEmail web service can also be used for DKIM signing. If
you include a private key in the input JSON, it will be used to
create a signature that is added to the email MIME.

It is even possible to specify multiple keys if you want to add more
than a single signature to the mail. The private key should be base64
encoded. It is not necessary to include the header and footer lines 
that you normally see in private keys, although it is allowed.

<table class="info">
    <thead>
        <tr>
            <td colspan="3">DKIM properties</td>
        </tr>
    </thead>
    <tbody>
        <tr class="thead">
            <td>Property</td>
            <td>Value</td>
            <td>Description</td>
        </tr>
        <tr>
            <td>domain</td>
            <td><em>string</em></td>
            <td>The signing domain</td>
        </tr>
        <tr>
            <td>selector</td>
            <td><em>string</em></td>
            <td>The domain selector</td>
        </tr>
        <tr>
            <td>key</td>
            <td><em>string</em></td>
            <td>Base64 encoded private key</td>
        </tr>
        <tr>
            <td>algorithm</td>
            <td><em>string</em></td>
            <td>The hashing algorithm to use, sha1 or sha256</td>
        </tr>
    </tbody>
</table>

For a valid signature, you need to specify a domain, selector and 
private key. When a receiving party receives a signed email, it will
do a DNS lookup for the "selector._domainkey.domain" domain to retrieve
the _public_ key. With this public key it can verify whether the email
was correctly signed.

## Example Code


````json
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
````

To help readability, we have shortened the private key in the above 
example. 

If you want to add multiple signatures to an email, you can specify
multiple DKIM signatures:

````json
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
````
