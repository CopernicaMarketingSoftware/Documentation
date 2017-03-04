The method miniview/\$miniviewID gives you information about the
miniview with id \$miniviewID and allows you to edit the miniview.

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
https://api.copernica.com/v1/miniview/7?access_token=ff96963b...
```

Sending the GET request to the url above will result in receiving the
following data:

```
{
    "ID":"7"
    "name":"test_miniview"
    "description":"description"
    "parent-type":"collection"
    "parent-id":"51"
}
```

PUT-request
-----------

A miniview get be edited by a PUT request. You can send this to an URL
like the one below:

```
https://api.copernica.com/v1/miniview/7?access_token=ff96963b...
```

The following payload edits the description of the miniview:

```
{"description":"Updated description"}
```
