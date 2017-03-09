# REST API: edit properties of a profile

A method to edit the properties of an existing profile. It is called using the following URL:

`https://api.copernica.com/v1/profile/$id?access_token=xxxx`

The $id needs to be replaced with the ID of the profile you want to edit the properties of.

## Available parameters
The following parameters can be placed in the message body of the HTTP PUT command:

- **fields**: Fields that the profile contains
- **interests**: Interests that the profile contains
- **database**: ID of the database the profile belongs to
- **secret**: The secret code that is associated with the profile
- **created**: Timestamp of when the profile was created in YYYY-MM-DD hh:mm:ss format
- **modified**: Timestamp of when the profile was last modified in YYYY-MM-DD hh:mm:ss format

## PHP example

The following example demonstrates how to use this method:

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// data to be sent to the api
	$data = array(
    	'description'   =>  'a new description',
    	'has_rules'      =>  true
	);

	// do the call, and print result
	print_r($api->put("profile/1234", array(), $data));

This example uses the [CopernicaRestAPi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [Create a profile](./rest-put-profile)
* [Update profile fields](./rest-put-profile-fields)
* [Update profile interests](./rest-put-profile-interests)
