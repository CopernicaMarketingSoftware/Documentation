# REST API V1 Pools
MailerQ offers IP Pools for easy management of your sending IP addresses.

## GET

A GET request to `pools` returns all pools. It returns a JSON array of pools, see the example below.

```
GET /v1/pools HTTP/1.0
Authorization: Bearer ...
```

Might result in
```
HTTP/1.0 200 Ok
Content-Type: application/json
...

[
    {
        "name": "sharedpool1"
    },
    {
        "name": "dedicated",
        "description": "Dedicated Addresses"
    }
]
```
In this example, there are 2 pools defined.

To get the actual IP addresses in a pool, you can do a GET request to `poolips?name=NAME`. The example below returns the IPs in pool "sharedpool1" from the example above.

```
GET /v1/poolips?name=sharedpool1 HTTP/1.0
Authorization: Bearer ...
```

This will return the list of IP addresses currently in the pool called `NAME`:
```
HTTP/1.0 200 Ok
Content-Type: application/json
...

[
    {
        "ip": "127.0.0.1",
        "name": "sharedpool1"
    },
    {
        "ip": "192.168.1.1",
        "name": "sharedpool1"
    }
]
```

## POST

A POST request to `pools` allows you to create a new IP Pool. For the request format, see the table below. 

| Field | Required  | Type | Description
|---|---|---|---|
| name | yes | string | The name of the new pool
| description  | no | string | Description of the pool, for human use.

For example, the request below will create the pool from the second example under GET with a json formatted body
```
POST /v1/pools HTTP/1.0
Content-Type: application/json
Authorization: Bearer ...

{
    "name": "dedicated",
    "description": "Dedicated Addresses"
}
```
and equivalently, with urlencoded body
```
POST /v1/pools HTTP/1.0
Content-Type: application/x-www-form-urlencoded
Authorization: Bearer ...

name=dedicated&description=Dedicated+Addresses
```

To add an IP address to an existing pool, you can do a POST request to `poolips`. This needs the name of the pool and the address to be added:

| Field | Required  | Type | Description
|---|---|---|---|
| ip | yes | string | The name of the existing pool
| name  | yes | string | The address to be added

```
POST /v1/poolips HTTP/1.0
Content-Type: application/json
Authorization: Bearer ...

{
    "ip": "127.0.0.1",
    "name": "sharedpool1"
},
```

Naturally, POST requests to `poolips` can also be done with urlencoded data.

## DELETE

A DELETE request to `pools` allows you to remove a pool. This only needs the name of the pool to be removed:

```
DELETE /v1/pools HTTP/1.0
Authorization: Bearer ...
Content-Type: application/x-www-form-urlencoded

name=sharedpool1
```
This will also remove all addresses associated with that pool.

To remove a specific address from a pool, you can do a call to `poolips` with the name of the pool and the address you want to remove:

```
DELETE /v1/poolips HTTP/1.0
Authorization: Bearer ...
Content-Type: application/x-www-form-urlencoded

name=sharedpool1&ip=127.0.0.1
```
DELETE requests, like post requests, support both JSON and urlencoded formats. 