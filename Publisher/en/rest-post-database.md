# REST API: creating a new database

This method is used to create a new database with the REST API. It uses an HTTP POST request to the following address:
https://api.copernica.com/v1/databases?access_token=XXX

## Available parameters
- **name**: name of the new database
- **description**: optional description of the database
- **archived**: optional boolean value to archive the database upon creation

## PHP example
The following PHP script demonstrates how to use the API method:
```PHP
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestApi("your-access-token");

// data to be sent to the api
$data = array(
    'name'          =>  'my-test-database',
    'description'   =>  'a description of the database'
);

// do the call
api->post("databases", $data);
```
This example uses the [CopernicaRestApi class](rest-php).

## More information
- [Overview of all API methods](rest-api)
- [Requesting a list of databases](rest-get-databases)
- [Deleting a database](rest-delete-database)
