# REST API: PUT database field

When you want to update the properties of a database field, like the 
name or the type, you can do so by sending an HTTP PUT request to the 
following URL:

`https://api.copernica.com/v3/database/$id/field/$id?access_token=xxxx`

In this, the first `$id` has to be replaced by the numerical ID or the 
name of the database the field you want to edit is in. The second `$id` 
has to be the ID of the field itself.

## Available data

- **name**: the name of the new field (mandatory)
- **type**: type of the new field
- **value**: default value of the new field
- **displayed**: boolean value to determine whether or not the field should be placed into lists and grids in the user interface
- **ordered**: boolean value to determine whether or not profiles should be ordered by the value in this field.
- **length**: maximum text length
- **textlines**: number of lines in webforms to edit the field
- **hidden**: boolean value to make sure a field is never shown in the interface
- **index**: boolean value, sets whether or not the field should be indexed

The following types are available for fields:

- **integer**: numerical value
- **float**: numerical floating point value
- **date**: mandatory date field
- **empty_date**: non-mandatory date field
- **datetime**: mandatory field with date and time
- **empty_datetime**: non-mandatory field with date and time
- **text**: regular text field
- **email**: field with email address used for mailings (1 per database allowed)
- **phone_fax**: phone field with phone number that can be used for fax (1 per database allowed)
- **phone_gsm**: phone field with phone number that can be used for text messages (1 per database allowed)
- **select**: multiple choice field
- **big**: large text field
- **foreign_key**: numerical value that directs to another profile

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to pass to the call
$data = array(
    'name'      =>  'extra-field',
    'type'      =>  'select',
    'value'     =>  'A\nB\nC*'
);

// do the call
$api->put("database/{$databaseID}/field/{$fieldID}", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API methods](./rest-api)
- [Database fields](../database-fields-and-collections)
- [GET database fields](rest-get-database-fields)
- [POST database fields](./rest-post-database-fields)
- [DELETE database field](./rest-delete-database-field)
