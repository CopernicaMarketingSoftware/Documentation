# REST API: overwriting profile interests
To overwrite existing interests of a profile or add an interest an HTTP PUT 
request can be sent to the following URL:

`https://api.copernica.com/v1/profile/$id/fields?access_token=xxxx`

In this, $id should be replaced by the numerical identifier, the ID, of the database you want to add a selection to. This method adds the given interest to the current interest array.

## Available parameters

There are two ways to send body data to this request, which influences the way 
the method works.

By sending an array in the body message the interests will be set to this array.
It is also possible to add an array along with activation values as the message 
body. This activation value can then be used to determine whether the interest 
'counts' or not in other applications. Both methods will overwrite the current 
profile interests. If you wish to keep the existing interests, please see the 
documentation on [Adding interests to a profile](rest-post-profile-interests).

## PHP example
The following PHP script demonstrates how to call the API method.
In the API call the interests of a profile with ID 1234 are edited to activate 
"tennis" and "hockey" and to disactivate "football" (second method). This overwrites previous 
interests. Then we activate the interest "football" for profile with ID 1235, 
overwriting the current interests for this profile (first method).

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // data to pass to the call
    $data = array(
        'football'  =>  0,
        'tennis'    =>  1,
        'hockey'    =>  1
    );
    
    // do the call
    $api->put("profile/1234/interests", $parameters, $data);

    // data to pass to a second call
    $data = array('football');
    
    // do the call
    $api->put("profile/1235/interests", $parameters, $data);

For this example, you need [the CopernicaRestApi class](rest-php).

## More information
- [Overview of all API calls](rest-api)
- [Updating multiple profiles](rest-put-database-profiles)
- [Deleting a profile](rest-delete-database-profile)
- [Fetch profile interests](rest-get-profile-interests)
