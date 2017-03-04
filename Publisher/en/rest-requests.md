# REST API requests and replies

Once you have connected a website or app to [the Copernica REST API](./rest-api.md),
you can start sending HTTP requests to the API endpoint. The address of this 
endpoint is *https://api.copernica.com/v1/path/to/resource?access_token=yourtoken*,
where the "/path/to/resource" part of the URL identifies the data that you're
feching or updating. With every request you have to append an *access_token*
variable to the URL to identify your application and the account that is being accessed.

Just like every REST API, you use HTTP GET requests to retrieve data, POST
and PUT requests to add or overwrite data, and HTTP DELETE to remove things.
The HTTP GET requests normally return a JSON string as body data. The other
requests (POST, PUT and DELETE) do not return body data, but do add a header
holding the identifier of the resource that was created, updated or removed.


## Sending data to the API

There are two ways to encode the data that you send with POST and PUT requests: using 
the traditional *application/x-www-form-urlencoded* content-type, or using the 
*application/json* content-type. The Copernica API server inspects the content-type
header of your request to decide how the request body should be treated: as normal
HTTP POST data, or as a JSON object.

JSON is the most powerful and therefore recommended way to send data to the API, 
because it allows you to send nested data structures. But we also recognize 
traditional "x-www-form-urlencoded" data. The following example demonstrates the
request that you should send to the API to add a profile to database with ID 1234:

    POST /database/1234/profiles?access_token=yourtoken HTTP/1.1
    Host: api.copernica.com
    Content-Type: application/json
    
    {"email":"info@example.com"}

Instead of JSON encoding, you can also use the old-fashioned form encoding: 

    POST /database/1234/profiles?access_token=yourtoken HTTP/1.1
    Host: api.copernica.com
    Content-Type: application/x-www-form-urlencoded
    
    email=info@example.com

De content-type header is only used for POST and PUT requests. For GET and 
DELETE requests we do not accept body data.


## The response from Copernica

The reply that you receive from the API servers depends on the type of 
request that you sent. For GET requests you normally receive a "200 OK" reply,
with the requested data encoded as JSON string in the response body.

The other request types (POST, PUT and DELETE) also use a "200 OK" status code
to report success, but they do not include data in the response body. These
methods add a special HTTP header to the response that refers to the entity
that was just modified or created. The header of a successful POST or PUT
request contains a *X-location* header with the URL of the just created or modified
resource, for example "X-location: https://api.copernica.com/v1/profile/$profileID"
for calls that create or update profiles. The response to a successful 
DELETE request holds an "X-deleted" header: "X-deleted: profile $profileID".

For failed API calls a "400 Bad request" response is sent back. The body then
holds a JSON message describing the error.


## More information

The following articles contain other relevant information about the REST API:

* [Overview of available API methods](./rest-api.md)
* [Parameters that are suported by methods to fetch lists of entities](rest-paging)
