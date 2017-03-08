# REST API: creating profile interests
To overwrite existing interests of a profile, you need to do an HTTP PUT request to the following URL:

`https://api.copernica.com/v1/profile/$id/fields?access_token=xxxx`

In this, $id should be replaced by the numerical identifier, the ID, of the database you want to add a selection to. This method adds the given interest to the current interest array.

## Available parameters

The following variables can be set in the message body:

- **name**: the title of the new interest field (mandatory)
- **group**: the group the field belongs to. Interests that belong to the same group are put together in the user interface

## PHP example
The following example illustrates how to use the API method:

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// this method takes no parameters
	$parameters = array()

	// data to pass to the call
	$data = array(
	    'name'      =>  'Football',
	    'group'     =>  'Sport'
	);

	// do the call
	$api->put("profile/1234/interests", $parameters, $data);

For this example, you need [the CopernicaRestApi class](rest-php).

## More information
- [Overview of all API calls](rest-api)
- [Updating multiple profiles](rest-put-database-profiles)
- [Deleting a profile](rest-delete-database-profile)
- [Fetch profile interests](rest-get-profile-interests)
