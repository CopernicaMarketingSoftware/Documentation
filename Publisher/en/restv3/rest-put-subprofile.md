# REST API: PUT subprofile

A method to edit the properties of an existing subprofile. It is called 
using the following URL:

`https://api.copernica.com/v3/subprofile/$id?access_token=xxxx`

The `$id` needs to be replaced with the ID of the subprofile you want to 
edit the properties of.

## Available data

The following data can be placed in the message body of the HTTP 
PUT command:

- **fields**: Fields that the subprofile contains
- **secret**: The secret code that is associated with the subprofile

## PHP example

The following example demonstrates how to use this method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// data to be sent to the api
$data = array(
    "fields" => array(
        'firstname' =>  'John',
        'lastname'  =>  'Doe',
        'email'     =>  'johndoe@example.com'
    ),
    'secret' => "geheimecode"
);

// do the call, and print result
print_r($api->put("subprofile/{$subprofileID}", $data));
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all REST API methods](./rest-api)
* [PUT profile](./rest-put-profile)
* [PUT subprofile fields](./rest-put-subprofile-fields)
