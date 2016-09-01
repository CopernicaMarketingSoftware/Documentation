Database callbacks are used to automatically inform third party
applications on changes in a database. When a callback is invoked, an
HTTP POST request is sent to the specified URL, with an XML or JSON
message, containing information about the profile that was updated,
deleted or created. \
 Using this method, you can request the callback URLs from the database
associated with databaseID. Using the POST request, you can create a new
database callback URL.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/database/\$databaseID/callbacks | GET, POST | limit, start |

Callback data
-------------

The callback data property contains an object with its properties,
presented as a key-value pair.

-   **ID:** the callback identifier
-   **url:** The actual callback url (urlencoded)
-   **expression:** Javascript condition (string)
-   **action:** A callback URL can have an additional filter, to
    constrain the execution of the callback to certain actions only. The
    action filter can hold one of these values:
    'all','create','update','delete'
-   **Method:**'xml' or 'json'
-   **collection:** The collection (ID) that is bound to this callback.
-   **database:**The database (ID) that is bound to this callback

GET Request
-----------

Using this URL you can request information about the callbacks currently
associated with **\$databaseID**. Use additional `limit` and / or
`start`
[parameters](./rest-api-parameters.en.md)
to specify the maximum or range of callbacks to be retreived.

### Example output

~~~~ {.language-javascript}
{
    "start": 0,
    "limit": "1",
    "total": 2,
    "data": [
        {
            "ID": "21",
            "url": "http://www.callback.com/script.php",
            "expression": "",
            "method": "json",
            "action": "create",
            "collection": "8550",
            "database": 0
        }
    ]
}
~~~~

POST Request
------------

Using this URL you can update information about the callback associated
with **\$collectionID**.

In a POST request, only the actual callback URL is mandatory.

It is not needed to include the identifier of the callback in the
message, as this is already included in the URL

### Example POST request

The message below will create a new callback in the collection.

### Example message to post

~~~~ {.language-javascript}
{
    "start": 0,
    "limit": 1,
    "total": 1,
    "data": [{
        "ID": "8",
        "url": "http:\/\/copernica.nl\/callback.php",
        "expression": "",
        "method": "json",
        "action": "update",
        "database": "788"
    }]
}
~~~~

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.en.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.en.md)
-   [PHP example scripts for POST, GET and DELETE requests](./usage.en.md)
-   [REST API resources / methods](requests-index.html)

