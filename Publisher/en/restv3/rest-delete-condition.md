# REST API: DELETE condition

You can send an HTTP DELETE request to the following address to delete a
condition:

`https://api.copernica.com/v3/condition/$type/$id?access_token=xxxx`

The `$type` and `$id` need to be replaced by the condition type and 
the numerical identifier of the condition respectively.

## PHP example

The following example demonstrates how to make a call using this method.

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// do the call
$api->delete("condition/{$conditionType}/{$conditionID}");
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](rest-api)
