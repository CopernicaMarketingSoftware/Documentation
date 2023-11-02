# REST API: GET subprofile identifiers

This is a simple method to fetch all IDs of subprofiles in a collection.
To use the method send an HTTP GET request to the following URL:

`https://api.copernica.com/v3/collection/$id/subprofileids?access_token=xxxx`

The `$id` should be replaced with the numerical identifier of the collection
you want to get the IDs of.

## Available parameters

This method doesn't support any parameters.

## Returned fields

This method returns a JSON array holding the unique numerical identifiers of
the subprofiles from the given collection.

## PHP Example

The following PHP script demonstrates how to call this API method.

```php
// dependencies
require_once('copernica_rest_api.php');
   
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// do the call, and print result
print_r($api->get("collection/{$collectionID}/subprofileids"));
```

The example above requires the [CopernicaRestApi class](rest-php).   

## More information

* [List of all API calls](rest-api)
* [GET collection subprofiles](rest-get-collection-subprofiles)
