# REST API: deleting a selection

When you send an HTTP DELETE request to the following URL, you’ll delete 
a database:

`https://api.copernica.com/v1/view/$id?access_token=xxxx`

The first $id needs to be replaced by the numerical identifier of the database
that you want to remove. Be careful, this removes all of the data in the database!

## PHP example

The following example demonstrates how to make a call using this method.

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// do the call
	$api->delete("database/1234");

This example uses the [CopernicaRestAPi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
* [Create a database](rest-post-database)
* [Remove an individual profile](rest-delete-profile)
