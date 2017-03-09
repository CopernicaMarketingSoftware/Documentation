# REST API: editing nested selections

Copernica supports nested selections. To edit a nested selection you can send a HTTP POST request to the following URL:

'https://api.copernica.com/view/$id/views?access_token=xxxx'

The first $id needs to be replaced by the numerical identifier of the upper selection and the second $id by the lower selection.

## Available parameters

The following parameters can be added to the message body. Note that because this is a nested view it has the exact same properties as a regular view.

- **name**: Name of the selection
- **description**: Description of the selection
- **parent-type**: Type of the parent; does the selection belong to another selection or a database?
- **parent-id**: ID of the parent
- **has-children**: Boolean value that indicates whether or not there are selections below this
- **has-referred**: Boolean value to indicate whether any other selections refer to this selection
- **has-rules**: Indicates whether the selection has rules or not

## PHP example
The following PHP example demonstrates how to use the method:

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// parameters to pass to the call
	$data = array(
	    'description'     =>  'new description'
	);

	// do the call
	$api->post("view/1234/views", array(), $data);

This example uses the [CopernicaRestApi class](rest-php)

## More information
* [Overview of all API methods](rest-api)
* [Request list of nested views](./rest-get-view-views)


