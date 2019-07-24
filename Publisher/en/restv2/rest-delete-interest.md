# REST API: DELETE interest

You can send an HTTP DELETE request to the following address to delete an 
interest:

`https://api.copernica.com/v2/interest/$id?access_token=xxxx`

The `$id` needs to be replaced by the numerical identifier of the interest
that you want to remove.

## PHP example

The following example demonstrates how to make a call using this method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call
$api->delete("interest/{$interestID}");
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
