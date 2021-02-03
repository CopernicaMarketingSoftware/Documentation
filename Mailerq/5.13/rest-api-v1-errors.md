# REST API V1 Errors
MailerQ offers very fine-grained control over delivery flow, and allows you to intercept it and forcing an error
on any combination of pool/mta and domain.

## GET

A GET request returns all currently active errors. It returns a JSON array of errors, see the example below.

```
GET /v1/errors HTTP/1.0
Authorization: Bearer ...
```

Might result in
```
HTTP/1.0 200 Ok
Content-Type: application/json
...

[
    {
        "mta": "1.2.3.4",
        "ip": "123.2.3.4",
        "cluster": false,
        "code": 500
    }, 
    {
        "mta": "1.2.3.4",
        "domain": "gmail.com",
        "cluster": false,
        "code": 421,
        "description": "forced deferring"
    },
    {
        "domain": "hotmail.com",
        "cluster: true,
        "code": 521,
        "extended": "5.2.1"
    },
    {
        "pool": "shared-pool-1",
        "domain": "yaho0.com",
        "cluster": false,
        "code": "553",
        "description": "invalid mailbox"
    }
]
```
In this example, traffic from `1.2.3.4` to `123.2.3.4` is failed with an error code 500, anc traffic to `gmail.com` is deferred with
an error code of 421 to be tried again later. In the third value, all emails to `hotmail.com` get an `521` error on the entire cluster.
Lastly, all mail from `shared-pool-1` to `yaho0.com` on this instance are failed because the mailbox is invalid.

## POST

A POST request allows you to create a new error, or to update an existing one. For the request format, see
the table below. All fields are optional.

| Field | Required  | Type | Description
|---|---|---|---|
| code | yes | int | Numeric error code between 200 and 599 (smtp error codes). 
| extended | false | string | Extended SMTP error code, e.g. 5.7.1.
| description | false | string | Description to put in the message result.
| pool  | no  | string | Pool that the error applies to. 
| mta  | no | string | MTA IP that the error applies to. 
| domain | no | string | Domain that the error applies to.
| tag  | no  | string | The tag that the error applies to.
| cluster | no | bool | Whether or not this error is for the entire cluster or only this instance.

Do note that not all fields may be passed at the same time. `pool` and `mta` are mutually exclusive. 
That means that they may not be supplied together, or they will result in a `400` response. 

For example, the request below will install a Forced Error with code `421` to `hotmail.com` for a single campaign.
```
POST /v1/errors HTTP/1.0
Content-Type: application/json
Authorization: Bearer ...

{
    "domain": "hotmail.com",
    "code": 421,
    "tag": "Campaign1"
}
```
and equivalently, with urlencoded body
```
POST /v1/errors HTTP/1.0
Content-Type: application/x-www-form-urlencoded
Authorization: Bearer ...

domain=hotmail.com&code=421&tag=Campaign1
```

## DELETE

A DELETE request allows you to remove an error. For example, the request below removes the error for the entire cluster
to gmail.com from the list of errors.

```
DELETE /v1/errors HTTP/1.0
Authorization: Bearer ...
Content-Type: application/x-www-form-urlencoded

cluster=true&code=421&domain=gmail.com
```

The request format is exactly the same as a POST request, but with the DELETE method. Delete also supports both JSON and
urlencoded requests.