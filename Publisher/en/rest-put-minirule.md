# REST API: edit properties of a minirule

A minirule is to a miniview what a rule is to a view. A method to edit the properties of an existing minirule can be called by sending an HTTP PUT request to the following URL:

`https://api.copernica.com/v1/minirule/$id?access_token=xxxx`

The $id needs to be replaced with the ID of the minirule you want to edit the properties of.

## Available parameters
The following parameters can be placed in the message body of the HTTP PUT command:

- **name**: name of the rule
- **view**: ID of the selection that the rule belongs to
- **conditions**: array of conditions for the rule
- **inversed**: boolean value to indicate whether the rule should be inversed. 
If set to "True" only profiles *not* conforming to the conditions are selected
- **disabled**: boolean value to indicate whether the rule should be disabled or not

## PHP example

The following example demonstrates how to use this method:

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// data to be sent to the api
	$data = array(
    	
		'name'   =>  'new rule name',
	);

	// do the call, and print result
	print_r($api->put("minirule/1234", array(), $data));

This example uses the [CopernicaRestAPi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [Requesting minirules](./rest-get-minirule)
