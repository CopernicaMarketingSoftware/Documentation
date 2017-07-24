# REST API: PUT profile fields

To update existing fields of a profile, you need to do an HTTP PUT 
request to the following URL:

`https://api.copernica.com/v1/profile/$id/fields?access_token=xxxx`

In this, `$id` should be replaced by the numerical identifier, the ID, of 
the database you want to add a selection to. The name of the field and 
other variables need to be added to the message body of the HTTP request.

## Available data

The new field values need to be added to the body of the message. This 
data simply consists of the existing field names on the profile you want 
to change and their new values. If you send your data in JSON format, 
you’ll need to create an object with field names as keys and field 
values as values. 

If, however, you’re using a traditional x-www-form-urlencoded format, 
the variables should contain the names of the fields you want to change, 
and the values should be the new field values.

## PHP example

The following example illustrates how to use the API method:

```php
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// declare the id of the profile that you want to edit
$id = 1;

// data to pass to the call
$data = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@example.com'
);

// do the call
$api->put("profile/{$id}/fields", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API calls](rest-api)
- [PUT database profiles](rest-put-database-profiles)
- [DELETE database profile](rest-delete-profile)
