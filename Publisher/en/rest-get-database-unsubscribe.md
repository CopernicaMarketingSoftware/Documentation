# REST API: requesting unsubscribe settings
Every database has the option to set unsubscribe behaviour. When Copernica’s servers receive an unsubscription, the unsubscribe behaviour determines what happens with the profile: should it be edited or removed?

You can request your settings using the following URL:

`https://api.copernica.com/v1/database/$id/unsubscribe?access_token=xxxx`

$id should be the numerical identifier or the name of the database.

## Returned fields

- **behavior**: the setting itself
- **fields**: the new profile setting (only applicable if "behaviour" is set to "update")

The field "behavior" has three possible values: "nothing", "remove" and "update". "nothing"
 means unsubscriptions are simply ignored (which is very impolite), "remove" deletes 
 unsubscribers from the databases completely and 'update' alters the field for this 
 profile so its data can be kept, but there is an indicator that no email should be sent to 
 this profile.

## PHP example
The following example demonstrates how to use the API method:

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// do the call, and print result
	print_r($api->get("database/1234/unsubscribe"));

## More information
- [Overview of all API calls](rest-api)
- [Setting unsubscribe behaviour](rest-put-database-unsubscribe)
