# Rest API v1

## Authentication

Authentication to the API can be done using tokens that can be inserted into the database directly, or created in the web interface. To create a token, go to the management console `Settings > Rest API`. Either copy an already existing token, or generate a new token with the button in the upper right corner.

To authenticate to the API, an `Authorization` header should be added to each request. For example, `Authorization: Bearer <token>` would be the correct way to authenticate to the API. Currently, the authentication tokens give full access to the complete API. 

## Endpoints
* [Inject (since 5.6.3+)](rest-api-v1-inject)
* [Pauses (since 5.6.3+)](rest-api-v1-pauses)
* [Errors (since 5.6.4+)](rest-api-v1-errors)