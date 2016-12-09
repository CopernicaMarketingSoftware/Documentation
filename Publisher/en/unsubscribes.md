All unsubscribes in an account can be retrieved with the /unsubscribes
method.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/unsubscribes | GET | fields[] |

Properties of an unsubscribe
----------------------------

An unsubscribe contains the following information:

-   **ID** (int, system field)
-   **timestamp** (datetime, system field)
-   **source**(string, the source of the unsubscription)
-   **success** (boolean, indicates whether the unsubscription was
    successful)
-   **emailing** (int, id of the emailing)
-   **destination** (int, id of the destination)
-   **profile** (int, id of the profile)
-   **subprofile** (int, id of the subprofile)

GET Request
-----------

Request information about the unsubscribes in an account.

The `fields[]` parameter can be included in the request URL to constrain
the number of returned unsubscribes.

### Example output

Upon a successful request, you will receive a message similar to the
example below.

```
HTTP/1.1 200 OK
Date: Mon, 10 Feb 2014 12:25:37 GMT
Server: Apache/2.2.22(Ubuntu)
X-Powered-By: PHP/5.3.10 - 1ubuntu3.9
Content-Length: 2059
Content-Type: application/json
{
    "start":0,
    "limit":100,
    "total":441,
    "data":[
        {
            "ID":"1",
            "timestamp":"2012-07-26 15:45:47",
            "source":"link",
            "success":true,
            "emailing":"67424",
            "destination":"254044",
            "profile":"7015531",
            "subprofile":null
        },
        ...
    ]
}
```

### Searching for unsubscribes with the GET request

By providing the `fields[]` GET parameter the results can be filtered.
The field on which can be filtered is `timestamp`. The datetime format
we use is YYYY-MM-DD HH:MM:SS and can look like 2014-08-01 10:40:31.
With these GET parameters the url of a call could look like this:

```
/unsubscribes?fields[]=timestamp==2014-01-01 10:40:31&access_token=...
```

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](./the-copernica-rest-api.md)

