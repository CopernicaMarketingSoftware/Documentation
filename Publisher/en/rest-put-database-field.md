# REST API: PUT database field

When you want to update the properties of a database field, like the 
name or the type, you can do so by sending an HTTP PUT request to the 
following URL:

`https://api.copernica.com/v1/database/$id/field/$id?access_token=xxxx`

In this, the first `$id` has to be replaced by the numerical ID or the 
name of the database the field you want to edit is in. The second `$id` 
has to be the ID of the field itself.

## Available data keys

- **name**: the name of the new field. (mandatory)
- **type**: type of the new field
- **value**: default value of the new field
- **textlines**: number of lines in forms to edit the field
- **length**: maximum text length
- **index**: boolean value, shows whether or not the field should be 
indexed
- **displayed**: boolean value to determine whether or not the field 
should be placed into lists and grids in the user interface
- **hidden**: boolean value to make sure a field is never shown in the interface
- **ordered**: boolean value to determine whether or not profiles should 
be ordered by this field.

These are the exact fields the 
[method to create new fields](rest-post-database-fields) supports.

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// declare the id of the database that you want to edit
$id = 1;

// data to be sent to the api
$data = array(
    'name'          =>  'new-field-name'
);

// do the call
$api->put("database/1234/field/456", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API methods](rest-api)
- [GET database fields](rest-get-database-fields)
- [DELETE database field](rest-delete-database-field)
