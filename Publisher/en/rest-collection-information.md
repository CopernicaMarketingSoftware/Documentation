Databases in Copernica can be extended with additional collections of
data.

This method gives you access to the data collection associated with a
given \$collectionID. The result contains the collection identifier, the
collection name, the database associated with the colledction and an
array of fields with the field name and its data type in a key-value
pair.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/v1/collection/\$collectionid | GET | none |

### Collection field properties

Each field is returned with its respective properties as a key-value
pair

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

### Field types

The possible field types are: \
*integer, float, date, empty\_date, datetime, empty\_datetime, text,
email, phone, phone\_fax, phone\_gsm, select, big*.

GET Request
-----------

Use the GET request to retrieve information on the collection associated
with collectionID. Upon a successful request you will receive a message
similar to the example below.

### Example output

```
{
    "ID" : "1",
    "name" : "collection_456",
    "database" : "1"
    "fields" : [
        "start" : 0,
        "limit" : 100,
        "total" : 100
        "data" : [
            {
                "name" : "Title",
                "type" : "text"
            },
            { ... }
        ]
    ]
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

