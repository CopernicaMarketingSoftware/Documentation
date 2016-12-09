The deliveries of an emailing can be retrieved with the
/emailing/\$emailingID/deliveries method. It is possible to filter the
returned clicks with the field
[parameter](./rest-api-parameters.md).

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/emailings | GET | limit, start, fields[] |

Properties of emailing deliveries
---------------------------------

The deliveries of an emailing can contain the following information:

-   **ID** (int, system field, cannot be edited)
-   **timestamp** (datetime, system field, cannot be edited)
-   **attempt** (int, cannot be edited. Number of attempts.)
-   **smtp-response** (string, cannot be edited. SMTP-response received
    from receiving server.)
-   **destination** (id, cannot be edited. Contains the destination ID
    for this emailing.)
-   **profile** (int, cannot be edited. Contains the ID of the profile,
    if the mailing has been sent to profiles.)
-   **subprofile** (int, cannot be edited. Contains the ID of the
    subprofile, if the mailing has been sent to subprofiles)

GET Request
-----------

Request information about the deliveries of an emailing in an account.
The request returns a message containing the identifier of the delivery,
a timestamp of the delivery, the number of attempts, the smtp-response,
destination ID, profile ID and subprofile ID.

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
    "start":0,
    "limit":"2",
    "total":3964,
    "data":[
        {
        "ID":"257154",
        "timestamp":"2014-06-18 12:52:14",
        "attempt":"1",
        "smtp-response":"Ok: queued as E116F1A010B",
        "destination":"499933",
        "profile":"7005106",
        "subprofile":null
        }, 
        ...
    ]
}
```

### Searching for emailing deliveries with the GET request

By providing the limit or start
[parameters](./rest-api-parameters.md)
the results can be controlled. You can also filter the results using the
fields[] parameter. An example for retrieving only deliveries after a
particular timestamp:

```
emailing/$emailingID/deliveries?fields[]=timestamp<=2014-06-18%14:00:00&access_token=...
```
