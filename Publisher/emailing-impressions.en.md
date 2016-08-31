The impressions of an emailing can be retrieved with the
/emailing/\$emailingID/impressions method. It is possible to filter the
returned impressions with the field
[parameter](./rest-api-parameters.en.md).

Request url

Methods

Parameters

https://api.copernica.com/emailing/\$emailingID/impressions

GET

limit, start, fields[]

Properties of emailing errors
-----------------------------

The impressions of an emailing can contain the following information:

-   **ID** (int, system field, cannot be edited.)
-   **timestamp** (datetime, system field, cannot be edited.)
-   **ip** (cannot be edited. The IP address that opened the email.)
-   **user-agent** (string, cannot be edited. Contains the user-agent
    with which the mailing was opened.)
-   **referer** (string, cannot be edited.)
-   **destination** (int, cannot be edited. The destination of this
    mailing which opened the mailing.)
-   **profile** (int, cannot be edited. The ID of the profile.)
-   **subprofile** (int, cannot be edited. Contains the ID of the
    subprofile.)

GET Request
-----------

Request information about the impressions of an emailing in an account.
The request returns a message containing the identifier of the
impression, a timestamp, the ip-address, the user-agent, referer,
destination, profile ID and the subprofile ID.

### Example output

Upon a successful request, you will receive a message similar to the
example below.

~~~~ {.language-javascript}
HTTP/1.1 200 OK
Date: Mon, 11 Aug 2014 12:40:40 GMT 
Server: Apache 
Transfer-Encoding: chunked 
Content-Type: application/json 

{
    "start":"400",
    "limit":"2",
    "total":56551,
    "data":[
        {
        "ID":"3151806",
        "timestamp":"2014-06-18 14:54:00",
        "ip":null,
        "user-agent":"Outlook 2013,
         Windows 7",
        "referer":"",
        "destination":"502783",
        "profile":"7010267",
        "subprofile":null
        },
        ...
    ]
}
~~~~

### Searching for emailing impressions with the GET request

By providing the limit or start
[parameters](./rest-api-parameters.en.md)
the results can be controlled. You can also filter the results using the
fields[] parameter. An example for retrieving only the impressions that
occurred before a particular timestamp:

~~~~ {.language-javascript}
emailing/$emailingID/impressions?fields[]=timestamp<=2014-06-18%14:00:00&access_token=...
~~~~
