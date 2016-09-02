Information about the unsubscribes of a destination of an emailing can
be retrieved with the /emailingdestination/\$destinationID/unsubscribes
method.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/emailingdestination/\$destinationID/unsubscribes | GET | start, limit, fields[] |

Properties of an unsubscribe of an emailing destination
-------------------------------------------------------

An unsubscribe of an emailing destination can contain the following
information:

-   **ID** (int, system field, cannot be edited.)
-   **Timestamp** (datetime, system field, cannot be edited.)
-   **Source** (string, cannot be edited, contains the source of the
    unsubscribe (e.g. 'email').)
-   **Success** (boolean, cannot be edited, indicates if the unsubscribe
    succeeded.)
-   **Destination** (int, cannot be edited, contains the ID the
    destination.)
-   **Profile** (int, cannot be edited, contains the ID of the profile
    that received the emailing.)
-   **Subprofile** (int, cannot be edited, contains the ID of the
    subprofile that received the emailing.)

GET Request
-----------

Request information about an unsubscribe of an emailingdestination in an
account. The request returns a message containing the identifier of the
unsubscribe, the timestamp, the source, the successfulness, the
destination, the profile and the subprofile id.

### Example output

Upon a successful request, you will receive a message similar to the
example below.

~~~~ {.language-javascript}
HTTP/1.1 200 OK
Date: Mon, 11 Aug 2014 12:11:43 GMT 
Server: Apache 
Transfer-Encoding: chunked 
Content-Type: application/json 

{
    "start":0,
    "limit":1,
    "total":1,
    "data":[
        {
            "ID":"431",
            "timestamp":"2014-06-03 21:17:08",
            "source":"email",
            "success":true,
            "destination":"475030",
            "profile":"7015304",
            "subprofile":null
        },
        ...
    ]
}
~~~~

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](./the-copernica-rest-api.md)

### Searching for an unsubscribe of an emailing destinations with the GET request

By providing the limit or start
[parameters](./rest-api-parameters.md)
the results can be controlled. You can also filter the results using the
fields[] parameter. An example for retrieving only the unsubscribes of a
destinations from after a particular timestamp:

~~~~ {.language-javascript}
emailingdestinations/$destinationID/unsubscribes?fields[]=timestampsent<=2014-06-18%14:00:00&access_token=...
~~~~
