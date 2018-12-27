# REST API: GET subprofile identifiers

A simple method for fetching the identifiers of all subprofiles in a miniselection.
Execute this method by sending an HTTP GET request to the following URL:

`https://api.copernica.com/v2/miniview/$id/subprofileids?access_token=xxxx`

The `$id` should be replaced by the numerical identifier of the miniselection 
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
$api = new CopernicaRestAPI("your-access-token", 2);

// execute the call and print the result
print_r($api->get("miniview/{$miniviewID}/subprofileids"));
```

The example above requires the [CopernicaRestApi class](rest-php).
    
## More information

* [List of all API calls](rest-api)
* [GET view subprofiles](rest-get-miniview-subprofiles)
