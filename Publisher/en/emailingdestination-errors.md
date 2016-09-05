Information about the errors of a destination of an emailing retrieved
with the /emailingdestination/\$destinationID/errors method.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/emailingdestination/\$destinationID/errors | GET | start, limit, fields[] |

Properties of an error of an emailing destination
-------------------------------------------------

An error of an emailing destination can contain the following
information:

-   **ID** (int, system field, cannot be edited.)
-   **Timestamp** (datetime, system field, cannot be edited.)
-   **Errorcode** (string, system field, cannot be edited. The smtp
    response of the error.)
-   **Description** (string, cannot be edited, contains the description
    of the SMTP response.)
-   **Errortype** (string, cannot be edited, contains the type of error
    that occurred.)
-   **Errortypedescription** (string, cannot be edited, contains the
    description of the type of error that occurred.)
-   **Destination** (int, cannot be edited, contains the ID the
    destination.)
-   **Profile** (int, cannot be edited, contains the ID of the profile
    that received the emailing.)
-   **Subprofile** (int, cannot be edited, contains the ID of the
    subprofile that received the emailing.)

GET Request
-----------

Request information about a error of an emailingdestination in an
account. The request returns a message containing the identifier of the
error, the timestamp of occurrence, the errorcode and it's description,
the errortype and it's description, the destination, the profile and the
subprofile id.

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
            "ID":"385499",
            "timestamp":"2014-06-18 12:52:17",
            "errorcode":"",
            "description":"",
            "errortype":"nohost",
            "errortypedescription":"Domeinnaam omzetten naar IP-adres",
            "destination":"500133",
            "profile":"7005639",
            "subprofile":null
        },
        ...
    ]
}
~~~~

### Searching for a error of an emailing destinations with the GET request

By providing the limit or start
[parameters](./rest-api-parameters.md)
the results can be controlled. You can also filter the results using the
fields[] parameter. An example for retrieving only the errors of a
destinations from after a particular timestamp:

~~~~ {.language-javascript}
emailingdestinations/$destinationID/errors?fields[]=timestampsent<=2014-06-18%14:00:00&access_token=...
~~~~

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](./the-copernica-rest-api.md)

