# REST API: DELETE profile

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv2/rest-api.md) of the REST API.

When you send an HTTP DELETE request to the following URL, you’ll delete 
a profile:

`https://api.copernica.com/v1/profile/$id?access_token=xxxx`

The `$id` needs to be replaced by the numerical identifier of the profile
that you want to remove.

## PHP example

The following example demonstrates how to make a call using this method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// do the call
$api->delete("profile/1234");
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
* [GET profile](rest-get-profile)
* [PUT profile](rest-put-profile)
