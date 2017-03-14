# REST API: adding interests to a profile

To add interests to a profile an HTTP post request can be sent to the 
following URL:

`https://api.copernica.com/v1/profile/$id/interests?access_token=xxxx`

The $id should be replaced with the ID of the profile you want to change 
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
In this example the interests of a profile with ID 4567 are modified.
For profile 1234 the interests "tennis" and "hockey" are activated and the 
interest "football" is deactivated. All other interests remain the same.
After this the interest "football" is added to profile 1235.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // data to pass to the call, the new interests
    $data = array(
        'football'  =>  0,
        'tennis'    =>  1,
        'hockey'    =>  1
    );
    
    // do the call
    $api->post("profile/1234/interests", $data);

    // data to pass to a second call
    $data = array('football');
    
    // do the call
    $api->post("profile/1235/interests", $data);

The example above requires the [CopernicaRestApi class](rest-php).
    
## More information

* [Overview of all REST API calls](rest-api)
* [Overwrite profile interests](rest-put-profile-interests)
* [Fetch profile data](rest-get-profile)
* [Edit a profile](rest-put-profile)
* [Remove a profile](rest-delete-profile)
