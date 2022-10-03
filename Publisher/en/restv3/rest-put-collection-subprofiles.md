# REST API: PUT collection subprofiles

If you want to modify multiple subprofiles with a single call to the API, you
can send a HTTP PUT request to the following URL:

`https://api.copernica.com/v3/collection/$id/subprofiles?access_token=xxxx`

The `$id` code should be replaced with the numeric identifier or the name
of the collection in which you want to modify subprofiles. The new field values
should be sent in the request body.

Please keep in mind that this is a HTTP PUT request. This method is an
exception to the rule that the Copernica REST API makes no distinction between
HTTP POST and HTTP PUT calls. For this method you must use HTTP PUT. If you
send a POST request, you [would be making a brand new subprofile](./rest-post-collection-subprofiles.md). 

## Supported parameters

You must use two different ways to pass data to this method; through the URL and
the request body. You can pass the following parameters to the URL:

The **fields** parameter is required, to prevent overwriting all profiles in a
database with a single API call. Only the profiles that match with the supplied
fields are modified. You can find more information about this parameter in
[the article about this parameter](./rest-fields-parameter.md).

## Body data

Besides the parameters that you append to the URL, you must also include a
request body in the PUT request. The fields must be an associative array.

## PHP example

This PHP script demonstrates how you can use this API call. In this specific 
case we use the profile selection parameters to select the subprofile where the CustomerID 
field is set to 4567 and insert new profile data.

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// fields for the new profile
$fields = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@example.com'
);

// the data for the call
$data = array(
    'fields'    =>  $fields,
);

// parameters for profile selection
$parameters = array(
    'fields'    =>  array("customerid==4567"),
);
    
// do the call and print the result
print_r($api->put("collection/{$collectionID}/subprofiles", $data, $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](./rest-api.md)
