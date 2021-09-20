# REST API: PUT profile

A method to edit the properties of an existing profile. It is called 
using the following URL:

`https://api.copernica.com/v3/profile/$id?access_token=xxxx`

The `$id` needs to be replaced with the ID of the profile you want to 
edit the properties of.

## Available data

The following data can be placed in the message body of the HTTP 
PUT command:

- **fields**: Fields that the profile contains
- **interests**: Interests that the profile contains
- **secret**: The secret code that is associated with the profile

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to be sent to the api
$data = array(
    "fields" => array(
        'firstname' =>  'John',
        'lastname'  =>  'Doe',
        'email'     =>  'johndoe@example.com'
    ),
    'interests' = array(
        'football'  =>  0,
        'tennis'    =>  1,
        'hockey'    =>  1
    ),
    'secret' => "geheimecode"
);

// do the call, and print result
print_r($api->put("profile/{$profileID}", $data));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [PUT profile fields](./rest-put-profile-fields)
* [PUT profile interests](./rest-put-profile-interests)
