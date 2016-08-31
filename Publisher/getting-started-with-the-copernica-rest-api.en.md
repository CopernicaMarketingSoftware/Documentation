The Copernica REST API allows you to retrieve, create, update or delete
any data stored in your Copernica account. The REST API is offered only
through secured (https) connections to make sure it has not been
tampered with during transfer.

The REST service is accessible on: **https://api.copernica.com**

### Usage example

Let's say, you need all information of a specific profile identified by
it's id 1234. The call to the REST API to retrieve this data would be:
[https://api.copernica.com/profile/1234?access\_token=abc123](profile-request)

Each call to the REST API requires an access token to be supplied as
extra parameter. The `access_token` is used to authorize your request.
Obviously, you don't have access to information stored by other clients
and other information you are not allowed to access.

### Obtaining an access token

There are two different ways to obtain an access token. You can request
a token in your [application
dashboard](https://www.copernica.com/en/applications) or you can [use
OAuth 2.0 authentication](setting-up-copernica-rest-service) to obtain a
token. To maintain readability throughout the documentation we will
construct the URLs without access\_tokens. Keep in mind, it is essential
for you to add this access token to each API call; without a token you
will not be able to access any data.

### HTTP Requests

Besides retrieving data, you can also modify, add or delete data using
the API. This is done through various types of HTTP requests, as is
customary with REST APIs. Copernica uses standard HTTP GET requests to
retrieve data while HTTP POST requests can be used to add data.
Furthermore, HTTP DELETE can be used to delete data.

In the current implementation of our REST API, **POST and PUT requests
can be used interchangeably**. However, this is expected change in a
future release, so it is advised to use POST requests for adding new
data, and use PUT requests when you are updating existing data.

The REST API [resource specifications](./the-copernica-rest-api.en.md) will
state the type of requests it supports and, if needed, extra
requirements.

### JSON encoding

In POST and PUT requests you will have to send the data to store/modify
along with the request. This can be done through a JSON encoded message.
In our [examples](./example-get-post-and-delete-requests.en.md) you can see how
to JSON encode your data.

The API uses the `content-type` stated in the JSON message to determine
the type of data that is submitted.

Keep in mind, the keys of the submitted key-value pairs in your message
are case sensitive, e.g., `{ "title" : "sir" }` will not work, if the
correct pair is `{ "Title" : "sir" }`.

### Retrieving database, collection and profile field names

A database is an ever changing entity, where fields and tables are added
when they are needed. Therefor when you are developing an application to
work with this API, we suggest you first run the following calls to
receive the most current field definitions.

-   [/database/\$ID/fields](./database-fields.en.md)
-   [/collection/\$ID/fields](./collection-fields.en.md)
-   [/profile/\$ID/fields](./profile-fields.en.md)

Replace \$ID with the ID of the database/collection/profile that you
want to check.

### In case of an error

On error or invalid requests, a message will be sent back containing a
HTTP 400 (Bad Request) header. An example output of such an error
message, raised when trying to connect with an unknown access\_token,
is:

    {
        "error" : {
            "message" : "Invalid access token"
        }
    }

### In case of a successful request

If a request is successful, a header is sent back. This header contains
different information for different requests. Successful GET requests
set no header information, since you will retrieve the actual data.
Successful POST and PUT requests return a link to the updated/added
information. This is in the form of
`X-Location:         https://api.copernica.com/profile/$profileID` when
a profile is added or updated. A successful DELETE request returns a
`X-Deleted:         profile $profileID` header.

Most data returned will be in a key-value pair. We use the following
syntax to keep track of what is sent back.

-   `"key" : "value"` both the key and the value are strings.
-   `"key" : 1` the key is a string, the value an integer.
-   `"key" : [ ... ]` the key is a string, the value is an indexed
    array.
-   `"key" : { ... }` the key is a string, the value is an associative
    array.

In our examples thoughout this documentation we use 3 periodes `...`
when more data is returned but not listed for the sake of readability.

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.en.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.en.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.en.md)
-   [REST API resources / methods](./the-copernica-rest-api.en.md)
-   [REST API Parameters](./rest-api-parameters.en.md)

