# REST API: PUT database profiles

If you want to modify multiple profiles with a single call to the API, you
can send a HTTP PUT request to the following URL:

`https://api.copernica.com/v2/database/$id/profiles?access_token=xxxx`

The `$id` code should be replaced with the numeric identifier or the name
of the database in which you want to modify profiles. The new field values
should be sent in the request body.

Please keep in mind that this is a HTTP PUT request. This method is an
exception to the rule that the Copernica REST API makes no distinction between
HTTP POST and HTTP GET calls. For this method you must use HTTP PUT. If you
send a POST request, you [would be making a brand new profile](./rest-post-database-profiles.md). 

## Supported parameters

You must use two different ways to pass data to this method; through the URL and
the request body. You can pass the following parameters to the URL:

* **fields**: required parameter to select the profiles that are going to be modified
* **create**: boolean parameter that determines whether to create a new profile if none exist.
* **async**: boolean parameter to modify the profiles asynchronously. 
If you set this to 1, the method immediately returns and proceeds in 
the background with updating profiles.

The **fields** parameter is required. By passing this parameter to the the method
you prevent that you overwrite all your profiles with a single API call. Only
the profiles that match with the supplied fields are modified. You can find more
information about this parameter in [the article about this parameter](./rest-fields-parameter.md).

If there are no profiles that match the supplied **fields**, and when you have set
**create** to 1, the REST API creates a brand new profile using
the profile fields passed in the HTTP request body.

Updating a large list of profiles can take a long time. If you do not want to
wait for this you can set the *async* parameter to 1. This will cause the API
to immediately return, while it updates the profiles in the background.

## Body data

Besides the parameters that you append to the URL, you must also include a
request body in the POST request. The body has two optional components: 
'fields' and 'interests'. Both will be added to the new profile. The interests 
can be added from a list ("football") or with an associative array 
("football" => 1, "baseball" => 0). Fields must be an associative array.

Please note that this is a different input format than [version 1](../restv1/rest-post-database-profiles) of this 
API call. 

## Returned fields

If your request is not asynchronized the result will be a list of profiles. 
This list of profiles can be empty (no matching profiles and 'create' set to 0), 
contain the matching profiles or the newly created profile. Each profile 
contains the following information:

- **ID**: numerical ID of the profile
- **fields**: associative array/object of field names and values
- **interests**: array of  the interests the profile has
- **database**: ID of the database the profile is stored in
- **secret**: the “secret” code that is linked to a profile
- **created**: the timestamp on which the profile was created, in YYYY-MM-DD hh:mm:ss format.
- **modified**: the timestamp on which the profile was last modified,, in YYYY-MM-DD hh:mm:ss format.

The JSON might look something like this:
```
{
    "ID":"1",
    "fields":{
        "firstname":"name",
        "lastname":"doe"
    },
    "interests":[],
    "database":"1",
    "secret":"424525",
    "created":"2000-01-01 00:00:00",
    "modified":"2000-01-01 00:00:00",
    "removed":false
}
```

## PHP example

This PHP script demonstrates how you can use this API call. In this specific 
case we use the profile selection parameters to select the profile where the ID 
field is set to 4567 and insert new profile data.

```php
// dependencies
require_once('copernica_rest_api.php');
    
// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// fields for the new profile
$fields = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@example.com'
);

// interests for the new profile
$interests = array(
    'football'  => 1,
    'baseball'  => 0
);

// the fields + interests form the data for the call
$data = array(
    'fields'    =>  $fields,
    'interests' =>  $interests
);

// parameters for profile selection
$parameters = array(
    'fields'    =>  array("customerid==4567"),
    'async'     =>  1,
    'create'    =>  0
);
    
// do the call and print the result
print_r($api->put("database/{$databaseID}/profiles", $data, $parameters));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API calls](./rest-api.md)
* [GET database profiles](./rest-get-database-profiles.md)
* [PUT profile fields](./rest-put-profile-fields.md)
* [DELETE profile](./rest-delete-profile.md)
