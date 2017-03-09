# REST API: Creating a new selection in collection

In order to create a new selection using the REST API, you need to send an HTTP POST request to the following URL. The selection will then be created, nested underneath the collection.

`https://api.copernica.com/v1/collection/$id/miniviews?access_token=xxxx`

In this, $id should be replaced by the numerical identifier, the ID, of the collection you want to add a selection to. The name of the selection is not in the URL, as it needs to be added to the message body of the HTTP request.

## Available parameters

The following variables can be added to the body of the HTTP POST call:

- **name**: The name of the selection that is to be created. (mandatory)
- **description**: an optional description of the new selection.
- **parent-type**: used to display whether a selection is placed directly under a collection, or nested under another selection
- **parent-id**: ID of the parent selection/collection

## PHP example
The following example demonstrates how to use the API method:

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// data to pass to the call
	$data = array(
	  'name'      =>  'my-selection',
          'description'	=> 'example selection',
	);

	// do the call
	$api->post("collection/1234/miniviews", $data);

	This example uses the [CopernicaRestAPi class](rest-php).

## More information
- [Overview of all API calls](rest-api)
- [Requesting selections of a collection](rest-get-collection-miniviews)
- [Requesting selection rules](rest-get-miniview-rules)
- [Creating selection rules](rest-post-miniview-rules)
