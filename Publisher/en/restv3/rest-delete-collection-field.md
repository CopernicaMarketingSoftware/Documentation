# REST API: REST delete collection field

When you send an HTTP DELETE request to the following URL, you’ll delete a field from a collection:

`https://api.copernica.com/v3/collection/$id/field/$id?access_token=xxxx`

The first `$id` needs to be replaced by the numerical identifier, the ID, of the collection. 
The second `$id` needs to be replaced by the ID or the name of the field you want to delete.

## PHP example

The following example demonstrates how to make a call using this method.

```php
	// dependencies
	require_once('copernica_rest_api.php');

	// change this into your access token
	$api = new CopernicaRestAPI("your-access-token", 2);

	// do the call
	$api->delete("collection/{$collectionID}/field/{$fieldID}");
```

The example above requires the [CopernicaRestAPI class](rest-php).

## More information

- [Overview of all API calls](rest-api)
- [GET collection fields](rest-get-collection-fields)
- [POST collection fields](rest-post-collection-fields)
- [PUT collection field](rest-put-collection-field)
