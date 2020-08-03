# REST API V1 External MTAs
MailerQ offers a setting to uses IP addresses that are not local to the server MailerQ is running on. We call these External MTAs.

## GET

A GET request returns all External MTAs currently configured. It returns a JSON array of MTAs, see the example below.

```
GET /v1/externalmtas HTTP/1.0
Authorization: Bearer ...
```

Might result in
```
HTTP/1.0 200 Ok
Content-Type: application/json
...

[
    {
        "public_ip": "8.8.8.8",
        "local_ip": "127.0.0.1",
        "connect_port": "2525",
        "protocol": "nat"
    },
    {
        "public_ip": "8.8.4.4",
        "local_ip": "192.168.1.1",
        "connect_port": "2525",
        "protocol": "nat"
    }
]
```
In this example, there are 2 External MTAs defined.

## POST

A POST request to allows you to add a new External MTA. For the request format, see the table below. 

| Field | Required  | Type | Description
|---|---|---|---|
| public_ip  | yes | string | The external IP address to use for sending
| local_ip | yes | string | The local IP address to bind to
| connect_port  | yes | int | The port to use for the external server
| protocol  | yes | string | The protocal to use to connect to the external server ('nat' / 'socks' / 'http')

For example, the request below will create the External MTA from the first example under GET with a json formatted body
```
POST /v1/externalmtas HTTP/1.0
Content-Type: application/json
Authorization: Bearer ...

{
    "public_ip": "8.8.8.8",
    "local_ip": "127.0.0.1",
    "connect_port": "2525"
}
```
and equivalently, with urlencoded body
```
POST /v1/externalmtas HTTP/1.0
Content-Type: application/x-www-form-urlencoded
Authorization: Bearer ...

public_ip=8.8.8.8&local_ip=127.0.0.1&connect_port=2525
```

## DELETE

A DELETE request to allows you to remove an External MTA. This only needs the external IP address:

```
DELETE /v1/externalmtas HTTP/1.0
Authorization: Bearer ...
Content-Type: application/x-www-form-urlencoded

public_ip=8.8.8.8
```
DELETE requests, like post requests, support both JSON and urlencoded formats. 