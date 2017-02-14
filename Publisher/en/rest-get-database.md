# REST API: fetching database properties

To retrieve all metadata about a database, send a GET request to the following address:

`GET https://api.copernica.com/database/$id?access_token=xxxx`

Here $id can be either a unique numerical identifier of a database or the name of a database. This method does not support parameters.

## Returned data

* **ID**: unique numerical identifier
* **name**: name of the database
* **description**: description of the database
* **archived**: whether or not the database is archived
* **created**: creation timestamp, in YYYY-MM-DD hh:mm:ss format
* **fields**: array of fields
* **interests**: array of interests
* **collections** : array of collections

For more information on the *fields*, *interests* and *collections* arrays, see the documentation of the following API methods:

* [Fetching fields](rest-get-database-fields)
* [Fetching interests](rest-get-database-interests)
* [Fetching collections](rest-get-database-collections)

# PHP example

The following PHP script demonstrates how to call this API method using PHP:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");
    
    // do the call, and print result
    print_r($api->get("database/1234"));

You need the [CopernicaRestApi class](rest-php) to run the example.

# More information

* [Overview of all API calls](rest-api)
* [Editing a database](rest-put-database)
