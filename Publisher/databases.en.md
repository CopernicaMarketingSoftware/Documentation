Databases are (obviously) used to store information. Multiple databases
can exist in a single Copernica account. This method can be used to
either retrieve the current databases within a Copernica account or to
create a new database using a POST request. It is not yet possible to
delete databases using the API.

Request url

Methods

Parameters

https://api.copernica.com/databases

GET, POST

limit, start

Properties of a database
------------------------

A database can contain the following information:

-   **ID** (int, system field, cannot be edited)
-   **Name** (string)
-   **Description** (string)
-   **Archived** (bool)
-   **Created** (datetime, system field)
-   [Fields](./database-fields.en.md)
-   [Interests](./database-interests.en.md)
-   [Collections](./database-collections.en.md)

**ID** stores the identifier of the database, **name** stores the name
of the database and **description** stores an optional description of
the database. The **archived** flag shows whether the database is
archived (true) or not (false) and **created** stores the date and time
on which the database was created.

The field **Fields** contains an array of field objects with the
properties of each field. Such as the name and the data type of a field.

The **interests** field contains an array of the possible interests that
a profile can have, such as "Automotive", "Furry animals" or "Politics".

The **collections** field contains an array of the available
collections. Collections are an extra data layer related to profiles in
a database. You can think of a collection "Products" if you have a web
shop and want to store information about purchases of individual
customers (profiles).

GET Request
-----------

Request information about the databases in an account. The request
returns a message containing the identifier of the databases, their name
and (optional) description. It also returns whether a database is
archived and when it was created. The [fields](./database-fields.en.md),
[interests](./database-interests.en.md) and [collections](./database-collections.en.md)
fields each contain a `start/limit/total/data`, along with their
respective values.

`Limit` and `start`
[parameters](./rest-api-parameters.en.md)
can be included in the request URL to constrain the number of returned
databases.

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
    "ID": "1",
    "name": "B2B_Demo_Relations",
    "description": "",
    "archived": false,
    "created": "2014-02-10 10:33:27",
    "fields": {
        "start": 0,
        "limit": 9,
        "total": 9,
        "data": [{
            "ID": "1",
            "name": "Company",
            "type": "text",
            "value": "",
            "displayed": true,
            "ordered": true,
            "length": "255",
            "textlines": "0",
            "hidden": false,
            "index": false
        }, ...]
    },
    "interests": {
        "start": 0,
        "limit": 0,
        "total": 0,
        "data": []
    },
    "collections": {
        "start": 0,
        "limit": 1,
        "total": 1,
        "data": [{
            "ID": "10",
            "name": "Employees",
            "database": "1",
            "fields": {
                "start": 0,
                "limit": 8,
                "total": 8,
                "data": [{
                        "ID": "1",
                        "name": "FirstName",
                        "type": "text"
                    },
                    ...
                ]
            }
        }]
    }
}
~~~~

POST Request
------------

To create a new database, you send a POST request to the API, along with
the properties for the new database as key-value pairs in a JSON object.

It is not possible to also add the database fields, interests and
collections with this URL.

### Example POST request

The example request below will create a new database. The fields `ID`
and `created` do not need to be included, as they will be automatically
assigned by the API.

~~~~ {.language-javascript}
{
    "name": "MyFirstDatabase",
    "Description": "A wonderful database that was created with REST",
    "Archived": false
}
~~~~

### Example response message

Upon a successful POST request, you will receive a message containing a
link to the newly created database.

~~~~ {.language-javascript}
HTTP/1.1 201 Created
Date: Tue, 18 Feb 2014 14:52:30 GMT
Server: Apache/2.2.22 (Ubuntu)
X-Powered-By: PHP/5.3.10-1ubuntu3.9
Location: https://api.copernica.com/database/839
Content-Length: 0
Content-Type: application/json
~~~~

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.en.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.en.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.en.md)
-   [REST API resources / methods](./the-copernica-rest-api.en.md)

