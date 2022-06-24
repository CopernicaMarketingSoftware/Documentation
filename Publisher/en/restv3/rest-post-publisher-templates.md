# REST API: POST templates (Publisher)

This method is used to create a new template with the REST API. It uses 
an HTTP POST request to the following address:

`https://api.copernica.com/v3/templates?access_token=xxxx`

After a successful call the ID of the created request is returned.

## Available parameters

* **name**: name of the new template (**required**)
* **description**: description of the template
* **from_address**: array with a 'name' and 'email' for the from address
* **subject**: subject of the template
* **source**: the HTML source of the template (**required**)
* **amp**: the AMP source of the template
* **text**: the text version of the template

## PHP example

The following PHP script demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to be sent to the api
$data = array(
    'name'          =>  'my-test-template',
    'source'        =>  '
    <html>
      <body>
        This is a test template.
      </body>
    </html>
    '
);

// do the call
$api->post("templates", $data);

// return id of created request if successful
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

* [Overview of all API methods](rest-api)
