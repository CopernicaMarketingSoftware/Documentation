# REST API: PUT collection field

Method to edit a certain field in a collection. To use this method you can make an HTTP PUT request to the following URL:

`https://api.copernica/com/v3/collection/$id/field/$id?access_token=xxxx`

The first `$id` should be the collection you want to edit the field of 
and the second `$id` should be replaced by the ID of the field you want 
to edit. Any other information should be added to the message body of 
the HTTP request.

## Available data

The following data must be put into the body of the request:

- **name**: Name of the field
- **type** Type of the field
- **value**: Value of the field
- **displayed**: Boolean value to indicate whether or not the field should be placed in 
grids and lists in the user interface
- **ordered**: Boolean value to indicate whether or not profiles in the collection should be ordered by this field
- **length**: Maximum length for text fields
- **textlines**: Amount of text lines for text fields
- **hidden**: Boolean value to indicate whether or not to always hide a field from a user
- **index**: Boolean value to indicate whether or not to create an index on the field
            
## PHP example

The following PHP script demonstrates how to use the method.

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// data to be sent to the api
$data = array(
   'name'      => 'new_name'
);

// do the call
$api->put("collection/{$collection}/field/{$field}", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API method](rest-api)
- [PUT database field](rest-put-database-field)
- [PUT profile field](rest-put-profile-fields)
