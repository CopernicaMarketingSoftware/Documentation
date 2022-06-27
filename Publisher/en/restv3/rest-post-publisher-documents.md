# REST API: POST documents (Publisher)

This method is used to create a new document with the REST API. It uses 
an HTTP POST request to the following address:

`https://api.copernica.com/v3/documents?access_token=xxxx`

After a successful call the ID of the created request is returned.

## Available parameters

* **template**: ID of the template (**required**)
* **name**: name of the new document (**required**)
* **description**: description of the document
* **from_address**: array with a 'name' and 'email' for the from address
* **subject**: subject of the document

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to be sent to the api
$data = array(
    'template'      =>  '1234',
    'name'          =>  'my-test-document'
);

// do the call
$api->post("documents", $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API methods](rest-api)
