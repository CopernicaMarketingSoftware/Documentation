# Rest API V1 Suppressions
MailerQ offers suppression list functionality to prevent unwanted recipients from being tried and protect your reputation.

## GET

A GET request returns all currently suppressed addresses. It returns a JSON array of addresses, see the example below.

```
GET /v1/suppressions HTTP/1.0
Authorization: Bearer ...
```

Might result in
```
HTTP/1.0 200 Ok
Content-Type: application/json
...

[
    {
        "type": "address",
        "value": "test@example.net",
        "code": 551,
        "extended": "5.1.1",
        "description": "Spamtrap"
    },
    {
        "type": "domain",
        "value": "example.com",
        "code": 550
    }
]
```
In this example, messages to `test@example.net` and `example.com` are failed with an error code 551 and 550 respectively, 
with the former also having the extended error code `5.1.1` and error description `Spamtrap` attached to the result.

## POST

A POST request allows you to create a new suppression list entry. For the request format, see the table below.

| Field | Required  | Type | Description
|---|---|---|---|
| value | yes | string | The domain or address to be suppressed
| type | yes | string("address", "domain") | Whether the given value is a domain or a full address
| code | yes | string | The error code given to suppressed messages.
| extended  | no  | string | Extended SMTP error code, e.g. 5.7.1. 
| description  | no | string | Description to put in the message result.

For example, the request below will install the suppression from the first example under GET with a json formatted body
```
POST /v1/suppressions HTTP/1.0
Content-Type: application/json
Authorization: Bearer ...

{
    "type": "address",
    "value": "test@example.net",
    "code": 551,
    "extended": "5.1.1",
    "description": "Spamtrap"
}
```
and equivalently, with urlencoded body
```
POST /v1/suppressions HTTP/1.0
Content-Type: application/x-www-form-urlencoded
Authorization: Bearer ...

type=address&value=test%40example.net&code=551&extended=5.5.1&description=Spamtrap
```

## DELETE

A DELETE request allows you to remove a suppression entry. The suppression is uniquely identified by the value (either a domain or a full address)

```
DELETE /v1/suppessions HTTP/1.0
Authorization: Bearer ...
Content-Type: application/x-www-form-urlencoded

value=example.com
```

DELETE requests, like post requests, support both JSON and urlencoded formats. 