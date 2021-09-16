# REST API: PUT unsubscribe subprofile

You can execute the setup unsubscribe behavior of a subprofile in the collection
of a database by sending an HTTP PUT request to the following URL:

`https://api.copernica.com/v3/subprofile/$id/unsubscribe?access_token=xxxx`

The variable `$id` should be replaced with the ID of the subprofile you want to unsubscribe.

## Body data

The request does not need any additional data to be sent in the body. The [CopernicaRestApi class](rest-php)  class does require a body to be sent, so in this case we use an empty array.

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