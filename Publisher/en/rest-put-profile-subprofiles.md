# REST API: POST profile subprofiles

To add subprofiles to a profile an HTTP PUT request can be sent to the following URL:

`https://api.copernica.com/v1/profile/$id/subprofiles/$collectionID?access_token=xxxx`

The `$id` should be replaced with the ID of the profile you want to add a
subprofile to. The `$collectionID` should be replaced with the ID of the
collection in which the subprofile should be stored. The new subprofile
of the profile can be placed in the body of the message. After a succesful 
call the ID of the created request is returned.

## Body data

The you can create a field  properties.

## PHP example

The following PHP script demonstrates how the API method can be called.

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// data to pass to the call, the new interests
$data = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@example.com'
);
  
// do the call
$api->put("profile/id/subprofiles/id", $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).
    
## More information

* [Overview of all REST API calls](rest-api)
* [PUT profile interests](rest-put-profile-interests)
* [POST database profile](rest-post-database-profiles)
* [GET subprofile](rest-get-subprofile)
* [POST profile subprofile](rest-post-profile-subprofiles)
