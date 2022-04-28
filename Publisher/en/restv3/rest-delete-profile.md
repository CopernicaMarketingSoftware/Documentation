# REST API: DELETE profile

When you send an HTTP DELETE request to the following URL, you’ll delete 
a profile:

`https://api.copernica.com/v3/profile/$id?access_token=xxxx`

The `$id` needs to be replaced by the numerical identifier of the profile
that you want to remove.

## Available parameters

The following parameters can be placed in the message body:

- **completely**: Completely remove profile from the backend (Yes/**No**)

\* Value in bold is the default value.

## PHP example

The following example demonstrates how to make a call using this method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// do the call
$api->delete("profile/{$profileID}");
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
* [GET profile](rest-get-profile)
* [PUT profile](rest-put-profile)
