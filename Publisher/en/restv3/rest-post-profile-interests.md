# REST API: POST profile interests

To add interests to a profile an HTTP post request can be sent to the 
following URL:

`https://api.copernica.com/v3/profile/$id/interests?access_token=xxxx`

The `$id` should be replaced with the ID of the profile you want to change 
the interests of. The new interests of the profile can be placed in the 
body of the message.

## Body data

There are two ways to define the body data, which will influence how the
method works. This method is able to add interest and disable existing ones. 
If you want to overwrite all current interests please see the documentation
on [overwriting profile interests](rest-put-profile-interests).

The first way to add interests is to send an array of interests. They will
be added to the profile and the existing interests will remain the same.

It is also possible to sent an object as the body data. The keys to this object should
be the interests and the values booleans that determine whether or not the interests should
be activated. Any existing interests can be disabled this way. Any existing interest not in 
the object will remain the same.

## PHP example

The following PHP script demonstrateshow the API method can be called.
In this example the interests of a profile are modified.
For the first profile the interests "tennis" and "hockey" are activated and the 
interest "football" is deactivated. All other interests remain the same.
After this the interest "football" is added to the second profile.

```php
// dependencies
require_once('copernica_rest_api.php');
   
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to pass to the call, the new interests
$data = array(
    'football'  =>  0,
    'tennis'    =>  1,
    'hockey'    =>  1
);
    
// execute the call for the first profile
$api->post("profile/{$profileID1}/interests", $data);

// data to pass to a second call
$data = array('football');
    
// execute the call for the second profile
$api->post("profile/{$profileID2}/interests", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).
    
## More information

* [Overview of all REST API calls](rest-api)
* [PUT profile interests](rest-put-profile-interests)
* [GET profile](rest-get-profile)
* [PUT profile](rest-put-profile)
* [DELETE profile](rest-delete-profile)
