# REST API: GET profile fields

To request the fields from a profile you can send an HTTP GET
request to the following URL:

`https://api.copernica.com/v3/profile/$id/fields?access_token=xxxx`

The `$id` should be replaced with the numerical identifier of the profile 
you're requesting the fields of.

## Returned fields

This method returns the fields of a profile.

## PHP Example

The following PHP script demonstrates how to use the API method.

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// do the call, and print result
print_r($api->get("profile/{$profileID}/fields"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [GET profile](rest-get-profile)
