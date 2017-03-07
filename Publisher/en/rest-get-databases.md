# REST API: requesting databases

A method to request a list of all available databases. This is an HTTP GET call to the following address:

`https://api.copernica.com/v1/databases?access_token=xxxx`

## Available parameters

- **start**: the first profile to be requested
- **limit**: the length of the batch that is requested
- **total**: whether or not the total number of profiles in the database should be counted

More information on the meaning of start, limit and total parameters can be found in the [article on paging](rest-paging).

## Returned fields
The method returns a list of databases. For each database in the list, the following properties are returned:
- **ID**: unique numerical identifier
- **name**: name of the database
- **description**: optional description of the database
- **archived**: whether or not the database is archived
- **created**: timestamp on which the database was created
- **fields**: array of the fields in the database
- **interests**: array of all possible interests in the database
- **collection**: array of the collections in the database

If you want to know more about *fields*, *interests* and *collections*,  take a look at the articles below. These methods return similar data:
- [Requesting fields](rest-get-database-fields)
- [Requesting interests](rest-get-database-interests)
- [Requesting collections](rest-get-database-collections) 

## PHP example:

The following PHP script demonstrates how to use the method:

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

This example uses the [CopernicaRestApi class](rest-php).

## More information
- [Overview of all API methods](rest-api)
- [Requesting a single database](rest-get-database)
- [Creating a database](rest-post-database)
