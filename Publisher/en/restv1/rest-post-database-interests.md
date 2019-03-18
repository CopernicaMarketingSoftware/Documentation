# REST API: POST database interest

Warning: You are viewing the documentation for the old REST API. We recommend 
using [version 2](../restv2/rest-api.md) of the REST API.

The HTTP POST method to add an interest to an existing database is available at the following address:

`https://api.copernica.com/v1/database/$id/interests?access_token=xxxx`

In this, `$id` should be replaced by the numerical identifier, the ID, of the database you want to add an interest to. 
The name of the interest field and other values need to be added to the message body of the HTTP request. 
After a successful call the ID of the created request is returned.

## Available parameters

The following variables can be set in the message body:

- **name**: the title of the new interest field (mandatory)
- **group**: the group the field belongs to. Interests that belong to the same group are put together in the user interface

## PHP example

The following script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// data to pass to the call
$data = array(
    'name'      =>  'Football',
    'group'     =>  'Sport'
);

// do the call
$api->post("database/1234/interests", $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information:

- [Overview of all API calls](rest-api)
- [GET database interests](rest-get-database-interests)
- [PUT profile](rest-put-profile)
- [DELETE profile](rest-delete-profile)
