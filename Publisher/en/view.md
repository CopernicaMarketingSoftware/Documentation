The view method can be used to retrieve a view from an account or update
an existing view.

Properties of a view
--------------------

A view contains the following information:

-   **ID** (int, system field, cannot be edited)
-   **name** (string, name of the view)
-   **description** (the description of the view)
-   **parent-type** (database (for the "top-views") / view)
-   **parent-id** (id of the parent database/view)
-   **has-children** (boolean, are there views under this view?)
-   **has-referred** (boolean, does this view refer to other views?)
-   **has-rules** (boolean, does the view have rules?)

GET request to retrieve a view
------------------------------

A view can be retrieved with a GET request. This will return all
information stated above.

PUT request to modify a view
----------------------------

Use a PUT request to update the view with this \$viewID.

### Example PUT request

```
{"name":"newView","description":"This view was created via the REST API", "parent-type": "database", "parent-id":"2", "has-children":"false", "has-referred":"false", "has-rules":"true"}
```

This can be send as payload with a PUT request to the following URL. As
you can see, this will update the view with id 42:

```
https://api.copernica.com/v1/view/42?access_token=ff96963...
```
