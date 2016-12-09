The method /collection/\$collectionID/miniviews gives you all miniviews
of the collection with id \$collectionID.

Properties of a miniview
------------------------

A miniview contains the following information:

-   **ID** (int, system field, cannot be edited)
-   **name** (string, name of the miniview)
-   **description** (the description of the miniview)
-   **parent-type** ("collection")
-   **parent-id** (id of the parent collection)

GET-request
-----------

```
https://api.copernica.com/collection/51/miniviews?access_token=ff96963b...
```

Sending the GET request to the url above will result in receiving the
following data:

```
{
    "start":0
    "limit":3
    "total":3
    "data":[
        {
            "ID":"5"
            "name":"restCollection"
            "description":""
            "parent-type":"collection"
            "parent-id":"51"
        }
        , ...
    ]
}
```
