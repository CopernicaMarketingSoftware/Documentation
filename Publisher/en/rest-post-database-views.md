# REST API: POST database view

In order to create a new selection using the REST API, you need to send an HTTP POST request to the following URL. 
The selection will then be created, nested underneath the database.

`https://api.copernica.com/v1/database/$id/views?access_token=xxxx`

In this, $id should be replaced by the numerical identifier, the ID, of the database you want to add a selection to. The name of the selection is not in the URL, as it needs to be added to the message body of the HTTP request.

## Available parameters
The following variables can be added to the body of the HTTP POST call:

- **name**: The name of the selection that is to be created. (mandatory)
- **description**: an optional description of the new selection.
- **parent-type**: used to display whether a selection is placed directly under a database, or nested under another selection
- **parent-id**: ID of the parent selection/database
- **has-children**: boolean value: whether or not the database has selections nested underneath it
- **has-referred**: boolean value: whether or not there are other selections that refer to this selection.
- **has-rules**: boolean value: whether or not the selection has selection rules

## PHP example
The following example demonstrates how to use the API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// data to pass to the call
$data = array(
    'name'      =>  'my-selection',
    'description'	=> 'example selection',
    'has-rules'	=> False
);

// do the call
$api->post("database/1234/views", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information
- [Overview of all API calls](rest-api)
- [GET database views](rest-get-database-views)
- [GET view rules](rest-get-view-rules)
- [POST view rule](rest-post-view-rules)
