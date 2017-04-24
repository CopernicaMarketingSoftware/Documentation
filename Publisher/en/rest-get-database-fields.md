# REST API: requesting fields in a database

This method is used to request all fields in a database. It is an HTTP GET call to the following address:

`https://api.copernica.com/v1/database/$id/fields?access_token=xxxx`

In this, $id should be replaced by the numerical identifier or the name of the database of which you want to request the fields.

## Available parameters

The following parameters can be added to the URL as variables:

- **start**: the first field to be requested
- **limit**: length of the requested batch
- **total**: whether or not the total number of fields should be counted

More information on the meaning of these parameters can be found [in the article on paging](rest-paging).

## Returned fields

The method returns a list of fields in the database. For each field, the following properties are displayed:
- **ID**: ID of the field in the database
- **name**: the name of the new field. (mandatory)
- **type**: type of the new field
- **value**: default value of the new field
- **displayed**: boolean value to determine whether or not the field should be placed into lists and grids in the user interface
- **ordered**: boolean value to determine whether or not profiles should be ordered by this field.
- **length**: maximum text length
- **textlines**: number of lines in forms to edit the field
- **hidden**: boolean value to make sure a field is never shown in the interface
- **index**: boolean value that shows whether or not the field should be indexed

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
	n
	// do the call, and print result
	print_r($api->get("database/1234/fields", $parameters));

This example uses the [CopernicaRestApi class](rest-php).

## More information
- [Overview of all API methods](rest-api)
- [Adding a field to a database](rest-post-database-fields)
- [Updating a field](rest-put-database-field)
- [Deleting a field](rest-delete-database-field)
