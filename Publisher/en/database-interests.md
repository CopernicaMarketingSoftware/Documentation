An interest field is a special kind of field that accepts only two
values: true or false. It is used mainly for listing interests and
preferences of profiles, hence the name.

This method gives you access to the interest fields associated with
\$databaseID.

Note: interest fields are only available in databases, *NOT* in
collections.

### Interest groups

Interest fields can be grouped. You can have for example a group called
'Favorite\_color' that houses the interest fields 'Red', 'Green' and
'Pink'.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/database/\$databaseID/interests | GET, POST | limit, start |

GET request
-----------

The URL will retrieve all interests from \$databaseID. Optionally you
can include the
[parameters](./rest-api-parameters.md)
limit and start in the request URL to specify the number of returned
interests, and the starting point.

### Example return message

Upon a successful request you will receive a message containing all
interests of the database associated with \$databaseID. Each interest is
wrapped inside an object, with its identifier, name and the group to
which it belongs.

~~~~ {.language-javascript}
{
    "start": 0,
    "limit": 3,
    "total": 3,
    "data": [{
        "ID": "942",
        "name": "Nectarine",
        "group": "Fruit"
    }, {
        "ID": "943",
        "name": "Car",
        "group": "Transport"
    }, {
        "ID": "944",
        "name": "UFO",
        "group": "Transport"
    }]
}
~~~~

POST request
------------

Use a POST request to add an interest to a database. The message must
contain the name of the new interest, and ~~optionally~~ preferably the
group to which it should be added.

### Example message

This message created a new interest field 'Car', grouped under
'Transport'

~~~~ {.language-javascript}
{"name":"Car","group":"Transport"}
~~~~

The group name functions as an identifier. This subsequent POST request
will add another interest 'Yellow submarine' to the group 'Transport'

~~~~ {.language-javascript}
{"name":"Yellow submarine","group":"Transport"}
~~~~

### Result message interest POST request

A successful POST request is celebrated with a message with a link to
the database interests.

~~~~ {.language-javascript}
HTTP/1.1 201 Created
Date: Mon, 17 Feb 2014 13:39:11 GMT
Server: Apache/2.2.22 (Ubuntu)
X-Powered-By: PHP/5.3.10-1ubuntu3.9
Location: https://api.copernica.com/database/756/interests/
Content-Length: 0
Content-Type: application/json
~~~~

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](requests-index.html)

