# REST API: PUT unsubscribe subprofile

You can execute the setup unsubscribe behavior of a subprofile in the collection
of a database by sending a HTTP PUT request to the following URL:

`https://api.copernica.com/v2/profile/$id/subprofiles/$id?access_token=xxxx`

The variabele `$id` should be replaced with the ID of the subprofile of which the
unsubscribe behavior should be executed.

## Body data

There is no extra data which needs to be send in the body. The [CopernicaRestApi class](rest-php) 
requires that a body is send with the request, in this case an empty array.


## PHP example

The following PHP script demonstrates how the API method can be called.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// body data
$data = array();

// do the call
$api->put("subprofile/{$subprofileID}/unsubscribe", $data));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API calls](rest-api)
* [Unsubscribe profile](rest-put-profile-unsubscribe)