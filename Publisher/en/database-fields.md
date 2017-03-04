Databases are built with fields. This method gives you access to the
fields associated with the given \$databaseID. Each field is returned as
an object with its respective properties.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/v1/database/\$databaseID/fields | GET, POST | none |

### Database field properties

Each field is returned with its respective properties as a key-value
pair

-   id: the identifier of the database field (integer)
-   name: the name of the database field (string)
-   type: the type of the field (see below)
-   value: the default value of the field. Can be a newline seperated
    list. (string)
-   displayed: is the field displayed in the subprofile overview in the
    user interface of the marketing software (bool)
-   ordered: is the subprofile overview in the overview ordered on this
    field in the user interface. (bool)
-   length: the length of the field (integer)
-   textlines: is the field displayed as a multiline field in the user
    interface. This is only applicable for text fields or big fields
    (int)
-   hidden: is the field hidden in the user interface (bool)
-   index: is there an index set on the field (bool). No index can be
    set on field of type 'big'.

### Field types

A database is build up with fields. Fields define which type of data can
be stored in your database. For more information on the available field
types, you can consult our [online
documentation](https://www.copernica.com/en/support/database-and-collection-field-types).

**These are the possible field types:** \
 integer, float, date, empty\_date, datetime, empty\_datetime, text,
email\*, phone\*, phone\_fax\*, phone\_gsm, big, foreign\_key.

\* only one field of this type per database or collection is accepted.

GET Request
-----------

Retrieve information about all fields associated with the given
databaseID. Each field is represented as an object with its properties.

Example output
--------------

```
{
    "start": 0,
    "limit": 10,
    "total": 10,
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
    }, ...
    }, {
        "ID": "11",
        "name": "Age",
        "type": "integer",
        "value": "",
        "displayed": false,
        "ordered": false,
        "length": "50",
        "textlines": "0",
        "hidden": false,
        "index": false
    }]
}
```

POST request
------------

To add a new field to a database, you can use the POST request.

In your request, the only required property is the `name` property. If
no field type is specified, a field of type 'text' will be created
automatically.

### Example request:

```
{
    "name": "Favourite_beer",
    "type": "text",
    "length": 150,
    "index": true
}
```

DELETE request
--------------

*Not yet implemented.*

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](./the-copernica-rest-api.md)

