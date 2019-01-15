# REST API: POST database profile

The HTTP POST method to add a profile to an existing database is 
available at the following address:

`https://api.copernica.com/v1/database/$id/profiles?access_token=xxxx`

In this, `$id` should be replaced by the numerical identifier, the ID, 
of the database you want to add an profile to. 
Profile information needs to be added to the message body of the HTTP request. 
After a successful call the ID of the created request is returned.

Please note that while POST and PUT 
are generally the same it is import to distinguish them in this case. 
This method posts a new profile, while PUT 
is the method to edit several profiles (see: 
[editing multiple profiles](rest-put-database-profiles)).

## Body data

Besides the parameters that you append to the URL, you must also include a
request body in the POST request. The body should contain the fields values
of the profile. Make sure you include an email address so you can reach the 
profile with your email campaigns!

## PHP example

The following script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// field values for the profile
$data = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@example.com'
);

// do the call
$api->post("database/1234/profiles", $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information:

- [Overview of all API calls](rest-api)
- [GET database profiles](rest-get-database-profiles)
- [PUT profile interests](rest-put-profile-interests)
- [DELETE profile](rest-delete-profile)
- [PUT profile fields](rest-put-profile-fields)
- [POST profile interests](rest-post-profile-interests)
