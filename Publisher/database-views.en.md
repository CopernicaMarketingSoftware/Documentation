With the database/\$databaseID/views method you can retrieve all views
from a certain database by using a GET request. With a PUT request you
can add a new view to the database

Properties of views
-------------------

Views contain the following information:

-   **ID** (int, system field, cannot be edited)
-   **name** (string, name of the view)
-   **description** (the description of the view)
-   **parent-type** (database (for the "top-views") / view)
-   **parent-id** (id of the parent database/view)
-   **has-children** (boolean, are there views under this view?)
-   **has-referred** (boolean, does this view refer to other views?)
-   **has-rules** (boolean, does the view have rules?)

### Example GET-request output

    {
        "start":0
        "limit":26
        "total":26
        "data":[
            {
                "ID":"13"
                "name":"viewName"
                "description":""
                "parent-type":"database"
                "parent-id":"2"
                "has-children":false
                "has-referred":false
                "has-rules":true
            }
            {
                ...
            }
        ]
    }

Creating a new view with a POST request
---------------------------------------

If you want to create a new view in the database with id \$databaseID,
you can send a POST request containing the data with the properties of a
view (see above). Do not send an ID, the system will assign this to the
new view.

### Example POST request

    {"name"="Restview_test"
    "description":"This view was created via the REST API"
    }
