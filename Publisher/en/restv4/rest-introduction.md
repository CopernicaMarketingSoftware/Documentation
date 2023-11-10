# The REST API

## Endpoints
The REST API can be accessed through the endpoints [https://api.copernica.com/v4](https://api.copernica.com/v4) and [https://rest.copernica.com/v4](https://rest.copernica.com/v4). There is a subtle difference between these two endpoints, especially when retrieving [large datasets](./rest-paging.md). Both endpoints support the traditional HTTP actions ("GET," "POST," "PUT," and "DELETE") in the usual manner. In addition, "POST" is meant for adding data, while "PUT" is meant for overwriting data.

- [Overview of methods](./rest-methods.md)
- [Previous version of the REST API (v3)](../restv3/rest-api.md)

## Authorization and API Tokens

All calls to the REST API require an "Authorization" HTTP header containing a token string. This header must be included with every GET, PUT, POST, and DELETE request. For example:

```
GET /v4/identity HTTP/1.1
Host: api.copernica.com
Authorization: Bearer abcd.xyz.klmnop
```

The example above is simplified; in reality, the tokens are much longer. The authorization header must start with the word "Bearer" and then contain a base64-encoded token string that grants access to the API.

The tokens are [JSON Web Tokens](https://jwt.io/introduction) (JWT), which store access rights to the API. If desired, you can decode the token to read the JSON data, but it is not necessary. Using the tokens as strings works fine.

To obtain a JWT token, follow these three steps:

1. Manually request an API token in the Marketing Suite dashboard. This API token does not provide direct access to the API
2. With the API token, request a JSON Web Token (JWT) from the authentication server, which is valid for 24 hours and grants access to the API.
3. During the next 24 hours, use this second token to make calls to the REST API.
4. After 24 hours, repeat step 2 to obtain a new token. You can do this earlier if needed.

The first step is usually done manually, while the remaining steps are typically automated.

## Obtaining an API Token

You can manually create API tokens in the [Marketing Suite dashboard](https://ms.copernica.com/#/admin/account/access-tokens). You can then use an API token to request a temporary JSON Web Token. When creating an API token, you can specify that it should only be available for API v4, preventing its use in the URL of older API versions.

## Obtaining a JWT

Given an API token (see above), you can request a JWT from the authorization server. To do this, send a POST request to: `https://authenticate.copernica.com/`. In the call's body, include the access token: `{'access_token':<your_access_token>}`. The response contains a JWT string, which you can then use in calls to the API server.

## The Authorization Header

For every call to the REST API (whether it's a GET, POST, PUT, or DELETE call), include an "Authorization" header. This header has the format "Authorization: Bearer {your_json_web_token}". If making a call with 'curl,' it can be done as follows:

```
curl https://api.copernica.com/v4/identity -H "Authorization: Bearer {your_json_web_token}"
```

Keep in mind that a JWT is valid for 24 hours. After this period, you need to send a new request to the authentication URL.

## OAuth Linking

Tokens granting access to accounts of other companies are obtained through an [OAuth handshake](./rest-oauth.md). This is especially relevant when creating links for third parties.

We distinguish between API applications and API tokens, especially concerning OAuth links. An outsider must be able to differentiate between the application you want to link (your application) and the access right obtained (the API token). If you don't need OAuth links, you can use the default application when creating API tokens.

## Data Format

When using POST or PUT to send data to Copernica, you can place the data in the body of your request in various ways. Copernica checks the content-type header to determine the format of the provided data.

JSON offers the most powerful method, allowing the exchange of complex nested data structures with Copernica. However, we also support the traditional method where variables are sent through HTTP POST requests. In the example below, we send a request to the REST API to create a profile with ID 1234 in the database. The body contains a JSON object with the properties of the new profile:

```
POST /database/1234/profiles HTTP/1.1
Host: api.copernica.com
Content-Type: application/json

{
    "fields":
    {
        "email":"info@example.com"
    }
}
```

Instead of the above request (using JSON), you could also send a 'traditional' HTTP POST request:

```
POST /database/1234/profiles HTTP/1.1
Host: api.copernica.com
Content-Type: application/x-www-form-urlencoded

fields[email]=info@example.com
```

The content-type header only applies to POST and PUT requests. GET and DELETE requests do not support data in the body.

## API Response

The response you receive from the API servers depends on the request type and its result. Common responses include the "200 OK" response for a successful request and the "400 Bad Request" response for a request that could not be completed. In the case of a failed request, the response body contains an error.

A successful GET request returns a "200 OK" response with a JSON-formatted string in the response body. If a request is moved to a new URL, a "301 Moved Permanently" response may be given.

Other status codes are also possible. The "201 Created" response for a successful POST request is an example. PUT and DELETE requests typically return a "204 No Content" by default, unless the PUT request creates one or more new entities. In this case, a "201 Created" response is given.

POST requests can also include **X-location** headers with a URL of the newly created entity. In the case of a newly created profile or updated profiles, it looks like this:

```
"X-location: https://api.copernica.com/v4/profile/$profileID"
```

Successful DELETE requests include an **X-deleted** header, for example:

```
"X-deleted: profile $profileID".
```

POST, PUT, and DELETE calls have no response body (or the body is empty), unless an error occurs.

## Paging of Large Datasets

The REST API typically returns batches with limited size by default. Therefore, you must (usually) include paging parameters such as start and limit to specify which part of the results you are requesting. For some methods, the API can return complete datasets.

* [Paging and large datasets](./rest-paging.md)

## More information

The following articles also contain information about the REST API:

* [OAuth integrations with the REST API](./rest-oauth.md)
* [The format of requests and responses](./rest-requests.md)
* [Overview of all available API methods](./rest-api.md)
* [Paging though lists of entities](./rest-paging.md)
