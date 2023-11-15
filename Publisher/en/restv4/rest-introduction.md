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

The authorization header must start with the word "Bearer" and the token string that grants access to the API. This token string can be retrieved from the Copernica authentication service. The above example above is a bit simplified; in reality, the tokens are longer.

Internally, the tokens are implemented using [JSON Web Token](https://jwt.io/introduction) (JWT) technology. You normally can just treat them as strings and pass them directly to the API, but because it uses this JWT technology, it is permitted to base64 decode the tokens and read out the internal JSON data. Inside the JSON you can for example find an expiration timestamp.

To obtain an authorization token from the authorization service, follow these steps:

1. Manually create an API token in the Marketing Suite dashboard. This token gives you access to the authorization service (but not yet to the actual REST API).
2. With the token from step 1, make an API call to the authentication service. This will hand out your authorization JWT token. 
3. You can use this second token to make calls to the REST API. The token remains valid for 24 hours.
4. After 24 hours - or any time earlier if you like - you can repeat step 2 to obtain a new token.

The first step is usually done manually, while the remaining steps are typically automated via API calls. It is permitted that you request a fresh JWT for each
and every call that you make to the API server. For efficiency however, we recommend to cache the tokens and reuse them for up to 24 hours.

### Step 1: obtaining an API Token

You can manually create API tokens in the [Marketing Suite dashboard](https://ms.copernica.com/#/admin/account/access-tokens). You can then use an API token to request a temporary JSON Web Token.
When creating an API token, you can specify that it should only be available for API v4, preventing its use in the URL of older API versions.

### Step 2: obtaining a JWT

Given an API token (see step 1 above), you can request a JWT from the authorization service. To do this, send a HTTP POST request to `https://authenticate.copernica.com`.
This must be a HTTP POST call, and the body data should contain the API token. With curl this looks like this:

```
curl -X POST https://authenticate.copernica.com
   -H "Content-Type: application/x-www-form-urlencoded" 
   -d "access_token=YOUR_ACCESS_TOKEN"
```

The response contains a JWT string, that you can then use in calls to the API server.

### Step 3: making calls using the Authorization header

For every call to the REST API (whether it's a GET, POST, PUT, or DELETE call), you must include an "Authorization" header. This header has the format "Authorization: Bearer {your_json_web_token}". If making a call with 'curl,' it can be done as follows:

```
curl https://api.copernica.com/v4/identity -H "Authorization: Bearer {your_json_web_token}"
```

Keep in mind that the token is valid for 24 hours. After this period, you need to fetch a new token from the authentication service. It is also possible to fetch new tokens much earlier than that, or use multiple tokens at the same time.

## OAuth Linking

Tokens granting access to accounts of other companies are obtained through an [OAuth handshake](./rest-oauth.md). This is especially relevant when creating links for third parties.

We distinguish between API applications and API tokens, especially concerning OAuth links. An outsider must be able to differentiate between the application you want to link (your application) and the access right obtained (the API token). If you don't need OAuth links, you can use the default application when creating API tokens.

## Data Format

When using POST or PUT to send data to Copernica, you can place the data in the body of your request in various ways. Copernica checks the content-type header to determine the format of the provided data.

 offers the most powerful method, allowing the exchange of complex nested data structures with Copernica. However, we also support the traditional method where variables are sent through HTTP POST requests. In the example below, we send a request to the REST API to create a profile with ID 1234 in the database. The body contains a  object with the properties of the new profile:

```
POST /database/1234/profiles HTTP/1.1
Host: api.copernica.com
Content-Type: application/

{
    "fields":
    {
        "email":"info@example.com"
    }
}
```

Instead of the above request (using ), you could also send a 'traditional' HTTP POST request:

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
