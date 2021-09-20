# REST API: DELETE subprofile

When you send an HTTP DELETE request to the following URL, you’ll delete 
a subprofile:

`https://api.copernica.com/v3/subprofile/$id?access_token=xxxx`

The `$id` needs to be replaced by the numerical identifier of the profile
that you want to remove.

## PHP example

The following example demonstrates how to make a call using this method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// do the call
$api->delete("subprofile/{$subprofileID}");
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
