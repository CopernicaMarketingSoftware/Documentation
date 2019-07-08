# Rest API v1

## Authentication

Authentication to the API can be done using tokens that can be inserted into
the database directly, or created in the web interface. An `Authorization` header should be added
to each request. For example, `Authorization: Bearer <token>` would be the correct way to authenticate
to the API.

## Pauses

MailerQ offers very fine-grained control over delivery flow, and allows you to pause almost any combination
of from/to.

### GET

A GET request returns all currently active pauses. It returns a JSON array of pauses, see the example below.

```
GET /rest/v1/pauses HTTP/1.0
Authorization: Bearer ...
```

Might result in
```
HTTP/1.0 200 Ok
Content-Type: application/json
...

[
    {
        "id": 1,
        "from": "1.2.3.4",
        "to": "123.2.3.4"
    }, 
    {
        "id": 2,
        "from": "1.2.3.4",
        "to": "gmail.com"
    },
    {
        "id": 3,
        "to": "hotmail.com"
    }
]
```
In this example, traffic from `1.2.3.4` to `123.2.3.4` and `gmail.com` is paused, and traffic to `hotmail.com` is paused.

### POST

A POST request allows you to create a new pause, or to update an existing one. For the request format, see
the json below.

```
{
    "from": "string|int|null",
    "to": "string|null",
    "tag": "string|null",
    "cluster": bool,
}
```

All fields are optional. To update a resource, add `?id=<id>` to the resource URI, to update pause with the ID of the pause. 

| Field | Required  | Type | Description
|---|---|---|---|
| from  | no  | string or int | The source entity that should be paused, either pool ID or MTA IP.
| to  | no | string | The target entity that should be paused, either a FQDN or an IP.
| tag  | no  | string | The tag that should be paused.
| cluster | no | bool | Whether or not this pause is for the entire cluster or only this instance.

For example, the request below will pause sending to `hotmail.com` for a single campaign.
```
POST /rest/v1/pauses/ HTTP/1.0
Authorization: Bearer ...

{
    "to": "hotmail.com"
    "tag": "Campaign1"
}
```


### DELETE

A DELETE request allows you to remove a pause. For example, the request below removes the pause with ID 123.

```
DELETE /rest/v1/pauses/?id=123 HTTP/1.0
Authorization: Bearer ...
```


