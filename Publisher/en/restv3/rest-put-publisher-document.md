# REST API: PUT document (Publisher)

A method to update a document. This is an HTTP PUT 
method, accessible at the following address:

`https://api.copernica.com/v3/document/$id?access_token=xxxx`

Replace the `$id` by the identifier of the template you want to edit.

## Available data

The following variables can be used in the body of the HTTP PUT request:

* **name**: name of the document 
* **description**: description of the document
* **from_address**: array with a 'name' and 'email' for the from address
* **subject**: subject of the document

## PHP example

The following example demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to be sent to the api
$data = array(
     'name'        =>  'New name of the document'
);

// do the call
$api->put("document/{$documentID}", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API calls](rest-api)
