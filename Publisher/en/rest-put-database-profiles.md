# REST API: editing multiple profiles at once

If you want to modify multiple profiles with a single call to the API, you
can send a HTTP PUT request to the following URL:

`https://api.copernica.com/database/$id/profiles?access_token=xxxx`

The $id code should be replaced with the numeric identifier or the name
of the database in which you want to modify profiles. The new field values
for the profiles should be passed as body data to the PUT request.

Please keep in mind that this is a HTTP PUT requets. This method is an
exception to the rule that the Copernica REST API makes no distinction between
HTTP POST and HTTP GET calls. For this method you must use HTTP PUT. If you
would send a POST request, you [would be making a brand new profile](./rest-post-database-profiles.md). 


## Supported parameters

You must use two different ways to pass data to this method: via the URL and
via the posted body data. You can pass the following parameters to the URL:

* **fields**: required parameter to select the profiles that are going to be modified
* **create**: boolean parameter that you can set to true if you want a new profile to be created if there are no matching profiles
* **async**: boolean parameter to modify the profiles asynchronously. If you set this to true, the method immediately returns and proceeds in the background with updating profiles

The *fields* parameter is required. By passing this parameter to the the method
you prevent that you overwrite all your profiles with a single API call. Only
the profiles that match with the supplied fields are modified. You can find more
information about this *fields* parameter in [the article about this parameter](./rest-fields-parameter.md).

If there are no profiles that match the supplied *fields*, and when you have set
THE *create* parameter to 1, the REST API creates a brand new profile using
the profile fields passed in the HTTP request body.

Updating a large list of profiles can take a long time. If you do not want to
wait for this you can set the *async* parameter to 1. This will cause the API
to immediately return, while it updates the profiles in the background.


## Body data

Besided the parameters that you append to the URL, you must also include a
request body in the PUT request. The body should contain the fields that should
be assigned to matching profiles, or the new profile data if the method has
to create a new profile in case of a no-match.


## PHP example

THis PHP script demonstrates how you can use this API call. In the script
we modify the profile with ID 4567.

    // dependencies
    require_once('copernica_rest_api.php');
    
    // change this into your access token
    $api = new CopernicaRestApi("your-access-token");

    // parameters to select profiles
    $parameters = array(
        'fields'    =>  array("customerid==4567"),
        'async'     =>  1,
        'create'    =>  0
    );

    // data to pass to the call
    $data = array(
        'firstname' =>  'John',
        'lastname'  =>  'Doe',
        'email'     =>  'johndoe@example.com'
    );
    
    // do the call
    $api->put("database/1234/profiles", $parameters, $data);

You need the [CopernicaRestApi klasse](rest-php) to run the above example
    

## More information

* [Overview of all API calls](./rest-api.md)
* [Fetching all profiles in the database](./rest-get-database-profiles.md)
* [Update fields of a single profile](./rest-put-profile-fields.md)
* [Remove a profile](./rest-delete-profile.md)
