# Rest API V1 Pauses

MailerQ offers very fine-grained control over delivery flow, and allows you to pause almost any combination
of pool/mta and domain/ip.

## GET

A GET request returns all currently active pauses. It returns a JSON array of pauses, see the example below.

```
GET /v1/pauses HTTP/1.0
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
        "cluster": false
    }, 
    {
        "mta": "1.2.3.4",
        "domain": "gmail.com",
        "cluster": false
    },
    {
        "domain": "hotmail.com",
        "cluster: true
    },
    {
        "pool": "shared-pool-1",
        "domain": "yahoo.com",
        "cluster": false
    }
]
```
In this example, traffic from `1.2.3.4` to `123.2.3.4` and `gmail.com` is paused on the instance, all traffic from `shared-pool-1` to `yahoo.com` is paused, and traffic to `hotmail.com` is paused for the entire cluster. 

## POST

A POST request allows you to create a new pause, or to update an existing one. For the request format, see
the table below. All fields are optional.

| Field | Required  | Type | Description
|---|---|---|---|
| pool  | no  | string | Pool that the pause applies to. 
| mta  | no | string | MTA IP that the pause applies to. 
| domain | no | string | Domain that the pause applies to. 
| ip | no | string | Remote IP that the pause applies to.
| tag  | no  | string | The tag that the pause applies to.
| cluster | no | bool | Whether or not this pause is for the entire cluster or only this instance.

Do note that not all fields may be passed at the same time. `pool` and `mta` are mutually exclusive, and so are `domain` and `ip`. That means that they may not be supplied together, or they will result in a `400` response. 

For example, the request below will pause sending to `hotmail.com` for a single campaign.
```
POST /v1/pauses HTTP/1.0
Content-Type: application/json
Authorization: Bearer ...

{
    "domain": "hotmail.com"
    "tag": "Campaign1"
}
```
and equivalently, with urlencoded body
```
POST /v1/pauses HTTP/1.0
Content-Type: application/x-www-form-urlencoded
Authorization: Bearer ...

domain=hotmail.com&tag=Campaign1
```

## DELETE

A DELETE request allows you to remove a pause. For example, the request below removes the pause for the entire cluster to gmail.com from the list of pauses.

```
DELETE /v1/pauses HTTP/1.0
Authorization: Bearer ...
Content-Type: application/x-www-form-urlencoded

cluster=true&domain=gmail.com
```

The request format is exactly the same as a POST request, but with the DELETE method. Delete also supports both JSON and urlencoded requests.