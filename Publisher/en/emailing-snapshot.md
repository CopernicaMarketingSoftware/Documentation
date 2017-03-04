The snapshot of an emailing can be retrieved with the
/emailing/\$emailingID/snapshot method. It is possible to filter the
returned snapshot with the field
[parameter](./rest-api-parameters.md).

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/v1/emailing/\$emailingID/snapshot | GET | none |

Properties of the emailing snapshot
-----------------------------------

The snapshot of an emailing contains the following information:

-   **document** (int, cannot be edited. Contains the ID of the
    document.)
-   **name** (string, cannot be edited. Contains the name of a
    document.)
-   **from-address** (string, cannot be edited. Contains the
    form-address of the emailing.)
-   **subject** (string, cannot be edited. Contains the subject of the
    emailing.)

GET Request
-----------

Request information about the snapshot of an emailing in an account. The
request returns a message containing the ID of the document, the name of
the document, it's from-address and subject.

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
    "document":"15905",
    "name":"Kopie van Nieuwsbrief_Juni_2014",
    "from_address":"\"Copernica Nieuwsbrief\" ",
    "subject":"Richard van Hooijdonk keynote-spreker Copernica Summit"
}
```
