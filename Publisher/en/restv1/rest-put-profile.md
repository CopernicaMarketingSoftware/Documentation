# REST API: PUT profile

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv2/rest-api.md) of the REST API.

A method to edit the properties of an existing profile. It is called 
using the following URL:

`https://api.copernica.com/v1/profile/$id?access_token=xxxx`

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
$api = new CopernicaRestApi("your-access-token");

// declare the id of the profile that you want to edit
$id = 1;

// data to be sent to the api
$data = array(
    "fields" => array(
        'firstname' =>  'John',
        'lastname'  =>  'Doe',
        'email'     =>  'johndoe@example.com'
        ),
        "interests" = array(
            'football'  =>  0,
            'tennis'    =>  1,
            'hockey'    =>  1
        ),
"secret" => "geheimecode"
);

// do the call, and print result
print_r($api->put("profile/{$id}", $data));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [PUT profile](./rest-put-profile)
* [PUT profile fields](./rest-put-profile-fields)
* [PUT profile interests](./rest-put-profile-interests)
