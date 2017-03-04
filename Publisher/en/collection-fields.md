This method can be used to retrieve all fields associated with the given
\$collectionID. Each field is returned as an object with its respective
properties.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/v1/collection/\$collectionid/fields | GET, POST | none |

### Collection field properties

Each collection field is returned with its respective properties as a
key-value pair.

-   ID: the identifier of the collection field (integer)
-   Name: the name of the collection field (string)
-   Type: the type of the field (see below)
-   Value: the default value of the field. Can be a newline seperated
    list. (string)
-   Displayed: is the field displayed in the subprofile overview in the
    user interface of the marketing software (bool)
-   Ordered: is the subprofile overview in the overview ordered on this
    field in the user interface. (bool)
-   Length: the length of the field (integer)
-   Textlines: is the field displayed as a multiline field in the user
    interface. This is only applicable for text fields or big fields
    (int)
-   Hidden: is the field hidden in the user interface (bool)
-   Index: is there an index set on the field (bool)

### Collection field types

The possible field types are: \
*integer, float, date, empty\_date, datetime, empty\_datetime, text,
email, phone, phone\_fax, phone\_gsm, select, big, foreign\_key*.

GET request
-----------

Use the GET request to receive information about the fields of the
collection associated with collectionID. A message containing the name
of each field along with their properties are returned, as illustrated
with the example message below.

### Example output

```
{
    "start": 0,
    "limit": 8,
    "total": 8,
    "data": [{
        "ID": "1",
        "name": "FirstName",
        "type": "text"
    }, 
    ...
    {
        "ID": "8",
        "name": "Leadscore",
        "type": "integer"
    }]
}
```

POST Request
------------

To update the fields of a collection or to create new fields you use the
POST request.

### Example POST message

The example JSON message below will POST a new field to the collection
associated with colectionID. You do not need to include the identifier
in the message, as it is already present in the URL.

```
{
    "name": "Date_of_purchase",
    "type": "datetime",
    "index": false
}
```

### Further reading

-   [Copernica REST with OAuth 2.0
    authentication](./setting-up-copernica-rest-service.md)
-   [Register your app and obtain your access
    token](./register-your-app-on-copernica-com.md)
-   [PHP example scripts for POST, GET and DELETE
    requests](./example-get-post-and-delete-requests.md)
-   [REST API resources / methods](./the-copernica-rest-api.md)

