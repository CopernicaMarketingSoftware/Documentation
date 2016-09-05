The abuses of an emailing can be retrieved with the
/emailing/\$emailingID/abuses method. It is possible to filter the
returned abuses with the field
[parameter](./rest-api-parameters.md).

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/emailing/\$emailingID/abuses | GET | limit, start, fields[] |

Properties of emailing errors
-----------------------------

The abuses of an emailing contain the following information:

-   **ID** (int, system field)
-   **timestamp** (datetime, system field)
-   **recognized\_as** (string, recognized type of message)
-   **feedback\_type** (string, which feedback type was received)
-   **arf-version** (version of arf)
-   **details** (details of abuse)
-   **emailing** (int, id of the emailing)
-   **destination** (int, id of the destination)
-   **profile** (int, id of the profile)
-   **subprofile** (int, id of the subprofile)

GET Request
-----------

Request information about the abuses of an emailing in an account. The
request returns a message containing the identifier of the abuse, a
timestamp, information about the abuse message, and the ID of the
mailing, destination, profile and the subprofile.

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
    "limit":21,
    "total":21,
    "data":[
        {
            "ID":"15",
            "timestamp":"2014-03-03 13:34:02",
            "recognized_as":"arf",
            "feedback_type":"abuse",
            "arf_version":"0.1",
            "details":"feedback-type: abuse\r\nuser-agent: USFamilyReporting\r\nversion: 0.1\r\nreceived-date: Mon, 03 Mar 2014 03:08:54 -0600 (CST)\r\nsource-ip: 145.255.128.***",
            "emailing":"137526",
            "destination":"459354",
            "profile":"7060089",
            "subprofile":null
        },
        ...
    ]
}
~~~~

### Searching for emailing abuses with the GET request

By providing the limit or start
[parameters](./rest-api-parameters.md)
the results can be controlled. You can also filter the results using the
fields[] parameter. An example for retrieving only the abuses that
occurred before a particular timestamp:

~~~~ {.language-javascript}
emailing/$emailingID/abuses?fields[]=timestamp==2014-06-18%14:00:00&access_token=...
~~~~
