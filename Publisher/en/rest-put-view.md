# REST API: PUT view

A method to edit a selection from a database. It is called using the 
following URL:

`https://api.copernica.com/v2/view/$id?access_token=xxxx`

In this, `$id` needs to be replaced by the numerical identifier or the 
name of the database you wish to create the selections for.

## Available data

The following data can be placed in the message body of the HTTP 
PUT command:

- **name**: name of the selection
- **description**: description of the selection
- **parent-type**: type of the parent: selection or database
- **parent-id**: id of the database or selection
- **has-children**: boolean value: whether or not the database has 
selections nested underneath it
- **has-referred**: boolean value: whether or not there are other 
selections that refer to this selection.
- **has-rules**: boolean value: whether or not the selection has 
selection rules

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// declare the id of the selection that you want to edit
$id = 1;

// data to be sent to the api
$data = array(
   	'description'   =>  'a new description',
   	'has_rules'      =>  true
);

// do the call, and print result
print_r($api->put("view/{$id}", $data));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [POST view rule](./rest-post-view-rules)
