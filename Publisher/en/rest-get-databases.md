# REST API: fetching databases

To obtain an overview of all available databases, send a GET request to the following address:

`https://api.copernica.com/databases?access_token=xxxx`

## Supported parameters

The following parameters can be added to the request:

* **start**: first database to fetch
* **limit**: maximum number of databases to fetch
* **total**: show/hide the total number of databases

For more information on the meaning of these parameters, see the [article on paging](rest-paging).

## Returned data

The method returns a list of databases. For each database the following fields are returned:

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

## PHP example

The following PHP script demonstrates how to call this API method using PHP:

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");
    
    // parameters to pass to the call
    $parameters = array(
        'limit'     =>  100
    );
    
    // do the call, and print result
    print_r($api->get("databases", $parameters));

You need the [CopernicaRestApi class](rest-php) to run the example.

## More information

* [Overview of all API calls](rest-api)
* [Fetching a single database](rest-get-database)
* [Creating a database](rest-post-databases)
