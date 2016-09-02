The destinations of an emailing can be retrieved with the
/emailing/\$emailingID/destinations method. It is possible to filter the
returned destinations with the field
[parameter](./rest-api-parameters.md).

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/emailing/\$emailingID/destinations | GET | limit, start, fields[] |

Properties of emailing destinations
-----------------------------------

The destinations of an emailing can contain the following information:

-   **ID** (int, system field, cannot be edited)
-   **timestampsent** (datetime, system field, cannot be edited)
-   **internal** (int, cannot be edited. This is an internal ID for the
    destination. Using this will increase the speed. Because it is an
    incrementing number for every destination, it should not be used
    publicly.)
-   **profile** (int, cannot be edited. Contains the ID of the profile,
    if the mailing has been or will be sent to profiles.)
-   **subprofile** (int, cannot be edited. Contains the ID of the
    subprofile, if the mailing has been or will be sent to subprofiles)
-   **mailing** (int, cannot be edited. ID of the mailing.)

GET Request
-----------

Request information about the destination of an emailing in an account.
The request returns a message containing the identifier of the
destination, a timestampsent, an internal identifier, profile ID,
subprofile ID and the mailing ID.

### Example output

Upon a successful request, you will receive a message similar to the
example below.

~~~~ {.language-javascript}
HTTP/1.1 200 OK
Date: Mon, 11 Aug 2014 12:40:40 GMT 
Server: Apache 
Transfer-Encoding: chunked 
Content-Type: application/json 

{
    "start":0,
    "limit":"100",
    "total":4335,
    "data":[
        {"ID":"08e1ed5afdff86baa9935ac79e11a977",
        "timestampsent":"2014-06-18 14:55:50",
        "internal":"499932",
        "profile":"7005102",
        "subprofile":null,
        "mailing":"161511"
        },
        ...
    ]
}
~~~~

### Searching for emailing destinations with the GET request

By providing the limit or start
[parameters](./rest-api-parameters.md),
the results can be controlled. You can also filter the results using the
fields[] parameter. An example for retrieving only the destinations to
which a mailing has been sent after a particular timestamp:

~~~~ {.language-javascript}
emailing/$emailingID/destinations?fields[]=timestampsent<=2014-06-18%14:00:00&access_token=...
~~~~
