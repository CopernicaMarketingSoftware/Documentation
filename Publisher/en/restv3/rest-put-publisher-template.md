# REST API: PUT template (Publisher)

A method to update a template. This is an HTTP PUT 
method, accessible at the following address:

`https://api.copernica.com/v3/publisher/template/$id?access_token=xxxx`

Replace the `$id` by the identifier of the template you want to edit.

## Available data

The following variables can be used in the body of the HTTP PUT request:

* **name**: name of the template 
* **description**: description of the template
* **from_address**: array with a 'name' and 'email' for the from address
* **subject**: subject of the template
* **source**: the HTML source of the template 
* **amp**: the AMP source of the template
* **text**: the text version of the template

## PHP example

The following example demonstrates how to use the API method:

```php
// dependencies
require_once('copernica-rest-api.php');

// change this into your access token
$api = new CopernicaRestAPI("your-access-token", 3);

// data to be sent to the api
$data = array(
     'source'        =>  '
      <html>
        <body>
          This is a new text.
        </body>
      </html>
      '
);

// do the call
$api->put("publisher/template/{$templateID}", $data);
```

The example above requires the [CopernicaRestApi class](rest-php).

## More information

- [Overview of all API calls](rest-api)
