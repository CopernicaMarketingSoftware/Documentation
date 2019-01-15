# REST API: GET subprofile identifiers

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv2/rest-api.md) of the REST API.

A simple method for fetching the identifiers of all subprofiles in a miniselection.
Execute this method by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v1/miniview/$id/subprofileids?access_token=xxxx`

The $id should be replaced by the numerical identifier of the miniselection 
you want to fetch the IDs of.

## Available parameters

This method does not support any parameters.

## Returned fields

This method returns a JSON array consisting of unique numerical identifiers.

## PHP example

The following PHP script demonstrates how to use the API method.

```php
// required modules
require_once('copernica_rest_api.php');
   
// change this to your access token
$api = new CopernicaRestApi("your-access-token");

// execute the call and print the result
print_r($api->get("miniview/1234/subprofileids"));
```

The example above requires the [CopernicaRestApi class](rest-php).
    
## More information

* [List of all API calls](rest-api)
* [GET view subprofiles](rest-get-miniview-subprofiles)
