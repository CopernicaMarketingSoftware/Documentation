# REST API v1

MailerQ can be accessed by REST API, and delivery flow can be altered. In this way, it allows you to stop the sending of certain emails, intercept emails, or inject emails directly into MailerQ with only a HTTP client.

Authentication to the API can be done using tokens that can be inserted into the database directly, or created in the web interface. To create a token, go to the management console `Settings > REST API`. Either copy an already existing token, or generate a new token with the button in the upper right corner.

To authenticate to the API, an `Authorization` header should be added to each request. For example, `Authorization: Bearer <token>` would be the correct way to authenticate to the API. Currently, the authentication tokens give full access to the complete API. 

The following endpoints are available in the current version of MailerQ.

* [Inject](rest-api-v1-inject) (since 5.6.3)
* [Pauses](rest-api-v1-pauses) (since 5.6.3)
* [Errors](rest-api-v1-errors) (since 5.6.4)
* [IP Pools](rest-api-v1-pools) (since 5.8.5)
* [Suppressions](rest-api-v1-suppressions) (since 5.8.5)
* [External MTA IPs](rest-api-v1-externalmtas) (since 5.8.5)
