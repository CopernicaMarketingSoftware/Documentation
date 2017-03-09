# REST API: adding subprofile to a profile

To add subprofiles to a profile an HTTP post request can be sent to the following URL:

'https://api.copernica.com/v1/profile/$id/subprofiles?access_token=xxxx'

The $id should be replaced with the ID of the profile you want to add a subprofile to. The new subprofile of the profile can be placed in the body of the message.

## Body data

The subprofile can have the following properties:

- **secret**: Secret code associated with subprofiles
- **profile**: ID of the profile the subprofile is associated with
- **fields**: Fields of the subprofile
- **collection**: ID of the collection the subprofile belongs to
- **created**: Timestamp of creation in YYYY-MM-DD hh:mm:ss format
- **modified**: Timestamp of last edit in YYYY-MM-DD hh:mm:ss format

## PHP example

The following PHP script demonstrates how the API method can be called.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // data to pass to the call, the new interests
    $data = array(
        'profile' => '1234'
    );
    
    // do the call
    $api->post("profile/1234/subprofiles", $data);

The example above requires the [CopernicaRestApi class](rest-php).
    
## More information

* [Overview of all REST API calls](rest-api)
* [Overwrite profile interests](rest-put-profile-interests)
* [Creating a profile](rest-post-profile)
* [Fetch subprofile data](rest-get-subprofile)
* [Edit a subprofile](rest-put-subprofile)
* [Remove a subprofile](rest-delete-subprofile)
