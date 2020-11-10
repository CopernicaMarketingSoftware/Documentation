# REST API: PUT profile subprofiles

If you want to modify multiple subprofiles with a single call to the API, you
can send a HTTP PUT request to the following URL:

`https://api.copernica.com/v2/profile/$id/subprofiles/$id?access_token=xxxx`

The first `$id` should be replaced with the ID of the profile which the
subprofiles are linked to. The second `$id` should be replaced with the ID or
name of collection the collection containing the subprofiles. The new
field values should be sent in the request body.

Please keep in mind that this is a HTTP PUT request. This method is an
exception to the rule that the Copernica REST API makes no distinction between
HTTP POST and HTTP PUT calls. For this method you must use HTTP PUT. If you
send a POST request, you [would be making a brand new subprofile](./rest-post-profile-subprofiles.md). 

## Supported parameters

You must use two different ways to pass data to this method; through the URL and
the request body. You can pass the following parameters to the URL:

* **fields**: required parameter to select the subprofiles that are going to be modified
* **create**: boolean parameter that determines whether to create a new subprofile if none exist.

The **fields** parameter is required, to prevent overwriting all profiles in a
database with a single API call. Only the profiles that match with the supplied
fields are modified. You can find more information about this parameter in
[the article about this parameter](./rest-fields-parameter.md).

If there are no subprofiles that match the supplied **fields**, and when you have set
**create** to 1, the REST API creates a brand new subprofile using
the fields passed in the HTTP request body.

## Body data

The field names and new values of the subprofiles' fields that should be updated
must be passed in the data body.

## PHP example

The following PHP script demonstrates how the API method can be called.

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// parameters for subprofile selection
$parameters = array(
    'fields'    =>  array("customerid==4567"),
    'create'    =>  0
);

// data to pass to the call, the new fields
$data = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@example.com'
);

// do the call
$api->put("profile/{$profileID}/subprofiles/{$collectionID}", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).
    
## More information

* [Overview of all REST API calls](rest-api)
* [PUT database profiles](rest-put-database-profiles)
* [PUT subprofile fields](./rest-put-subprofile-fields)
* [POST profile subprofiles](rest-post-profile-subprofiles)
