A subprofile is a record in a collection that exists in a database.
Using this method you can retreive all subprofiles of a given
collection.

| Request url | Methods | Parameters |
| --- | --- | --- |
| https://api.copernica.com/v1/collection/\$collectionID/subprofiles | GET | limit, start |

GET Request
-----------

Using this URL you can request the subprofiles from a given collection.
\$collectionID is to be replaced by the actual collection identifier.

By default, subprofiles 0 up to 100 will be retrieved, but additional
[parameters](./rest-api-parameters.md)
can be added to override the limit and starting position. If you wish to
ignore to first nine profiles, and receive only 10 profiles in total,
you can use the following URL. Keep in mind, the start parameter has
nothing to do with the subprofile identifiers. It just determines the
first retrieved subprofile from a table.

*https://api.copernica.com/v1/collection/1234/subprofiles/?start=10&limit=10&access\_token...*

### Example output GET request

```
{
    "start" : 10,
    "limit" : 10,
    "total" : 1000,
    "data" : [
        {
            "ID" : "100",
            "Secret" : "123456123456"
            "fields" : { ... },
            "profile" : "1234",
            "collection" : "456"
        },
        {
            "ID" : "101",
            ...
        }
    ]
}
```
