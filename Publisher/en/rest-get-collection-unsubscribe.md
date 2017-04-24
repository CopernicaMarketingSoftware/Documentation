# REST API: requesting unsubscribe behaviour for a collection

Every collection has the option to set unsubscribe behaviour. When 
Copernica’s servers receive an unsubscription, the unsubscribe behaviour 
determines what happens with the profile: should it be edited or removed?

You can request your settings using the following URL:

`https://api.copernica.com/v1/database/$id/unsubscribe?access_token=xxxx`

$id can be the numerical identifier or the name of the database.

## Returned fields

- **behavior**: the setting itself
- **fields**: the new profile setting (only applicable if ‘behavior’ is set to ‘update’)

‘behavior’ has three possible values: 'nothing', 'remove' and 'update'. 
'nothing' means unsubscriptions are simply ignored (which is very impolite), 
'remove' deletes unsubscribers and 'update' makes sure something is 
changed in the profile so you know it shouldn’t receive email any longer.

## PHP example
The following example demonstrates how to use the API method:

	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestApi("your-access-token");

	// do the call, and print result
	print_r($api->get("collection/1234/unsubscribe"));

This example uses the [CopernicaRestApi class](rest-php).

## More information
- [Overview of all API calls](rest-api)
- [Setting unsubscribe behaviour](rest-get-database-unsunscribe)
