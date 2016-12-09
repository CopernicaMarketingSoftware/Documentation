The amount of unsubscribes of an emailing can be retrieved with the
/emailing/\$emailingID/unsubcribes method.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/emailing/\$emailingID/unsubcribes | GET | start, limit, fields[] |

Properties of the emailing unsubcribes
--------------------------------------

The unsubcribes of an emailing contain the following information:

### Example output

Upon a successful request, you will receive a message similar to the
example below.

-   **ID** (int, cannot be edited. Contains the ID of the unsubscribe.)
-   **timestamp** (datetime, cannot be edited. Contains the timestamp of
    the unsubscribe.)
-   **source** (string, cannot be edited. Contains the source of the
    unsubscribe.)
-   **success** (boolean, cannot be edited. Indicates if the unsubscribe
    was successfull.)
-   **profile** (int, cannot be edited. ID of the profile that
    unsubscribed.)
-   **subprofile** (int, cannot be edited. ID of the subprofile that
    unsubscribed.)

GET Request
-----------

Request information about the unsubscribes of an emailing in an account.
The request returns a message containing the ID, timestamp, source,
successfulness, profile and subprofile of the unsubscribe.

### Example output

```
HTTP/1.1 200 OK
Date: Mon, 11 Aug 2014 12:40:40 GMT 
Server: Apache 
Transfer-Encoding: chunked 
Content-Type: application/json 

{
    "start":0,
    "limit":1,
    "total":1,
    "data":[
        {
            "ID":"430",
            "timestamp":"2014-06-03 21:17:07",
            "source":"email",
            "success":true,
            "destination":"488008",
            "profile":"7015304",
            "subprofile":null
        },
        ...
    ]
}
```

### Searching for emailing unsubscribes with the GET request

By providing the limit or start
[parameters](./rest-api-parameters.md)
the results can be controlled. You can also filter the results using the
fields[] parameter. An example for retrieving only the unsubscribes that
occurred before a particular timestamp:

```
emailing/$emailingID/unsubscribes?fields[]=timestamp<=2014-06-18%14:00:00&access_token=...
```
