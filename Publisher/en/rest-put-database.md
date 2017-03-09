# REST API: updating properties of a database

A method to update the properties of a database. This is an HTTP PUT method, accessible at the following address:
`https://api.copernica.com/v1/database/$id?access_token=XXX`

## Available parameters
The following variables can be used in the body of the HTTP PUT request:
- **name**: the optional new name of the database
- **description**: the optional new database description
- **archived**: optional boolean to determine whether or not a database should be archived.
- **created**: when the database was created
- **fields**: array of fields in the database
- **interests**: array with interests in the database
- **collections**: array with the collections in the database

## PHP example
The following example demonstrates how to use the API method:

	// dependencies
	require_once('copernica-rest-api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// data to be sent to the api
	$data = array(
	    'description'   =>  'a new description',
	    'archived'      =>  true
	);

	// do the call
	api->put("database/1234", $data);

For this example, you need [the CopernicaRestApi class](rest-php).

## More information
- [Overview of all API calls](rest-api)
- [Requesting a list of databases](rest-get-databases)
- [Deleting a database](rest-delete-database)
