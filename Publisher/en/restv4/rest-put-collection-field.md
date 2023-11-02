# REST API: PUT collection field

Method to edit a certain field in a collection. To use this method you can make an HTTP PUT request to the following URL:

`https://api.copernica/com/v4/collection/$id/field/$id`

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

## JSON example

The following JSON demonstrates how to use the API method:

```json
{
  "name": "text_field",
  "type": "text",
  "value": "this is a text field",
  "displayed": true,
  "ordered": false,
  "length": 50,
  "textlines": 1,
  "hidden": false,
  "index": false
}
```        

## PHP example

The following PHP script demonstrates how to use the method.

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 4);

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
