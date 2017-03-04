One specific emailing can be retrieved with the /emailing/\$emailingID
method.

| Request url | Methods | Parameters |
| https://api.copernica.com/v1/emailing/\$emailingID | GET | none |

Properties of an emailing
-------------------------

An emailing can contain the following information:

-   **ID** (int, system field, cannot be edited)
-   **Timestamp** (datetime, system field, cannot be edited)
-   **Destinations** (int, cannot be edited)
-   **Type** (string, cannot be edited, possible values: individual,
    mass)

GET Request
-----------

Request information about an emailing in an account. The request returns
a message containing the identifier of the emailing, the timestamp of
creation, the amount of destinations and the type.

### Example output

Upon a successful request, you will receive a message similar to the
example below.

```
HTTP/1.1 200 OK
Date: Mon, 11 Aug 2014 12:11:43 GMT 
Server: Apache 
Transfer-Encoding: chunked 
Content-Type: application/json 

{
id: "27"
timestamp: "2014-08-11 12:14:31"
destinations: "1"
type: "individual"
}
```

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](./the-copernica-rest-api.md)

