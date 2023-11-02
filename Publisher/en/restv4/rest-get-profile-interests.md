# REST API: GET profile interests

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv3/rest-api.md) of the REST API.

There are several different ways to request the interests of a profile. 
Which method is best depends on how you want to use it. You can request 
a list of interest names, interest ID's or an array of JSON objects.

Please remember that `$id` should always be replaced with the numerical 
identifier of the profile you're requesting the interests of.

## List of interest names

A list of interest names can be requested by sending an HTTP GET request 
to the following URL:

`https://api.copernica.com/v3/profile/$id/interests?access_token=xxxx`

The call returns a simple list of the names of interests. You could 
use this in code to check if a user has a certain interest.

## List of interest ID's

A list of interest ID's can be requested by sending an HTTP GET request 
to the following URL:

`https://api.copernica.com/v3/profile/$id/interests?access_token=xxxx&return=ids`

The call returns a simple list of the ID's of interests. You could use this 
to request the interests themselves.

## Array of objects

A list of JSON interest objects can be requested by sending an HTTP GET request 
to the following URL:

`https://api.copernica.com/v3/profile/$id/interests?access_token=xxxx&return=objects`

Each returned object in the array has the following properties:

- **ID**: numerical ID of the interest
- **name**: the name of the interest
- **group**: the group the interest belongs to

## PHP Example

The following PHP script demonstrates how to use the API method.

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// do the call, and print result
print_r($api->get("profile/{profileID}/interests"));
```

The example above requires the [CopernicaRestApi class](./rest-php.md).

## More information

* [Overview of all REST API methods](./rest-api.md)
* [GET profile](./rest-get-profile.md)
