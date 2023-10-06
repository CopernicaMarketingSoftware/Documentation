# REST API: POST database collection

A collection is similar to a second layer within the database. To add such 
a collection to an existing database you can send an HTTP POST request to 
the following URL:

`https://api.copernica.com/v3/database/$id/collections?access_token=xxxx`

In this, `$id` should be replaced by the numerical identifier, the ID, 
of the database you want to add an collection to. The name of the 
collection and other values need to be added to the message body of the 
HTTP request. After a successful call the ID of the created request is returned.

## Available parameters

The following variables can be set in the message body:

- **name**: The title of the new collection (mandatory). The name 
for the collection should contain only letters and underscores.
- **description**: Description of the new collection

## JSON example

The following JSON demonstrates how to use the API method:

```json
{
  "name": "my_collection",
  "description": "example collection"
}
```

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to pass to the call
$data = array(
    'name'          =>  'some_collection',
    'description'   =>  'This is a new collection',
);

// do the call
$api->post("database/{$databaseID}/collections", $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API calls](rest-api)
- [GET database collections](rest-get-database-collections)
- [PUT collection](rest-put-collection)
