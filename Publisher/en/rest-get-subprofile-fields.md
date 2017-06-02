# REST API: GET subprofile fields

To request the fields from a subprofile you can send an HTTP GET
request to the following URL:

`https://api.copernica.com/v1/subprofile/$id/fields?access_token=xxxx`

The $id should be replaced with the numerical identifier of the subprofile 
you're requesting the fields of.

## Returned fields

This method returns the fields of a subprofile.

## PHP Example

The following PHP script demonstrates how to use the API method.

```php
// dependencies
require_once('copernica_rest_api.php');
  
// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// do the call, and print result
print_r($api->get("subprofile/1234/fields"));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [List of all API calls](rest-api)
* [GET subprofile](rest-get-subprofile)
