# REST API: fetching profiles from a selection

To retrieve all profiles in a selection, send a HTTP GET request to this address:

`https://api.copernica.com/v1/view/$id/profiles?access_token=xxxx`

The $id code should be replaced with the numeric identifier of the selection
from which you want to retrieve the profiles.

## Supported parameters

You can add one or more of the following parameters to the URL:

* **start**: the first profile to fetch
* **limit**: max size of the requested batch
* **total**: show/hide the total number of matching profiles
* **fields**: optional parameter to filter out profiles
* **orderby**: name or id of the field on which the profiles are ordered (default value is the profile ID)
* **order**: should the profiles be ordered in ascending or descending order (asc or desc)?

You can find more information about the *start*, *limit* en *total* parameters 
in our [paging article](./rest-paging.md). 

The *fields* parameter can be used to filter the profiles. You can for example
use this parameter to only fetch profiles for which the field "country" equals
"France". More information about using this parameter can be found in our
[article about this fields parameter](./rest-fields-parameter.md).

You can assign the name or numeric identifier of a field to the parameter *order*.
This will order the profiles on the given field.
Besides a name or ID, you can also pass a couple of special values to this parameter:

* **id**: the default value, profiles are ordered based on their ID
* **random**: profiles are randomly ordered
* **modified**: profiles are ordered based on the *modified* timestamp.


## The returned properties

This method returns a list of profiles. Each item in this list is a JSON object
with the following properties:

* **ID**: numeric ID of the profile
* **database**: ID of the database in which the profile is stored
* **secret**: the "secret" code of this profile
* **created**: creation timestamp, in YYYY-MM-DD hh:mm:ss format
* **modified**: last modified timestamp, in YYYY-MM-DD hh:mm:ss format
* **fields**: associative array / object with the profile fields
* **interests**: array of profile interests


## PHP example

The following script can be used to fetch profiles from a selection. The 
CopernicaRestApi class that we use in the example takes care of escaping the
parameters that are passed to the URL. If you write your own code to construct
the URL, you must take care of escaping the parameters yourself.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // parameters to pass to the call
    $parameters = array(
        'limit'     =>  100,
        'orderby'   =>  'country',
        'fields'    =>  array("age>16", "age<=65")
    );
    
    // do the call, and print result
    print_r($api->get("view/1234/profiles", $parameters));

You need the [CopernicaRestApi class](./rest-php.md) to run the example.
    

## More information

* [Overview of all API calls](./rest-api.md)
* [Fetching profile ID's](./rest-get-view-profileids.md)
* [Add profile to database](./rest-post-database-profiles.md)
* [Edit a profile](./rest-put-profile-fields.md)
* [Remove a profile](./rest-delete-profile.md)
