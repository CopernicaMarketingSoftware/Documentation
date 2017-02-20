# REST API: updating a field
To update existing fields of a profile, you need to do an HTTP PUT request to the following URL:
`https://api.copernica.com/profile/$id/fields?access_token=xxxx`
In this, $id should be replaced by the numerical identifier, the ID, of the database you want to add a selection to. The name of the field and other variables need to be added to the message body of the HTTP request.

## Body data
The new field values need to be added to the body of the message. This data simply consists of the field names you want to change and their new values. 
If you send your data in JSON format, you’ll need to create an object with field names as keys and field values as values. 

If, however, you’re using a traditional x-www-form-urlencoded format, the variables should contain the names of the fields you want to change, and the values should be the new field values.

## PHP example
The following example illustrates how to use the API method:

```PHP
// dependencies
require_once('copernica_rest_api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// this method takes no parameters
$parameters = array()

// data to pass to the call
$data = array(
    'firstname' =>  'John',
    'lastname'  =>  'Doe',
    'email'     =>  'johndoe@example.com'
);

// do the call
$api->put("profile/1234/fields", $parameters, $data);
```

For this example, you need [the CopernicaRestApi class](rest-php).

## More information
- [Overview of all API calls](rest-api)
- [Updating multpiple profiles](rest-put-database-profiles)
- [Deleting a profile](rest-delete-database-profile)
