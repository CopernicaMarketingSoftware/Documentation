# REST API: GET collection

A collection is somewhat like a second layer within a database. These collections
have a numerical ID which can be used to fetch information with an HTTP GET request
to the following URL:

`https://api.copernica.com/v2/collection/$id?access_token=xxxx`

The `$id` here should be replaced with the numerical identifier of the collection.

## Returned fields

* **name**: name of the collection
* **database**: ID of the database this collection belongs to.
* **fields**:array with the fields in the collection

## PHP example

The following PHP scripts is an example of how to call this API method:

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this to your access token
$api = new CopernicaRestApi("your-access-token");

// execute the call and print the result.
print_r($api->get("collection/{$collectionID}"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
* [PUT database](rest-put-database)
