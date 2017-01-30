# REST API requests and responses

Once you have established a connection between the Copernica REST API and your app or website, said app or website can send HTTP requests to the *endpoint* of the API on our server. The address of this endpoint is https://api.copernica.com/path/to/resource?access_token=yourtoken. The "/path/to/resource" bit is different for every request, and determines which data is requested or edited. The URL always needs an access_token as well, to identify your application.

You can send HTTP GET requests to request data, HTTP POST and HTTP PUT to add or edit data, and HTTP DELETE to delete data. The data returned upon a GET request is usually sent in a JSON object. In POST, PUT and DELETE requests, the response is located in the header.

## Sending data to Copernica

When using POST or PUT to send data to Copernica, there are multiple ways to place the data in the body. Copernica checks the content-type header to determine the format of your data.

The most powerful way of submitting content is by using JSON in the body of your request. This is because JSON also supports complex, nested data structues. However, we also support the traditional way of sending variables along with HTTP POST calls. The following example demonstrates the request you can send to the REST API to add a new profile in the database with ID 1234. The body contains a JSON object with the properties of the new profile.

<example>

Instead of using the JSON, you could also send a traditional HTTP POST request:

<example>

The content-type header is only applicable on POST and PUT requests. GET and DELETE requests dont support body content.

## Processing the response

The response Copernica returns depends on the type of request. GET requests return a "200 OK" message when the requested data is available, with the data in a JSON object in the body.

The other types of requests (POST, PUT and DELETE) also use the "200 OK" when the request is successful, but they don't send any body data. Instead, they use special HTTP headers to report the action. Successful requests return an *X-location* header that contains a link to the added or edited data, for example "X-location: https://api.copernica.com/profile/$profileID". A succesful DELETE request contains an *X-deleted* header: "X-deleted: profile $profileID".

Whenever something goes wrong with a request, Copernica will send back a "400 Bad request" header. In the body, you'll often find an error message, explaining in more detail what went wrong.

