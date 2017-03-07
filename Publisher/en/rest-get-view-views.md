# REST API: fetching nested selections

Copernica supports nested selections. To obtain a list of all selections that
are nested under a higher level selection you can send a HTTP GET request
to the following URL:

`https://api.copernica.com/v1/database/$id/views?access_token=xxxx`

In this, $id needs to be replaced by the numerical identifier of the selection
that you wish to request the subselections of.

## Available parameters

The following parameters can be added to the URL as variables:

- **start**: the first selection to be requested
- **limit**: length of the batch that is requested
- **total**: whether or not the total number of selections should be counted

More information on the meaning of these parameters can be found [in the article on paging](rest-paging).

## Returned fields

For every selection, a JSON object with the following properties is returned:

- **ID**: the numerical identifier of the selection
- **name**: the name of the selection
- **description**: optional description of the selection
- **parent-type**: used to display whether a selection is placed directly under a database, or nested under another selection
- **parent-id**: ID of the parent selection/database
- **has-children**: boolean value: whether or not the database has selections nested underneath it
- **has-referred**: boolean value: whether or not there are other selections that refer to this selection.
- **has-rules**: boolean value: whether or not the selection has selection rules

## PHP example

The following PHP script demonstrates how to use the API method:

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// parameters to pass to the call
	$parameters = array(
	    'limit'     =>  100
	);

	// do the call, and print result
	print_r($api->get("view/1234/views", $parameters));

This example uses the [CopernicaRestApi class](rest-php)

## More information

* [Overview of all API methods](rest-api)
* [Adding a nested selection](rest-post-view-views)
* [Request top level selections](rest-get-database-views)
* [Fetch selection rules](rest-get-view-rules)
