# REST API: POST database profile

The HTTP POST method to add a profile to an existing database is 
available at the following address:

`https://api.copernica.com/v3/database/$id/profiles?access_token=xxxx`

In this, `$id` should be replaced by the numerical identifier, the ID, 
of the database you want to add a profile to. 
Profile information needs to be added to the message body of the HTTP request. 
After a successful call the ID of the created request is returned.

Please note that while POST and PUT 
are generally the same it is import to distinguish them in this case. 
This method posts a new profile, while PUT 
is the method to edit several profiles (see: 
[editing multiple profiles](rest-put-database-profiles)).

## Body data

Besides the parameters that you append to the URL, you must also include a
request body in the POST request. The body has two optional components: 
'fields' and 'interests'. Both will be added to the new profile. The interests 
can be added from a list ("football") or with an associative array 
("football" => 1, "baseball" => 0). Fields must be an associative array.

Please note that this is a different input format than [version 1](../restv1/rest-post-database-profiles) of this 
API call. 

## PHP example

The following script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// field values for the profile
$fields = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@example.com'
);

// interest values for the new profile
$interests = array(
    'football'  =>  1,
    'baseball'  => 0
);

// defining the interests like this is also valid
$interests = array("football");

// the fields and interests together form the data for the 
// call
$data = array(
    'fields'    => $fields,
    'interests' => $interests
);

// do the call
$api->post("database/{$databaseID}/profiles", $data);

// return id of the created profile if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information:

- [Overview of all API calls](rest-api)
- [GET database profiles](rest-get-database-profiles)
- [PUT profile interests](rest-put-profile-interests)
- [DELETE profile](rest-delete-profile)
- [PUT profile fields](rest-put-profile-fields)
- [POST profile interests](rest-post-profile-interests)
