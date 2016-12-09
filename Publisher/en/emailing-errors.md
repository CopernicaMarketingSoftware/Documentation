The errors of an emailing can be retrieved with the
/emailing/\$emailingID/errors method. It is possible to filter the
returned errors with the field
[parameter](./rest-api-parameters.md).

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/emailing/\$emailingID/errors | GET | limit, start, fields[] |

Properties of emailing errors
-----------------------------

The errors of an emailing can contain the following information:

-   **ID** (int, system field, cannot be edited.)
-   **timestamp** (datetime, system field, cannot be edited.)
-   **errorcode** (cannot be edited. This is the SMTP response.)
-   **description** (string, cannot be edited. What the SMTP response
    stand for.)
-   **errortype** (cannot be edited.)
-   **errortypedescription** (cannot be edited.)
-   **destination** (cannot be edited. The destination of this mailing
    where the error occurred.)
-   **profile** (cannot be edited. The ID of the profile where the error
    occurred.)
-   **subprofile** (int, cannot be edited. Contains the ID of the
    subprofile, where the error occurred.)

GET Request
-----------

Request information about the errors of an emailing in an account. The
request returns a message containing the identifier of the error, a
timestamp, the errorcode and its description, the errortype and its
description, the profile ID and subprofile ID.

### Example output

Upon a successful request, you will receive a message similar to the
example below.

```
HTTP/1.1 200 OK
Date: Mon, 11 Aug 2014 12:40:40 GMT 
Server: Apache 
Transfer-Encoding: chunked 
Content-Type: application/json 

{
    "start":"400",
    "limit":"2",
    "total":448,
    "data":[
        {
        "ID":"385899",
        "timestamp":"2014-06-18 15:08:48",
        "errorcode":"",
        "description":"",
        "errortype":"error",
        "errortypedescription":"Geweigerd door ontvangende mailserver",
        "destination":"500599",
        "profile":"7006220",
        "subprofile":null
        },
        ...
    ]
}
```

### Searching for emailing errors with the GET request

By providing the limit or start
[parameters](./rest-api-parameters.md)
the results can be controlled. You can also filter the results using the
fields[] parameter. An example for retrieving only the errors that
occurred before a particular timestamp:

```
emailing/$emailingID/errors?fields[]=timestamp<=2014-06-18%14:00:00&access_token=...
```
