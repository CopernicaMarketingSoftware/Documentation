The clicks of an emailing can be retrieved with the
/emailing/\$emailingID/clicks method. It is possible to filter the
returned clicks with the field
[parameter](./rest-api-parameters.en.md).

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/emailings | GET | limit, start, fields[] |

Properties of emailing clicks
-----------------------------

An emailing can contain the following information:

-   **ID** (int, system field, cannot be edited)
-   **Link** (hyperlink, cannot be edited)
-   **Timestamp** (datetime, system field, cannot be edited)
-   **ip** (string, cannot be edited. Contains ip-address from the
    device that clicked the link.)
-   **user-agent** (string, cannot be edited)
-   **referer** (string, cannot be edited. Contains the webaddress from
    which the link has been opened, if that happened from within the
    webversion.)
-   **destination** (id, cannot be edited. Contains the destionation ID
    for this emailing.)
-   **profile** (int, cannot be edited. Contains the ID of the profile
    that clicked, if the mailing has been sent to profiles.)
-   **subprofile** (int, cannot be edited. Contains the ID of the
    subprofile that clicked, if the mailing has been sent to
    subprofiles)

GET Request
-----------

Request information about the clicks of an emailing in an account. The
request returns a message containing the identifier of the clicks, the
hyperlink which has been clicked, a timestamp of the click, the
ip-address that clicked the link, the referer, destionation ID, profile
ID and subprofile ID.

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
"start":0,
"limit":"1",
"total":217,
"data":[
    {
    "ID":"394455",
    "link":"http:\/\/www.copernica.com\/nl\/afmelden\/{$profile.id}\/{$profile.code}\/",
    "timestamp":"2014-06-18 14:55:18",
    "ip":null,
    "user-agent":"Chrome 35.0.1916.153,
     Windows 8.1",
    "referer":"",
    "destination":"504172",
    "profile":"7101426",
    "subprofile":null
    }
]
}
~~~~

### Searching for emailing clicks with the GET request

By providing the limit or start
[parameters](./rest-api-parameters.en.md)
the results can be controlled. You can also filter the results using the
fields[] parameter. An example for retrieving only clicks after a
particular timestamp:

~~~~ {.language-javascript}
emailing/$emailingID/clicks?fields[]=Timestamp<=2014-06-18%14:00:00&access_token=...
~~~~
