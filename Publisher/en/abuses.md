All abuses in an account can be retrieved with the /abuses method.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/abuses | GET | fields[] |

Properties of an abuse
----------------------

An abuse contains the following information:

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

Request information about the abuses in an account.

The `fields[]` parameter can be included in the request URL to constrain
the number of returned abuses.

### Example output

Upon a successful request, you will receive a message similar to the
example below.

~~~~ {.language-javascript}
HTTP/1.1 200 OK
Date: Mon, 10 Feb 2014 12:25:37 GMT
Server: Apache/2.2.22(Ubuntu)
X-Powered-By: PHP/5.3.10 - 1ubuntu3.9
Content-Length: 2059
Content-Type: application/json

{
    "start":"0",
    "limit":"21",
    "total":"21",
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

### Searching for abuses with the GET request

By providing the `fields[]` GET parameter the results can be filtered.
The field on which can be filtered is `timestamp`. The datetime format
we use is YYYY-MM-DD HH:MM:SS and can look like 2014-08-01 10:40:31.
With these GET parameters the url of a call could look like this:

~~~~ {.language-javascript}
/abuses?fields[]=timestamp==2014-01-01 10:40:31&access_token=...
~~~~

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](./the-copernica-rest-api.md)

