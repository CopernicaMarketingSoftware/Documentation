# REST API V1 Injection

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
