# REST API: PUT profile subprofiles

To update or add subprofiles to a profile an HTTP PUT request can be sent to the following URL:

`https://api.copernica.com/v2/subprofile/$id/fields?access_token=xxxx`

The `$id` should be replaced with the ID of the subprofile you want to update or add
information to.

## Available data
The new field values need to be added to the body of the message. 
This data simply consists of the existing field names on the subprofile 
you want to change and their new values. If you send your data in JSON format, 
you’ll need to create an object with field names as keys and field values as values.
If, however, you’re using a traditional x-www-form-urlencoded format, 
the variables should contain the names of the fields you want to change, 
and the values should be the new field values.

## PHP example

The following PHP script demonstrates how the API method can be called.

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// data to pass to the call, the new fields
$data = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@example.com'
);
  
// do the call
$api->put("subprofile/{$subprofileID}/fields", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).
    
## More information

* [Overview of all REST API calls](rest-api)
* [PUT profile interests](rest-put-profile-interests)
* [POST database profile](rest-post-database-profiles)
* [GET subprofile](rest-get-subprofile)
* [POST profile subprofile](rest-post-profile-subprofiles)
