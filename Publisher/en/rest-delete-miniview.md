# REST API: deleting a miniview

When you send an HTTP DELETE request to the following URL, you’ll delete 
a miniview:

`https://api.copernica.com/v1/miniview/$id?access_token=xxxx`

The $id needs to be replaced by the numerical identifier of the selection
that you want to remove. With this method you only remove the miniselection, and
not the profiles that are inside of it.

## PHP example

The following example demonstrates how to make a call using this method.

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// do the call
	$api->delete("miniview/1234");

This example uses the [CopernicaRestAPi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
* [Remove a database](rest-delete-database)
* [Fetch miniview rules](rest-get-miniview)
* [Edit miniview rules](rest-put-miniview)
