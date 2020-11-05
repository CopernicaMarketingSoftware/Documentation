# REST API requests and replies

You can start sending HTTP requests to the API endpoint after 
[registering your application](./rest-introduction). The address of the 
endpoint is:

`https://api.copernica.com/v2/path/to/resource?access_token=yourtoken`

Where "/path/to/resource" differs depending on the call you are executing. 
You should also always add your access token to the call.

Just like every REST API, you use HTTP GET requests to retrieve data, POST
and PUT requests to create or overwrite data, and HTTP DELETE to remove data.
The HTTP GET requests usually return a JSON string as body data. The other
requests (POST, PUT and DELETE) do not return body data, but do add a header
holding the identifier of the resource that was created, updated or removed.

## Sending data to the API

There are two ways to encode the data that you send with POST and PUT requests: using 
the traditional *application/x-www-form-urlencoded* content-type, or using the 
*application/json* content-type. The Copernica API server inspects the content-type
header of your request to decide how the request body should be treated: as normal
HTTP POST data or as a JSON object.

JSON is the most powerful and therefore recommended way to send data to the API, 
because it allows you to send nested data structures. But we also recognize 
traditional "x-www-form-urlencoded" data. The following example demonstrates the
request that you should send to the API to add a profile to database with ID 1234:

```
    POST /database/1234/profiles?access_token=yourtoken HTTP/1.1
    Host: api.copernica.com
    Content-Type: application/json
    
    {"email":"info@example.com"}
```

Instead of JSON encoding, you can also use the old-fashioned form encoding:

```
    POST /database/1234/profiles?access_token=yourtoken HTTP/1.1
    Host: api.copernica.com
    Content-Type: application/x-www-form-urlencoded
    
    email=info@example.com
```

The content-type header is only used for POST and PUT requests. For GET and 
DELETE requests we do not accept body data.

## The response from Copernica

The reply that you receive from the API servers depends on the type of 
requests that you sent, as well as the result. Common responses, possible 
for all request types, are "200 OK" for a successful request and "400 Bad Request" 
for a failed request. In case of a failed request the error message will 
be included in the response body.

A successful GET request will be met with a "200 OK" reply and 
the response body will contain the requested data encoded in a JSON string. 
Another possible code is "301 Moved Permanently" for calls that have been moved.

Other status codes include the "201 Created" code for a successful POST request. PUT methods 
that have successfully altered data will return a "200 OK". However, it is possible that 
a PUT method will create a new entity, in which case a "303 See Other" code will 
refer you to the new entity. POST and PUT 
requests can also contain **X-location** headers with the URL of the entities 
that were created. For example `X-location: https://api.copernica.com/v1/profile/$profileID`
for calls that create or update profiles. Successful DELETE 
requests hold an **X-deleted** header, like `X-deleted: profile $profileID`.

POST, PUT and DELETE calls that did not result in an error will not contain 
any data in their response body.

## More information

The following articles contain other relevant information about the REST API:

* [Overview of available API methods](./rest-api.md)
* [Parameters that are supported by methods to fetch lists of entities](rest-paging)
