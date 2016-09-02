All deliveries in an account can be retrieved with the /deliveries
method.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/deliveries | GET | fields[] |

Properties of a delivery
------------------------

A delivery contains the following information:

-   **ID** (int, system field, cannot be edited)
-   **timestamp** (datetime, system field)
-   **attempt** (int, number of the attempt)
-   **smtp-response** (string, smtp-message received)
-   **emailing** (int, id of the emailing)
-   **destination** (int, id of the destination)
-   **profile** (int, id of the profile)
-   **subprofile** (int, id of the subprofile)

GET Request
-----------

Request information about the deliveries in an account.

The `fields[]` parameter can be included in the request URL to constrain
the number of returned deliveries.

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
    "start":0,
    "limit":1,
    "total":1,
    "data":[
        {
            "ID":"1",
            "timestamp":"2014-01-06 16:47:07",
            "attempt":"1",
            "smtp-response":"OK 1389023227 e2si84424569eeg.177 - gsmtp",
            "emailing":"1",
            "destination":"1",
            "profile":"64",
            "subprofile":null
        },
        ...
    ]
}
~~~~

### Searching for deliveries with the GET request

By providing the `fields[]` GET parameter the results can be filtered.
The field on which can be filtered is `timestamp`. The datetime format
we use is YYYY-MM-DD HH:MM:SS and can look like 2014-08-01 10:40:31.
With these GET parameters the url of a call could look like this:

~~~~ {.language-javascript}
/deliveries?fields[]=timestamp==2014-01-01 10:40:31&access_token=...
~~~~

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](./the-copernica-rest-api.md)

