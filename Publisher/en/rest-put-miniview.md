# REST API: edit properties of a selection of a collection

A miniview is for a collection what a selection is on a database. To edit a miniview an HTTP PUT request can be sent to the following URL:

`https://api.copernica.com/v1/miniview/$id?access_token=xxxx`

The $id is the ID of the miniview you want to edit.

## Available parameters

The following properties can be added to the message body of the HTTP request:

- **name**: Name of the selection
- **description**: Description of the selection
- **parent-type**: Indicates whether the current selection belongs to another selection or a collection.
- **parent-id**: ID of the selection or the collection the selection belongs to

## PHP example

The following example demonstrates how to use this method:

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// data to be sent to the api
	$data = array(
    	'description'   =>  'a new description',
	);

	// do the call, and print result
	print_r($api->put("miniview/1234", array(), $data));

This example uses the [CopernicaRestAPi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [Editing a selection (of a database)](./rest-put-view)
* [Requesting a list of miniviews](./rest-get-collection-miniviews)

