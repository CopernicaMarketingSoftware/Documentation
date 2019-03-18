# REST API: GET view profile identifiers

It’s very easy to request just the IDs of all profiles in a selection. 
Just send an HTTP GET request to the following URL:

`https://api.copernica.com/v2/view/$id/profileids?access_token=xxxx`

The `$id` should be replaced by the unique numerical identifier of the selection.

## Available parameters

This method does not support any parameters.

## Returned fields

The method returns a JSON array consisting of numerical identifiers of profiles.

## PHP example

The following PHP script demonstrates how to use the API method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// do the call, and print result
print_r($api->get("view/{$viewID}/profileids"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API calls](rest-api)
- [GET view profiles](rest-get-view-profiles)
