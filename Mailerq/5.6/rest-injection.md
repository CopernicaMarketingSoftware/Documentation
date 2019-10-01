
# Injection over REST API

## Authentication

Authentication to the API can be done using tokens that can be inserted into
the database directly, or created in the web interface. An `Authorization` header should be added
to each request. For example, `Authorization: Bearer <token>` would be the correct way to authenticate
to the API.

MailerQ offers an HTTP injection API. Check out the [message format](json-messages) for the required structure of injected
messages. 

## POST
```
POST /v1/inject HTTP/1.0
Authorization: Bearer ...
Content-Type: application/json

{
    "envelope": "my-sender-address@my-domain.com",
    "recipient": "info@example.org",
    "mime": "From: my-sender-address@my-domain.com\r\nTo: info@example.org\r\nSubject: ..."
}
``` 

Injected messages simply get published to the [inbox queue](rabbitmq-config#rabbitmq-queues) specified in the config file. The injection endpoint does not support urlencoded post, only JSON directly. 

Injected messages will get an extra `http` property, for its properties see [incoming messages](json-incoming#rest-api).
