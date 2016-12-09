The overall statistics of an emailing can be retrieved with the
/emailing/\$emailingID/statistics method.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/emailing/\$emailingID/statistics | GET | none |

Properties of the emailing statistics
-------------------------------------

The statistics of an emailing contains the following information:

-   **clicks** (array(2), cannot be edited. Contains the total and
    unique clicks of the emailing.)
-   **impressions** (array(2), cannot be edited. Contains the total and
    unique impressions of the emailing)
-   **errors** (array(2), cannot be edited. Contains the total and
    unique errors of the emailing)
-   **unsubscribes** (array(2), cannot be edited. Contains the total and
    unique unsubscribes of the emailing)
-   **abuses** (array(2), cannot be edited. Contains the total and
    unique abuses of the emailing)

GET Request
-----------

Request information about the statistics of an emailing in an account.
The request returns a message containing the clicks, impressions, erors,
unsubsribes and abuses of an emailing.

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
    "clicks":
    {
        "total":"217",
        "unique":"141"
    },
    "impressions":
    {
        "total":"56551",
        "unique":"1143"
    },
    "errors":
    {
        "total":"448",
        "unique":"448"
    },
    "unsubscribes":
    {
        "total":"0",
        "unique":"0"
    },
    "abuses":
    {
        "total":"0",
        "unique":"0"
    }
}
```
