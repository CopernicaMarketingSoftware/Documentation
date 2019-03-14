# REST API: POST database field

Method to add a new field to an existing database. This is an HTTP POST call to the following address:

`https://api.copernica.com/v2/database/$id/fields?access_token=xxxx`

In this, `$id` should be replaced by the numerical identifier, the ID, of the database you want to add a selection to. 
The name of the field and other variables need to be added to the message 
body of the HTTP request. After a successful call the ID of the created 
request is returned.

## Available parameters

The following variables can be put into the message body of the HTTP POST call:

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

## Example in PHP

The following example demonstrates how to use the API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 2);

// data to pass to the call
$data = array(
    'name'      =>  'extra-field',
    'type'      =>  'text'
);

// do the call
$api->post("database/{$databaseID}/fields", $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API calls](rest-api)
- [GET database fields](rest-get-database-fields)
- [PUT database field](rest-put-database-field)
- [DELETE database field](rest-delete-database-field)
