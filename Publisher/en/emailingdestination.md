Information about a destination of an emailing retrieved with the
/emailingdestination/\$destinationID method.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/emailingdestination/\$destinationID | GET | Properties of an emailing destination |

-------------------------------------

An emailing destination can contain the following information:

-   **ID** (int, system field, cannot be edited)
-   **Timestampsent** (datetime, system field, cannot be edited)
-   **Internal** (int, cannot be edited. Contains the increasing
    internal destionationID. These ID should not be published, since
    that would enable recipients to take over the identity of over
    recipients.)
-   **Profile** (int, cannot be edited, contains the ID of the profile
    that received the emailing.)
-   **Subprofile** (int, cannot be edited, contains the ID of the
    subprofile that received the emailing.)
-   **Mailing** (int, cannot be edited, contains the ID of mailing.)

GET Request
-----------

Request information about an emailingdestination in an account. The
request returns a message containing the identifier of the destination,
the timestamp of sending, the internal idenifier of the destination, the
profile id, subprofile id and mailing id .

### Example output

Upon a successful request, you will receive a message similar to the
example below.

~~~~ {.language-javascript}
HTTP/1.1 200 OK
Date: Mon,
 11 Aug 2014 12:11:43 GMT 
Server: Apache 
Transfer-Encoding: chunked 
Content-Type: application/json 

{
    "ID":"0c30329ebf4d172cd8915ae2318253d2",
    "timestampsent":"2014-06-18 14:57:13",
    "internal":"504172",
    "profile":"7101426",
    "subprofile":null,
    "mailing":"161511"
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

