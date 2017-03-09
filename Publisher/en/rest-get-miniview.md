# REST API: fetch selection meta data

A method to request all metadata from a selection in a collection (miniview). This method does not 
support parameters. It is called by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v1/miniview/$id?access_token=xxxx`

In this, $id needs to be replaced by the numerical identifier or the name of the collection you wish to request the miniselections for.

## Available parameters

There are no available parameters for this method.

## Returned fields

- **ID**: unique numerical identifier
- **name**: name of the selection
- **description**: description of the selection
- **parent-type**: type of the parent: view or collection
- **parent-id**: id of the database or view

## PHP example

The following example demonstrates how to use this method:

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// do the call, and print result
	print_r($api->get("view/1234"));

This example uses the [CopernicaRestAPi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [Fetch selection rules for a collection](./rest-get-miniview-rules)
