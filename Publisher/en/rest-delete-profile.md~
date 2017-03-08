# REST API: deleting a profile

When you send an HTTP DELETE request to the following URL, you’ll delete 
a profile:

`https://api.copernica.com/v1/profile/$id?access_token=xxxx`

The first $id needs to be replaced by the numerical identifier of the profile
that you want to remove.

## PHP example

The following example demonstrates how to make a call using this method.

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// do the call
	$api->delete("profile/1234");

This example uses the [CopernicaRestAPi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
* [Remove a database](rest-delete-database)
* [Fetching a profile](rest-get-profile)
* [Edit a profile](rest-put-profile)
