# REST API: POST profile subprofiles

To add subprofiles to a profile an HTTP POST request can be sent to the following URL:

`https://api.copernica.com/v2/profile/$id/subprofiles/$id?access_token=xxxx`

The first `$id` should be replaced with the ID of the profile you want to add a
subprofile to. The second `$id` should be replaced with the collection ID or name. 
The new subprofile data of the profile can be placed in the body of the message. 
After a successful call the ID of the created request is returned.

## Body data

You can create fields by specifying the properties and assigning it to the data body.

## PHP example

The following PHP script demonstrates how the API method can be called.

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// data to pass to the call, the new fields
$data = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@example.com'
);

// do the call
$api->post("profile/{$profileID}/subprofiles/{$collectionID}", $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).
    
## More information

* [Overview of all REST API calls](rest-api)
* [PUT profile interests](rest-put-profile-interests)
* [POST database profile](rest-post-database-profiles)
* [GET subprofile](rest-get-subprofile)
