# REST API: fetch collection data

A collection is somewhat like a second layer within a database. These collections
have a numerical ID which can be used to fetch information with an HTTP GET request
to the following URL:

`https://api.copernica.com/v1/collection/$id?access_token=xxxx`

The $id here should be replaced with the numerical identifier of the collection.

## Returned fields

* **ID**: unique numerical identifier
* **name**: name of the collection
* **database**: ID of the database this collection belongs to.
* **fields**:array with the fields in the collection

These fields are returned as arrays of objects. If you would like to know more
about what these arrays look like the following link might help you.

## PHP example
The following PHP scripts is an example of how to call this API method:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this to your access token
    $api = new CopernicaRestApi("your-access-token");

    // execute the call and print the result.
    print_r($api->get("collection/1234"));

## More information

* [Overview of all API calls](rest-api)
* [Editing a database](rest-put-database)
