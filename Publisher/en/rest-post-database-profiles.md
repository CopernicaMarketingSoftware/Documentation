# REST API: adding a profile to a database

The HTTP POST method to add a profile to an existing database is available at the following address:

`https://api.copernica.com/v1/database/$id/profiles?access_token=xxxx`

In this, $id should be replaced by the numerical identifier, the ID, of the database you want to add an profile to. 
Profile information needs to be added to the message body of the HTTP request. 

Please note that while POST and PUT 
are generally the same it is import to distinguish them in this case. This method posts a new profile, while PUT 
is the method to edit several profiles (see: [editing multiple profiles](rest-put-database-profiles)).

## Available parameters

The following variables can be set in the message body:

- **fields**: associative array/object of field names and values
- **interests**: array of the interests the profile has
- **database**: ID of the database the profile is stored in
- **secret**: the “secret” code that is linked to a profile
- **created**: the timestamp on which the profile was created, in YYYY-MM-DD hh:mm:ss format.
- **modified**: the timestamp on which the profile was last modified,, in YYYY-MM-DD hh:mm:ss format.

## PHP example
The following script demonstrates how to use the API method:

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// data to pass to the call
	$data = array(
	    'database' => database_id
	);

	// do the call
	$api->post("database/1234/profiles", $data);

This example uses the [CopernicaRestAPi class](rest-php).

## More information:
- [Overview of all API calls](rest-api)
- [Request all profiles in a database](rest-get-database-profiles)
- [Updating a profile](rest-put-profile-interests)
- [Deleting a profile](rest-delete-profile)
- [Add fields to profile](rest-put-profile-fields)
- [Add interests to profile](rest-post-profile-interests)
