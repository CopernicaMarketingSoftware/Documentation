# REST API: deleting a minirule

When you send an HTTP DELETE request to the following URL, you’ll delete 
a minirule:

`https://api.copernica.com/v1/minirule/$id?access_token=xxxx`

The $id needs to be replaced by the numerical identifier of the minirule
that you want to remove.

## PHP example

The following example demonstrates how to make a call using this method.

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// do the call
	$api->delete("minirule/1234");

This example uses the [CopernicaRestAPi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
* [Remove a database](rest-delete-database)
* [Create a miniselection rule](rest-get-minirule)
* [Edit a miniselection rule](rest-put-minirule)
