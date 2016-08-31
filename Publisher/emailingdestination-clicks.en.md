Information about the clicks of a destination of an emailing retrieved
with the /emailingdestination/\$destinationID/clicks method.

Request url

Methods

Parameters

https://api.copernica.com/emailingdestination/\$destinationID/clicks

GET

start, limit, fields[]

Properties of an click of an emailing destination
-------------------------------------------------

An click of an emailing destination can contain the following
information:

-   **ID** (int, system field, cannot be edited.)
-   **Link** (string, system field, cannot be edited. The link that was
    clicked.)
-   **Timestamp** (datetime, system field, cannot be edited.)
-   **IP** (cannot be edited. Contains the ip-address that from which
    the click was registered.)
-   **User-agent** (string, cannot be edited. Contains the name of the
    user-agent from which the click was registered.)
-   **Referer** (string, cannot be edited. Contains the name of referer
    from which the click was registered.)
-   **Destination** (int, cannot be edited, contains the ID the
    destination.)
-   **Profile** (int, cannot be edited, contains the ID of the profile
    that received the emailing.)
-   **Subprofile** (int, cannot be edited, contains the ID of the
    subprofile that received the emailing.)

GET Request
-----------

Request information about a click of an emailingdestination in an
account. The request returns a message containing the identifier of the
click, the timestamp of clicking, the ip-address, user-agent and referer
that clicked, the destination, the profile and the subprofile id.

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
"limit":"0",
"total":2,
"data":[
    {
        "ID":"394455",
        "link":"http:\/\/www.copernica.com\/nl\/afmelden\/{$profile.id}\/{$profile.code}\/",
        "timestamp":"2014-06-18 14:55:18",
        "ip":null,
        "user-agent":"Chrome 35.0.1916.153,
         Windows 8.1",
        "referer":"",
        "destination":"504172",
        "profile":"7101426",
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

### Searching for a click of an emailing destinations with the GET request

By providing the limit or start
[parameters](./rest-api-parameters.en.md)
the results can be controlled. You can also filter the results using the
fields[] parameter. An example for retrieving only the clicks of a
destinations from after a particular timestamp:

~~~~ {.language-javascript}
emailingdestinations/$destinationID/clicks?fields[]=timestampsent<=2014-06-18%14:00:00&access_token=...
~~~~
