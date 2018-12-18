# REST API: POST database collection

A collection is similar to a second layer within the database. To add such 
a collection to an existing database you can send an HTTP POST request to 
the following URL:

`https://api.copernica.com/v2/database/$id/collections?access_token=xxxx`

In this, `$id` should be replaced by the numerical identifier, the ID, 
of the database you want to add an collection to. The name of the 
collection and other values need to be added to the message body of the 
HTTP request. After a successful call the ID of the created request is returned.

## Available parameters

The following variables can be set in the message body:

- **name**: the title of the new collection field (mandatory)
- **database**: ID of the existing database to put collection in
- **fields**: fields in the collection

## PHP example

The following script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// data to pass to the call
$data = array(
    'name'      =>  'some_collection',
    'database'  =>  'some_database'
);

// do the call
$api->post("database/{$databaseID}/interests", $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API calls](rest-api)
- [GET database collections](rest-get-database-collections)
- [PUT collection](rest-put-collection)
