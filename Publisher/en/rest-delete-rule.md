# REST API: deleting a rule

When you send an HTTP DELETE request to the following URL, you’ll delete 
a rule:

`https://api.copernica.com/v1/rule/$id?access_token=xxxx`

The $id needs to be replaced by the numerical identifier of the rule
that you want to remove.

## PHP example

The following example demonstrates how to make a call using this method.

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// do the call
	$api->delete("rule/1234");

This example uses the [CopernicaRestAPi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
* [Remove a database](rest-delete-database)
* [Create a rule](rest-get-rule)
* [Edit a rule](rest-put-rule)
