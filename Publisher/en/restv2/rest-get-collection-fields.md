# REST API: GET collection fields

A collection is a nested second layer within a database, that also contains
fields. To fetch these fields an HTTP GET request can be made to the following
URL:

`https://api.copernica.com/v2/collection/$id/fields?access_token=xxxx`

The `$id` should be replaced by the unique numerical identifier of the collection
you want to get the fields from.

## Available parameters

The following parameters can be added to the URL as variables for the request:

* **start**: first field to request
* **limit**: length of the request batch
* **total**: boolean value for showing available fields

More information about the use of these parameters can be found in the 
[article on paging](./rest-paging.md).

## Returned fields

This method returns a list of fields from the database. Each field object
contains the following information:

* **ID**: numerical field ID
* **name**: field name
* **type**: field type

## PHP Example

The following PHP script shows an example of how to call this method
with the API:

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters to pass to the call
$parameters = array(
   'limit'     =>  100
);
    
// do the call, and print result
print_r($api->get("collection/{$collectionID}/fields", $parameters));
```

The example above requires the [CopernicaRestApi class](./rest-php.md).

## More information

* [Overview of all REST API calls](./rest-api.md)
* [POST collection field](./rest-post-collection-fields.md)
* [PUT collection field](./rest-put-collection-field.md)
* [DELETE collection field](./rest-delete-collection-field.md)
