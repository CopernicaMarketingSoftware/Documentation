Information about the impressions of a destination of an emailing can be
retrieved with the /emailingdestination/\$destinationID/impressions
method.

Request url

Methods

Parameters

https://api.copernica.com/emailingdestination/\$destinationID/impressions

GET

start, limit, fields[]

Properties of an impression of an emailing destination
------------------------------------------------------

An impression of an emailing destination can contain the following
information:

-   **ID** (int, system field, cannot be edited.)
-   **Timestamp** (datetime, system field, cannot be edited.)
-   **IP** (datetime, system field, cannot be edited. The IP address
    that loaded the remote content.)
-   **User-agent** (datetime, system field, cannot be edited. The
    user-agent with which the remote content was loaded.)
-   **Referer** (datetime, system field, cannot be edited. The referer
    with which the remote content was loaded.)
-   **Destination** (int, cannot be edited, contains the ID the
    destination.)
-   **Profile** (int, cannot be edited, contains the ID of the profile
    that received the emailing.)
-   **Subprofile** (int, cannot be edited, contains the ID of the
    subprofile that received the emailing.)

GET Request
-----------

Request information about an impression of an emailingdestination in an
account. The request returns a message containing the identifier of the
impression, the timestamp, the ip-address, the user-agent, the referer,
the destination, the profile and the subprofile id.

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
    "limit":"1",
    "total":82,
    "data":[
        {
            "ID":"3151393",
            "timestamp":"2014-06-18 14:53:00",
            "ip":null,
            "user-agent":"Outlook 2007,
             Windows 7",
            "referer":"",
            "destination":"503040",
            "profile":"7013009",
            "subprofile":null
        },
        ...
    ]
}
~~~~

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.en.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.en.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.en.md)
-   [REST API resources / methods](./the-copernica-rest-api.en.md)

### Searching for an impression of an emailing destinations with the GET request

By providing the limit or start
[parameters](./rest-api-parameters.en.md)
the results can be controlled. You can also filter the results using the
fields[] parameter. An example for retrieving only the impressions of a
destinations from after a particular timestamp:

~~~~ {.language-javascript}
emailingdestinations/$destinationID/impressions?fields[]=timestampsent<=2014-06-18%14:00:00&access_token=...
~~~~
