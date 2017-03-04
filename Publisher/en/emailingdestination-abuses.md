Information about the abuse reports of a destination of an emailing can
be retrieved with the /emailingdestination/\$destinationID/abuses
method.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/v1/emailingdestination/\$destinationID/abuses | GET | fields[] |

Properties of an abuse report of an emailing destination
--------------------------------------------------------

An abuse of an emailing destination can contain the following
information:

-   **Timestamp** (datetime, system field, cannot be edited.)
-   **Recognized\_as** (string, cannot be edited.)
-   **Feedback\_type** (string, cannot be edited.)
-   **Arf-version** (int, cannot be edited.)
-   **Details** (string cannot be edited, contains detailed infomation
    about the abuse report.)
-   **Destination** (int, cannot be edited, contains the ID the
    destination.)
-   **Profile** (int, cannot be edited, contains the ID of the profile
    that received the emailing.)
-   **Subprofile** (int, cannot be edited, contains the ID of the
    subprofile that received the emailing.)

GET Request
-----------

Request information about an abuse report of an emailing destination in
an account. The request returns a message containing the timestamp,
feedback type, details, destination, profile and subprofile id.

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
    "start":0,
"limit":2,
"total":2,
"data":[
        {
            "timestamp":"2014-08-13 15:54:02",
            "recognized_as":"arf",
            "feedback_type":"spam",
            "arf_version":"0",
            "details":"feedback-type: spam\r\nuser-agent: Hotmail\r\nversion: 0\r\noriginal-mail-from: rcv-0bca08b21f681c68e906ebc88a2146c9-24@publisher.copernica.nl\r\narrival-date: 2014-08-13 13:53:11\r\nreporting-mta: Hotmail\r\nsource-ip: 87.213.25.186\r\nincidents: 1\r\nauthentication-results: NONE\r\noriginal-rcpt-to: jonaslodewegen@hotmail.com",
            "destination":"892827",
            "profile":"9080228",
            "subprofile":null
        },
        ...
    ]
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

### Searching for an abuse report of an emailing with the GET request

By providing the limit or start
[parameters](./rest-api-parameters.md)
the results can be controlled. You can also filter the results using the
fields[] parameter. An example for retrieving only the abuse reports
from after a particular timestamp:

```
emailingdestination/$destinationID/abuses?fields[]=timestampsent<=2014-06-18%14:00:00&access_token=...
```
