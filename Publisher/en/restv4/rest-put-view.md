# REST API: PUT view

A method to edit a selection from a database. It is called using the 
following URL:

`https://api.copernica.com/v4/view/$id`

In this, `$id` needs to be replaced by the numerical identifier or the 
name of the database you wish to create the selections for.

## Available data

The following data can be placed in the message body of the HTTP 
PUT command:

- **name**: name of the selection
- **description**: description of the selection

## JSON example

The following JSON demonstrates how to use the API method:

```json
{
    "name": "new_view_name",
    "description": "new view description"
}
```

## PHP example

The following PHP example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data to be sent to the api
$data = array(
   	'description'   =>  'a new description'
);

// do the call, and print result
print_r($api->put("view/{$id}", $data));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [POST view rule](./rest-post-view-rules)
