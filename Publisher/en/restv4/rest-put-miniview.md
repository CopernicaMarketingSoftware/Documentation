# REST API: PUT miniview

A miniview is for a collection what a selection is on a database. To 
edit a miniview an HTTP PUT request can be sent to the following URL:

`https://api.copernica.com/v4/miniview/$id?access_token=xxxx`

The `$id` is the ID of the miniview you want to edit.

## Available data

The following properties can be added to the message body of the HTTP request:

- **name**: Name of the selection
- **description**: Description of the selection

## JSON example
The following JSON demonstrates how to use the API method:

```json
{
   "name": "new_miniselection",
   "description": "This is a new miniselection"
}
```

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

// data to be sent to the api
$data = array(
   'name'          => 'new_miniselection',
   'description'   => 'a new description'
);

// do the call, and print result
print_r($api->put("miniview/{$miniviewID}", $data));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [PUT view](./rest-put-view)
* [GET collection miniviews](./rest-get-collection-miniviews)

